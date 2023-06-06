<div class="text-cart" style="padding-top: 20px">
    <i class="fa fa-check"></i>
    <h3 style="margin-top:0"><span id="itemCount">{{ count($cartProducts) }}</span> Item added to your cart!</h3>
</div>
<button type="button" id="closebtn" class="btn-close" data-dismiss="modal" aria-label="Close"><span
        aria-hidden="true">×</span></button>
<h4 style="    text-align: center; font-weight: bold;">Cart Items</h4>
<hr style="margin-top: 10px;margin-bottom: 10px">
<div id="itemlest">
    @forelse ($cartProducts as $item)
        <div class="d-flex align-items-center" style="margin-bottom:10px">
            <div class="dc-image">
                <a href="asset($item->image)">
                    <img loading="lazy" src="{{ asset($item->image) }}" class="img-fluid" alt=""
                        style="height: 70px;">
                </a>
            </div>
            <div class="dc-content">
                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                    <a href="/Electric-Hair-Straight-Comb-6Zd5p">
                        {{ $item->name }}
                    </a>
                </span>
                <br>
                <span class="dc-quantity">x{{ $item->qty }}</span>
                <span class="dc-price">
                    @if ($currency == 'BDT')
                        ৳{{ $item->qty * $item->price }}
                    @else
                        ${{ $item->qty * number_format($item->price / $currency, 2) }}
                    @endif

                </span>
            </div>
            <div class="dc-actions">
                <button type="button" onClick="removeFromCartItem('{{ $item->rowId }}')" id="cartIconCloss">
                    ×
                </button>
            </div>
        </div>
    @empty
    @endforelse
</div>
<div class="dc-item py-3">
    <span class="subtotal-text">Subtotal</span>
    <span class="subtotal-amount">
        @if ($currency == 'BDT')
            ৳ <span id="totalAmountCart">{{ Cart::subtotal() }}</span>
        @else
            $ <span
                id="totalAmountCart">{{ number_format(intval(str_replace(',', '', Cart::subtotal())) / intval($currency), 2) }}</span>
        @endif

    </span>
</div>
