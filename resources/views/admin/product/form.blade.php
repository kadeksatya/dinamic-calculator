@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="{{$data == null ? '/product/store':'/product/'.$data->id.'/update'}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($data != null)
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" name="code" value="{{$data->code ?? ''}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$data->name ?? ''}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Is Deposito</label>
                            <select name="is_deposito" id="" class="form-control">
                                <option value="" selected disabled></option>
                                @if ($data == null)
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                                @else
                                <option value="1" {{$data->is_deposito == 1 ? 'selected':''}}>Ya</option>
                                <option value="0" {{$data->is_deposito == 0 ? 'selected':''}}>Tidak</option>
                                @endif
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Is Credit Sertificate ?</label>
                            <select name="is_creadit_certificate" id="" class="form-control">
                                <option value="" selected disabled></option>
                                @if ($data == null)
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                                @else
                                <option value="1" {{$data->is_creadit_certificate == 1 ? 'selected':''}}>Ya</option>
                                <option value="0" {{$data->is_creadit_certificate == 0 ? 'selected':''}}>Tidak</option>
                                @endif
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Photo</label>
                            @if ($data == null)
                            <input type="file" class="dropify" name="photo" data-default-file="Image" />
                            @else
                            <input type="file" class="dropify" name="photo" data-default-file="{{$data->photo}}" />
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$data->title ?? ''}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sub Title</label>
                            <input type="text" name="sub_title" value="{{$data->sub_title ?? ''}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sub Title 1</label>
                            <input type="text" name="sub_title_1" value="{{$data->sub_title_1 ?? ''}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sub Title 2</label>
                            <input type="text" name="sub_title_2" value="{{$data->sub_title_2 ?? ''}}" class="form-control" required>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>

    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $(document).ready(function () {
        var drEvent = $('.dropify').dropify();
        drEvent.on('dropify.error.fileSize', function (event, element) {
            Swal.fire(
                'Ops..',
                'Filesize too big!',
                'error')
        });
        drEvent.on('dropify.error.fileExtension', function (event, element) {
            Swal.fire(
                'Ops..',
                'Allowed just PNG, JPG, JPEG!',
                'error')
        });
        drEvent.on('dropify.error.minWidth', function (event, element) {
            Swal.fire(
                'Ops..',
                'Min width error message!',
                'error')
        });
        drEvent.on('dropify.error.maxWidth', function (event, element) {
            Swal.fire(
                'Ops..',
                'Max width error message!',
                'error')
        });
        drEvent.on('dropify.error.minHeight', function (event, element) {
            Swal.fire(
                'Ops..',
                'Min height error message!',
                'error')
        });
        drEvent.on('dropify.error.maxHeight', function (event, element) {
            Swal.fire(
                'Ops..',
                'Max height error message!',
                'error')
        });
        drEvent.on('dropify.error.imageFormat', function (event, element) {
            Swal.fire(
                'Ops..',
                'Invalid image format!',
                'error')
        });

    });

</script>
@endpush
