@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Checkout
@endsection

<section class="slice-xs sct-color-2 border-bottom">
    <div class="container container-sm">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center active">
                    <div class="block-icon mb-0">
                        <i style="font-size: 34px;" class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center">
                    <div class="block-icon c-gray-light mb-0">
                        <i class="fa fa-map" style="font-size: 34px;color: #fd7322" aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="icon-block icon-block--style-1-v5 text-center">
                    <div class="block-icon c-gray-light mb-0">
                        <i style="font-size: 34px" class="fa fa-credit-card" aria-hidden="true"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 style="font-size: 1.5rem !important"
                            class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@if (count($cartProducts) > 0)
    <section class="py-4 gry-bg" style="margin-top: 10px;margin-bottom:30px">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8" id="smp">
                    <form class="form-default bg-white px-1" style="border-radius: 4px;margin-bottom: 10px;" action="{{ url('press/order') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="padding-top: 15px;">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label class="control-label strong-700">Your Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        @if (!Auth::guard('web')->check())
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Type your name" required>
                                        @else
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Type your name"
                                                value="{{ Auth::guard('web')->user()->name }}" required>
                                        @endif

                                    </div>
                                </div>
                                <input type="text" name="subTotal" id="subTotal" value="{{ Cart::subtotalFloat() }}"
                                    hidden>
                                <div class="row form-group">
                                    <div class="col-md-2 ">
                                        <label class="control-label strong-700">Mobile Number</label>
                                    </div>
                                    <div class="col-md-10">
                                        @if (!Auth::guard('web')->check())
                                            <input type="tel" min="0" class="form-control"
                                                placeholder="Type your mobile number" name="phone" required>
                                        @else
                                            <input type="tel" min="0" class="form-control"
                                                placeholder="Type your mobile number" name="phone"
                                                value="{{ Auth::guard('web')->user()->phone }}" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label class="control-label strong-700">Shipping Address</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="address" placeholder="Type your shipping address" required></textarea>
                                    </div>
                                </div>

                                @if (!Auth::guard('web')->check())
                                    <input type="text" name="user_id" hidden>
                                @else
                                    <input type="text" name="user_id" value="{{ Auth::guard('web')->user()->id }}"
                                        hidden>
                                @endif
                                <div class="row">
                                    <div class="col-md-2 ">
                                        <label class="strong-700">City</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="mb-3">
                                            <select onchange="updateShipping(this)" id="deliveryCharge"
                                                class="form-control mb-3 district" data-placeholder="Select your city"
                                                name="deliveryCharge" required>
                                                <option value=""> Select Area</option>
                                                <option value="60">Dhaka City</option>
                                                <option value="80"> Nearest DhakaCity</option>
                                                <option value="120"> Outside Dhaka</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label class="control-label">Delivery note (optional)</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control" name="customerNote" placeholder="Delivery Note"></textarea>
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
                                    style="margin-top:10px;margin-bottom: 10px;background: #fd7322;">Press Order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 ml-lg-auto" id="smp">
            <div class="card sticky-top" style="border-radius: 4px;">
                <div class="card-title py-3">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="heading heading-3 strong-400 mb-0">
                                <span style="padding: 10px;font-size: 16px;font-weight: bold;">Summary</span>
                            </h3>
                        </div>

                        <div class="col-6 text-right">
                            <span class="badge badge-md badge-success" style="padding: 6px;    margin-right: 10px;">{{count($cartProducts)}}
                                Items</span>
                        </div>
                    </div>
                </div>

                <div class="card-body">


                    <table class="table-cart table-cart-review">
                        <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cartProducts as $cartProduct)
                                <tr class="cart_item">
                                    <td class="product-name" style="font-size: 14px;">
                                        {{ $cartProduct->name }}
                                        <strong class="product-quantity">× {{ $cartProduct->qty }}</strong>
                                    </td>
                                    <td class="product-total text-right">
                                        @if ($currency == 'BDT')
                                            <span class="pl-4" style="font-size: 14px;">৳
                                                {{ $cartProduct->qty * $cartProduct->price }}</span>
                                        @else
                                            <span class="pl-4"
                                                style="font-size: 14px;">${{ $cartProduct->qty * number_format($cartProduct->price / $currency, 2) }}</span>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    <table class="table-cart table-cart-review">

                        <tfoot>
                            <tr class="cart-subtotal">
                                <th style="font-weight: normal;padding-bottom: 8px;">Subtotal</th>
                                <td class="text-right">
                                    @if ($currency == 'BDT')
                                        <span class="strong-600"
                                            style="font-weight: normal;">৳{{ Cart::subtotal() }}</span>
                                    @else
                                        <span class="strong-600" style="font-weight: normal;">$
                                            {{ number_format(intval(str_replace(',', '', Cart::subtotal())) / intval($currency), 2) }}</span>
                                    @endif
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
                                    @if ($currency == 'BDT')
                                        <span class="text-italic shiop" style="font-weight: normal;">৳0</span>
                                    @else
                                        <span class="text-italic shiop" style="font-weight: normal;">$0</span>
                                    @endif
                                </td>
                            </tr>



                            <tr class="cart-total">
                                <th><span class="strong-600">Total</span></th>
                                <td class="text-right">
                                    @if ($currency == 'BDT')
                                        <strong>৳ <span class="g_total">{{ Cart::subtotal() }}</span></strong>
                                    @else
                                        <strong> <span class="g_total">
                                                ${{ number_format(intval(str_replace(',', '', Cart::subtotal())) / intval($currency), 2) }}</span></strong>
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
@else
    <section class="py-4 gry-bg" style="margin-top: 30px;margin-bottom:30px">
        <div class="container">
            <div class="row" style="text-align: center;background: white;">
                <div class="col-md-12 col-lg-12" id="smp" style="color: #e62e04;font-weigh:bold">
                    <h1>Opps!...Nothing in your Cart</h1>
                    <h2>Please select atleast one product for press Order</h2>
                </div>
            </div>
        </div>
    </section>
@endif

<input type="text" id="currencycheck" name="currencycheck" value="{{ $currency }}" hidden>


<style>
    .col-12 {
        width: 100%;
    }

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
<script>
    function updateShipping() {
        var currencycheck = $('#currencycheck').val();
        var dvcharge = $('#deliveryCharge').val();
        if (currencycheck == 'BDT') {
            if (dvcharge == '') {
                $('#shippingCost').html(0);
                var totals = $('#productTotalPrice').val();
                $('.g_total').html(totals);
            } else {
                $('#shippingCost').html(dvcharge);
                var totals = $('#productTotalPrice').val();
                var total = totals.split(',').join('');
                var am = parseFloat(total);
                $('.g_total').html(am + parseInt(dvcharge));
            }
        } else {
            if (dvcharge == '') {
                $('#shippingCost').html(0);
                var totals = $('#productTotalPrice').val();
                var pr = totals / currencycheck;
                $('.g_total').html(roundOf(pr, 2));
            } else {
                var uddv = roundOf(dvcharge / currencycheck, 2);
                $('#shippingCost').html(uddv);
                var totals = $('#productTotalPrice').val();
                var total = totals.split(',').join('');
                var am = parseFloat(total);
                var pram = am + parseInt(dvcharge);
                var pr = pram / currencycheck;
                $('.g_total').html(roundOf(pr, 2));
            }
        }

    }

    function roundOf(n, p) {
        const n1 = n * Math.pow(10, p + 1);
        const n2 = Math.floor(n1 / 10);
        if (n1 >= (n2 * 10 + 5)) {
            return (n2 + 1) / Math.pow(10, p);
        }
        return n2 / Math.pow(10, p);
    }

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
