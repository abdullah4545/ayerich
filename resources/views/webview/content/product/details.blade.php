@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-{{ $productdetails->ProductName }}
@endsection
 
 <style>
    .nameone {
        margin: 0; 
        font-weight: bold;
    }
    #prqtyplus{
        width: 160px;
      }
     @media only screen and (max-width: 600px) {
        .nameone {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }
        
        .single-product .product-info .price-container .price-box .price-strike {
            color: #aaa;
            font-size: 14px;
            font-weight: 300;
            line-height: 50px;
            text-decoration: line-through;
        }
        
        .single-product .product-info .price-container .price-box .price {
            font-size: 24px;
            font-weight: 700;
            line-height: 50px;
        }

      #owl-single-product-thumbnails .owl-item {
        width: 100px !important;
      }
      #owl-single-product-thumbnails .owl-controls {
        margin: 0 !important;
        display: none !important;
      }
      
        .row.no-gutters.mt-3 {
            padding: 10px;
        }
      
      .mobileinfolist {
        display: flex;
        justify-content: space-between;
      }
      #prqty{
        display: flex;
        justify-content: space-between;
      }
      #prqtyplus{
        width: 122px;
      }
      .d-lg-block{
          display:none;
      }
      
      .single-product .product-info .quantity-container{
          padding:0px;
          padding-top:20px;
      }
      #btnrow{
         display: flex;
        justify-content: space-between;
      }
      
      #product-tabs{
        display: flex;
        justify-content: space-around;
      }
      
    .single-product .product-tabs .nav.nav-tabs.nav-tab-cell>li>a {
        border: none;
        color: #555;
        display: block;
        padding: 6px 12px;
        font-size: 12px;
        font-family: Open sans;
        line-height: 28px;
        text-transform: uppercase;
        position: relative;
        font-weight: bold;
        letter-spacing: 1px;
        background: #f8f8f8;
        border: 1px #fff solid;
    }
    .row.no-gutters.mt-3{
            display: flex;
    }
      
    }
 </style>
 
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <!-- ============================================== HOT DEALS ============================================== -->
                    @if (count($hotproducts) > 0)
                        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                            <h3 class="section-title">hot deals</h3>
                            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                                @forelse ($hotproducts as $hotoffer)
                                    <div class="item">
                                        <div class="products">
                                            <div class="hot-deal-wrapper">
                                                <div class="image"> <a
                                                        href="{{ url('product', $hotoffer->ProductSlug) }}"><img
                                                            src="{{ asset($hotoffer->ProductImage) }}"
                                                            alt="{{ $hotoffer->ProductName }}" style="max-height: 240px;"> </a></div>
                                                <div class="sale-offer-tag"><span>{{ $hotoffer->Discount }}%<br>
                                                        off</span></div>
                                                <div class="timing-wrapper">
                                                    <div class="box-wrapper">
                                                        <div class="date box"> <span class="key">120</span> <span
                                                                class="value">DAYS</span> </div>
                                                    </div>
                                                    <div class="box-wrapper">
                                                        <div class="hour box"> <span class="key">20</span> <span
                                                                class="value">HRS</span> </div>
                                                    </div>
                                                    <div class="box-wrapper">
                                                        <div class="minutes box"> <span class="key">36</span> <span
                                                                class="value">MINS</span> </div>
                                                    </div>
                                                    <div class="box-wrapper hidden-md">
                                                        <div class="seconds box"> <span class="key">60</span> <span
                                                                class="value">SEC</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.hot-deal-wrapper -->

                                            <div class="product-info text-left m-t-20">
                                                <h3 class="name"><a
                                                        href="{{ url('product', $hotoffer->ProductSlug) }}">{{ $hotoffer->ProductName }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                @if ($currency == 'BDT')
                                                    <div class="product-price"> <span class="price">
                                                            ৳{{ $hotoffer->ProductSalePrice }} </span> <span
                                                            class="price-before-discount">৳{{ $hotoffer->ProductRegularPrice }}</span>
                                                    </div>
                                                @else
                                                    <div class="product-price"> <span class="price">
                                                            ${{ number_format($hotoffer->ProductSalePrice / $currency, 2) }}
                                                        </span> <span
                                                            class="price-before-discount">${{ number_format($hotoffer->ProductRegularPrice / $currency, 2) }}</span>
                                                    </div>
                                                @endif


                                            </div>
                                            <!-- /.product-info -->

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <div class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </div>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <!-- /.sidebar-widget -->
                        </div>
                    @else
                        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                            <h3 class="section-title">hot deals</h3>
                            <h4
                                style="    background: #ededed;padding: 12px;text-align: center;font-size: 20px;font-weight: bold;padding-bottom: 60px; padding-top: 60px;">
                                Products Comming Soon.....

                            </h4>
                            <!-- /.sidebar-widget -->
                        </div>
                    @endif
                    <!-- ============================================== HOT DEALS: END ============================================== -->


                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    <div class="single-product-gallery-item" id="slide0">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="{{ url($productdetails->ProductImage) }}">
                                            <img class="img-responsive" alt=""
                                                src="{{ url($productdetails->ProductImage) }}"
                                                data-echo="{{ url($productdetails->ProductImage) }}"
                                                style="height: 315px;" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    @if (isset($productdetails->PostImage))
                                        @forelse (json_decode($productdetails->PostImage) as $key =>$slider)
                                            <div class="single-product-gallery-item" id="slide{{ $key + 1 }}">
                                                <a data-lightbox="image-1" data-title="Gallery"
                                                    href="{{ url('public/images/product/slider/' . $slider) }}">
                                                    <img class="img-responsive" alt=""
                                                        src="{{ url('public/images/product/slider/' . $slider) }}"
                                                        data-echo="{{ url('public/images/product/slider/' . $slider) }}"
                                                        style="height: 315px;" />
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @empty
                                        @endforelse
                                    @else
                                    @endif
                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide0">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="{{ url($productdetails->ProductImage) }}"
                                                    data-echo="{{ url($productdetails->ProductImage) }}"
                                                    style="    height: 68px;" />
                                            </a>
                                        </div>
                                        @if (isset($productdetails->PostImage))
                                            @forelse (json_decode($productdetails->PostImage) as $key =>$slider)
                                                <div class="item">
                                                    <a class="horizontal-thumb" data-target="#owl-single-product"
                                                        data-slide="1" href="#slide{{ $key + 1 }}">
                                                        <img class="img-responsive" width="85" alt=""
                                                            src="{{ url('public/images/product/slider/' . $slider) }}"
                                                            data-echo="{{ url('public/images/product/slider/' . $slider) }}"
                                                            style="    height: 68px;" />
                                                    </a>
                                                </div>
                                            @empty
                                            @endforelse
                                        @else
                                        @endif

                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="nameone">{{ $productdetails->ProductName }}</h1>

                                <div class="mobileinfolist">
                                    <div class="rating-reviews m-t-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->
    
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->
                                        
                                </div>
                                
                                <div class="description-container m-t-10">
                                    {{ $productdetails->ProductBreaf }}
                                </div><!-- /.description-container -->

                                <div class="quantity-container info-container price-container info-container m-t-20"
                                    style="padding: 4px 0 !important;">
                                    <div class="row" id="prqty">


                                        <div class="col-sm-6">
                                            @if ($currency == 'BDT')
                                                <div class="price-box">
                                                    <span
                                                        class="price">৳{{ $productdetails->ProductSalePrice }}</span>
                                                    <span
                                                        class="price-strike">৳{{ $productdetails->ProductRegularPrice }}</span>
                                                </div>
                                            @else
                                                <div class="price-box">
                                                    <span
                                                        class="price">${{ number_format($productdetails->ProductSalePrice / $currency, 2) }}</span>
                                                    <span
                                                        class="price-strike">${{ number_format($productdetails->ProductRegularPrice / $currency, 2) }}</span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row" style="padding-top: 10px;">
                                                <div class="col-sm-4 d-lg-block">
                                                    <span class="label">Qty :</span>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="product-quantity d-flex align-items-center">
                                                        <div class="input-group input-group--style-2 pr-3"
                                                            id="peqtyplus">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-number" type="button"
                                                                    onclick="downQuantity()">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </span>
                                                            <input type="text" name="quantity"
                                                                class="form-control input-number text-center"
                                                                id="proQuantity" placeholder="1" value="1"
                                                                min="1" max="10" style="width: 52px">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-number" type="button"
                                                                    onclick="upQuantity()">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row" id="btnrow">

                                        <div class="col-sm-6">
                                            <form name="form" id="OrderNow" method="POST"
                                                enctype="multipart/form-data" style="width: 100%;float: left;">
                                                @method('POST')
                                                @csrf
                                                <input type="text" name="color" id="product_colorold" hidden>
                                                <input type="text" name="size" id="product_sizeold" hidden>
                                                <input type="text" name="product_id"
                                                    value=" {{ $productdetails->id }}" hidden>
                                                <input type="text" name="qty" value="1" id="qtyor"
                                                    hidden>
                                                <button type="submit" class="btn-block btn btn-primary b-2"
                                                    title="Buy Now" style="padding: 7px;font-size: 18px;">
                                                   &nbsp; BUY NOW &nbsp;
                                                </button>
                                            </form>
                                        </div>

                                        <div class="col-sm-6">
                                            <form id="AddToCartForm" name="form" method="POST"
                                                enctype="multipart/form-data" style="width: 100%;float: left;">
                                                @method('POST')
                                                @csrf
                                                <input type="text" name="product_id"
                                                    value="{{ $productdetails->id }}" hidden>
                                                <input type="text" name="color" id="product_color" hidden>
                                                <input type="text" name="size" id="product_size" hidden>
                                                <input type="text" name="qty" value="1" id="qty"
                                                    hidden>
                                                <button type="submit" class="btn-block btn btn-info mb-2" style="font-size: 18px;background: #ff6600;border: 1px #ff6600;">
                                                    <i class="fa fa-shopping-cart inner-right-vs d-lg-block" ></i> ADD TO CART
                                                </button>
                                            </form>

                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->

                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>  
            </div><!-- /.col -->
            <div class="clearfix"></div>
            <div class="col-md-12">
                
                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                <li><a data-toggle="tab" href="#shipping">SHIPPING INFO</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text"> {!! $productdetails->ProductDetails !!}</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="review-title"><span class="summary">We love this
                                                            product</span><span class="date"><i
                                                                class="fa fa-calendar"></i><span>1 days
                                                                ago</span></span></div>
                                                    <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.Aliquam suscipit."</div>
                                                </div>

                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->
                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                                <div id="shipping" class="tab-pane">
                                    <div class="product-tag"> 
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 product-info-block"
                                                style="padding: 0;">
                                                <div class="row no-gutters mt-3 " style="padding: 10px;">
                                                    <div class="col-sm-1">
                                                        <i class="fa fa-phone" aria-hidden="true"
                                                            style="font-size: 18px;color: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="product-description-label" id="textsize">
                                                            Contact Us:</div>
                                                    </div>
                                                    <div class="col-sm-5" id="textsize">
                                                        <a href="tel:" target="_blank" id="textsize">
                                                            {{ $shipping->contact }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row no-gutters mt-3" style="padding: 10px;">
                                                    <div class="col-sm-1">
                                                        <i class="fa fa-motorcycle" aria-hidden="true"
                                                            style="font-size: 16px;col-smor: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-sm-5 pe-0">
                                                        <div class="product-description-label" id="textsize">

                                                            Inside Dhaka:</div>
                                                    </div>
                                                    <div class="col-sm-5" id="textsize">
                                                        {{ $shipping->insie_dhaka }}
                                                    </div>
                                                </div>
                                                <div class="row no-gutters mt-3" style="padding: 10px;">
                                                    <div class="col-sm-1">
                                                        <i class="fa fa-truck" aria-hidden="true"
                                                            style="font-size: 18px;col-smor: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="product-description-label" id="textsize">

                                                            Outside Dhaka:</div>
                                                    </div>
                                                    <div class="col-sm-5" id="textsize">
                                                        {{ $shipping->outside_dhaka }}

                                                    </div>
                                                </div>
                                                <div class="row no-gutters mt-3" style="padding: 10px;">
                                                    <div class="col-sm-1">
                                                        <i class="fa fa-money" aria-hidden="true"
                                                            style="font-size: 18px;col-smor: #8a8686;"></i>
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <div class="product-description-label" id="textsize"> Cash on
                                                            Delivery :</div>
                                                    </div>
                                                    <div class="col-sm-5" id="textsize">
                                                        @if ($shipping->cash_on_delivery == 'ON')
                                                            Available
                                                        @else
                                                            Unavailable
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="row no-gutters mt-3" style="padding: 10px;">
                                                    <div class="col-sm-1">
                                                        <i class="fa fa-refresh" aria-hidden="true"
                                                            style="font-size: 18px;col-smor: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="product-description-label" id="textsize">Refund
                                                            Rules:</div>
                                                    </div>
                                                    <div class="col-sm-5" id="textsize">
                                                        {{ $shipping->refund_rule }}<a href="#" class="ml-2"
                                                            target="_blank"> View Policy</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">related products</h3>
                    <div class="owl-carousel categoryproduct-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs" style="padding-left: 14px;">
                        @forelse ($relatedproducts as $newproduct)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product', $newproduct->ProductSlug) }}"><img
                                                        src="{{ asset($newproduct->ProductImage) }}" alt=""
                                                        style="max-height: 189px;"></a>
                                            </div>
                                            <!-- /.image -->

                                            <div class="tag new" style="background: red"><span
                                                    style="font-size: 14px;">-{{ $newproduct->Discount }}%</span>
                                            </div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name" style="height: 31px;"><a
                                                    href="{{ url('product', $newproduct->ProductSlug) }}">{{ $newproduct->ProductName }}</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
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
                                                <button onclick="buynow({{ $newproduct->id }})"
                                                    class="btn btn-primary icon" type="button" style="width:100%">
                                                    Buy
                                                    Now</button>
                                            </div>

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button onclick="addtocart({{ $newproduct->id }})"
                                                            data-toggle="tooltip" class="btn btn-primary icon"
                                                            type="button" title="Add Cart"> <i
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
                            </div>
                        @empty
                        @endforelse
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
            </div>
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
<div class="modal" id="processing">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center">
            <i class="spinner fa fa-spinner fa-spin" style="    color: #157ed2; font-size: 70px;  padding: 22px;"></i>
        </div>
    </div>
</div>

<div class="modal" id="cartViewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="AddToCartModel" style="padding-top: 0">

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span aria-hidden="true">Add
                        More Products</span></button>
                <a href="{{ url('checkout') }}" class="btn btn-primary">Submit Order</a>
            </div>
        </div>
    </div>
</div>


{{-- csrf --}}
<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<script>
    $(document).ready(function() {

        $('#AddToCartForm').submit(function(e) {
            e.preventDefault();
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

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
        });

        $('#OrderNow').submit(function(e) {
            e.preventDefault();
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

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
        });

    });

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
                    window.location.href = 'http://localhost/ayebazar/checkout';
                    $('#processing').modal('hide');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function removeFromCartItem(rowId) {

        var token = $("input[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: '{{ url('remove-cart') }}',
            data: {
                _token: token,
                rowId: rowId,
            },

            success: function(response) {
                updatecart();
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Product remove from your Cart',
                    showConfirmButton: false,
                    timer: 1500
                });
                if (response == 'empty') {
                    $('#cartViewModal').modal('hide');
                } else {
                    $('#cartViewModal .modal-body').empty().append(
                        response);
                    $('#cartViewModal').modal('show');
                }

            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function updatecart() {
        $.ajax({
            type: 'get',
            url: '{{ url('update-cart') }}',

            success: function(response) {
                $('.basket-item-count').html(response.item);
                $('.cartamountvalue').html(response.amount);
            },
            error: function(error) {
                console.log('error');
            }
        });
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
    .swal-topright {
        position: absolute;
        top: 0;
        right: 0;
    }

    .dropdown-cart .dc-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .dc-item {
        padding: 15px 15px;
    }

    .subtotal-text {
        display: inline-block;
        float: left;
        color: rgba(0, 0, 0, 0.5);
        font-size: 18px;
    }

    .subtotal-amount {
        display: inline-block;
        float: right;
        color: rgba(0, 0, 0, 0.5);
        font-size: 18px;
    }

    #cartIconCloss {
        border: none;
        font-size: 22px;
        width: 32px;
        border-radius: 50%;
        background: #f0f0f0;
    }

    .dc-image {
        display: inline-block;
        float: left;
        width: 70px;
    }

    .dc-content {
        display: inline-block;
        float: right;
        width: calc(100% - 70px);
        padding-left: 1.5rem;
    }

    .dc-actions {
        text-align: right;
    }

    .text-cart {
        color: #28a745 !important;
        text-align: center;
    }

    .text-cart i {
        font-size: 18px;
        height: 50px;
        width: 50px;
        line-height: 48px;
        border: 2px solid #28a745;
        border-radius: 50px;
        margin-bottom: 5px;
        text-align: center;
    }

    #closebtn {
        position: absolute;
        top: 0;
        right: 8px;
        background: none;
        border: none;
        font-size: 34px;
    }
</style>
@endsection
