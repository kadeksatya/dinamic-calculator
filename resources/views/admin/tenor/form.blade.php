@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="{{$data == null ? '/tenor/store':'/tenor/'.$data->id.'/update'}}" method="post">
                @csrf
                @if ($data != null)
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
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
                            <label for="">Code</label>
                            <select name="code" id="" class="form-control" required>
                                <option value="" selected disabled></option>
                                @if ($data == null)
                                @foreach ($product as $key => $value)
                                <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                                @else
                                @foreach ($product as $key => $value)
                                <option value="{{$key}}" {{$key == $data->code ? 'selected':''}}>{{$key}}</option>
                                @endforeach
                                @endif
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Total Tenor</label>
                            <input type="number"  name="total_tenor" value="{{$data->total_tenor ?? 0}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Rate Float</label>
                            <input type="number" step="0.1" name="rate_float" value="{{$data->rate_float ?? 0}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Rate Flat</label>
                            <input type="number" step="0.1" name="rate_flat" value="{{$data->rate_flat ?? 0}}" class="form-control" required>
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
