<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facades\ActivityLogClass;
use Carbon\Carbon;
use App\Customer;
use App\Result;
use App\Foto;
use App\Buy;
use App\Prize;
use Validator;

class GameController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'no_telp' => 'required|unique:customers'
        ]);

        if($validator->fails()){
            $return = true;
            $message = 'No. Telp: '.$request->no_telp.' sudah terdaftar';
            $data = '';
            //log
            $result = 'Gagal';
        }else{
            //tambahkan data customer
            $Customer = new Customer;
            $Customer->no_telp = $request->no_telp;
            $Customer->nama = $request->nama;
            $Customer->save();

            $getCustomer = Customer::where('no_telp', $request->no_telp)->first();

            if($getCustomer != null){
                $return = true;
                $message = 'No. Telp: '.$request->no_telp.' berhasil ditambahkan';
                $data = $getCustomer;
                //log
                $result = 'Berhasil';
            }else{
                $return = false;
                $message = 'No. Telp: '.$request->no_telp.' gagal ditambahkan';
                $data = '';
                //log
                $result = 'Gagal';
            }   
        }

        //upload foto
        $fileName = Carbon::now()->timestamp.uniqid() . '.' . $request->file('foto')->getClientOriginalExtension();
        $file = $request->file('foto')->move('../public/images/', $fileName);
        //simpan info foto ke db
        $Foto = new Foto;
        $Foto->session = $request->session;
        $Foto->foto = $fileName;
        $Foto->save();

        //simpan data product dibeli ke db
        for($i=0;$i<count($request->products);$i++){
            $Buy = new Buy;
            $Buy->session = $request->session;
            $Buy->no_telp = $request->no_telp;
            $Buy->kode_asset = $request->kode_asset;
            $Buy->kode_produk = $request->products[$i];
            $Buy->qty_produk = $request->qty_products[$i];
            $Buy->save();
        }

        //save log to db
        ActivityLogClass::addLog(
            'Customer',
            'Tambah',
            $result, 
            $message
        );

    	return response()->json([
    		'status' => $return,
    		'message' => $message,
    		'data' => ''
    	]);
    }

    public function play(Request $request){

        for($i=0; $i<count($request->beli); $i++){
            $Result = new Result;
            $Result->session = $request->session;
            $Result->no_telp = $request->no_telp;
            $Result->kode_asset = $request->kode_asset;
            $Result->beli = $request->beli[$i];
            $Result->drawn = $request->drawn[$i];
            $Result->menang = $request->menang[$i];
            $Result->kalah = $request->kalah[$i];
            $Result->hadiah = $request->hadiah[$i];
            $Result->save();

            //kurangi stock jika menang
            if($request->menang[$i] > 0){

                $Result = Result::where('hadiah', $request->hadiah[$i])->orderBy('id','desc')->first();

                $nama_produk = $request->hadiah[$i];
                $Prize = Prize::where('kode_produk', function($q) use ($nama_produk) {
                    $q->from('products')
                      ->select('kode_produk')
                      ->where('nama', $nama_produk);
                })->first();

                $Prize->prize_stock -= $Result->menang;
                $Prize->save();
            }
        }

    	return response()->json([
    		'status' => true,
    		'message' => 'Data berhasil tersimpan',
    		'data' => ''
    	]);
    }
}
