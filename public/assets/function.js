        // Count Deposito
        let hasil_deposito_1 = $('.hasil_deposito_1');
        let hasil_deposito_1_bunga = $('.hasil_deposito_1_bunga');
        let hasil_deposito_2 = $('.hasil_deposito_2');
        let hasil_deposito_3 = $('.hasil_deposito_3');

        function countDeposito(suku_bunga, amount) {
            let total = 0;
            let s_bunga = 0.0;
            let s_pajak = 0.0;
            let pajak = 0.2;

            if (amount >= 7500000) {
                s_bunga = parseInt(amount) * parseFloat(suku_bunga) / 365*31;
                s_pajak = parseFloat(s_bunga) * parseFloat(pajak);
                total = parseInt(amount) + (s_bunga);
            } else {
                s_bunga = parseInt(amount) * parseFloat(suku_bunga) / 365*31;
                total = parseInt(amount) + parseFloat(s_bunga);
            }

            hasil_deposito_1.text(parseInt(total).toLocaleString());
            hasil_deposito_2.text(parseInt(s_pajak).toLocaleString());
            hasil_deposito_3.text(s_bunga.toLocaleString());

            $('.form-result-deposite').removeClass('d-none');
            $('.form-input').addClass('d-none')
        }


function countCreditCerifiticate(amount, suku_bunga, tenor) {
    let total = 0;
    let angsuran = 0;
    let sub_total = 0.0;

    angsuran = parseInt(amount) / parseInt(tenor)
    sub_total = parseInt(amount) * parseFloat(suku_bunga);
    total = parseInt(angsuran) + parseFloat(sub_total)
    console.log(total);

    $('.form-result').removeClass('d-none');
    $('.form-input').addClass('d-none')
    $('.hasil_credit').text(total.toLocaleString())
}


function countCredit(amount, suku_bunga, suku_bunga_flat, tenor) {
    let total = 0;
    let angsuran = 0;
    let sub_total = 0.0;

    if (tenor >= 24) {
        angsuran = parseInt(amount) / parseInt(tenor)
        sub_total = parseInt(amount) * (parseFloat(suku_bunga_flat) / 100);
        total = parseInt(angsuran) + parseFloat(sub_total)
        console.log(total);
    } else {
        angsuran = parseInt(amount) / parseInt(tenor)
        sub_total = parseInt(amount) * (parseFloat(suku_bunga) / 100);
        total = parseInt(angsuran) + parseFloat(sub_total)
        console.log(total);
    }
    $('.form-result').removeClass('d-none');
    $('.form-input').addClass('d-none');
    $('.hasil_credit').text(total.toLocaleString())

}





// Back To Form Input
$(".aturUlang").click(function (e) {
    $(".form-input").removeClass('d-none');
    $(".form-result").addClass('d-none');
    $(".form-result-deposite").addClass('d-none');
    $('#FormInputs').reset();
    getDataPlugin();
});





// Jquery elemet start here

$(document).ready(function () {
    $(".resetForm").click(function (e) {
        jQuery('.amount').val('0');
        jQuery('.product').val('').trigger('change');
        jQuery('.time_period_credit').val('').trigger('change');
        jQuery('.time_period_deposito').val('').trigger('change');
        jQuery('.amount_depo').val(0)
        for (let e of document.querySelectorAll('input[type="range"].slider-progress')) {
            e.style.setProperty('--value', e.value);
            e.style.setProperty('--min', e.min == '' ? '0' : e.min);
            e.style.setProperty('--max', e.max == '' ? '100' : e.max);
            e.addEventListener('input', () => e.style.setProperty('--value', e.value));
        }
    });

    $('.product').select2();
    $('.time_period_credit').select2();
    $('.time_period_deposito').select2();

    for (let e of document.querySelectorAll('input[type="range"].slider-progress')) {
        e.style.setProperty('--value', e.value);
        e.style.setProperty('--min', e.min == '' ? '0' : e.min);
        e.style.setProperty('--max', e.max == '' ? '100' : e.max);
        e.addEventListener('input', () => e.style.setProperty('--value', e.value));
    }


});



// Currency Format 

$(function () {
    $(".amount").keyup(function (e) {
        $(this).val(format($(this).val()));
        let values = $(this).val().replace(/,/g, '');
        $('.amount_depo').val(values)
        for (let e of document.querySelectorAll('input[type="range"].slider-progress')) {
            e.style.setProperty('--value', e.value);
            e.style.setProperty('--min', e.min == '' ? '0' : e.min);
            e.style.setProperty('--max', e.max == '' ? '100' : e.max);
            e.addEventListener('input', () => e.style.setProperty('--value', e.value));
        }
    });
});
var format = function (num) {
    var str = num.toString().replace("", ""),
        parts = false,
        output = [],
        i = 1,
        formatted = null;
    if (str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ",") {
            output.push(str[j]);
            if (i % 3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};
