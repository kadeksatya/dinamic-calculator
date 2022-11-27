<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;

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
        $name = rand(1, 99999) . now()->format('Y-m-d-H-i-s');

        // dd($idOutlet->id);

        if ($request->file('photo')) {

            $image = $request->file('photo');
            $new_name = $name . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath . '/' . $new_name);


            $form = array(
                'code' => $request->code,
                'name' => $request->name,
                'is_deposito' => $request->is_deposito,
                'is_creadit_certificate' => $request->is_creadit_certificate,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'photo' => asset('assets/images') . '/' . $new_name,

            );
        } else {
            $form = array(
                'code' => $request->code,
                'name' => $request->name,
                'is_deposito' => $request->is_deposito,
                'is_creadit_certificate' => $request->is_creadit_certificate,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'photo' => null

            );
        }

        if($request->is_deposito == 1 && $request->is_creadit_certificate == 1){
            return $this->isError('Value Deposito & Kredit sertifikat tidako boleh sama !');
        }
        Product::create($form);

        return $this->isSuccess('/product');
    }

    public function update(Request $request, $id)
    {
        if($request->is_deposito == 1 && $request->is_creadit_certificate == 1){
            return $this->isError('Value Deposito & Kredit sertifikat tidako boleh sama !');
        }
        $name = rand(1, 99999) . now()->format('Y-m-d-H-i-s');

        if ($request->file('photo')) {

            $image = $request->file('photo');
            $new_name = $name . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath . '/' . $new_name);


            $form = array(
                'code' => $request->code,
                'name' => $request->name,
                'is_deposito' => $request->is_deposito,
                'is_creadit_certificate' => $request->is_creadit_certificate,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'photo' => asset('assets/images') . '/' . $new_name,

            );
        } else {
            $form = array(
                'code' => $request->code,
                'name' => $request->name,
                'is_deposito' => $request->is_deposito,
                'is_creadit_certificate' => $request->is_creadit_certificate,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'photo' => null

            );
        }
        Product::whereId($id)->update($form);

        return $this->isSuccess('/product');
    }

    public function destroy($id)
    {
        Product::whereId($id)->delete();
        return $this->isDelete();
    }
}
