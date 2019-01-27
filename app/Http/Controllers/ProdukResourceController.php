<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Prize;

class ProdukResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::orderBy('id','desc')->get();

        return view('produk.index', ['produk' => $Product->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);

        $Product = new Product;
        $Product->kode = mt_rand(100000,999999);
        $Product->nama = $request->nama;
        $Product->harga = $request->harga;
        $Product->save();

        return redirect()->back()->with('alert','Berhasil. Produk telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Product = Product::where('kode', $id)->first();

        return view('produk.edit', ['produk' => $Product->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);

        $Product = Product::where('kode', $id)->first();
        $Product->nama = $request->nama;
        $Product->harga = $request->harga;
        $Product->save();

        return redirect()->back()->with('alert','Berhasil. Produk telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Prize = Prize::where('kode_produk', $id)->first();

        if($Prize != null){
            return redirect()->back()->with('alert','Gagal. Produk telah di set sebagai hadiah outlet, hapus setting hadiah terlebih dahulu');
        }

        Product::where('kode', $id)->delete();

        return redirect()->back()->with('alert','Berhasil. Produk telah di hapus');
    }
}
