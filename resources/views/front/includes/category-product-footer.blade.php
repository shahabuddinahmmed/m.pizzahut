<div class="category-product-footer">
    <a class="btn viewcart_button" href="{{route('cart')}}" onclick="return check_endtime()">
        <span _ngcontent-c8="" class="cart-count" float-left="">{{Cart::count()}}</span>
        View Cart
        <span _ngcontent-c8="" class="cart-cost taka" float-right="">{{Session::get('grandTotal')}}</span>
    </a>
    
 
    <div class="tab">

        <a href="{{route('all-deals')}}">
            <button class="tablink">Deals</button>
        </a>
        <a href="{{route('all-pizza')}}">
            <button class="tablink {{ ($active_link['link']=='pizza') ? 'active' :'' }}">Pizza</button>
        </a>
        <a href="{{route('all-pasta')}}">
            <button class="tablink">Pasta</button>
        </a>
        <a href="{{route('all-appetisers')}}">
            <button class="tablink">Appetisers</button>
        </a>
        <a href="{{route('all-drinks')}}">
            <button class="tablink">Drinks</button>
        </a>
        <a href="{{route('all-desserts')}}">
            <button class="tablink">Desserts</button>
        </a>
        <a href="{{route('all-rice')}}">
            <button class="tablink">Rice</button>
        </a>
    </div>
    @if(isset($is_pizza) && $is_pizza==1)
    @include('front.includes.pizza_menu')
    @endif
</div>


