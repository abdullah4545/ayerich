@if (count($cartProducts) > 0)
    <div class="cart-item product-summary">
        @forelse ($cartProducts as $item)
            <div class="row">
                <div class="col-xs-4">
                    <div class="image">
                        <a href="#"><img src="{{ asset($item->image) }}" alt="" style="height:auto; width:90%"></a>
                    </div>
                </div>
                <div class="col-xs-6" style="padding-left: 0">
                    <h3 class="name" ><a href="index.php?page-detail" style="font-size: 15px">{{ $item->name }}</a></h3>
                    @if ($currency == 'BDT')
                        <div class="price"> <span class="sign"></span><span
                                class="value">৳{{ $item->price }}</span>
                        </div>
                    @else
                        <div class="price"> <span class="sign">$</span><span
                                class="value">{{ number_format(intval(str_replace(',', '', $item->price)) / intval($currency), 2) }}</span>
                        </div>
                    @endif
                </div>
                <div class="col-xs-1 action" > <a type="button" style="cursor: pointer; font-size:20px; margin-top:5px;"
                        onclick="removeFromCartItemHead('{{ $item->rowId }}')"><i class="fa fa-trash" style="color:#fd7322"></i></a> </div>
            </div>
        @empty
        @endforelse

    </div>
    <!-- /.cart-item -->
    <div class="clearfix"></div>
    <hr>
    <div class="clearfix cart-total">
        <div class="pull-right"> <span class="text">Sub Total :</span>
            @if ($currency == 'BDT')
                <span class="price"> <span class="sign">৳</span><span class="value">{{ Cart::subtotal() }}</span>
                </span>
            @else
                <span class="price"> <span class="sign">$</span><span
                        class="value">{{ number_format(intval(str_replace(',', '', Cart::subtotal())) / intval($currency), 2) }}</span>
                </span>
            @endif
        </div>
        <div class="clearfix"></div>
        <a href="{{ url('/cart') }}" style="font-size: 18px; background:#0f6cb2; color:#fff" class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
    </div>
    <!-- /.cart-total-->
@else
    <div class="clearfix cart-total" style="    background: #e1dcdc;  padding: 10px; font-size: 22px;">
        Nothing here...!
    </div>
@endif
