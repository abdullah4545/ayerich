<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown" style="background:#fff;">
        <div class="container">
            <div class="header-top-inner">  
                <!-- Modal my shopNow-->
                <div class="modal fade" id="shopNow">
                    <div class="modal-dialog" style="width:80%;">
                        <div class="modal-content">
                            <div class="modal-header pb-0">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="background-color: rgb(217, 219, 221);">
                                <div class="sign-in-page">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <aside class="card mb-4">
                                                <article class="card-body">
                                                    <header class="mb-4">
                                                        <p class="text-center"
                                                            style="font-size: 16px;padding: 4px;color: white;font-weight: bold;">
                                                            Please give your name,phone,address for confirm order.Please
                                                            click <span class="text-danger">Confirm Order</span>
                                                            button.
                                                        </p>
                                                    </header>
                                                    <form action="" method="POST"
                                                        class="from-prevent-multiple-submits">
                                                        <div class="row">
                                                            <div class="form-group col-sm-12">
                                                                <label>Your Name </label>
                                                                <input type="text" id="userName" name="userName"
                                                                    placeholder="Type Name" required
                                                                    class="form-control"
                                                                    style=" background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <label>Your Address </label>
                                                                <input type="text" id="userAddress"
                                                                    name="userAddress" placeholder="Type Address"
                                                                    required class="form-control"
                                                                    style=" background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <label>Your Phone </label>
                                                                <input type="number" pattern="[0-9]*" id="userPhone"
                                                                    name="userPhone" required class="form-control"
                                                                    placeholder="Type Phone">
                                                            </div>
                                                            <textarea id="ordersubtotalprice" name="subTotal" cols="10" rows="5" hidden>Price here</textarea>
                                                            <div class="form-group col-sm-12">
                                                                <label>Select Area </label>
                                                                <select id="selectCourier" name="selectCourier"
                                                                    class="form-control">
                                                                    <option value="80">Inside Dhaka </option>
                                                                    <option value="150">Outside Dhaka </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="submit" id="orderConfirm"
                                                                    class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                                    style="font-size:20px !important;"> Confirm Order
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </article>
                                                <!-- card-body.// -->
                                            </aside>
                                        </div>
                                        <div class="col-md-6 orderDetails">
                                            <aside class="card">
                                                <article class="card-body">
                                                    <header class="mb-4"
                                                        style="padding: 8px; font-weight: bold; color: white;">
                                                        <h4 class="card-title"
                                                            style="font-size: 16px;font-weight: bold;">Your Order
                                                            Product</h4>
                                                    </header>
                                                    <div class="row">
                                                        <div class="table-responsive bg-white p-4">
                                                            <table class="table border-bottom">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="product-image"></th>
                                                                        <th class="product-name">Product</th>
                                                                        <th class="product-price">Price</th>
                                                                        <th class="product-quanity">Quantity</th>
                                                                        <th class="product-total">Total</th>
                                                                        <th class="product-remove"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <tr class="cart-item" id="productcart">
                                                                        <td class="product-image">
                                                                            <a href="#" class="mr-3">
                                                                                <img class=" ls-is-cached lazyloaded"
                                                                                    src="{{ asset('public/webview/assets/') }}/images/banners/top-menu-banner.jpg"
                                                                                    style="max-width: 50px">
                                                                            </a>
                                                                        </td>

                                                                        <td class="product-name">
                                                                            <span class="pr-4 d-block">Product Name
                                                                                Here</span>
                                                                        </td>

                                                                        <td class="product-price"
                                                                            style="width: 80px;">
                                                                            <span class="pr-3 d-block">৳ Price
                                                                                Here</span>
                                                                        </td>

                                                                        <td class="product-quantity">
                                                                            <div class="input-group input-group--style-2 pr-4"
                                                                                style="width: 130px;">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-number"
                                                                                        type="button"
                                                                                        data-type="minus"
                                                                                        data-field="quantity">
                                                                                        <i class="fa fa-minus"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <input type="text" name="quantity"
                                                                                    id="QuantityPeo"
                                                                                    class="form-control input-number"
                                                                                    placeholder="1" min="1"
                                                                                    max="10">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-number"
                                                                                        type="button"
                                                                                        data-type="plus"
                                                                                        data-field="quantity">
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <input type="text" name="productP"
                                                                            id="priceOf" value="price here" hidden>
                                                                        <td class="product-total"
                                                                            style="width: 80px;">
                                                                            <span>৳ <span id="pricetotal"
                                                                                    class="price">Price
                                                                                    Here</span></span>
                                                                        </td>
                                                                        <td class="product-remove"
                                                                            style="width: 30px;">
                                                                            <a type="button" style="width: 30px;"
                                                                                class="text-right pl-4">
                                                                                <i class="fa fa-trash"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </article>

                                                <input type="text" name="size" value="size here" hidden>
                                                <input type="text" name="color" value="color here" hidden>

                                                <article class="card-body border-top">
                                                    <dl class="row">
                                                        <dt class="col-sm-8">Subtotal: </dt>
                                                        <dd class="col-sm-4 text-right"><strong>৳ <span
                                                                    id="subtotalprice">Price</span> </strong></dd>

                                                        <dt class="col-sm-8">Delivery charge: </dt>
                                                        <dd class="col-sm-4 text-danger text-right"><strong>৳ <span
                                                                    id="dinamicdalivery">80</span></strong></dd>

                                                        <dt class="col-sm-8">Total:</dt>
                                                        <dd class="col-sm-4 text-right"><strong class="h5 text-dark">৳
                                                                <span id="totalamount"></span></strong></dd>
                                                    </dl>

                                                </article>

                                            </aside>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Part End -->

               
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header" style="background:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-sm-6 col-md-3 logo-holder">

                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo" style="display: flex">
                        
                        <a href="{{ url('/') }}" id="smlogosm"> <img id="imgl"
                                src="{{ asset($basicinfo->logo) }}" alt="logo"> </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>


                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder" id="d-sm-none">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group" style="border: 1px solid;border-radius: 4px;">
                                <ul class="categories-filter animate-dropdown" id="mydisplaynone">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="#" style="float: left;">Categories <b class="caret"></b></a>
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
                                <input class="search-field" placeholder="Search here..." style="    border: none !important;" />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-md-2 animate-dropdown top-cart-row" style="display: flex;justify-content: space-around;"> 
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart" id="mydisplaynone">
                        <a type="button" style="cursor: pointer" onclick="checkcart(this)"
                            class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"  style="color: #0f6cb2;"></i> </div>
                                <div class="basket-item-count"><span
                                        class="count">{{ count(Cart::content()) }}</span></div> 
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li id="checkcartview">

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>     
                    <!-- /.dropdown-cart -->  

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-1 joine_btn join_btn">
                    @if (Auth::guard('web')->check())
                            <div class="btn-group d-none d-lg-block">
                                <button type="button" class="dropdown-toggle"
                                    style="border:none;background: none;color:white" data-toggle="dropdown"
                                    aria-expanded="false"> 
                                    <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                        style="border-radius: 50%;height: 37px;margin-top: -4px;">
                                 </button>
                                <ul class="dropdown-menu" style="    left: -46px !important;text-align: end;">
                                    <li id="dashli"><a id="dashlia" class="dropdown-item"
                                            href="{{ url('user/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li id="dashli"><a id="dashlia" class="dropdown-item"
                                            href="{{ url('profile') }}">Profile</a>
                                    </li>
                                    <li id="dashli"><a id="dashlia" class="dropdown-item"
                                            href="#">Settings</a></li>
                                    <li id="dashli"><a id="dashlia" class="dropdown-item p-4"
                                            href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        @else
                             <a class="btn btn-primary  btn-lg" id="getbtn" href="{{ route('registerview') }}" >Free Join</a>
                        @endif
                    
                </div>
                <!-- /.top-cart-row -->

                <div class="col-xs-12 col-md-1 col-md-1 dropdown_bttns">
                    <div class="dropdown show">
                        <a class="btn dropdown_btn" href="#" onclick="openNavMenu()" role="button">
                            <i class="icon fa fa-bars"></i>
                        </a>
                 
                        <div class="dropdown-menu" style="width: 95%;"  aria-labelledby="dropdownMenuLink">
                            <div class="nav-outer" style="margin: 5px 8px;">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown yamm-fw"> <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="dropdown yamm-fw"> <a href="{{ url('what-we-offer') }}">What we offer</a>
                                </li>
                                    @forelse ($menus as $menu)
                                        <li class="dropdown"> <a
                                                href="{{ url('menu/' . $menu->slug) }}">{{ $menu->menu_name }}</a> </li>
                                    @empty
                                    @endforelse
                                    <li class="dropdown d-none d-lg-block"> <a href="{{ url('shops') }}">Shop</a> </li>
                                    <li class="dropdown"> <a href="{{ url('track-order') }}">Track
                                            Order</a> </li>
                                </ul>
                                <!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                      </div>
                </div>
          
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown d-sm-none">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer" style="position: relative">
                            <ul class="nav navbar-nav" >
                                <li class="dropdown yamm-fw"> <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="dropdown yamm-fw"> <a href="{{ url('what-we-offer') }}">What we offer</a>
                                </li>
                                @forelse ($menus as $menu)
                                    <li class="dropdown"> <a
                                            href="{{ url('menu/' . $menu->slug) }}">{{ $menu->menu_name }}</a> 
                                        </li>
                                @empty
                                @endforelse
                                <li class="dropdown d-none d-lg-block"> <a href="{{ url('shops') }}">Shop</a> </li>
                                <li class="dropdown"> <a href="{{ url('track-order') }}">Track
                                        Order</a> </li>
                                      <div class="lang" style="position: absolute; top:-18px;  left: 60%;">  <li class="dropdown dropdown-small" style="top:-20px;" id="google_translate_element"></li></div>
                                       
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->


