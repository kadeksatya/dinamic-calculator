@extends('layouts.app')

@section('content')
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
    <div class="float-right">
        <a href="/product/create" class="btn btn-primary">Add Data</a>
    </div>
</div>
<div class="col-xl-12 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <table class="table table-bordered" style="width: 100%">
                <thead>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Is Deposito ?</th>
                    <th>Is Credit Certificate ?</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->is_deposito == 0 ? 'Tidak':'Ya'}}</td>
                        <td>{{$item->is_creadit_certificate == 0 ? 'Tidak':'Ya'}}</td>
                        <td>
                            <a href="/product/{{$item->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" data-url="/product/{{$item->id}}/delete" class="btn btn-danger delete-item"><i class="fa fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-xl-12 col-md-6 mb-4">
    <div class="float-right">
       {{$data->links()}}
    </div>
</div>

@endsection
