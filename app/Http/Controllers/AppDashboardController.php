<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class AppDashboardController extends Controller
{
    public function index(){

    	$Result = Result::select(
            'session',
            'no_telp',
            'kode_asset',
            'beli',
            'drawn',
            'menang',
            'kalah',
            'hadiah'
        )->get();

        //total game dimainkan
        $played = (count($Result)) ? count($Result->groupBy('session')) : 0;
        //total spin
        $spin = (count($Result)) ? $Result->where('drawn', '>', 0)->count() : 0;
        //total win
        $win = (count($Result)) ? $Result->where('menang','>', 0)->count() : 0;
        //total lost
        $lost = (count($Result)) ? $Result->sum('kalah') : 0;
        //total user uniq bermain
        $uniq = (count($Result)) ? count($Result->groupBy('no_telp')) : 0;

        $Result = Result::where('drawn', 0)
        				->get();

    	return view('dashboard.index', ['result' => array(
    		'played' => $played, 
    		'spin' => $spin, 
    		'win' => $win, 
    		'lost' => $lost, 
    		'uniq' => $uniq
    	),
    	'outlet' => $Result]);
    }
}
