<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Outlet;
use App\User;
use App\Promotion;
use App\Result;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product;
        $user = new User;
        $outlet = new Outlet;

        for($i=1;$i<=10;$i++){
            $Result = new Result;
            
            $Result->session = 2919891;
            $Result->no_telp = '007';
            $Result->kode_asset = 'OTL1659';
            $Result->beli = 10;
            $Result->drawn = $i;
            $Result->menang = 1;
            $Result->kalah = 0;
            $Result->hadiah = 400;
            $Result->save();
        }

        /*
        for($i=1;$i<=5;$i++){
            $Promotion = new Promotion;
            $Promotion->urutan = $i;
            $Promotion->file = 'PATH';
            $Promotion->save();
        }

        /*
        
        $product->kode = mt_rand(100,999);
        $product->nama = 'Mango';
        $product->harga = 9000;
     	$product->save();

     	$user->username = 'famoost';
     	$user->password = bcrypt('buyung');
     	$user->level = 'Admin';
     	$user->save();
     	

     	for($i=0;$i<30;$i++){
     		$outlet = new Outlet;
	     	$outlet->username = 'famoost';
	     	$outlet->kode_asset = 'OT'.mt_rand(100,999);
	     	$outlet->nama_toko = 'TOKO'.$i;
	     	$outlet->lat = mt_rand() / mt_getrandmax();
	     	$outlet->lng = mt_rand() / mt_getrandmax();
	     	$outlet->save();
     	}

        */
    }
}
