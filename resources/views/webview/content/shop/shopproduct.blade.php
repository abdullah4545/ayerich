@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Shopproduct
@endsection
<style>
.product { 
    margin-bottom: 30px;
}
</style>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs outer-bottom-xs">
    <div class='container'>
        <div class='row'>
            @forelse ($shopproducts as $newproduct)
                <div class="col-xs-6 col-md-2 mb-4"> 
                    <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    <a href="{{ url('product', $newproduct->ProductSlug) }}"><img
                                            src="{{ asset($newproduct->ProductImage) }}" alt=""
                                            id="imagenew"></a>
                                </div>
                                <!-- /.image -->

                                <div class="tag new" style="blueviolet"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name" style="height: 31px;"><a
                                        href="{{ url('product', $newproduct->ProductSlug) }}">{{ $newproduct->ProductName }}</a>
                                </h3>

                                <div class="description"></div>
                                @if ($currency == 'BDT')
                                    <div class="product-price"> <span class="price">
                                            ৳{{ $newproduct->ProductSalePrice }} </span> <span
                                            class="price-before-discount">৳{{ $newproduct->ProductRegularPrice }}</span>
                                    </div>
                                @else
                                    <div class="product-price"> <span class="price">
                                            ${{ number_format($newproduct->ProductSalePrice / $currency, 2) }}
                                        </span> <span
                                            class="price-before-discount">${{ number_format($newproduct->ProductRegularPrice / $currency, 2) }}</span>
                                    </div>
                                @endif
                                <div class="orderbtn">
                                    <button onclick="buynow({{ $newproduct->id }})" class="btn btn-primary icon"
                                        type="button" style="width:100%"> Buy Now</button>
                                </div>

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button onclick="addtocart({{ $newproduct->id }})" data-toggle="tooltip"
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
            @endforelse
        </div>
    </div>
    <!-- /.container -->
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<script>
    var token = $("input[name='_token']").val();
 
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

</script>


<style>
    #shopbox {
        border: 1px solid #d1d1d1;
        padding: 25px;
    }

    #shopbox:hover {
        box-shadow: 1px 1px 10px 1px #d1d1d1;
        border-radius: 4px;
        padding: 25px;
    }
</style>
@endsection
