<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tenor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::all();
        $tenor = Tenor::all();

        $getDataByCode = Product::where('code', $request->code)->first();
        return view('front.index', [
            'info' => $getDataByCode,
            'product' => $product,
            'tenor' => $tenor,
        ]);
    }
}
