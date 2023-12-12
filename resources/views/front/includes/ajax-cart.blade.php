<a href="{{route('cart')}}">
    <span id="cart_subtotal" class="taka">{{Session::get('grandTotal')}}</span>
    <img src="{{asset('/')}}front/assets/imgs/cart-02.png">
    <span id="cart_count">{{Cart::count()}}</span>
</a>
