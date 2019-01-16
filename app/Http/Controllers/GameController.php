<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facades\ActivityLogClass;
use Carbon\Carbon;
use App\Customer;
use App\Result;
use App\Foto;
use Validator;

class GameController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'no_telp' => 'unique:customers'
        ]);

        if(!$validator->fails()){
            $return = true;
            $message = 'No. Telp: '.$request->no_telp.' gagal ditambahkan';
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
    		'data' => $data
    	]);
    }

    public function play(Request $request){

    	$request->validate([
    		'no_telp' => 'bail|required|numeric',
    		'kode_asset' => 'bail|required',
    		'beli' => 'bail|required|numeric',
    		'drawn' => 'bail|required|numeric',
    		'menang' => 'bail|required|numeric',
    		'kalah' => 'bail|required|numeric',
    		'hadiah' => 'bail|required',
    		'foto' => 'required'
    	]);

    	$file = $request->file('foto');
    	$fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    	//upload image
    	$file->move(public_path('images'), $fileName);

    	$Result = new Result;
    	$Result->session = 'SES'.mt_rand(100000,999999);
    	$Result->no_telp = $request->no_telp;
    	$Result->kode_asset = $request->kode_asset;
    	$Result->beli = $request->beli;
    	$Result->drawn = $request->drawn;
    	$Result->menang = $request->menang;
    	$Result->kalah = $request->kalah;
    	$Result->hadiah = $request->hadiah;
    	$Result->foto = $fileName;
    	$Result->save();

    	return response()->json([
    		'status' => true,
    		'message' => '',
    		'data' => ''
    	]);
    }
}
