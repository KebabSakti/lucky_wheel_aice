<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Result;
use Carbon\Carbon;
use App\Product;
use App\Customer;

class LaporanController extends Controller
{
    public function outlet(){

    	$Outlet = Outlet::whereHas('results')->get();

        $i=0;
    	foreach ($Outlet as $outlet) {
    		$Result = Result::where('kode_asset', $outlet['kode_asset'])->get();
            
    		$o[] = array(
                'kode_asset' => $outlet['kode_asset'],
                'nama_toko' => $outlet['nama_toko'],
                'tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', $Result->toArray()[$i]['created_at'])->format('d/m/Y'),
                'main' => count($Result->groupBy('session')),
                'kustomer' => count($Result->groupBy('no_telp')),
                'spin' => $Result->where('drawn', '>', 0)->count(),
                'menang' => $Result->whereNotIn('hadiah', ['Zonk',''])->count(),
                'kalah' => $Result->where('hadiah', 'Zonk')->count(),
                'hadiah' => $Result->whereNotIn('hadiah', ['Zonk',''])->toArray()
            );

            $total_main[] = $o[$i]['main'];
            $total_kustomer[] = $o[$i]['kustomer'];
            $total_spin[] = $o[$i]['spin'];
            $total_menang[] = $o[$i]['menang'];
            $total_kalah[] = $o[$i]['kalah'];

            $i++;
    	}

        $total = array(
            'main' => array_sum($total_main),
            'kustomer' => array_sum($total_kustomer),
            'spin' => array_sum($total_spin),
            'menang' => array_sum($total_menang),
            'kalah' => array_sum($total_kalah)
        );

        return view('laporan.outlet.outlet', ['outlet' => $o, 'total' => $total]);
    }

    public function kustomer(){
        $Customer = Customer::whereHas('results')->get();

        $i=0;
        foreach ($Customer as $customer) {
            $Result = Result::where('no_telp', $customer['no_telp'])->get();
            
            $o[] = array(
                'nama' => $customer['nama'],
                'no_telp' => $customer['no_telp'],
                'tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', $Result->toArray()[$i]['created_at'])->format('d/m/Y'),
                'main' => count($Result->groupBy('session')),
                'kustomer' => count($Result->groupBy('no_telp')),
                'spin' => $Result->where('drawn', '>', 0)->count(),
                'menang' => $Result->whereNotIn('hadiah', ['Zonk',''])->count(),
                'kalah' => $Result->where('hadiah', 'Zonk')->count(),
                'hadiah' => $Result->whereNotIn('hadiah', ['Zonk',''])->toArray()
            );

            $i++;
        }

        dd($o[0]['hadiah']['2']['hadiah']);

        return view('laporan.kustomer.kustomer');
    }
}
