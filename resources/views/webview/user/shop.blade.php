@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-User Dashboard
@endsection

<style>
    #imagenew {
        height: 185px;
        max-height: 189px;
    }

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

    . {
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

    .product {
        margin: 8px 4px;
    }
</style>


<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-xs-12 col-lg-9" style="padding-right:0;">

                @forelse ($product as $product)
                    <div class="col-xs-6 col-lg-3">
                        <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    <a href="{{ url('product', $product->ProductSlug) }}"><img
                                            src="{{ asset($product->ProductImage) }}" alt="" id="imagenew"></a>
                                </div>
                                <!-- /.image -->

                                <div class="tag new" style="blueviolet"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name" style="height: 31px;overflow:hidden;margin-bottom: 0;"><a
                                        href="{{ url('product', $product->ProductSlug) }}">{{ $product->ProductName }}</a>
                                </h3>

                                <div class="description"></div>
                                @if ($currency == 'BDT')
                                    <div class="product-price"> <span class="price">
                                            ৳{{ $product->ProductSalePrice }} </span> <span
                                            class="price-before-discount">৳{{ $product->ProductRegularPrice }}</span>
                                    </div>
                                @else
                                    <div class="product-price"> <span class="price">
                                            ${{ number_format($product->ProductSalePrice / $currency, 2) }}
                                        </span> <span
                                            class="price-before-discount">${{ number_format($product->ProductRegularPrice / $currency, 2) }}</span>
                                    </div>
                                @endif
                                <div class="orderbtn">
                                    <button onclick="buynow({{ $product->id }})" class="btn btn-primary icon"
                                        type="button" style="width:100%;"> Buy Now</button>
                                </div>

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button onclick="addtocart({{ $product->id }})" data-toggle="tooltip"
                                                class="btn btn-primary icon" type="button" title="Add Cart"> <i
                                                    class="fa fa-shopping-cart"></i> Add To
                                                Cart
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                    </div>
                @empty
                    <h2 class="p-4 text-center"><b>No Products found...</b></h2>
                @endforelse

            </div>
        </div>
    </div>
</div>



<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<script>
    var token = $("input[name='_token']").val();

    function addtocart(product_id) {
        $('#processing').css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        $('#processing').modal('show');
        $.ajax({
            type: 'POST',
            url: '{{ url('add-to-cart') }}',
            data: {
                _token: token,
                product_id: product_id,
                qty: '1',
            },

            success: function(data) {
                updatecart();
                $.ajax({
                    type: 'GET',
                    url: '{{ url('get-cart-content') }}',

                    success: function(response) {
                        $('#cartViewModal .modal-body').empty().append(
                            response);
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
                $('#processing').modal('hide');
                $('#cartViewModal').modal('show');
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function buynow(product_id) {
        $('#processing').css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        $('#processing').modal('show');
        $.ajax({
            type: 'POST',
            url: '{{ url('add-to-cart') }}',
            data: {
                _token: token,
                product_id: product_id,
                qty: '1',
            },

            success: function(data) {
                updatecart();
                if (data == 'success') {
                    window.location.href = 'https://ayerich.com/checkout';
                    $('#processing').modal('hide');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
    $(document).ready(function() {

        $(document).on('click', '#copyreflink', function(e) {
            var copyText = document.getElementById("referrallink");

            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard
                .writeText(copyText.value)
                .then(() => {
                    alert("Successfully copied referral link");
                })
                .catch(() => {
                    alert("something went wrong");
                });
        });

        $(document).on('click', '#copyrefcode', function(e) {
            var copyTextCode = document.getElementById("referralcode");

            copyTextCode.select();
            copyTextCode.setSelectionRange(0, 99999);
            navigator.clipboard
                .writeText(copyTextCode.value)
                .then(() => {
                    alert("Successfully copied referral code");
                })
                .catch(() => {
                    alert("something went wrong");
                });
        });

    });
</script>
@endsection
