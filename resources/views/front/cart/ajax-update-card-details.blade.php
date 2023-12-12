<table>
    <tbody>
    @php($subtotal = 0)
    @php($total_price = 0)
    @foreach($carts as $cart)
        <?php
        $full_name = $cart->name;
        $position = strpos($full_name, '<br/>');
        $name = substr($full_name, 0, $position);
        $details = substr($full_name, $position);
        $subtotal = $cart->price * $cart->qty;
        //            $total_tax += $cart->tax;
        //            $total_sd += $cart->options->sd;
        //            echo $name;
        ?>
        <tr>
            <td style="width: 50%;">
                <span class="product_name">{{$name}}</span></td>
            <td style="width: 5%;">
                <a href="#cart_{{$cart->id}}" data-toggle="collapse"><i
                            class="fa fa-angle-down" style=""></i></a>
            </td>
            <td style="width: 10%;">
                <span class="quantity">
                    <div class="minus-circle">
                        <form class="UpdateToCart"
                              action="{{-- route('update-cart-product')  --}}"
                              method="post">
                        {{csrf_field()}}
                            <input type="hidden" name="qty" id=""
                                   value="{{(int)$cart->qty - 1}}">
                        <input type="hidden" name="rowId" id=""
                               value="{{$cart->rowId}}">
                        <button type="submit"><i
                                    class="fa fa-minus-circle"></i></button>
                        </form>
                    </div>
                    <div class="item-qty">{{$cart->qty}}</div>
                    <div class="plus-circle">
                        <form class="UpdateToCart"
                              action="{{-- route('update-cart-product')  --}}"
                              method="post">
                        {{csrf_field()}}
                            <input type="hidden" name="qty" id=""
                                   value="{{(int)$cart->qty + 1}}">
                            <input type="hidden" name="rowId" id=""
                                   value="{{$cart->rowId}}">
                        <button class="plus-circle" type="submit"><i
                                    class="fa fa-plus-circle"></i></button>
                    </form>
                    </div>
                </span>
            </td>
            <td style="width: 40%;text-align: center;">
                <span class="">৳ {{Help::getIntegralPart($subtotal)}}</span>
                {{--@php($total_price += $subtotal)--}}

                <div class="times-circle">
                    <form class="UpdateToCart" action="#" method="post">
                        {{csrf_field()}}
                        {{--<input type="hidden" name="qty" id="" value="{{(int)$cart->qty + 1}}">--}}
                        <input type="hidden" name="rowId" id=""
                               value="{{$cart->rowId}}">
                        <button type="submit"><i class="fa fa-times-circle"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <div id="cart_{{$cart->id}}" class="collapse">
                    {!! $cart->options->short_description !!}
                    {!! $details !!}
                </div>
            </td>
        </tr>

    @endforeach
    </tbody>

</table>


{{--<span id="totalPrice" style="display: none;">{{Session::get('totalPrice')}}</span>--}}
<span style="display: none" id="grandTotal"> {{Session::get('grandTotal')}}  </span>
<span style="display: none" id="subTotal"> {{Help::getIntegralPart(Session::get('totalPrice'))}}  </span>
<span style="display: none" id="totalTax"> {{Session::get('totalTax')}}  </span>
<span style="display: none" id="totalSD"> {{Session::get('totalSD')}}  </span>
<span style="display: none" id="couponApplied"> {{Session::get('couponApplied')}}  </span>