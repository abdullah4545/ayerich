@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Track Order
@endsection

<style>
    #profileImage {
        border-radius: 50%;
        padding: 65px;
        padding-bottom: 8px;
        padding-top: 10px;
    }

    .sidebar-widget-title {
        position: relative;
    }

    .sidebar-widget-title:before {
        content: "";
        width: 100%;
        height: 1px;
        background: #eee;
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
    }

    .py-3 {
        padding-bottom: 1rem !important;
    }

    .sidebar-widget-title span {
        background: #fff;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.2em;
        position: relative;
        padding: 8px;
        color: #dadada;
    }

    ul.categories {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.categories--style-3>li {
        border: 0;
    }

    ul.categories>li {
        border-bottom: 1px solid #f1f1f1;
    }

    .widget-profile-menu a i {
        opacity: 0.6;
        font-size: 13px !important;
        top: 0 !important;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        display: inline-block;
        margin-right: 0.5rem !important;
    }

    .category-name {
        color: black;
        font-size: 18px;
    }

    .category-icon {
        font-size: 18px;
        color: black;
    }

    .card {
        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius);
    }

    .text-white {
        color: white;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .bg-success {
        --bs-bg-opacity: 1;
        background-color: green !important;
    }

    .text-center {
        text-align: center !important;
    }

    .p-2 {
        padding: 0.5rem !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }
    
    @media only screen and (max-width: 768px) {
            .card.p-2.d-lg-block {
                display: none;
            }
        }
</style>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class="outer-top-xs outer-bottom-xs">
        <div class="container pt-4 mt-4">
            <div class="row">
                <div class="col-lg-3">
                    @include('webview.user.sidebar')
                </div>
                <div class="col-lg-9"> 
                 
                    <div class="row">
                        <div class="col-xs-6 col-lg-3 mb-4 shadow p-3 mb-5 bg-white rounded">
                            <div class="card text-center bg-danger pt-4 user_card_text" style="font-size: 26px;">
                                <img src="{{asset('public/shopping.png')}}" style="width: 25%;margin: auto;">
                                <p class=" mb-0 pt-4"> <span>{{ Cart::count() }}</span> <small> &nbsp;(cart)</small></p> 
                            </div>
                        </div> 
                        <div class="col-xs-6 col-lg-3 mb-4 shadow p-3 mb-5 bg-white rounded">
                            <div class="card text-center bg-info pt-4 user_card_text" style="font-size: 26px;">
                                <img src="{{asset('public/shopping-bag.png')}}"  style="width: 25%;margin: auto;">
                                <p class=" mb-0 pt-4">
                                    <span>{{ App\Models\Order::where('user_id', Auth::user()->id)->get()->count() }}</span>
                                    <small> &nbsp;(order)</small>
                                </p> 
                            </div>
                        </div> 
                    </div> 
                    
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($orders == 'Nothing')
                            @else
                                @if (isset($orders))
                                    {{-- track list --}}
                                    <div class="card mt-4" style="    margin-top: 20px;">
                                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                            <div class="float-left"
                                                style="font-size: 20px;color: red;text-align:center"> <b>Order
                                                    History</b> </div>
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-striped table-bordered"
                                                        style="margin-bottom: 20px">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 10px !important">Order ID:
                                                                </td>
                                                                <td class="p-0" style="padding: 10px !important">
                                                                    {{ $orders->invoiceID }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 10px !important">Customer:
                                                                </td>
                                                                <td style="padding: 10px !important">
                                                                    {{ $orders->customers->customerName }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 10px !important">Phone:
                                                                </td>
                                                                <td style="padding: 10px !important">
                                                                    {{ $orders->customers->customerPhone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 10px !important">Shipping
                                                                    address:</td>
                                                                <td style="padding: 10px !important">
                                                                    {{ $orders->customers->customerAddress }},
                                                                    @if (isset($orders->zones))
                                                                        {{ $orders->zones->zoneName }},
                                                                    @else
                                                                        @endif @if (isset($orders->cities))
                                                                            {{ $orders->cities->cityName }},
                                                                        @else
                                                                        @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-striped table-bordered"
                                                        style="margin-bottom: 20px">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 8px !important">Order
                                                                    date:
                                                                </td>
                                                                <td style="padding: 8px !important">
                                                                    {{ $orders->created_at->format('Y-m-d') }} ,
                                                                    {{ date('h:i A', strtotime($orders->created_at)) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 8px !important">Total
                                                                    order
                                                                    amount:</td>
                                                                <td style="padding: 8px !important">৳
                                                                    {{ $orders->subTotal }} + <span
                                                                        style="color: red">(Delivery
                                                                        Charge)</span> </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 8px !important">Shipping
                                                                    company:</td>
                                                                <td style="padding: 8px !important">
                                                                    @if (isset($orders->couriers))
                                                                        {{ $orders->couriers->courierName }}
                                                                    @else
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 8px !important">Payment
                                                                    method:</td>
                                                                <td style="padding: 8px !important">
                                                                    @if ($orders->Payment == 'C-O-D')
                                                                        Cash On Delivery
                                                                    @else
                                                                        Online Payment
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4" style="margin-top: 20px !important">
                                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                            <ul class="process-steps clearfix">
                                                @if ($orders->status == 'Processing' || $orders->status == 'Payment Pending' || $orders->status == 'On Hold')
                                                    <li>
                                                        <div class="icon"
                                                            style="background:#e62e04;color:white">1
                                                        </div>
                                                        <div class="title" style="color:red">On Processing</div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="icon">1</div>
                                                        <div class="title">On Processing</div>
                                                    </li>
                                                @endif
                                                @if ($orders->status == 'Completed' ||
                                                    $orders->status == 'Pending Invoiced' ||
                                                    $orders->status == 'Checked Invoiced' ||
                                                    $orders->status == 'Invoiced' ||
                                                    $orders->status == 'Stock Out')
                                                    <li>
                                                        <div class="icon"
                                                            style="background:#e62e04;color:white">2
                                                        </div>
                                                        <div class="title" style="color:red">Confirmed</div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="icon">2</div>
                                                        <div class="title">Confirmed</div>
                                                    </li>
                                                @endif

                                                @if ($orders->status == 'Delivered' ||
                                                    $orders->status == 'Customer On Hold' ||
                                                    $orders->status == 'Customer Confirm')
                                                    <li>
                                                        <div class="icon"
                                                            style="background:#e62e04;color:white">3
                                                        </div>
                                                        <div class="title" style="color:red">On Going</div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="icon">3</div>
                                                        <div class="title">On Going</div>
                                                    </li>
                                                @endif

                                                @if ($orders->status == 'Paid')
                                                    <li>
                                                        <div class="icon"
                                                            style="background:#e62e04;color:white">4
                                                        </div>
                                                        <div class="title" style="color:red">Delivered</div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="icon">4</div>
                                                        <div class="title">Delivered</div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="col-12">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        @forelse ($orders->orderproducts as $products)
                                                            <tr>
                                                                <td class="w-50 strong-600"
                                                                    style="padding: 8px !important">Product
                                                                    Name:</td>
                                                                <td style="padding: 8px !important">
                                                                    {{ $products->productName }}
                                                                    &nbsp;
                                                                    <span style="color: red">(
                                                                        {{ $products->quantity }}
                                                                        pics )</span>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                        <tr>
                                                            <td class="w-50 strong-600"
                                                                style="padding: 8px !important">Completed By:
                                                            </td>
                                                            <td style="padding: 8px !important">
                                                                {{ $orders->admins->name }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card mt-4">
                                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                            <div class="float-left" style="color: red;text-align:center">No
                                                Records
                                                Found.Please call
                                                our customer care or use Live Chat
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .card-body {
        flex: 1 1 auto;
        padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        color: var(--bs-card-color);
    }

    .card {
        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid rgba(0, 0, 0, 0.175);
        border-radius: var(--bs-card-border-radius);
    }

    .card-header:first-child {
        border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0;
    }

    .heading-6 {
        font-size: 1.1rem !important;
        margin: 0;
        color: white;
    }

    .py-2 {
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }

    .px-3 {
        padding-right: 1rem !important;
        padding-left: 1rem !important;
    }

    .card-header {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        margin-bottom: 0;
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-bottom: var(--bs-card-border-width) solid rgba(0, 0, 0, 0.175);
    }

    .process-steps {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .process-steps li {
        width: 25%;
        float: left;
        text-align: center;
        position: relative;
    }

    .process-steps li .icon {
        height: 30px;
        width: 30px;
        margin: auto;
        background: #fff;
        border-radius: 50%;
        line-height: 30px;
        font-size: 14px;
        font-weight: 700;
        color: #adadad;
        position: relative;
    }

    .process-steps li .title {
        font-weight: 600;
        font-size: 13px;
        color: #777;
        margin-top: 8px;
        margin-bottom: 0;
    }

    .process-steps li+li:after {
        position: absolute;
        content: "";
        height: 3px;
        width: calc(100% - 30px);
        background: #fff;
        top: 14px;
        z-index: 0;
        right: calc(50% + 15px);
    }

    .breadcrumb {
        padding: 5px 0;
        border-bottom: 1px solid #e9e9e9;
        background-color: #fafafa;
    }

    .search-area .search-button {
        border-radius: 0px 3px 3px 0px;
        display: inline-block;
        float: left;
        margin: 0px;
        padding: 5px 15px 6px;
        text-align: center;
        background-color: #e62e04;
        border: 1px solid #e62e04;
    }

    .search-area .search-button:after {
        color: #fff;
        content: "\f002";
        font-family: fontawesome;
        font-size: 16px;
        line-height: 9px;
        vertical-align: middle;
    }
</style>

@endsection
