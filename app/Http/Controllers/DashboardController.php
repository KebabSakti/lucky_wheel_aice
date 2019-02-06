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

        //total game dimainkan
        $played = (count($Result)) ? count($Result->groupBy('session')) : 0;
        //total spin
        $spin = (count($Result)) ? $Result->where('drawn', '>', 0)->count() : 0;
        //total win
        $win = (count($Result)) ? $Result->where('menang','>', 0)->count() : 0;
        //total lost
        $lost = (count($Result)) ? $Result->where('kalah','>', 0)->count() : 0;
        //total user uniq bermain
        $uniq = (count($Result)) ? count($Result->groupBy('no_telp')) : 0;

        //return data as array
        $data = array(
            'played' => $played,
            'spin' => $spin,
            'win' => $win,
            'lost' => $lost,
            'prize' => $win,
            'uniq' => $uniq
        );

        return response()->json([
            'status' => true,
            'message' => '',
            'data' => $data
        ]);
    }
}
