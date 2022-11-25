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
        return view('front.index', [
            'product' => $product,
            'tenor' => $tenor,
        ]);
    }
}
