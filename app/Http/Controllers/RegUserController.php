<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Facades\ActivityLogClass;
use App\User;
use App\Outlet;
use Validator;

class RegUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users'
        ]);

        if($validator->fails()){
            $return = false;
            $message = 'Username sudah terdaftar';
            $data = '';
        }else{
            //mulai database transaction
            DB::beginTransaction();

            //register user
            $User = new User;
            $User->username = $request->username;
            $User->password = Hash::make($request->password);
            $User->level = 'User';
            $User->status = 'OFF';
            $User->save();

            //register outlet
            $Outlet = new Outlet;
            $Outlet->username = $request->username;
            $Outlet->kode_asset = 'OTL'.mt_rand(1000,9999);
            $Outlet->nama_toko = $request->nama_toko;
            $Outlet->lat = $request->lat;
            $Outlet->lng = $request->lng;
            $Outlet->save();

            //cek apakah user dan outlet sudah tersimpan pada database
            $getUser = $User::where('username', $request->username)->first();
            $getOutlet = $Outlet::where('username', $request->username)->first();

            if($getUser != null && $getOutlet != null){
                //commit transaction jika tidak ada masalah
                DB::commit();

                //save log to db
                ActivityLogClass::addLog(
                    'User & Outlet',
                    'Tambah',
                    'Berhasil', 
                    'Username: '.$request->username.', outlet: '.$request->nama_toko.' berhasil ditambahakan'
                );

                $return = true;
                $message = 'User dan outlet berhasil di daftarkan';
                $data = $getOutlet;
            }else{
                //rollback jika salah satu tabel gagal menyimpan data
                DB::rollBack();

                //save log to db
                ActivityLogClass::addLog(
                    'User & Outlet',
                    'Tambah',
                    'Gagal', 
                    'Username: ['.$request->username.'], outlet: ['.$request->nama_toko.'] gagal ditambahkan'
                );

                $return = false;
                $message = 'Gagal menyimpan data ke database';
                $data = '';
            }
        }

        return response()->json([
            'status' => $return,
            'message' => $message,
            'data' => $data
        ]);
    }
}
