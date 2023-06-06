@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Payment
@endsection
<style>
    .col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .slice-xs {
        padding-top: 1rem;
        padding-bottom: 1rem;
        position: relative;
    }

    .border-bottom {
        border-bottom: 1px solid #dee2e6 !important;
    }

    .sct-color-2 {
        background-color: #fcfcfc;
    }

    .icon-block--style-1-v5 {
        position: relative;
    }

    .icon-block {
        position: relative;
    }

    .text-center {
        text-align: center !important;
    }

    .icon-block--style-1-v5 .block-icon {
        display: block;
        margin-bottom: 1rem;
    }

    .mb-0,
    .my-0 {
        margin-bottom: 0 !important;
    }

    .strong-300 {
        font-weight: 300 !important;
    }

    .text-capitalize {
        text-transform: capitalize !important;
    }

    .c-gray-light {
        color: #818a91 !important;
    }

    .heading-sm {
        font-size: 0.875rem !important;
    }

    .heading {
        margin: 0 0 6px;
        padding: 0;
        text-transform: none;
        font-family: "Open Sans", sans-serif;
        font-weight: 600;
        color: #111111;
        line-height: 1.46;
    }

    .justify-content-center {
        -ms-flex-pack: center !important;
        justify-content: center !important;
    }

    .icon-block--style-1-v5 {
        position: relative;
    }

    .heading-sm {
        font-size: 0.875rem !important;
    }

    .bg-white {
        filter: drop-shadow(3px 4px 6px #eee);
    }

    .bg-white {
        background-color: #fff !important;
    }

    .table-cart {
        width: 100%;
    }

    .border-bottom {
        border-bottom: 1px solid #dee2e6 !important;
    }

    .table-cart>thead>tr>th {
        font-size: 12px;
        font-weight: bold;
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: .3px;
        padding: 0 0 10px;
        border-bottom: 1px solid #e7e7e7;
    }

    .table-cart tbody tr td {
        font-size: 1.575rem;
        font-weight: bold;
        line-height: 1.2;
        letter-spacing: -0.5px;
        text-transform: none;
        padding: 1.25rem 0;
        vertical-align: middle;
        color: #2b2b2c;
        border: none;
    }

    .table-cart tbody tr td {
        padding: 1rem 0;
    }

    .table-cart tbody tr td.product-image a {
        width: 45px;
        height: 45px;
    }

    .table-cart tbody tr td.product-image a {
        position: relative;
        overflow: hidden;
        display: block;
        width: 80px;
        height: 80px;
    }

    .text-right {
        text-align: right !important;
    }
</style>
<section class="slice-xs sct-color-2 border-bottom">
    <div class="container container-sm">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center active">
                    <div class="block-icon mb-0">
                        <i id="smf" style="font-size: 40px " class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 id="smnone" style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center">
                    <div class="block-icon c-gray-light mb-0">
                        <i id="smf" class="fa fa-map" style="font-size: 40px" aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 id="smnone" style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping info</h3>
                    </div>
                </div>
            </div>



            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center">
                    <div class="block-icon c-gray-light mb-0">
                        <i id="smf" style="font-size: 40px;color: #fd7322" class="fa fa-credit-card"
                            aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 id="smnone" style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center">
                    <div class="block-icon c-gray-light mb-0">
                        <i id="smf" style="font-size: 40px" class="fa fa-check-circle" aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 id="smnone" style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">4. Confirmation</h3>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<section class="py-1 gry-bg" id="cart-summary" style="margin-top: 10px;margin-bottom: 30px;">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-8" id="smp">
                <form action="{{ url('update/paymentmethood') }}" style="border-radius: 4px;" class="form-default bg-white px-1" method="POST"
                    id="checkout-form">
                    @csrf
                    <div class="card">
                        <div class="card-title px-4 py-3 text-center">
                            <h3 class="heading heading-5 strong-500">
                                Select a Payment Method
                            </h3>
                        </div>
                        <input type="text" hidden name="order_id" value="{{ Session::get('order_id') }}">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="payment_option" data-toggle="tooltip"
                                                data-title="Online Payment" data-original-title="" title="">
                                                <input type="radio" id="" name="payment_option"
                                                    value="sslcommerz" checked="">
                                                <span>
                                                    <img loading="lazy" src="{{ asset('public/') }}/sslcommerz.png"
                                                        class="img-fluid">
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-6 border-left">
                                            <label class="payment_option" data-toggle="tooltip"
                                                data-title="Cash on Delivery" data-original-title="" title="">
                                                <input type="radio" id="" name="payment_option"
                                                    value="C-O-D" checked="">
                                                <span>
                                                    <img loading="lazy" src="{{ asset('public/') }}/cod.png"
                                                        class="img-fluid">
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center pt-4">
                        <div class="col-6 col-md-6 col-sm-6">
                            <a href="{{ url('/') }}" class="btn btn-primary link link--style-3" style="margin: 12px;">
                                <i class="la la-mail-reply"></i>
                                Return to shop
                            </a>
                        </div>
                        <div class=" col-6 col-md-6 col-sm-6 text-right" style="padding-right: 26px;">
                            <button type="submit" class="btn btn-danger"
                                style="margin-top: 10px;margin-bottom: 10px;background: #fd7322; ">Complete Checkout</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 col-12" id="smppa">
                <div class="card sticky-top">
                    <div class="card-title py-3">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="heading heading-3 strong-400 mb-0">
                                    <span style="padding: 10px;font-size: 16px;font-weight: bold;">Summary</span>
                                </h3>
                            </div>

                            <div class="col-6 text-right">
                                <span class="badge badge-md badge-success"
                                    style="padding: 6px;margin-right: 10px;">1 Items</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table-cart table-cart-review">

                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th style="font-weight: normal;padding-bottom: 8px;">Subtotal</th>
                                    <td class="text-right">
                                        <span class="strong-600" style="font-weight: normal;">
                                            @if ($currency == 'BDT')
                                                ৳ @if (Session::get('ordersubtotal') > 0)
                                                    {{ Session::get('ordersubtotal') }}
                                                @else
                                                    0
                                                @endif
                                            @else
                                                $ @if (Session::get('ordersubtotal') > 0)
                                                    {{ number_format(Session::get('ordersubtotal') / $currency, 2) }}
                                                @else
                                                    0
                                                @endif
                                            @endif

                                        </span>
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th style="font-weight: normal;padding-bottom: 8px;">Tax</th>
                                    <td class="text-right">
                                        @if ($currency == 'BDT')
                                            <span class="text-italic" style="font-weight: normal;">৳0</span>
                                        @else
                                            <span class="text-italic" style="font-weight: normal;">$0</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th style="font-weight: normal;padding-bottom: 8px;">Total Shipping</th>
                                    <td class="text-right">
                                        <span class="text-italic shiop" style="font-weight: normal;">
                                            @if ($currency == 'BDT')
                                                ৳@if (Session::get('ordersubtotal') > 0)
                                                    {{ Session::get('orderdeliverycharge') }}
                                                @else
                                                    0
                                                @endif
                                            @else
                                                $@if (Session::get('ordersubtotal') > 0)
                                                    {{ number_format(Session::get('orderdeliverycharge') / $currency, 2) }}
                                                @else
                                                    0
                                                @endif
                                            @endif
                                        </span>
                                    </td>
                                </tr>



                                <tr class="cart-total">
                                    <th><span class="strong-600">Total</span></th>
                                    <td class="text-right">
                                        @if ($currency == 'BDT')
                                            <strong>৳ <span
                                                    class="g_total">{{ Session::get('ordersubtotal') + Session::get('orderdeliverycharge') }}</span></strong>
                                        @else
                                            <strong>$ <span
                                                    class="g_total">{{ number_format(Session::get('ordersubtotal') / $currency, 2) + number_format(Session::get('orderdeliverycharge') / $currency, 2) }}</span></strong>
                                        @endif

                                    </td>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function upQuantity() {
        var qty = $('#proQuantity').val();
        if (qty >= 10) {

        } else {
            var b = parseInt(qty);
            var cq = b + 1;
            $('#proQuantity').val(cq);
            $('#qty').val(cq);
            $('#qtyor').val(cq);
        }
    }

    function downQuantity() {
        var qty = $('#proQuantity').val();
        if (qty <= 1) {

        } else {
            var b = parseInt(qty);
            var cq = b - 1;
            $('#proQuantity').val(cq);
            $('#qty').val(cq);
            $('#qtyor').val(cq);
        }


    }
</script>

<style>
    .ml-auto,
    .mx-auto {
        margin-left: auto !important;
    }

    .card .border-top,
    .card .border-right,
    .card .border-bottom,
    .card .border-left {
        border-color: #f1f1f1 !important;
    }

    label.payment_option {
        position: relative;
        cursor: pointer;
    }


    label.payment_option {
        position: relative;
        cursor: pointer;
    }

    label {
        font-weight: 400;
        font-size: 0.8rem;
        text-transform: none;
        color: rgba(0, 0, 0, 0.7);
    }

    label {
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    label.payment_option input {
        opacity: 0;
        position: absolute;
    }

    input[type="checkbox"],
    input[type="radio"] {
        box-sizing: border-box;
        padding: 0;
    }

    label.payment_option span {
        display: inline-block;
        border-radius: 4px;
        background: #fff;
        position: relative;
    }

    label.payment_option input:checked+span:before {
        position: absolute;
        height: 100%;
        width: 100%;
        background: rgba(255, 255, 255, 0.8);
        content: "";
        top: 0;
        left: 0;
    }

    label.payment_option input:checked+span:after {
        position: absolute;
        content: "";
        left: calc(50% - 6px);
        top: calc(50% - 12px);
        width: 12px;
        height: 24px;
        border: solid #28a745;
        border-width: 0 4px 4px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        box-shadow: 2px 3px 5px rgb(94 146 106);
    }

    label.payment_option {
        position: relative;
        cursor: pointer;
    }

    label.payment_option span img {
        width: auto;
        height: auto;
        max-height: 100%;
    }

    .img-fluid {
        max-width: 90%;
        height: auto;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .border-left {
        border-left: 1px solid #dee2e6 !important;
    }

    .mr-auto,
    .mx-auto {
        margin-right: auto !important;
    }

    .ml-lg-auto,
    .mx-lg-auto {
        margin-left: auto !important;
    }

    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 99;
    }

    .card {
        position: relative;
        border: 1px solid #f1f1f1;
        border-radius: 0.25rem;
        background: #fff;
        -webkit-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .card>.card-title,
    .card>.card-header {
        padding: 1.5rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        margin-bottom: 0;
    }

    .pb-3,
    .py-3 {
        padding-bottom: 1rem !important;
    }

    .pt-3,
    .py-3 {
        padding-top: 1rem !important;
    }

    .align-items-center {
        -ms-flex-align: center !important;
        align-items: center !important;
    }

    .card-title .heading,
    .card-header .heading {
        margin: 0;
        display: inline-block;
    }

    .strong-400 {
        font-weight: 400 !important;
    }

    .heading-3 {
        font-size: 1.5rem !important;
        line-height: 1.3;
    }

    .heading {
        margin: 0 0 6px;
        padding: 0;
        text-transform: none;
        font-family: "Open Sans", sans-serif;
        font-weight: 600;
        color: #111111;
        line-height: 1.46;
    }

    .mb-0,
    .my-0 {
        margin-bottom: 0 !important;
    }

    .text-right {
        text-align: right !important;
    }

    .badge-md {
        padding: 0.65em 1em;
    }

    .badge {
        padding: 0.45em 0.45em;
        font-size: 0.625rem;
        font-weight: 400;
    }

    .badge-success {
        color: #fff;
        background-color: #28a745;
    }

    .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .card-body {
        position: relative;
        padding: 1.5rem 1.5rem;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .table-cart {
        width: 100%;
    }

    table {
        border-collapse: collapse;
    }



    * .card-title {
        margin-bottom: 0.75rem;
    }

    #proQuantity {
        width: 125px;
    }

    #quantityup {
        width: 160px;
    }

    .col-6 {
        width: 50%;
        float: left;
    }

    @media only screen and (max-width: 600px) {
        #smppa {
            width: 100%; 
            margin-top: 18px;
            padding: 0; 
        }

        #smf {
            font-size: 30px !important;
        }

        #smnone {
            display: none;
        }

        #smp {
            padding: 0;
        }

        #proQuantity {
            width: 28px;
        }

        #quantityup {
            width: 70px;
        }

        .btn {
            display: inline-block;
            padding: 9px 12px;
            margin-bottom: 0;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .table-cart>thead>tr>th {
            font-size: 9px;
            font-weight: bold;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: .3px;
            padding: 0 0 10px;
            border-bottom: 1px solid #e7e7e7;
        }

        .table-cart tbody tr td {
            font-size: 12px;
            font-weight: bold;
            line-height: 1.2;
            letter-spacing: -0.5px;
            text-transform: none;
            padding: 1.25rem 0;
            vertical-align: middle;
            color: #2b2b2c;
            border: none;
        }

        .table-cart tbody tr td {
            padding: 1rem 0;
        }

        .table-cart tbody tr td.product-image a {
            position: relative;
            overflow: hidden;
            display: block;
            width: 54px;
            height: 54px;
        }

        #cartproname {
            font-size: 10px
        }
    }
</style>
@endsection
