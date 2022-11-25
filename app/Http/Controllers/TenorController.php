<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tenor;
use Illuminate\Http\Request;

class TenorController extends Controller
{
    public function index()
    {
        $data = Tenor::orderBy('code', 'ASC')->paginate(10);

        return view('admin.tenor.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $product = Product::all()->groupBy('code');
        return view('admin.tenor.form', [
            'data' => null,
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $data = Tenor::find($id);
        $product = Product::all()->groupBy('code');
        return view('admin.tenor.form', [
            'data' => $data,
            'product' => $product
        ]);
    }


    public function store(Request $request)
    {
        $form = $request->all();
        Tenor::create($form);

        return $this->isSuccess('/tenor');
    }

    public function update(Request $request, $id)
    {
        $form = $request->except('_method','_token');
        Tenor::whereId($id)->update($form);

        return $this->isSuccess('/tenor');
    }

    public function destroy($id)
    {
        Tenor::whereId($id)->delete();
        return $this->isDelete();
    }
}