</header>

{{-- side panel --}}
<div id="mySidepanel" class="sidepanel d-lg-none">
    <div class="side-menu-header ">
        <div class="side-menu-close" onclick="closeNav()">
            <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z">
                </path>
            </svg><!-- <i class="fas fa-close"></i> Font Awesome fontawesome.com -->
        </div>
        <div class="side-login px-3 pb-3" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
            <a href=""></a>
            <a style="font-size: 16px" href="#">Categories</a>
        </div>
    </div>
    <ul class="level1-styles collapse show" id="id0">

        @forelse ($categories as $sidecategory)
            @if (count($sidecategory->subcategories) > 0)
                <li>
                    <p class="collapsed"
                        data-toggle="collapse" data-target="#id{{ $sidecategory->id }}"
                        aria-expanded="false" style="display: flex;justify-content: space-between;margin: 0;"><a href="{{ url('products/category/' . $sidecategory->slug) }}">{{ $sidecategory->category_name }}</a><svg class="svg-inline--fa fa-plus"
                            aria-hidden="true" id="plusicon" focusable="false" data-prefix="fas" data-icon="plus"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z">
                            </path>
                        </svg>
                    </p>
                    <ul class="level2-styles collapse" id="id{{ $sidecategory->id }}">
                        @foreach ($sidecategory->subcategories as $sidesubcate)
                            <li>
                                <a
                                    href="{{ url('products/sub/category/' . $sidesubcate->slug) }}">{{ $sidesubcate->sub_category_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a
                        href="{{ url('products/category/' . $sidecategory->slug) }}">{{ $sidecategory->category_name }}</a>
                </li>
            @endif
        @empty
        @endforelse

    </ul>
</div>

{{-- side panel --}}
<div id="mySidepanelMenu" class="sidepanel d-lg-none">
    <div class="side-menu-header ">
        <div class="side-menu-close" onclick="closeNavMenu()">
            <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z">
                </path>
            </svg><!-- <i class="fas fa-close"></i> Font Awesome fontawesome.com -->
        </div>
        <div class="side-login px-3 pb-3" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
            <a href=""></a>
            <a style="font-size: 16px" href="#">Informations</a>
        </div>
    </div>
    <ul class="level1-styles collapse show" id="id0">
    
        <li class="dropdown yamm-fw"> <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="dropdown yamm-fw"> <a href="{{ url('what-we-offer') }}">What we offer</a>
            </li>
            @forelse ($menus as $menu)
                <li class="dropdown"> <a
                        href="{{ url('menu/' . $menu->slug) }}">{{ $menu->menu_name }}</a> 
                    </li>
            @empty
            @endforelse
            <li class="dropdown d-none d-lg-block"> <a href="{{ url('shops') }}">Shop</a> </li>
            <li class="dropdown"> <a href="{{ url('track-order') }}">Track
                    Order</a> </li> 

    </ul>
</div>

 

{{-- Account sidebar --}}
<div id="mySidepanelAccount" class="sidepanel sidepaneldash d-lg-none" style="height: 100vh;">
    <div class="side-menu-header ">
        <div class="side-menu-close" onclick="closeNavAccount()">
            <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z">
                </path>
            </svg>
        </div>
        <div class="side-login px-3 pb-3" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
            <a href=""></a>
            <a style="font-size: 16px" href="#">Dashboard</a>
        </div>
    </div>
    <div class="d-flex" style="justify-content: space-between;padding: 10px;">
        @if (isset(Auth::user()->profile))
            <img src="{{ asset(Auth::user()->profile) }}" alt=""
                style="border-radius: 50%; height: 38px;">
        @else
            <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                style="border-radius: 50%; height: 38px;">
        @endif
        @if (isset(Auth::user()->name)) 
            <div class="svg_text" style="font-size: 14px;padding-top: 8px;font-weight: bold;">{{Auth::user()->name}}</div>
        @else 
        @endif
        
    </div>
    @if (isset(Auth::user()->my_referral_id))
        <div class="card">
       
            <div class="col-lg-12 col-12" style="text-align: center;padding-right: 10px;padding-bottom: 20px;">
                <input type="text" value="{{ url('/register') }}/{{ Auth::guard('web')->user()->my_referral_id }}" id="referralcode" hidden
                    style="color: black;width: 100%; border: none; font-weight: bold;">
                <button id="copyrefcode" style="background: skyblue;border: #081a33; color:#fff;" class="btn btn-primary">Copy Referral
                    Code</button>
            </div>
        </div>
    @else
         
    @endif
    
    <div class="sidebar-widget-title py-3">
        <span>Menu</span>
    </div>
    <ul class="level1-styles collapse show" id="id0">   
        <li class="dropdown">
            <a href="{{ url('user/dashboard') }}" class="active">
                <i class="icon fa fa-dashboard category-icon"></i>
                <span class="category-name">
                    Dashboard
                </span>
            </a>
        </li>

        <li class="dropdown">
            <a href="{{ url('user/wallets') }}" class="">
                <i class="icon fa fa-ticket category-icon"></i>
                <span class="category-name">
                    Wallet </span>
            </a>
        </li>

        <li class="dropdown">
            <a href="{{ url('user/purchase_history') }}" class="">
                <i class="icon fa fa-file-text category-icon"></i>
                <span class="category-name">
                    Orders </span>
            </a>
        </li>

        <li class="dropdown">
            <a href="{{ url('track-order') }}" class="">
                <i class="icon fa fa-file-text category-icon"></i>
                <span class="category-name">
                    Track Order
                </span>
            </a>
        </li>
        <li class="dropdown">
            <a href="{{ url('user/profile') }}" class="">
                <i class="icon fa fa-user category-icon"></i>
                <span class="category-name">
                    Manage Profile
                </span>
            </a>
        </li>
        <li class="dropdown">
            <a href="{{ url('user/referral-user') }}" class="">
                <i class="icon fa fa-user category-icon"></i>
                <span class="category-name">
                    Referral User
                </span>
            </a>
        </li>

        <li class="dropdown">
            <a href="{{ url('user/generation') }}" class="">
                <i class="icon fa fa-user category-icon"></i>
                <span class="category-name">
                    Generation User
                </span>
            </a>
        </li>

        <li class="dropdown">
            <a href="{{ url('user/support_ticket') }}" class="">
                <i class="icon fa fa-ticket category-icon"></i>
                <span class="category-name">
                    Support Ticket </span>
            </a>
        </li>
        <li class="dropdown" style="background: #157ed2;position: fixed;z-index: 999;bottom: 0;width: 100%;">
            <a href="{{ url('logout') }}" class="" style="font-size: 20px;padding: 11px;">
                <i class="icon fa fa-sign-out category-icon" style="color: white;padding-top: 5px;"></i>
                <span class="category-name" style="color: white;padding-left: 120px;">
                    LOGOUT
                </span>
            </a>
        </li>
    </ul>
</div>

<div class="modal" id="loadingreload">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center">
            <i class="spinner fa fa-spinner fa-spin" style="    color: red; font-size: 70px;  padding: 22px;"></i>
            <h4 style="font-size: 25px;color: red;padding-bottom: 20px;">Cart is Empty... Reloading...........</h4>
        </div>
    </div>
</div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

{{-- csrf --}}
<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<script>
    var token = $("input[name='_token']").val();

    function checkcart() {
        $.ajax({
            type: 'GET',
            url: '{{ url('get-checkcart-content') }}',

            success: function(response) {
                $('#checkcartview').html('');
                $('#checkcartview').append(
                    response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function removeFromCartItemHead(rowId) {

        $.ajax({
            type: 'POST',
            url: '{{ url('remove-cart') }}',
            data: {
                _token: token,
                rowId: rowId,
            },

            success: function(response) {
                if (response == 'empty') {
                    $('#loadingreload').css({
                        'display': 'flex',
                        'justify-content': 'center',
                        'align-items': 'center'
                    })
                    $('#loadingreload').modal('show');
                    toastr.success('Product remove from Cart');
                    checkcart();
                    viewcart();
                    updatecart();
                    location.reload();
                } else {
                    console.log('hi');
                    toastr.success('Product remove from Cart');
                    checkcart();
                    viewcart();
                    updatecart();
                }


            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function viewcart() {
        $.ajax({
            type: 'get',
            url: '{{ url('load-cart') }}',

            success: function(response) {
                $('#cart-summary').empty().append(
                    response);
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

    function openLgNav() {
        document.getElementById("mySidepanel").style.width = "360px";
    }

    function openNav() {
        closeNavMenu();
        document.getElementById("mySidepanel").style.width = "260px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }

    function closelgNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }


    function openNavMenu() {
        document.getElementById("mySidepanelMenu").style.width = "260px";
        closeNav();
    }

    function closeNavMenu() {
        document.getElementById("mySidepanelMenu").style.width = "0";
    }

    function openLgNav() {
        document.getElementById("mySidepanel").style.width = "360px";
    }

    function openNav() {
        closeNavMenu();
        document.getElementById("mySidepanel").style.width = "260px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }

    function closelgNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }


    function openNavMenu() {
        document.getElementById("mySidepanelMenu").style.width = "260px";
        closeNav();
    }

    function closeNavMenu() {
        document.getElementById("mySidepanelMenu").style.width = "0";
    }

    function openNavAccount() {
        closeNav();
        document.getElementById("mySidepanelAccount").style.width = "260px";
    }

    function closeNavAccount() {
        document.getElementById("mySidepanelAccount").style.width = "0";
    }
</script>
