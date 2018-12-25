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
        $Promotion = new Promotion;
        $getPromotion = $Promotion::select('urutan','file')
                                  ->orderBy('urutan','asc')
                                  ->get();

        return response()->json([
            'return' => true,
            'message' => '',
            'data' => $getPromotion
        ]);
    }
}
