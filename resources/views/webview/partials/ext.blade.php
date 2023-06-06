<!--<section id="cart_section">-->
                    <!--<div class="dropdownr" id="mydisplaynone">-->
                    <!--    <span class="cat-span">{{ count(Cart::content()) }}</span>-->
                    <!--    <a  type="button"  onclick="checkcart(this)"-->
                    <!--       class="dropdown-btnr" data-toggle="dropdown"><i class="glyphicon glyphicon-shopping-cart"  style="color: #0f6cb2;"></i>-->
                    <!--    </a>-->
                    <!--    <ul class="dropdown-content">-->
                    <!--        <li id="checkcartview">-->

                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--  </div>-->
                    <!--</section>   -->
                    
                    {{-- 
                <div id="mydisplay">
                    <div class="col-xs-4 col-sm-6  logo-holder" id="mydisplay">
                        <a href="{{ url('cart') }}" style="color: white">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart" style="color: #0f6cb2;"></i> </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket">
                                    @if ($currency == 'BDT')
                                        <span class="total-price"> <span class="sign">৳</span><span
                                                class="value">{{ Cart::subtotal() }}</span> </span>
                                    @else
                                        <span class="total-price"> <span class="sign">$</span><span
                                                class="value">{{ number_format(intval(Cart::subtotal()) / intval($currency), 2) }}</span>
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
                
                
                {{-- <button onclick="openNavMenu()" class="navbar-toggle collapsed" type="button"><span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> </button> --}}