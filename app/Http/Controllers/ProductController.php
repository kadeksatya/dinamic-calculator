<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::paginate(10);

        return view('admin.product.index', [
            'data' => $data
        ]);
    }

    public function create()
    {

        return view('admin.product.form', [
            'data' => null
        ]);
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.product.form', [
            'data' => $data
        ]);
    }


    public function store(Request $request)
    {
        if($request->is_deposito == 1 && $request->is_creadit_certificate == 1){
            return $this->isError('Value Deposito & Kredit sertifikat tidako boleh sama !');
        }
        $form = $request->all();
        Product::create($form);

        return $this->isSuccess('/product');
    }

    public function update(Request $request, $id)
    {
        if($request->is_deposito == 1 && $request->is_creadit_certificate == 1){
            return $this->isError('Value Deposito & Kredit sertifikat tidako boleh sama !');
        }
        $form = $request->except('_method','_token');
        Product::whereId($id)->update($form);

        return $this->isSuccess('/product');
    }

    public function destroy($id)
    {
        Product::whereId($id)->delete();
        return $this->isDelete();
    }
}
