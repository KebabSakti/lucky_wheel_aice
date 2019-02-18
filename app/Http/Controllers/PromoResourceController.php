<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Carbon\Carbon;

class PromoResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Promo = Promotion::orderBy('id','desc')->get();

        return view('banner.index', ['banner' => $Promo->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
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
            'url' => 'required'
        ]);

        //set semua banner aktif ke non
        if(!empty($request->is_aktif)){
            Promotion::where('is_active', '=', 1)->update(['is_active' => 0]);

            $aktif = 1;
        }else{
            $aktif = 0;
        }

        //simpan gambar
        $fileName = Carbon::now()->timestamp.uniqid() . '.' . $request->file('url')->getClientOriginalExtension();
        $file = $request->file('url')->move('../public/ads/', $fileName);
        $url = $fileName;

        $Promo = new Promotion;
        $Promo->file = $url;
        $Promo->is_active = $aktif;
        $Promo->save();

        return redirect()->back()->with('alert','Berhasil. Banner telah ditambahkan');
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
        $Promo = Promotion::where('id', $id)->first();

        return view('banner.edit', ['banner' => $Promo->toArray()]);
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
        $Promo = Promotion::where('id', $id)->first();

        //hapus file
        unlink('../public/ads/'.$Promo['file']);

        //set semua banner aktif ke non
        if(!empty($request->is_aktif)){
            Promotion::where('is_active', '=', 1)->update(['is_active' => 0]);

            $aktif = 1;
        }else{
            $aktif = 0;
        }

        //simpan file baru
        $fileName = Carbon::now()->timestamp.uniqid() . '.' . $request->file('url')->getClientOriginalExtension();
        $file = $request->file('url')->move('../public/ads/', $fileName);
        $url = $fileName;

        $Promo->file = $url;
        $Promo->is_active = $aktif;
        $Promo->save();

        return redirect()->back()->with('alert','Berhasil. Banner telah diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Promo = Promotion::where('id', $id)->first();
        //hapus file
        unlink('../public/ads/'.$Promo['file']);

        //hapus dari db
        Promotion::where('id', $id)->first()->forceDelete();

        return redirect()->back()->with('alert','Berhasil. Produk telah di hapus');
    }
}
