<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $Promotion = Promotion::select('file')->where('is_active', 1)->first();

        if($Promotion != null){
            $status = true;
            $data = array('file' => asset('ads/'.$Promotion['file']));
        }else{
            $status = false;
            $data = '';
        }

        return response()->json([
            'status' => $status,
            'message' => '',
            'data' => $data
        ]);
    }
}
