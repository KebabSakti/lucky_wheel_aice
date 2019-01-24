<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prize;

class PrizeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $Prize = Prize::select('kode_asset','kode_produk')
                                ->where('kode_asset', $request->kode_asset)
                                ->with(['product' => function($query){
                                    $query->select('kode','nama');
                                }])->get();

        if(count($Prize) > 0){
            $return = true;
            $message = '';
            $data = $Prize;
        }else{
            $return = false;
            $message = 'Hadiah untuk outlet anda belum di set';
            $data = '';
        }

        return response()->json([
            'status' => $return,
            'message' => $message,
            'data' => $data
        ]);
    }
}
