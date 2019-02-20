<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $Result = Result::select(
            'session',
            'no_telp',
            'kode_asset',
            'beli',
            'drawn',
            'menang',
            'kalah',
            'hadiah'
        )->where('kode_asset', $request->kode_asset)
         ->get();

         if(count($Result)){

            //total game dimainkan
            $played = (count($Result)) ? count($Result->groupBy('session')) : 0;
            //total spin
            $spin = (count($Result)) ? $Result->where('drawn', '>', 0)->count() : 0;
            //total win
            $win = (count($Result)) ? $Result->whereNotIn('hadiah', ['Zonk',''])->count() : 0;
            //total lost
            $lost = (count($Result)) ? $Result->where('hadiah', 'Zonk')->count() : 0;
            //total user uniq bermain
            $uniq = (count($Result)) ? count($Result->groupBy('no_telp')) : 0;

            $status = true;
            //return data as array
            $data = array(
                'played' => $played,
                'spin' => $spin,
                'win' => $win,
                'lost' => $lost,
                'prize' => $win,
                'uniq' => $uniq
            );
        }else{
            $status = true;
            $data = array(
                'played' => 0,
                'spin' => 0,
                'win' => 0,
                'lost' => 0,
                'prize' => 0,
                'uniq' => 0
            );
        }

        return response()->json([
            'status' => $status,
            'message' => '',
            'data' => $data
        ]);
    }
}
