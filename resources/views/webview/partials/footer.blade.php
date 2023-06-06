<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p style="color:#fff">{{ $basicinfo->address }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p  style="color:#fff">{{ $basicinfo->phone_one }}<br>{{ $basicinfo->phone_two }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">{{ $basicinfo->email }}</a></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-6 col-sm-6 col-md-3" id="smheight">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                            <li><a href="{{ url('venture/terms_codition') }}" title="Terms & Conditions">Terms &
                                    Conditions</a></li>
                            <li><a href="{{ url('venture/faq') }}" title="faq">FAQ</a></li>
                            <li class="last"><a href="{{ url('venture/help_center') }}"
                                    title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="{{ url('venture/about_us') }}">About us</a>
                            </li>
                            <li><a title="Information" href="{{ url('venture/customer_service') }}">Customer Service</a>
                            </li>
                            <!--<li><a title="Addresses" href="{{ url('venture/investor_relation') }}">Investor-->
                            <!--        Relations</a></li>-->
                            <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{ url('venture/shopping_guide') }}" title="About us">Shopping
                                    Guide</a></li>
                            <!--<li><a href="#" title="Blog">Blog</a></li>-->
                            <li><a href="{{ url('venture/company') }}" title="Company">Company</a></li>
                            <li class=" last"><a href="{{ url('venture/contact_us') }}" title="Suppliers">Contact
                                    Us</a></li>
                        </ul>
                        <h4 style="color:white">News Letter</h4>
                        <div class="form-group d-flex">
                            <input type="text" name="subscription" class="form-control" placeholder="Send us your gmail for offers">
                            <button class="btn btn-primary" style="margin-left: -6px;">Subscribe</button>
                        </div>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social" id="smallicon">
                <ul class="link">
                    <li class="fb pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="Facebook"></a>
                    </li>
                    <li class="tw pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="Twitter"></a>
                    </li>
                    <li class="googleplus pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a>
                    </li>
                    <li class="rss pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="RSS"></a>
                    </li>
                    <li class="pintrest pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="PInterest"></a>
                    </li>
                    <li class="linkedin pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="Linkedin"></a>
                    </li>
                    <li class="youtube pull-left">
                        <a target="_blank" rel="nofollow" href="#" title="Youtube"></a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding" id="smallicon">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{ asset('public/webview/assets/') }}/images/payments/1.png" alt="">
                        </li>
                        <li><img src="{{ asset('public/webview/assets/') }}/images/payments/2.png" alt="">
                        </li>
                        <li><img src="{{ asset('public/webview/assets/') }}/images/payments/3.png" alt="">
                        </li>
                        <li><img src="{{ asset('public/webview/assets/') }}/images/payments/4.png" alt="">
                        </li>
                        <li><img src="{{ asset('public/webview/assets/') }}/images/payments/5.png" alt="">
                        </li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>

{{-- footer mobile menu --}}

<div class="bottom-navbar d-block d-lg-none">
    <div class="container" style="padding-right: 0px !important;">
        <div class="row">
            <div class="logo-bar-icons col-lg-12 col" style="margin: 0px">
                <ul class="inline-links d-lg-inline-block d-flex justify-content-between">
                    <li class="text-center">
                        <a class="nav-cart-box" href="{{ url('/') }}">
                            <svg class="svg-inline--fa fa-house nav-box-icon" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="house" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z">
                                </path>
                            </svg><!-- <i class="nav-box-icon fas fa-home"></i> Font Awesome fontawesome.com -->
                            <div class="svg_text" style="font-size: 14px;">Home</div>
                        </a>
                    </li>
                    <li class="text-center">
                        <a id="" href="" class="nav-cart-box">
                            <svg class="svg-inline--fa fa-bookmark nav-box-icon" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="bookmark" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M48 0H336C362.5 0 384 21.49 384 48V487.7C384 501.1 373.1 512 359.7 512C354.7 512 349.8 510.5 345.7 507.6L192 400L38.28 507.6C34.19 510.5 29.32 512 24.33 512C10.89 512 0 501.1 0 487.7V48C0 21.49 21.49 0 48 0z">
                                </path>
                            </svg>
                            <!-- <i class="nav-box-icon fa-solid fa-bookmark"></i> Font Awesome fontawesome.com -->
                            <span class="nav-box-number">0</span>
                            <div class="svg_text" style="font-size: 14px;">Saved</div>
                        </a>
                    </li>
                    <li class="text-center">
                        <a class="nav-cart-box" onclick="openNav()">
                            <svg class="svg-inline--fa fa-table-cells nav-box-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="table-cells" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M448 32C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM152 96H64V160H152V96zM208 160H296V96H208V160zM448 96H360V160H448V96zM64 288H152V224H64V288zM296 224H208V288H296V224zM360 288H448V224H360V288zM152 352H64V416H152V352zM208 416H296V352H208V416zM448 352H360V416H448V352z">
                                </path>
                            </svg><!-- <i class=" nav-box-icon fas fa-th"></i> Font Awesome fontawesome.com -->
                            <div class="svg_text" style="font-size: 14px;">Categories</div>
                        </a>
                    </li>
                    <li class="text-center">
                        <a class="nav-cart-box" href="{{url('cart')}}">
                            <svg class="svg-inline--fa fa-bag-shopping nav-box-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="bag-shopping" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M112 112C112 50.14 162.1 0 224 0C285.9 0 336 50.14 336 112V160H400C426.5 160 448 181.5 448 208V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V208C0 181.5 21.49 160 48 160H112V112zM160 160H288V112C288 76.65 259.3 48 224 48C188.7 48 160 76.65 160 112V160zM136 256C149.3 256 160 245.3 160 232C160 218.7 149.3 208 136 208C122.7 208 112 218.7 112 232C112 245.3 122.7 256 136 256zM312 208C298.7 208 288 218.7 288 232C288 245.3 298.7 256 312 256C325.3 256 336 245.3 336 232C336 218.7 325.3 208 312 208z">
                                </path>
                            </svg>
                            <!-- <i class=" nav-box-icon fas fa-shopping-bag"></i> Font Awesome fontawesome.com -->
                            <div class="svg_text" style="font-size: 14px;">Cart</div>
                        </a>
                    </li>
                    <li class="text-center">

                        @if (Auth::check())
                            <a class="nav-cart-box" href="#" onclick="openNavAccount()">
                                @if (isset(Auth::user()->profile))
                                    <img src="{{ asset(Auth::user()->profile) }}" alt=""
                                        style="    border-radius: 50%; height: 26px;">
                                @else
                                    <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                        style="    border-radius: 50%; height: 26px;">
                                @endif
                                <div class="svg_text" style="font-size: 14px;">Account</div>
                            </a>
                        @else
                            <a class="nav-cart-box" href="{{ url('login') }}">
                                <svg class="svg-inline--fa fa-user nav-box-icon" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="user" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z">
                                    </path>
                                </svg><!-- <i class="nav-box-icon fas fa-user"></i> Font Awesome fontawesome.com -->
                                <div class="svg_text" style="font-size: 14px;">Login</div>
                            </a>
                        @endif

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6434122831ebfa0fe7f777ec/1gtlmds3q';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
