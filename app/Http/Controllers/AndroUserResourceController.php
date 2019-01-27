<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Outlet;

class AndroUserResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::orderBy('id', 'desc')->with('outlet')->whereHas('outlet')->get();

        return view('user.android.index', ['user' => $User->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $User = User::where('username', $id)->first();

        $sts = array('ON','OFF');

        return view('user.android.edit', ['user' => $User->toArray(), 'sts' => $sts]);
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
        $User = User::where('username', $id)->first();
        $User->status = $request->status;
        if(!empty($request->password)){
            $User->password = bcrypt($request->password);
        }
        $User->save();

        return redirect()->back()->with('alert','Berhasil. Informasi user telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //user
        User::where('username', $id)->delete();
        //outlet
        Outlet::where('username', $id)->delete();

        return redirect()->back()->with('alert','Berhasil. Data user dan outlet telah dihapus');
    }
}
