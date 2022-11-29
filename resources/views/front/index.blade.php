<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Restu Satya">
    <title>CalCulator</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <link href="{{asset('assets/style.css')}}" rel="stylesheet">
</head>

<body>


    <main>

        <div class="marketing">
            <div class="row featurette container">
                <div class="col-md-7 order-md-2">
                    <h2 class=" fw-normal lh-1 title-page">Simulasi {{$info->name ?? '-'}}</h2>
                    <p class="lead sub-title">{{$info->title ?? '-'}}</p>
                    <p class="lead sub-title">{{$info->sub_title ?? ''}}</p>
                    <p class="lead sub-title">{{$info->sub_title_1 ?? ''}}</p>
                    <p class="lead sub-title">{{$info->sub_title_2 ?? ''}}</p>

                    <input type="hidden" class="is_cc" value="{{request()->get('is_cc')}}">
                    <input type="hidden" class="is_deposito" value="{{request()->get('is_deposito')}}">
                    <!-- Start Form Here -->
                    <form class="form-input" id="FormInputs">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Pilih Produk</label>
                                    <select name="" id="" class="product text-capitalize form-control">
                                        <option value="" selected disabled></option>
                                        @if (request()->get('code') == '')
                                        @foreach ($product as $item)
                                        <option value="{{$item->code}}">{{$item->name}}</option>
                                        @endforeach
                                        @else
                                        @foreach ($product as $item)
                                        @if ($item->code == request()->get('code'))
                                        <option value="{{$item->code}}"
                                            {{$item->code == request()->get('code') ? 'selected':''}}>{{$item->name}}
                                        </option>
                                        @endif
                                        @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            @if (request()->get('code') == 'DPO')
                            <div class="col-md-12">
                                <label class="form-label">Nominal</label>
                                <input type="range" value="0" class="amount_depo styled-slider slider-progress"
                                    step="1000000" min="0" max="100000000" id="rangeamount" style="width: 100%;">
                                <input type="text" class="form-control amount">
                            </div>
                            @else
                            <div class="col-md-12">
                                <label class="form-label">Nominal</label>
                                <input type="range" value="0" class="amount_depo styled-slider slider-progress"
                                    step="10000000" min="0" max="10000000000" id="rangeamount" style="width: 100%;">
                                <input type="text" class="form-control amount">
                            </div>
                            @endif


                            <div class="col-md-8 mt-3 {{ request()->get('is_cc') == 1 ? '':'d-none' }}">
                                <div class="form-group">
                                    <label for="" class="mb-2">Anda Seorang ?</label>
                                    <select name="" id="" class="form-control who_is_input">
                                        <option value="" selected disabled></option>
                                        <option value="PNS">PNS</option>
                                        <option value="BUKAN_PNS">BUKAN PNS</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Jangka Waktu Untuk Kredit -->

                            <div class="col-md-6 mt-3 time_period_credit_element">
                                <div class="form-group">
                                    <label for="" class="mb-2">Jangka Waktu</label>
                                    <select name="" id="" class="time_period form-control">
                                        <option value="" selected disabled></option>
                                        @foreach ($tenor as $item)
                                        @if ($item->code == request()->get('code'))
                                        <option value="{{$item->total_tenor}}" data-flat="{{$item->rate_flat}}"
                                            data-float="{{$item->rate_flat}}">{{$item->name}}</option>
                                        @endif
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label for="" class="mb-2">Suku Bunga Efektif</label>
                                <div class="alert alert-secondary suku_bunga_class text-center mt-2">
                                    <span class="suku_bunga">0</span> %
                                </div>
                            </div>
                            <div class="col-md-3 mt-3 tax_element d-none">
                                <label for="" class="mb-2">Pajak</label>
                                <input type="hidden" value="20" class="taxs_input">
                                <div class="alert alert-secondary pajak_class text-center mt-2">
                                    <span class="pajak_bunga">20</span> %
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mt-5">
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <button class="btn btn-primary resetForm" type="button"
                                    style="width: 200px; border-radius: 7px; padding: 9.8px; background: #103566; border-color: #103566;">ATUR
                                    ULANG</button>
                                <button class="btn btn-primary submitForm"
                                    style="width: 200px; border-radius: 7px; padding: 9.8px; background: #F86C73; border-color: #F86C73;"
                                    type="button">HITUNG</button>
                            </div>
                        </div>

                    </form>

                    <!-- End Form Here-->

                    <!-- Result Start Here -->
                    <form action="#" class="form-result d-none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-light text-center text-primary fs-1" role="alert">
                                            <p class="fs-6 text-dark">ESTIMASI ANGSURAN BULANAN</p>
                                            Rp. <span class="hasil_credit">6.000.000.000</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3">
                                    <center><button class="btn btn-primary aturUlang" type="button"
                                            style="width: 200px; border-radius: 7px; padding: 9.8px; background: #F86C73; border-color: #F86C73;">ATUR
                                            ULANG</button></center>
                                </div>

                            </div>
                        </div>

                    </form>

                    <form action="#" class="form-result-deposite d-none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-light text-center text-primary fs-1" role="alert">
                                            <p class="fs-6 text-dark">Saldo Deposito + Bunga </p>
                                            Rp. <span class="hasil_deposito_1">6.000.000.000</span>
                                        </div>
                                        <div class="alert alert-light text-center text-primary fs-1" role="alert">
                                            <p class="fs-6 text-dark">Total Pajak </p>
                                            Rp. <span class="hasil_deposito_2">6.000.000.000</span>
                                        </div>

                                        <div class="alert alert-light text-center text-primary fs-1" role="alert">
                                            <p class="fs-6 text-dark">Total Bunga </p>
                                            Rp. <span class="hasil_deposito_3">6.000.000.000</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3">
                                    <center><button class="btn btn-primary aturUlang" type="button"
                                            style="width: 200px; border-radius: 7px; padding: 9.8px; background: #F86C73; border-color: #F86C73;">ATUR
                                            ULANG</button></center>
                                </div>

                            </div>
                        </div>

                    </form>

                    <!-- Result End Here -->

                </div>
                <div class="col-md-5 order-md-1">
                    <img src="{{ $info->photo ?? asset('assets/graphic-atm.png')}}"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt=""
                        srcset="">
                </div>
            </div>


        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Jquery Start Here -->
    <script src="{{asset('assets/function.js')}}"></script>

    <script>
        $(document).ready(function () {

        // Fun Deposito

                // 
                let pns = 0.125;
                let nonpns = 0.14;
                let suku_bunga_result = $('.suku_bunga');
                let product = $('.product').find(":selected").val();
                let who_is_input = $('.who_is_input').find(":selected").val();
                let suku_bunga_flat = $('.time_period').find(":selected").attr('data-flat') / 100;
                let suku_bunga_float = $('.time_period').find(":selected").attr('data-float') / 100;
                let jangka_waktu = $('.time_period').find(':selected').val();
                let amount = $('.amount').val();
                let amount_converted = amount.replace(/,/g, '');
                let is_deposito = $('.is_deposito').val();
                let is_cc = $('.is_cc').val();

                let hasil_credit = $('.hasil_credit');

                // Get data input range & get values

                $(document).on('input', '#rangeamount', function () {
                    let is_deposito = $('.is_deposito').val();
                    let values = $(this).val();
                    if(is_deposito == 1){
                    if (values >= 7500000) {
                        $('.tax_element').removeClass('d-none');
                    } else {
                            $('.tax_element').addClass('d-none');
                    }
                    }

                    $('.amount').val(format(values));
                });

            $('.who_is_input').change(function (e) {
                let suku_bunga_flat = $(this).find(":selected").attr('data-flat')
                let suku_bunga_float = $(this).find(":selected").attr('data-float')
                let jangka_waktu = $('.time_period').find(':selected').val();
                let who_is_input = $(this).find(":selected").val();

                let result = 0;
                    if (who_is_input == 'PNS') {
                        result = parseFloat(jangka_waktu) * parseFloat(pns)
                        suku_bunga_result.text(result.toFixed(3));
                        console.log(jangka_waktu);
                        console.log(pns);
                        console.log(result);
                        console.log(who_is_input);
                    }
                    else{
                        result = parseFloat(jangka_waktu) * parseFloat(nonpns)
                        suku_bunga_result.text(result.toFixed(3));
                    }
                
                

            });

            $('.time_period').change(function (e) {
                let suku_bunga_flat = $('.time_period').find(":selected").attr('data-flat') / 100;
                let suku_bunga_float = $('.time_period').find(":selected").attr('data-float') / 100;
                let jangka_waktu = $('.time_period').find(':selected').val();
                let who_is_input = $('.who_is_input').find(":selected").val();
                let pns = 0.125;
                let nonpns = 0.14;

                let result = 0;
                if (is_deposito == 1) {
                    suku_bunga_result.text(suku_bunga_float.toFixed(3));
                }
                else if(is_cc == 1) {
                    if (who_is_input == 'PNS') {
                        result = parseFloat(jangka_waktu) * parseFloat(pns)
                        suku_bunga_result.text(result.toFixed(3));
                        console.log(jangka_waktu);
                        console.log(pns);
                        console.log(result);
                        console.log(who_is_input);
                    }
                    else{
                        result = parseFloat(jangka_waktu) * parseFloat(nonpns)
                        suku_bunga_result.text(result.toFixed(3));
                    }
                }
                else if(is_cc == 0 && is_deposito == 0) {
                    if (jangka_waktu >= 24) {
                        suku_bunga_result.text(suku_bunga_flat.toFixed(3));
                    }else{
                        let result = parseFloat(jangka_waktu) * (parseFloat(suku_bunga_float) / 100)
                        suku_bunga_result.text(result.toFixed(3));
                    }
                }

            });



            // Check Result
            $(".submitForm").click(function() {
                let pns = 0.125;
                let nonpns = 0.14;
                let suku_bunga_result = $('.suku_bunga');
                let product = $('.product').find(":selected").val();
                let who_is_input = $('.who_is_input').find(":selected").val();
                let suku_bunga_flat = $('.time_period').find(":selected").attr('data-flat') / 100;
                let suku_bunga_float = $('.time_period').find(":selected").attr('data-float') / 100;
                let jangka_waktu = $('.time_period').find(':selected').val();
                let amount = $('.amount').val();
                let amount_converted = amount.replace(/,/g, '');
                let is_deposito = $('.is_deposito').val();
                let is_cc = $('.is_cc').val();

                let hasil_credit = $('.hasil_credit');
                let hasil_deposito_1 = $('.hasil_deposito_1');
                let hasil_deposito_1_bunga = $('.hasil_deposito_1_bunga');
                let hasil_deposito_2 = $('.hasil_deposito_2');
                let hasil_deposito_3 = $('.hasil_deposito_3');

                if (is_deposito == 1) {
                    countDeposito(suku_bunga_float, amount_converted)
                }
                else if(is_cc == 1) {
                    if (who_is_input == 'PNS') {
                        countCreditCerifiticate(amount_converted, pns, jangka_waktu)
                    }
                    else{
                        countCreditCerifiticate(amount_converted, nonpns, jangka_waktu)
                    }
                }
                else if(is_other = 1) {
                    countCredit(amount_converted, suku_bunga_float, suku_bunga_flat, jangka_waktu)
                }

            });
        });

    </script>



</body>

</html>
