<div class="container">
    <div class="row cols-xs-space cols-sm-space cols-md-space">
        <div class="col-md-8" id="smp">
            <div class="form-default bg-white px-1 py-3" style="padding-top: 10px;margin-bottom: 20px;padding-bottom: 0px !important;border-radius: 4px;">
                <div class="">
                    <div class="">
                        <table class="table-cart border-bottom">
                            <thead>
                                <tr>
                                    <th class="product-image d-lg-block text-center">Image</th>
                                    <th class="product-name" style="text-align: center">Product</th>
                                    <th class="product-price d-none d-lg-table-cell">Price</th>
                                    <th class="product-quanity d-md-table-cell">Qty</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cartProducts as $cartProduct)
                                    <tr class="cart-item">
                                        <td class="product-image d-lg-block">
                                            <a href="#" class="" style="text-align: right;">
                                                <img style="width: 50px;padding-top: 0px;" loading="lazy"
                                                    src="{{ asset($cartProduct->image) }}">
                                            </a>
                                        </td>

                                        <td class="product-name" id="cartpron" style="max-width: 160px;    padding-right: 10px;">
                                            <span class="pr-2 d-block" id="cartproname">{{ $cartProduct->name }}</span>
                                        </td>

                                        <td class="product-price d-none d-lg-table-cell">
                                            <span class="pr-3 d-block"
                                                id="qtyPro{{ $cartProduct->rowId }}">{{ $cartProduct->qty }}</span>
                                            <span class="pr-3 d-block">*
                                                @if ($currency == 'BDT')
                                                    ৳ {{ $cartProduct->price }}
                                                @else
                                                    $
                                                    {{ number_format(intval(str_replace(',', '', $cartProduct->price)) / intval($currency), 2) }}
                                                @endif
                                            </span>
                                        </td>
                                        <input type="text" name="priceOf" id="priceOf{{ $cartProduct->rowId }}"
                                            value="{{ $cartProduct->price }}" hidden>

                                        <td class="product-quantity  d-md-table-cell">
                                            <div class="product-quantity d-flex align-items-center">
                                                <div class="input-group input-group--style-2 pr-3" id="quantityup">

                                                    <input type="number" name="quantity"
                                                        class="form-control input-number text-center"
                                                        id="proQuantity{{ $cartProduct->rowId }}" placeholder="1"
                                                        value="{{ $cartProduct->qty }}" min="1" max="10"
                                                        style="padding: 0"
                                                        onchange="updateQuantity('{{ $cartProduct->rowId }}', this)">
                                                </div>

                                            </div>
                                        </td>
                                        <td class="product-total">
                                            @if ($currency == 'BDT')
                                                <span>৳<span
                                                        id="pricePro{{ $cartProduct->rowId }}">{{ $cartProduct->qty * $cartProduct->price }}</span></span>
                                            @else
                                                <span>$<span
                                                        id="pricePro{{ $cartProduct->rowId }}">{{ $cartProduct->qty * number_format($cartProduct->price / $currency, 2) }}</span></span>
                                            @endif

                                        </td>

                                        <td class="product-remove" style="text-align:center">
                                            <a type="button" style="cursor: pointer"
                                                onclick="removeFromCartItemHead('{{ $cartProduct->rowId }}')"
                                                class="text-right pl-3">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="row align-items-center pt-4">
                    <div class="col-6 col-md-6 col-sm-6" style="margin-top: 0px;">
                        <a href="{{ url('/') }}" class="btn btn-primary link link--style-3" style="margin: 12px;">
                            <i class="la la-mail-reply"></i>
                            Return to shop
                        </a>
                    </div>
                    <div class=" col-6 col-md-6 col-sm-6 text-right" style="   padding-right: 26px;">
                        <a style="background-color: #fd7322;border-color: #fd7322;margin: 12px;" @if (count($cartProducts) > 0) @else disabled @endif href="{{ url('/checkout') }}"
                            class="btn btn-danger link link--style-3" >Next
                            Step</a>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>

        <div class="col-md-4 ml-lg-auto" id="smp">
            <div class="card sticky-top" style="border-radius: 4px;">
                <div class="card-title py-3">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="heading heading-3 strong-400 mb-0">
                                <span style="padding: 10px;font-size: 16px;font-weight: bold;">Summary</span>
                            </h3>
                        </div>

                        <div class="col-6 text-right">
                            <span class="badge badge-md badge-success" style="padding: 6px;    margin-right: 10px;">{{count($cartProducts)}}
                                Items</span>
                        </div>
                    </div>
                </div>

                <div class="card-body">


                    <table class="table-cart table-cart-review">
                        <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cartProducts as $cartProduct)
                                <tr class="cart_item">
                                    <td class="product-name" style="font-size: 14px;">
                                        {{ $cartProduct->name }}
                                        <strong class="product-quantity">× {{ $cartProduct->qty }}</strong>
                                    </td>
                                    <td class="product-total text-right">
                                        @if ($currency == 'BDT')
                                            <span class="pl-4" style="font-size: 14px;">৳
                                                {{ $cartProduct->qty * $cartProduct->price }}</span>
                                        @else
                                            <span class="pl-4"
                                                style="font-size: 14px;">${{ $cartProduct->qty * number_format($cartProduct->price / $currency, 2) }}</span>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    <table class="table-cart table-cart-review">

                        <tfoot>
                            <tr class="cart-subtotal">
                                <th style="font-weight: normal;padding-bottom: 8px;">Subtotal</th>
                                <td class="text-right">
                                    @if ($currency == 'BDT')
                                        <span class="strong-600"
                                            style="font-weight: normal;">৳{{ Cart::subtotal() }}</span>
                                    @else
                                        <span class="strong-600" style="font-weight: normal;">$
                                            {{ number_format(intval(str_replace(',', '', Cart::subtotal())) / intval($currency), 2) }}</span>
                                    @endif
                                </td>
                            </tr>

                            <tr class="cart-shipping">
                                <th style="font-weight: normal;padding-bottom: 8px;">Tax</th>
                                <td class="text-right">
                                    @if ($currency == 'BDT')
                                        <span class="text-italic" style="font-weight: normal;">৳0</span>
                                    @else
                                        <span class="text-italic" style="font-weight: normal;">$0</span>
                                    @endif
                                </td>
                            </tr>

                            <tr class="cart-shipping">
                                <th style="font-weight: normal;padding-bottom: 8px;">Total Shipping</th>
                                <td class="text-right">
                                    @if ($currency == 'BDT')
                                        <span class="text-italic shiop" style="font-weight: normal;">৳0</span>
                                    @else
                                        <span class="text-italic shiop" style="font-weight: normal;">$0</span>
                                    @endif
                                </td>
                            </tr>



                            <tr class="cart-total">
                                <th><span class="strong-600">Total</span></th>
                                <td class="text-right">
                                    @if ($currency == 'BDT')
                                        <strong>৳ <span class="g_total">{{ Cart::subtotal() }}</span></strong>
                                    @else
                                        <strong> <span class="g_total">
                                                ${{ number_format(intval(str_replace(',', '', Cart::subtotal())) / intval($currency), 2) }}</span></strong>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
