<div class="">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home/category</a></li>
                    <li class='active'>{{ $category->category_name }}</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
   <div class="row">
        @forelse ($categoryproducts as $categoryproduct)
        <div class="col-xs-6 col-sm-6 col-lg-3">
            <div class="product">
                <div class="product-image">
                    <div class="image">
                        <a href="{{ url('product', $categoryproduct->ProductSlug) }}"><img
                                src="{{ asset($categoryproduct->ProductImage) }}" alt=""  id="imagenew"></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag new" style="background: red"><span
                            style="font-size: 14px;">-{{ $categoryproduct->Discount }}%</span>
                    </div>
                </div>
                <!-- /.product-image -->

                <div class="product-info text-left">
                    <h3 class="name" style="height: 31px;"><a
                            href="{{ url('product', $categoryproduct->ProductSlug) }}">{{ $categoryproduct->ProductName }}</a>
                    </h3>
                    <div class="rating rateit-small"></div>
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
                        <button onclick="buynow({{ $categoryproduct->id }})" class="btn btn-primary icon"
                            type="button" style="width:100%;">
                            Buy
                            Now</button>
                    </div>

                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button onclick="addtocart({{ $categoryproduct->id }})" data-toggle="tooltip"
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
            <!-- /.product -->
        </div>
    @empty
        <h2 class="p-4 text-center"><b>No Products found...</b></h2>
    @endforelse
   </div>
</div>
