@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-User Orders
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
</style>

<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="p-2 pt-0">
                    <div class="row">
                        <div class="col-xs-6 col-lg-3 mb-4 shadow p-3 mb-5 bg-white rounded">
                            <div class="card text-center bg-danger pt-4 user_card_text" style="font-size: 26px;">
                                <img src="{{asset('public/shopping.png')}}" style="width: 25%;margin: auto;">
                                <p class=" mb-0 pt-4"> <span>{{ Cart::count() }}</span> <small> &nbsp;cart</small></p> 
                            </div>
                        </div> 
                        <div class="col-xs-6 col-lg-3 mb-4 shadow p-3 mb-5 bg-white rounded">
                            <div class="card text-center bg-info pt-4 user_card_text" style="font-size: 26px;">
                                <img src="{{asset('public/shopping-bag.png')}}"  style="width: 25%;margin: auto;">
                                <p class=" mb-0 pt-4">
                                    <span>{{ App\Models\Order::where('user_id', Auth::user()->id)->get()->count() }}</span>
                                    <small> &nbsp;order</small>
                                </p> 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
 
            <div class="col-lg-9">
                <div class="p-2 pt-0">
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="accordion"> 
                                @forelse ($orders as $order)
                                    <div class="card" style="padding: 10px;border: 1px solid skyblue;margin-bottom: 6px;">
                                        <div class="card-header">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#collapse{{$order->id}}">
                                            <div class="info ps-2 d-flex" style="justify-content:space-between">
                                                <p class="m-0 pt-2" style="color:black ;margin:0">
                                                    <b>ID: <span>{{ $order->invoiceID }}</span></b>
                                                </p>
                                                <p class="m-0 pt-2" style="color:black ;margin:0">
                                                    @if ($currency == 'BDT')
                                                        <b>৳ <span>{{ $order->subTotal }}</span></b>
                                                    @else
                                                        <b>$
                                                            <span>{{ number_format($order->subTotal / $currency, 2) }}</span></b>
                                                    @endif 
                                                </p>
                                            </div>
                                          </a>
                                        </div>
                                        <div id="collapse{{$order->id}}" class="collapse" data-parent="#accordion">
                                            <div class="card-body" style="border-top: 1px solid #d0d0d0;margin-top: 10px; padding-top: 10px;">
                                                <div style="display: flex;justify-content:space-between">
        
                                                    <div class="info ps-2"> 
                                                        <p class="m-0" style="color:rgb(26, 142, 214) ;">
                                                            <b style="color: gray">Ordered:
                                                                <span>{{ $order->created_at->format('d M') }},
                                                                    {{ $order->created_at->format('Y') }} </span></b>
                                                        </p>
                                                        <p class="m-0 pb-2" style="color:rgb(26, 142, 214) ;">
                                                            <b>Delivery:
                                                                <span> With in 3 to 7 days.</span></b>
                                                        </p>
                                                    </div>
                                                    <div class="delivery"
                                                        style="padding-top: 0px;text-align: right;padding-right: 10px;"> 
                                                        <h6 class="m-0" style="color: rgb(22, 128, 6);margin: 0px;">
                                                            <b>{{ $order->status }}</b>
                                                        </h6>
                                                        <a href="{{ url('user/see-genology/' . $order->id) }}"
                                                            class="btn btn-success btn-sm"
                                                            style="padding: 3px;font-size: 10px;margin-top: 8px;">
                                                            <b>Check Genology</b>
                                                        </a>
                                                        <a href="{{ url('user/order/details/' . $order->invoiceID) }}"
                                                            class="btn btn-info btn-sm"
                                                            style="padding: 3px;font-size: 10px;margin-top: 8px;">
                                                            <b>View</b>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div> 
                                @empty
                                    <div class="col-lg-12 col-12" id="mainitem">
                                        <div class="card p-2 mb-2">
                                            <div style="display: flex;justify-content:center">
        
                                                <div class="info ps-2 p-4">
                                                    <h2> No Order Found !</h2>
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                @endforelse
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
