<div>
    Dear <b>Mr./Ms. {{$customerName}}</b>
    <p>Thank you for ordering Pizza Hut. You have ordered</p>
    <table>
        @foreach($carts as $cart)
            @php($full_name =$cart->name)
            @php($position = strpos($full_name, '<br/>'))
            @php($name = substr($full_name, 0, $position))
            @php($subtotal = $cart->price * $cart->qty)
            <tr>
                <td>{{$name}}</td><td>= TK. {{Help::getIntegralPart($subtotal)}}</td>
            </tr>
        @endforeach
        <tr><td>Total</td><td>= TK. <b>{{$totalAmount}}</b></td></tr>
    </table>
    <p>For For any query Please Call (<b>{{ $contactNumber }}</b>)</p>

    <p>
        Regards <br/>
        <b>Pizza Hut Team</b>
    </p>
</div>