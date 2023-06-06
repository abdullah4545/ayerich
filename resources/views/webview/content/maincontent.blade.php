@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Welcome To Our Buy And Selling Reecommerce.
@endsection
<style>

    #imagenew{
        height: 185px;
        max-height:189px;
    }
    
    @media only screen and (max-width: 600px) {
        #imagenew{
            height: 140px;
        }
    }
    
</style>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                <div class="side-menu animate-dropdown outer-bottom-xs" id="mydisplaynone">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">

                            @forelse ($categories as $category)
                                @if (count($category->subcategories) < 1)
                                    <li class="dropdown menu-item"> <a
                                            href="{{ url('products/category/' . $category->slug) }}"
                                            class="dropdown-toggle" data-hover="dropdown"><i
                                                class="icon fa fa-paper-plane"></i>{{ $category->category_name }}</a>
                                        <!-- /.dropdown-menu -->
                                    </li>
                                    <!-- /.menu-item -->
                                @else
                                    <li class="dropdown menu-item"> <a
                                            href="{{ url('products/category/' . $category->slug) }}"
                                            class="dropdown-toggle" data-hover="dropdown"><i
                                                class="icon fa fa-shopping-bag"
                                                aria-hidden="true"></i>{{ $category->category_name }}</a>
                                        <ul class="dropdown-menu mega-menu">
                                            <li class="yamm-content">
                                                <div class="row text-center">

                                                    <ul class="links list-unstyled">

                                                        @forelse ($category->subcategories as $subcat)
                                                            <div class="col-sm-12 col-md-3" id="subcategory">
                                                                <li><a
                                                                        href="{{ url('products/sub/category/' . $subcat->slug) }}">{{ $subcat->sub_category_name }}</a>
                                                                </li>
                                                            </div>
                                                        @empty
                                                        @endforelse
                                                    </ul>

                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </li>
                                            <!-- /.yamm-content -->
                                        </ul>
                                        <!-- /.dropdown-menu -->
                                    </li>
                                @endif
                                <!-- /.menu-item -->
                            @empty
                            @endforelse

                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div class="main-header" id="d-lg-none">
                    <div class="top-search-holder">
                        <div class="search-area">
                            <form>
                                <div class="control-group">
                                    <ul class="categories-filter animate-dropdown" id="mydisplaynone">
                                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                                href="#" style="float: left;">Categories <b
                                                    class="caret"></b></a>
                                            <ul class="dropdown-menu" role="menu">
                                                @forelse ($categories as $category)
                                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                            href="{{ url('category/' . $category->slug) }}">-
                                                            {{ $category->category_name }}</a></li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </li>
                                    </ul>
                                    <input class="search-field" placeholder="Search here..." />
                                    <a class="search-button" href="#"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @forelse ($sliders as $slider)
                            <div class="item" style="background-image: url({{ asset($slider->slider_image) }});">
                                 
                            </div>
                            <!-- /.item -->
                        @empty
                        @endforelse
                    </div>
                    <!-- /.owl-carousel -->
                </div>


                <!-- ============================================== INFO BOXES ============================================== -->

            </div>
        </div>
    </div>
</div>

 

