@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Customer Login
@endsection
@section('body')
    <div class="main-content">
        <style>
            .sr_back_button{
                float: left;

            }
        </style>
    @include('front.includes.back-header')
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 44px;">
                <!--notification menu end -->
                <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase;color: #424242;padding: 27px 0px 15px 0px; font-weight: 600; text-align: center">
                    Track Order
                </div>

                <div class="contain-fluid">
                    <div class="login_wrapper">
                        <table class="table">
                            <theah>
                                <tr>
                                    @php($i = 1)
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Order Details</th>
                                    <th>Order Status</th>
                                </tr>
                            </theah>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->id}}</td>
                                <td>
                                    @php($order_details = $order->order_details)
                                    <ul>
                                        @foreach($order_details as $order_detail)
                                            <li>
                                                {{$order_detail->product_name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- The Modal -->


                </div>
            </div>
        </div>
        <!-- End of .clearfix -->

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Login Success Full
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- main content end-->
@endsection