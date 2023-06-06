@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-{{ $categorysingle->category_name }}
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

{{-- category slug --}}
<input type="hidden" name="category" id="categoryslug" value="{{ $categorysingle->slug }}">

<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <div class="sidebar-module-container m-t-10">
                    <div class="sidebar-filter">
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Range</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder">
                                    @if ($currency == 'BDT')
                                        <span class="min-max"> <span class="pull-left">৳10.00</span> <span
                                                class="pull-right">৳2000.00</span>
                                        </span>
                                    @else
                                        <span class="min-max"> <span
                                                class="pull-left">${{ number_format(10 / $currency, 2) }}</span>
                                            <span class="pull-right">${{ number_format(2000 / $currency, 2) }}</span>
                                        </span>
                                    @endif

                                    <input type="text" id="amount"
                                        style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <!-- /.price-range-holder -->
                                <a type="button" onclick="shownow()" class="lnk btn btn-primary "
                                    style="width: 100%;">Show Now</a>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <h3 class="section-title">shop by</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">Category</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">
                                    @forelse ($categories as $category)
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapse{{ $category->id }}" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> {{ $category->category_name }}
                                                </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapse{{ $category->id }}"
                                                style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <a type="button" id="categoryView"
                                                        onclick="viewcategoryproduct('{{ $category->slug }}')">{{ $category->category_name }}</a>
                                                    <ul>
                                                        @forelse ($category->subcategories as $subcat)
                                                            <li><a type="button" style="cursor: pointer"
                                                                    onclick="viewsubcategoryproduct('{{ $subcat->slug }}')">{{ $subcat->sub_category_name }}</a>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <!-- /.accordion -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        @if (isset($colors))
                            <div class="sidebar-widget wow fadeInUp" style="padding-bottom: 0;">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        @forelse ($colors as $color)
                                            <li><a href="#">{{ $color->value }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                        @else
                        @endif
                        @if (isset($sizes))
                            <div class="sidebar-widget wow fadeInUp" style="padding-bottom: 0;">
                                <div class="widget-header">
                                    <h4 class="widget-title">Size</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        @forelse ($sizes as $size)
                                            <li><a href="#">{{ $size->value }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                        @else
                        @endif
                        @if (isset($weights))
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Weights</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        @forelse ($weights as $weight)
                                            <li><a href="#">{{ $weight->value }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                        @else
                        @endif

                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="search-result-container m-t-10 m-b-10">
                    <div id="myTabContent" class="tab-content category-list" style="padding-top: 0;">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product" id="viewCategoryProduct">

                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <div class="spinner-border text-danger" id="spannerstatus">
                        <i class="spinner fa fa-spinner fa-spin"
                            style="    color: #157ed2; font-size: 70px;  padding: 22px;"></i>
                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
        </div>

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>



<!-- /.body-content -->
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

    $(document).ready(function() {

        var category = $('#categoryslug').val();
        $('#spannerstatus').css('display', 'inline');

        $.ajax({
            type: 'GET',
            url: '{{ url('get/products/by-category') }}',
            data: {
                _token: token,
                category: category,
            },

            success: function(response) {
                $('#spannerstatus').css('display', 'none');
                $('#viewCategoryProduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });

    });

    function shownowpro() {
        $('#spannerstatus').css('display', 'inline');
        var pricerange = $('.price-slider').val();
        var categorynow = $('#categoryslug').val();
        $.ajax({
            type: 'GET',
            url: '{{ url('get/products/by-category') }}',
            data: {
                _token: token,
                category: categorynow,
                price_range: pricerange
            },

            success: function(response) {
                $('#spannerstatus').css('display', 'none');
                $('#viewCategoryProduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }


    function viewcategoryproduct(categoryslug) {
        $('#spannerstatus').css('display', 'inline');

        $.ajax({
            type: 'GET',
            url: '{{ url('get/products/by-category') }}',
            data: {
                _token: token,
                category: categoryslug,
            },

            success: function(response) {
                $('#spannerstatus').css('display', 'none');
                $('#viewCategoryProduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function shownow() {
        $('#spannerstatus').css('display', 'inline');
        var pricerange = $('.price-slider').val();
        var categoryslg = $('#categoryslug').val();
        $.ajax({
            type: 'GET',
            url: '{{ url('get/products/by-category') }}',
            data: {
                _token: token,
                category: categoryslg,
                price_range: pricerange
            },

            success: function(response) {
                $('#spannerstatus').css('display', 'none');
                $('#viewCategoryProduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function viewsubcategoryproduct(subcategoryslug) {
        $('#spannerstatus').css('display', 'inline');
        var pricerange = $('.price-slider').val();

        $.ajax({
            type: 'GET',
            url: '{{ url('get/products/by-subcategory') }}',
            data: {
                _token: token,
                subcategory: subcategoryslug,
                price_range: pricerange
            },

            success: function(response) {
                $('#spannerstatus').css('display', 'none');
                $('#viewCategoryProduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function viewcategoryproduct(categoryslug) {
        $('#spannerstatus').css('display', 'inline');

        $.ajax({
            type: 'GET',
            url: '{{ url('get/products/by-category') }}',
            data: {
                _token: token,
                category: categoryslug,
            },

            success: function(response) {
                $('#spannerstatus').css('display', 'none');
                $('#viewCategoryProduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

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
    #spannerstatus {
        position: absolute;
        top: 50%;
        left: 30%;
    }

    #categoryView {
        padding: 9px;
        font-weight: bold;
        color: black;
        cursor: pointer;
    }

    #categoryView:hover {
        color: #3108d4;
    }

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
