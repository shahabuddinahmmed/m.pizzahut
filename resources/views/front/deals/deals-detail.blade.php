@section('stylesheet')
    <link href="{{asset('/')}}front/build/categoryProduct.css" rel="stylesheet">
    <link href="{{asset('/')}}front/build/deals.css" rel="stylesheet">
    <style>
        .modal-backdrop {
            display: none;
        }

        .modal {
            background: rgba(0, 0, 0, 0.5);
        }

        .selectedPizza > .deals-item, .appetisers > .deals-item {
            border-left: 7px solid green;
        }

        .modal-dialog {
            width: 100%;
            margin: 0px auto;
        }
        .addToPrizeCart{
            display: none;
        }

    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')

    <div class="main-content">
        <div class="header-section">
            <!--notification menu start -->
            @include('front.includes.deals-header')
        </div>

        @unless(empty($back))
            @php($back_button = $back)
        @else
            @php($back_button = url()->previous())
        @endunless
        <div class="container" style="padding: 0px;background-color: #e2e6e8;">
            <div class="row">
                <div class="col-md-2">
                    <div class="toolbar-title toolbar-title-md"
                         style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                        <div class="sr_back_button"><a href="{{route('all-deals')}}"><i
                                        class="fa fa fa-angle-left icon"></i></a></div>
                    </div>
                </div>
                <div class="col-md-10 text-center">
                    <div class="toolbar-title toolbar-title-md"
                         style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                        Your Deals Details
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 120px;">
                <!--notification menu end -->
                <div class="container-fluid" style="border-bottom: 1px solid #efefef;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($deal->image)
                                            <img class="img-fluid" src="{{m_asset($deal->image)}}"
                                                 alt="{{$deal->title}}" width="100%">
                                        @else
                                            <img class="img-fluid" src="{{ asset('/')}}front/assets/imgs/BOGO1.png"
                                                 alt="5 Terre"
                                                 width="100%">
                                        @endif
                                    </div>
                                    <div class="col-md-12 bg-white" style="width: 100%;">
                                        <div class="deal-img-text">
                                            <h6 class="h5-title">{{$deal->title}}</h6>
                                            <p class="title-description">{{$deal->short_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mainContainer" style="border-bottom: 1px solid #efefef;">
                    <input type="hidden" name="product_qty" value="1" min="1">
                    <input type="hidden" name="product_image" value="{{$deal->image}}">
                    <input type="hidden" name="deal_id" value="{{$deal->id}}">
                    <input type="hidden" name="product_virtual_id" value="786">
                    <input type="hidden" name="short_description" value="{{$deal->short_description}}">
                    {{--<input type="hidden" name="long_description" value="{{$deal->long_description}}">--}}
                    <input type="hidden" name="product_size" value="{{'Size - '.$deal->pizza_size}}">
                    <input type="hidden" name="product_raw_name" value="{{$deal->title}}">
                    <input type="hidden" name="product_name" value="{{$deal->title}}">
                    <input type="hidden" name="sd" value="{{round($deal->price/100*10)}}">
                    <input type="hidden" name="product_raw_price" value="{{get_show_price($deal->price,1)}}">
                    <input type="hidden" name="product_price" value="{{get_show_price($deal->price,1)}}"
                           min="1">
                    <div class="row">
                        @php($i=0)
                        @while($i++ < $deal->pizza_count )
                            <div class="col-md-12 pizza_selection_col-12 selectPizza">
                                <div class="deals-item">
                                    <div class="row">
                                        {{--data-toggle="modal" data-target="#choosePizza"--}}
                                        <div class="col-md-10" style="width: 75%;">
                                            <h5 class="deals-pizza-title">{{$i}}. Pizza</h5>
                                            <p class="deals-name-description setPizza" data-additional_price="0"
                                               id="pizza_id_{{$i}}">Choose your Pizza</p>
                                        </div>
                                        <div class="col-md-2 text-center" style="width: 25%;padding-top: 28px;">
                                            {{--<button type="button" class="btn btn-primary" >--}}
                                            {{--Launch demo modal--}}
                                            {{--</button>--}}
                                            {{--<a href="#" style="display: block" onclick="">--}}
                                            <i class="fa fa fa-plus icon"></i>
                                            {{--</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endwhile
                        @if($deal->long_description)
                            <div class="col-md-12 pizza_selection_col-12 appetisers">
                                <div class="deals-item">
                                    <div class="row">
                                        <div class="col-md-10" style="width: 75%;">
                                            <h5 class="deals-pizza-title">Appetisers</h5>
                                            <p class="deals-name-description">
                                                @if($deal->id == '3')
                                                    6 Pieces of BBQ Chicken Wings<br/>
                                                    1 Portion of - <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="garlic_bread_1"
                                                                                         type="radio"
                                                                                         name="long_description"
                                                                                         value="6 Pieces of BBQ Chicken Wings <br/>Garlic Bread Sticks with Dip<br/> 2 Choco Chip Cookies"
                                                                                         checked>
                                                    <label for="garlic_bread_1">Garlic Bread Sticks with Dip </label>
                                                    <br/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="garlic_bread_2"
                                                                                         type="radio"
                                                                                         name="long_description"
                                                                                         value="6 Pieces of BBQ Chicken Wings <br/>Potato Wedges<br/> 2 Choco Chip Cookies">
                                                    <label for="garlic_bread_2">Potato Wedges</label>
                                                    <br/>
                                                    2 Choco Chip Cookies
                                                @elseif($deal->id == '12')
                                                    <input type="radio" name="long_description" value="1 Portion BBQ Chicken Wings (8 Pcs)<br/>
                                                    1 Portion Garlic Bread with Cheese<br/>
                                                    2 Pepsi 500 ml" checked style="display: none;">
                                                    1 Portion BBQ Chicken Wings (8 Pcs)<br/>
                                                    1 Portion Garlic Bread with Cheese<br/>
                                                    2 Pepsi 500 ml
                                                @else
                                                    <input type="radio" name="long_description"
                                                           value="{{$deal->long_description}}" checked
                                                           style="display: none;">
                                                    {!! $deal->long_description !!}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-2 text-center" style="width: 25%;padding-top: 28px;">
                                            <i class="fa icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <!-- End of .clearfix -->
    </div>
    <a class="btn viewcart_button addToPrizeCart">
        Add to my cart ৳ &nbsp; <span class="cart-cost totalPrice">{{get_show_price($deal->price,1)}}</span>
    </a>

    <!-- Modal -->
    <div id="choosePizza" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="main-content" style="padding-top: 0px;">
                        <div class="header-section">
                            <!--notification menu start -->
                            @include('front.includes.deals-header')
                        </div>
                        <div class="container" style="padding: 0px;background-color: #e2e6e8;">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="toolbar-title toolbar-title-md"
                                         style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        <div class="sr_back_button"><a href="#" data-dismiss="modal"><i
                                                        class="fa fa fa-angle-left icon"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-md-10 text-center">
                                    <div class="toolbar-title toolbar-title-md"
                                         style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        Choose Your Pizza
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="scroll-content" style="margin-top: 75px; margin-bottom: 0px;">
                                <!--notification menu end -->
                                <div class="container">
                                    <div class="row">
                                        @if(!empty($favorite_lien_pizza))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Favorite Line
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($favorite_lien_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage" data-additional_price="0.0"
                                                >
                                                    @if($product->image)
                                                        <img class="deals-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="deals-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image" style=" border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                        <div class="center">
                                                            <button class="btn btn-success">Add</button>
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($supreme_lien_pizza))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Supreme Line
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($supreme_lien_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage" data-additional_price="39.53">
                                                    @if($product->image)
                                                        <img class="deals-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="deals-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image" style="border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                        <div class="center">
                                                            <button class="btn btn-success">Add</button>
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($super_supreme_pizza))

                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Super
                                                    Supremes
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($super_supreme_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage" data-additional_price="59.29">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                        <div class="center">
                                                            <button class="btn btn-success">Add</button>
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($veg_delight))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Veg
                                                    Delight
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($veg_delight as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage" data-additional_price="0.0">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                        <div class="center">
                                                            <button class="btn btn-success">Add</button>
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($crown))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Crown
                                                </div>
                                            </div>
                                        @endif
                                        @if($crown !=null)
                                            @foreach($crown as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage" data-additional_price="0.0">
                                                        @if($product->image)
                                                            <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                            <div class="center">
                                                                <button class="btn btn-success">Add</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if(!empty($kabab_crust))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Kabab Crust
                                                </div>
                                            </div>
                                        @endif
                                        @if($kabab_crust !=null)
                                            @foreach($kabab_crust as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage" data-additional_price="0.0">
                                                        @if($product->image)
                                                            <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                            <div class="center">
                                                                <button class="btn btn-success">Add</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if(!empty($battle_beef))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Battle of Beef
                                                </div>
                                            </div>
                                        @endif
                                        @if($battle_beef !=null)
                                            @foreach($battle_beef as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage" data-additional_price="0.0">
                                                        @if($product->image)
                                                            <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                            <div class="center">
                                                                <button class="btn btn-success">Add</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if(!empty($thin_crust))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> THIN CRUST
                                                </div>
                                            </div>
                                        @endif
                                        @if($thin_crust !=null)
                                            @foreach($thin_crust as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage" data-additional_price="0.0">
                                                        @if($product->image)
                                                            <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                            <div class="center">
                                                                <button class="btn btn-success">Add</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if($new_line!=null)
                                            @if(!empty($new_line))
                                                @foreach($new_line as $key=>$new)
                                                    <div class="col-xs-12 text-center">
                                                        <div class="toolbar-title toolbar-title-md deals-category-title">
                                                            {{ $key }}
                                                        </div>
                                                    </div>
                                                    @foreach($new as $product)
                                                        <div class="col-xs-6">
                                                            <div class="polaroid pizzaImage"
                                                                 data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                                @if($product->image)
                                                                    <img class="custom-top-img"
                                                                         src="{{m_asset($product->image)}}"
                                                                         alt="{{$product->title}}"
                                                                         style="width: 100%; border-radius: 3px 3px 0 0;">
                                                                @else
                                                                    <img class="custom-top-img"
                                                                         src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                         alt="No Image"
                                                                         style="width: 100%; border-radius: 3px 3px 0 0;">
                                                                @endif
                                                                <p class="short_desc">{{$product->title}}</p>
                                                                    <div class="center">
                                                                        <button class="btn btn-success">Add</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End of .clearfix -->
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>


@endsection
@section('script')
    <script>
        $('.addToPrizeCart').hide;
        $(function () {
            let rootParent = $('.mainContainer');
            function setPizzaName() {
                let product_raw_name = rootParent.find('input[name=product_raw_name]').val();
                let product_size = rootParent.find('input[name=product_size]').val();
                let long_description = rootParent.find('input[name=long_description]:checked').val();
                // let product_name = rootParent.find('input[name=product_name]').val();
                let full_name = 'Additional Pizza: ';
                $('.selectedPizza').each(function () {
                    let name = $(this).find('.setPizza').html();
                    full_name += name + ','
                });
                rootParent.find('input[name=product_name]').val(product_raw_name + '<br/>' + product_size + '<br/>' + full_name + '<br/>' + long_description);
            }

            function setPizzaPrice() {
                let product_price = rootParent.find('input[name=product_raw_price]').val();
                let full_price = parseFloat(product_price);
                @if($deal->id != '15')
                $('.selectedPizza').each(function () {
                    let price = parseFloat($(this).find('.setPizza').data('additional_price'));
                    full_price += price
                });
                @endif
                    full_price = Number(full_price).toFixed(2);
                rootParent.find('input[name=product_price]').val(full_price);
                $('.totalPrice').html(Math.round(full_price));
            }

            function showPizzaprice() {
                let total_pizza = '{{$deal->pizza_count}}';
                let selected_pizza = $('.container > .row').children('.selectedPizza').length;
                if (parseInt(total_pizza) == selected_pizza)
                    $('.addToPrizeCart').show();
                else
                    $('.addToPrizeCart').hide();
            }

            rootParent.on('click', '.selectPizza', function () {
                $('#choosePizza').modal('show');
                $(this).addClass('active');
            });
            $('#choosePizza').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);// Button that triggered the modal
                let recipient = button.data('whatever'); // Extract info from data-* attributes
                let modal = $(this);
                modal.off('click').on('click', '.pizzaImage', function (e) {
                    let selectPizza = $('.selectPizza.active');
                    let pizza_id = selectPizza.find('.setPizza').attr('id');
                    let additional_price = $(this).data('additional_price');
                    let short_desc = $(this).find('.short_desc').html();
                    selectPizza.find('.setPizza').html(short_desc);
                    selectPizza.find('.setPizza').data('additional_price', additional_price);
                    // $('#'+pizza_id).data('price','10.00');
                    modal.modal('hide');
                    // rootParent.find('input[name=product_price]').val(product_price);
                    selectPizza.find('i.fa').removeClass('fa-plus').addClass('fa-times-circle');
                    selectPizza.removeClass('active').removeClass('selectPizza').addClass('selectedPizza');
                    setPizzaName();
                    setPizzaPrice();
                    showPizzaprice();
                });
            });

            rootParent.on('click', 'i.fa-times-circle', function (e) {
                let parent = $(this).parents('.selectedPizza');
                parent.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus');
                parent.find('p.setPizza').html('Choose Your Pizza');
                parent.addClass('selectPizza').removeClass('selectedPizza');
                setPizzaName();
                setPizzaPrice();
                showPizzaprice();
            });
            $('.addToPrizeCart').on('click', function (event) {
                event.preventDefault();
                var form = rootParent;
                var deal_id = form.find("input[name='deal_id']").val();
                var product_virtual_id = '786';
                var product_name = form.find("input[name='product_name']").val();
                var product_sd = form.find("input[name='sd']").val();
                var product_short_description = '';
                var product_price = form.find("input[name='product_price']").val();
                var product_qty = form.find("input[name='product_qty']").val();
                var product_image = form.find("input[name='product_image']").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: '{{route('add-to-card')}}',
                    // data: {form:form},
                    data: {
                        _token: CSRF_TOKEN,
                        deal_id: deal_id,
                        product_virtual_id: product_virtual_id,
                        product_name: product_name,
                        product_sd: product_sd,
                        product_short_description: product_short_description,
                        product_price: product_price,
                        product_qty: product_qty,
                        product_image: product_image
                    },
                    success: function (msg) {
                        window.location.replace('{{route('all-deals')}}');
                    }
                });
            });
        });
    </script>
@endsection