<div class="container" style="    padding-top: 30px;">
    <div class="row">
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
            <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">  
                <div class="item">
                    <div class="products">
                        <div class="hot-deal-wrapper"> 
                            <div class="timing-wrapper">
                                <div class="box-wrapper">
                                    <div class="date box"> <span class="key">120</span></div>
                                </div>
                                <div class="box-wrapper">
                                    <div class="hour box"> <span class="key">20</span></div>
                                </div>
                                <div class="box-wrapper">
                                    <div class="minutes box"> <span class="key">36</span></div>
                                </div>
                                <div class="box-wrapper hidden-md">
                                    <div class="seconds box"> <span class="key">60</span></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>  
            </div>
            <!-- ============================================== HOT DEALS ============================================== -->
            @if (count($hotoffers) > 0)
                <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                    
                    <h3 class="section-title">hot deals</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                        @forelse ($hotoffers as $hotoffer)
                            <div class="item">
                                <div class="products">
                                    <div class="hot-deal-wrapper">
                                        <div class="image"> <a
                                                href="{{ url('product', $hotoffer->ProductSlug) }}"><img
                                                    src="{{ asset($hotoffer->ProductImage) }}"
                                                    alt="{{ $hotoffer->ProductName }}"> </a></div>
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
                                                <button onclick="addtocart({{ $hotoffer->id }})"
                                                    class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i> </button>
                                                <button onclick="addtocart({{ $hotoffer->id }})"
                                                    class="btn btn-primary cart-btn" type="button">Add to
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

            <!-- ============================================== SPECIAL OFFER ============================================== -->

            @if (count($specialoffers) > 0)
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div
                            class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            @forelse ($specialoffers as $specialoffer)
                                <div class="item">
                                    <div class="products special-product">
                                        @forelse ($specialoffer as $offer)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a
                                                                        href="{{ url('product', $offer->ProductSlug) }}">
                                                                        <img src="{{ asset($offer->ProductImage) }}"
                                                                            alt=""> </a>
                                                                </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product', $offer->ProductSlug) }}">{{ $offer->ProductName }}</a>
                                                                </h3>

                                                                @if ($currency == 'BDT')
                                                                    <div class="product-price"> <span class="price">
                                                                            ৳{{ $offer->ProductSalePrice }}
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price"> <span class="price">
                                                                            ${{ number_format($offer->ProductSalePrice / $currency, 2) }}
                                                                        </span>
                                                                    </div>
                                                                @endif


                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
            @else
            @endif
            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
            <!-- ============================================== SPECIAL DEALS ============================================== -->

            @if (count($specialdeals) > 0)
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div
                            class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            @forelse ($specialdeals as $specialdeal)
                                <div class="item">
                                    <div class="products special-product">
                                        @forelse ($specialdeal as $deal)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a
                                                                        href="{{ url('product', $deal->ProductSlug) }}">
                                                                        <img src="{{ asset($deal->ProductImage) }}"
                                                                            alt=""> </a>
                                                                </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product', $deal->ProductSlug) }}">{{ $deal->ProductName }}</a>
                                                                </h3>

                                                                @if ($currency == 'BDT')
                                                                    <div class="product-price"> <span class="price">
                                                                            ৳{{ $deal->ProductSalePrice }}
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price"> <span class="price">
                                                                            ${{ number_format($deal->ProductSalePrice / $currency, 2) }}
                                                                        </span>
                                                                    </div>
                                                                @endif



                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
            @else
            @endif

            <!-- ============================================== Testimonials============================================== -->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                <div id="advertisement" class="advertisement">
                    <div class="item">
                        <div class="avatar"><img
                                src="{{ asset('public/webview/assets/') }}/images/testimonials/member1.png"
                                alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                            Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">John Doe <span>Abc Company</span> </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="avatar"><img
                                src="{{ asset('public/webview/assets/') }}/images/testimonials/member3.png"
                                alt="Image"></div>
                        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                            condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="avatar"><img
                                src="{{ asset('public/webview/assets/') }}/images/testimonials/member2.png"
                                alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                            Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->

                </div>
                <!-- /.owl-carousel -->
            </div>

            <!-- ============================================== Testimonials: END ============================================== -->
            @if ($adds[3]->status == 'Active')
                <div class="home-banner" style="text-align: center;margin-bottom: 20px;">
                    <img src="{{ asset($adds[3]->add_image) }}" alt="Image" style="width: 100%;">
                </div>
            @else
            @endif
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->
        </div>
        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

            <!-- /.info-boxes -->
            <!-- ============================================== INFO BOXES : END ============================================== -->
            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp" style="margin-top: 0px;">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">New Arrivals</h3>
                    <!-- /.nav-tabs -->
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                @forelse ($newproducts as $newproduct)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ url('product', $newproduct->ProductSlug) }}"><img
                                                                src="{{ asset($newproduct->ProductImage) }}"
                                                                alt=""  id="imagenew"></a>
                                                    </div>
                                                    <!-- /.image -->

                                                    <div class="tag new" style="blueviolet"><span>new</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name" style="height: 31px;overflow:hidden;margin-bottom: 0;"><a
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
                                                        <button onclick="buynow({{ $newproduct->id }})"
                                                            class="btn btn-primary icon" type="button"
                                                            style="width:100%;"> Buy Now</button>
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
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                @empty
                                @endforelse
                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>

            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp" style="margin-top: 0px;">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">TOP SELLING PRODUCTS</h3>
                    <!-- /.nav-tabs -->
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                @forelse ($topproducts as $topproduct)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ url('product', $topproduct->ProductSlug) }}"><img
                                                                src="{{ asset($topproduct->ProductImage) }}"
                                                                alt=""  id="imagenew"></a>
                                                    </div>
                                                    <!-- /.image -->

                                                    <div class="tag hot"><span>hot</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name" style="height: 31px;overflow:hidden;margin-bottom: 0;"><a
                                                            href="{{ url('product', $topproduct->ProductSlug) }}">{{ $topproduct->ProductName }}</a>
                                                    </h3>

                                                    <div class="description"></div>
                                                    @if ($currency == 'BDT')
                                                        <div class="product-price"> <span class="price">
                                                                ৳{{ $topproduct->ProductSalePrice }} </span> <span
                                                                class="price-before-discount">৳{{ $topproduct->ProductRegularPrice }}</span>
                                                        </div>
                                                    @else
                                                        <div class="product-price"> <span class="price">
                                                                ${{ number_format($topproduct->ProductSalePrice / $currency, 2) }}
                                                            </span> <span
                                                                class="price-before-discount">${{ number_format($topproduct->ProductRegularPrice / $currency, 2) }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="orderbtn">
                                                        <button onclick="buynow({{ $topproduct->id }})"
                                                            class="btn btn-primary icon" type="button"
                                                            style="width:100%;"> Buy Now</button>
                                                    </div>

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button onclick="addtocart({{ $topproduct->id }})"
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
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                @empty
                                @endforelse
                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.scroll-tabs -->
            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    @if ($adds[0]->status == 'Active')
                        <div class="col-xs-7 col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset($adds[0]->add_image) }}" alt="" id="addimg"> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                    @else
                    @endif
                    <!-- /.col -->
                    @if ($adds[1]->status == 'Active')
                        <div class="col-xs-5 col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset($adds[1]->add_image) }}" alt="" id="addimg"> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                    @else
                    @endif
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.wide-banners -->

            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Featured products</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @forelse ($featuredproducts as $featuredproduct)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="{{ url('product', $featuredproduct->ProductSlug) }}"><img
                                                    src="{{ asset($featuredproduct->ProductImage) }}" alt=""
                                                     id="imagenew"></a>
                                        </div>
                                        <!-- /.image -->

                                        <div class="tag new" style="background: red"><span
                                                style="font-size: 14px;">-{{ $featuredproduct->Discount }}%</span>
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name" style="height: 31px;overflow:hidden;margin-bottom: 0;"><a
                                                href="{{ url('product', $featuredproduct->ProductSlug) }}">{{ $featuredproduct->ProductName }}</a>
                                        </h3>

                                        <div class="description"></div>
                                        @if ($currency == 'BDT')
                                            <div class="product-price"> <span class="price">
                                                    ৳{{ $featuredproduct->ProductSalePrice }} </span> <span
                                                    class="price-before-discount">৳{{ $featuredproduct->ProductRegularPrice }}</span>
                                            </div>
                                        @else
                                            <div class="product-price"> <span class="price">
                                                    ${{ number_format($featuredproduct->ProductSalePrice / $currency, 2) }}
                                                </span> <span
                                                    class="price-before-discount">${{ number_format($featuredproduct->ProductRegularPrice / $currency, 2) }}</span>
                                            </div>
                                        @endif
                                        <div class="orderbtn">
                                            <button onclick="buynow({{ $featuredproduct->id }})"
                                                class="btn btn-primary icon" type="button" style="width:100%;"> Buy
                                                Now</button>
                                        </div>

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button onclick="addtocart({{ $featuredproduct->id }})"
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
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    @empty
                    @endforelse
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    @if ($adds[2]->status == 'Active')
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset($adds[2]->add_image) }}" alt=""
                                        style="height: 182px;width: 100%;"> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Arrivel<br>
                                            <span class="shopping-needs">Save up to 40% off</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    @else
                    @endif
                </div>
                <!-- /.row -->
            </div>
            <!-- /.wide-banners -->
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== BEST SELLER ============================================== -->

            <div class="best-deal wow fadeInUp outer-bottom-xs">
                <h3 class="section-title">Best seller</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    @if (count($bestone) > 0)
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs"
                            style="margin-top: 0px;">
                            @forelse ($bestone as $bests)
                                <div class="item">
                                    <div class="products best-product">
                                        @foreach ($bests as $beston)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a
                                                                        href="{{ url('product', $beston->ProductSlug) }}">
                                                                        <img src="{{ asset($beston->ProductImage) }}"
                                                                            alt=""> </a>
                                                                </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col2 col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product', $beston->ProductSlug) }}"
                                                                        class="truncate">{{ $beston->ProductName }}</a>
                                                                </h3>

                                                                @if ($currency == 'BDT')
                                                                    <div class="product-price"> <span class="price">
                                                                            ৳{{ $beston->ProductSalePrice }}
                                                                        </span> </div>
                                                                @else
                                                                    <div class="product-price"> <span class="price">
                                                                            ${{ number_format($beston->ProductSalePrice / $currency, 2) }}
                                                                        </span> </div>
                                                                @endif
                                                                <div class="orderbtn">
                                                                    <div class="orderbtn">
                                                                        <div class="orderbtn">
                                                                            <button
                                                                                onclick="buynow({{ $beston->id }})"
                                                                                class="btn btn-primary icon orderbtnprimary"
                                                                                type="button" style="">
                                                                                Buy
                                                                                Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    @else
                    @endif
                </div>
                <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== BEST SELLER : END ============================================== -->

            

        </div>
        <!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
    </div>
  
    @forelse ($categoryproducts as $category)
        @if (count($category->products) > 0)
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section wow fadeInUp new-arriavls">
                <h3 class="section-title">{{ $category->category_name }}</h3>
                <div class="owl-carousel categoryproduct-owl-carousel custom-carousel owl-theme outer-top-xs">

                    @forelse ($category->products as $categoryproduct)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="{{ url('product', $categoryproduct->ProductSlug) }}"><img
                                                    src="{{ asset($categoryproduct->ProductImage) }}"
                                                    alt=""  id="imagenew"></a>
                                        </div>
                                        <!-- /.image -->

                                        <div class="tag new" style="background: red"><span
                                                style="font-size: 14px;">-{{ $categoryproduct->Discount }}%</span>
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name" style="height: 31px;overflow:hidden;margin-bottom: 0;"><a
                                                href="{{ url('product', $categoryproduct->ProductSlug) }}">{{ $categoryproduct->ProductName }}</a>
                                        </h3>

                                        <div class="description"></div>
                                        @if ($currency == 'BDT')
                                            <div class="product-price"> <span class="price">
                                                    ৳{{ $categoryproduct->ProductSalePrice }} </span> <span
                                                    class="price-before-discount">৳{{ $categoryproduct->ProductRegularPrice }}</span>
                                            </div>
                                        @else
                                            <div class="product-price"> <span class="price">
                                                    ${{ number_format($categoryproduct->ProductSalePrice / $currency, 2) }}
                                                </span> <span
                                                    class="price-before-discount">${{ number_format($categoryproduct->ProductRegularPrice / $currency, 2) }}</span>
                                            </div>
                                        @endif
                                        <div class="orderbtn">
                                            <button onclick="buynow({{ $categoryproduct->id }})"
                                                class="btn btn-primary icon" type="button"
                                                style="width:100%;"> Buy
                                                Now</button>
                                        </div>

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button onclick="addtocart({{ $categoryproduct->id }})"
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
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                    @empty
                    @endforelse
                    <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
        @else
        @endif

    @empty
    @endforelse

    <!-- ============================================== BLOG SLIDER ============================================== -->
    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
        <h3 class="section-title">latest form blog</h3>
        <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
                <div class="item">
                    <div class="blog-post">
                        <div class="blog-post-image">
                            <div class="image">
                                <a href="blog.html"><img
                                        src="{{ asset('public/webview/assets/') }}/images/blog-post/post1.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                            <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                    laudantium</a></h3>
                            <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                dolore magnam aliquam quaerat voluptatem.</p>
                            <a href="#" class="lnk btn btn-primary" style="border-radious:18px;">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                    </div>
                    <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="blog-post">
                        <div class="blog-post-image">
                            <div class="image">
                                <a href="blog.html"><img
                                        src="{{ asset('public/webview/assets/') }}/images/blog-post/post2.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                    pariatur</a></h3>
                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                dolore magnam aliquam quaerat voluptatem.</p>
                            <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                    </div>
                    <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <!-- /.item -->

                <div class="item">
                    <div class="blog-post">
                        <div class="blog-post-image">
                            <div class="image">
                                <a href="blog.html"><img
                                        src="{{ asset('public/webview/assets/') }}/images/blog-post/post1.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                    pariatur</a></h3>
                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium</p>
                            <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                    </div>
                    <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="blog-post">
                        <div class="blog-post-image">
                            <div class="image">
                                <a href="blog.html"><img
                                        src="{{ asset('public/webview/assets/') }}/images/blog-post/post2.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                    pariatur</a></h3>
                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium</p>
                            <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                    </div>
                    <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="blog-post">
                        <div class="blog-post-image">
                            <div class="image">
                                <a href="blog.html"><img
                                        src="{{ asset('public/webview/assets/') }}/images/blog-post/post1.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                    pariatur</a></h3>
                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem
                                accusantium</p>
                            <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                    </div>
                    <!-- /.blog-post -->
                </div>
                <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
        </div>
        <!-- /.blog-slider-container -->
    </section> 
    <!-- ============================================== BLOG SLIDER : END ============================================== -->


    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                @forelse ($bottombanners as $bottombanner)
                    <div class="item">
                        <a href="#" class="image"> <img data-echo="{{ asset($bottombanner->brand_icon) }}"
                                src="{{ asset($bottombanner->brand_icon) }}"
                                alt="{{ $bottombanner->brand_name }}">
                        </a>
                    </div>
                    <!--/.item-->
                @empty
                @endforelse
            </div>
            <!-- /.owl-carousel #logo-slider -->
        </div>
        <!-- /.logo-slider-inner -->
    </div>
    <div class="info-boxes wow fadeInUp" id="mydisplaynone">
        <div class="">
            <div class="row" style="margin-bottom: 10px;">
                @forelse ($policymenus as $policymenu)
                    <div class="col-md-6 col-sm-4 col-lg-4 ">
                        <div class="info-box info-boxes-inner">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if($policymenu->id==1)
                                        <img src="{{asset('public/ewallet.gif')}}" width="65px">
                                    @elseif($policymenu->id==3)
                                        <img src="{{asset('public/sale.gif')}}" width="65px">
                                    @else
                                        <img src="{{asset('public/delivery-truck.gif')}}" width="65px">
                                    @endif
                                </div>
                            </div>
                            <h6 class="text" style="color:black">{{ $policymenu->policy_text }}</h6>
                        </div>
                    </div>
                    <!-- .col -->
                @empty
                @endforelse
            </div>
            <!-- /.row -->
        </div>
        <!-- /.info-boxes-inner -->

    </div>
    
    <div class="d-block d-lg-none info-boxes wow fadeInUp"> 
        <div id="policy-main" class="owl-carousel owl-inner-nav owl-ui-sm" style="margin-bottom: 10px;">
            @forelse ($policymenus as $policymenu) 
                <div class="item" style="background: #157ed2;color: white; text-align: center;padding: 10px;border-radius: 4px;"> 
                    @if($policymenu->id==1)
                        <img src="{{asset('public/ewallet.gif')}}" width="65px">
                    @elseif($policymenu->id==3)
                        <img src="{{asset('public/sale.gif')}}" width="65px">
                    @else
                        <img src="{{asset('public/delivery-truck.gif')}}" width="65px">
                    @endif
                    <h6 class="text" style="color:black">{{ $policymenu->policy_text }}</h6>
                </div> 
            @empty
            @endforelse
        </div> 
        <!-- /.info-boxes-inner --> 
    </div>

    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div>
<!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

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


    function removeFromCartItem(rowId) {

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
                    $('#loadingreload').css({
                        'display': 'flex',
                        'justify-content': 'center',
                        'align-items': 'center'
                    })
                    $('#loadingreload').modal('show');
                    $('#cartViewModal').modal('hide');
                    location.reload();
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

    #subcategory:hover {
        background: #ededed;
    }
</style>

@endsection
