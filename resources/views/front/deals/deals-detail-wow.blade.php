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
        .col {
            padding: 0px;
        }

        @media screen and (max-width: 568px) and (min-width: 321px) {
            .radio-group {
                margin-top: 5px;
                margin-left: 10px;
                width: 150px;
            }
            .modal-dialog {
                width: 100%;
                margin: 0px auto;
            }

            .sticky-header .main-content {
                padding-top: 0px;
                margin-top: -20px;
            }
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
                        <div class="sr_back_button"><a href="{{ $back_button }}"><i
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
                                    <div class="col-md-12 bg-white">
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
                    <input type="hidden" name="product_id" value="{{$deal->id}}">
                    <input type="hidden" name="product_virtual_id" value="786">
                    <input type="hidden" name="short_description" value="{{$deal->short_description}}">
                    <input type="hidden" name="long_description" value="{{$deal->long_description}}">
                    <input type="hidden" name="product_size" value="{{'Size - '.$deal->pizza_size}}">
                    <input type="hidden" name="product_raw_name" value="{{$deal->title}}">
                    <input type="hidden" name="product_name" value="{{$deal->title}}">
                    <input type="hidden" name="sd">
                    <input type="hidden" name="product_raw_price" value="{{$deal->price}}">
                    <input type="hidden" name="product_price" value="{{$deal->price}}"
                           min="1">
                    <div class="row">
                        <div class="col-md-12 pizza_selection_col-12 selectPizza">
                            <div class="deals-item">
                                <div class="row">
                                    {{--data-toggle="modal" data-target="#choosePizza"--}}
                                    <div class="col-md-10" style="width: 75%;">
                                        <h5 class="deals-pizza-title">Pizza</h5>
                                        <p class="deals-name-description setPizza" data-additional_price="0"
                                           id="pizza_id_1">Choose your Pizza</p>
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
                        <div class="col-md-12 pizza_selection_col-12 optionalPizza optionaledPizza"
                             style="display: none">
                            <div class="deals-item">
                                <div class="row">
                                    {{--data-toggle="modal" data-target="#choosePizza"--}}
                                    <div class="col-md-10" style="width: 75%;">
                                        <h5 class="deals-pizza-title">Pizza</h5>
                                        <p class="deals-name-description setPizza" data-additional_price="0"
                                           id="pizza_id_2">Choose 2nd Pizza</p>
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
                    </div>
                </div>
            </div>

        </div>
        <!-- End of .clearfix -->
    </div>
    <a class="btn viewcart_button addToPrizeCart" style="display: none;">
        {{--<span class="cart-count" float-left="">1</span>--}}
        Add to my cart
        ৳ &nbsp; <span class="cart-cost totalPrice">{{$deal->price}}</span>
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
                    <div class="main-content">
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
                            <div class="scroll-content" style="margin-top: 120px; margin-bottom: 0px;">
                                <!--notification menu end -->
                                <div class="container">
                                    <div class="row">
                                        @php($product_name = '')
                                        @foreach($products as $product)
                                            <?php
                                            $price = 0;
                                            if ($product->price_personal > 0) {
                                                $price = $product->price_personal;
                                            } elseif ($product->price_medium > 0) {
                                                $price = $product->price_medium;
                                            } elseif ($product->price_family > 0) {
                                                $price = $product->price_family;
                                            }
                                            ?>
                                            @if($product_name != $product->category_name)
                                                    <div class="col-xs-12 text-center">
                                                        <div class="toolbar-title toolbar-title-md deals-category-title">
                                                            {{$product->category_name}}
                                                        </div>
                                                    </div>
                                            @endif
                                            <div class="col-xs-6">
                                                <form action="#" method="post" class="eachPizza">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{$price}}"
                                                    >
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
                                                        <p><span class="pro_price"> {{Help::getIntegralPart($price)}}</span></p>
                                                    </div>
                                                    <div class="radio-group">
                                                        @php($checked = 'checked')
                                                        @php($product_number = 0)

                                                        <div class="row ml-0 mr-0 product_content_display">
                                                            @if($product->price_personal > 0)
                                                                <div class="col col-lg col-sm-12" style="border-left:3px solid white;">
                                                                    <input type="radio" name="pizza_size" data-size="price_personal"
                                                                           data-name="product_display"
                                                                           {{$checked}}
                                                                           data-size_id="{{$product->id.'009'}}"
                                                                           data-title="{{' - Personal'}}"
                                                                           data-price="{{$product->price_personal}}"
                                                                           data-product_number={{$product_number++}}
                                                                                   id="personal_size_{{$product->id}}">
                                                                    <label for="personal_size_{{$product->id}}"
                                                                           class="product_size_label">Personal</label>
                                                                </div>
                                                                @php($checked = '')
                                                            @endif
                                                            @if($product->price_medium > 0)
                                                                <div class="col col-lg col-sm-12">
                                                                    <input type="radio" name="pizza_size" data-size="price_medium"
                                                                           data-name="product_display"
                                                                           {{$checked}}
                                                                           data-size_id="{{$product->id.'001'}}"
                                                                           data-title="{{' - Medium'}}"
                                                                           data-price="{{$product->price_medium}}"
                                                                           data-product_number={{$product_number++}}
                                                                                   id="medium_size_{{$product->id}}">
                                                                    <label for="medium_size_{{$product->id}}" class="product_size_label">Medium</label>&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                                @php($checked = '')
                                                            @endif
                                                            @if($product->price_family > 0)
                                                                <div class="col col-lg col-sm-12" style="border-right:3px solid white">
                                                                    <input type="radio" name="pizza_size" data-size="price_family"
                                                                           data-name="product_display"
                                                                           {{$checked}}
                                                                           data-size_id="{{$product->id.'000'}}"
                                                                           data-title="{{' - Family'}}"
                                                                           data-price="{{$product->price_family}}"
                                                                           data-product_number={{$product_number}}
                                                                                   id="family_size_{{$product->id}}">
                                                                    <label for="family_size_{{$product->id}}" class="product_size_label">Family</label>&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @php($product_name = $product->category_name)
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End of .clearfix -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="chooseFreePizza" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="main-content">
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
                            <div class="scroll-content" style="margin-top: 120px; margin-bottom: 0px;">
                                <!--notification menu end -->
                                <div class="container">
                                    <div class="row">
                                        @php($product_name = '')
                                        @foreach($products as $product)
                                            <?php
                                            $price = 0;
                                            if ($product->price_personal > 0) {
                                                $price = $product->price_personal;
                                            } elseif ($product->price_medium > 0) {
                                                $price = $product->price_medium;
                                            } elseif ($product->price_family > 0) {
                                                $price = $product->price_family;
                                            }
                                            ?>
                                            @if($product_name != $product->category_name)
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        {{$product->category_name}}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-xs-6">
                                                <form action="#" method="post" class="eachPizza">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{$price}}"
                                                    >
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
                                                            <p><span class="pro_price"> {{Help::getIntegralPart($price)}}</span></p>
                                                    </div>
                                                    <div class="radio-group">
                                                        @php($checked = 'checked')
                                                        @php($product_number = 0)

                                                        <div class="row ml-0 mr-0 product_content_display">
                                                            @if($product->price_personal > 0)
                                                                <div class="col col-lg col-sm-12" style="border-left:3px solid white;">
                                                                    <input type="radio" name="pizza_size" data-size="price_personal"
                                                                           data-name="product_display"
                                                                           {{$checked}}
                                                                           data-size_id="{{$product->id.'009'}}"
                                                                           data-title="{{' - Personal'}}"
                                                                           data-price="{{$product->price_personal}}"
                                                                           data-product_number={{$product_number++}}
                                                                                   id="extra_personal_size_{{$product->id}}">
                                                                    <label for="extra_personal_size_{{$product->id}}"
                                                                           class="product_size_label">Personal</label>
                                                                </div>
                                                                @php($checked = '')
                                                            @endif
                                                            @if($product->price_medium > 0)
                                                                <div class="col col-lg col-sm-12">
                                                                    <input type="radio" name="pizza_size" data-size="price_medium"
                                                                           data-name="product_display"
                                                                           {{$checked}}
                                                                           data-size_id="{{$product->id.'001'}}"
                                                                           data-title="{{' - Medium'}}"
                                                                           data-price="{{$product->price_medium}}"
                                                                           data-product_number={{$product_number++}}
                                                                                   id="extra_medium_size_{{$product->id}}">
                                                                    <label for="extra_medium_size_{{$product->id}}" class="product_size_label">Medium</label>&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                                @php($checked = '')
                                                            @endif
                                                            @if($product->price_family > 0)
                                                                <div class="col col-lg col-sm-12" style="border-right:3px solid white">
                                                                    <input type="radio" name="pizza_size" data-size="price_family"
                                                                           data-name="product_display"
                                                                           {{$checked}}
                                                                           data-size_id="{{$product->id.'000'}}"
                                                                           data-title="{{' - Family'}}"
                                                                           data-price="{{$product->price_family}}"
                                                                           data-product_number={{$product_number}}
                                                                                   id="extra_family_size_{{$product->id}}">
                                                                    <label for="extra_family_size_{{$product->id}}" class="product_size_label">Family</label>&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @php($product_name = $product->category_name)
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End of .clearfix -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            let rootParent = $('.mainContainer');
            function setPizzaName(){
                let product_raw_name = rootParent.find('input[name=product_raw_name]').val();
                let product_size = rootParent.find('input[name=product_size]').val();
                let long_description = rootParent.find('input[name=long_description]').val();
                // let product_name = rootParent.find('input[name=product_name]').val();
                let full_name = 'Additional Pizza: ';
                $('.selectedPizza').each(function () {
                    let name = $(this).find('.setPizza').html();
                    full_name += name+','
                });
                rootParent.find('input[name=product_name]').val(product_raw_name+'<br/>'+full_name+'<br/>'+long_description);
            }
            function setPizzaPrice(selected_pizza_price){
                rootParent.find('input[name=product_price]').val(selected_pizza_price);
                rootParent.find('input[name=product_raw_price]').val(selected_pizza_price);
                rootParent.find('input[name=sd]').val(Math.round(selected_pizza_price * 0.10));
                $('.totalPrice').html(selected_pizza_price);
            }
            function setFullPizzaPrice(second_pizza_price){
                first_pizza_price = rootParent.find('input[name=product_raw_price]').val();
                total_pizza_price = parseFloat(first_pizza_price) + parseFloat(second_pizza_price);
                rootParent.find('input[name=product_price]').val(total_pizza_price);
                rootParent.find('input[name=sd]').val(Math.round(total_pizza_price * 0.10));
                $('.totalPrice').html(Math.round(total_pizza_price));
            }
            function showPizzaprice(){
                let total_pizza = '{{$deal->pizza_count}}';
                let selected_pizza = $('.container > .row').children('.selectedPizza').length;
                if(parseInt(total_pizza) == selected_pizza)
                    $('.addToPrizeCart').show();
                else
                    $('.addToPrizeCart').hide();
            }

            rootParent.on('click','.selectPizza',function () {
                $('#choosePizza').modal('show');
                $(this).addClass('active');
            });
            rootParent.on('click','.optionalPizza',function () {
                let chooseFreePizza = $('#chooseFreePizza');
                // let totalPrice = $('.totalPrice').html();
                // chooseFreePizza.find('.col-md-3').each(function () {
                //     let __this = $(this);
                //     let optional_pizza_price = __this.find('.pizzaImage').data('price_family');
                //     if(optional_pizza_price > totalPrice){
                //         __this.hide()
                //     }else{
                //         __this.show()
                //     }
                // });
                chooseFreePizza.modal('show');
            });
            $('#chooseFreePizza').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);// Button that triggered the modal
                let recipient = button.data('whatever'); // Extract info from data-* attributes
                let modal = $(this);
                modal.on('click', '.pizzaImage', function (e) {
                    let selectPizza =$('.optionalPizza');
                    let additional_price = $(this).data('price_family');
                    let short_desc = $(this).find('.short_desc').html();
                    let product_title = $(this).parents('.eachPizza').find("input[name='pizza_size']:checked").data('title'); //Family
                    let full_desc = short_desc + product_title;
                    selectPizza.find('.setPizza').html(full_desc);
                    modal.modal('hide');
                    selectPizza.find('i.fa').removeClass('fa-plus').addClass('fa-times-circle').addClass('optional-icon');
                    selectPizza.removeClass('optionalPizza').addClass('selectedPizza');
                    setPizzaName();
                    // $('.addToPrizeCart').attr("disabled", false);
                    setFullPizzaPrice(additional_price);
                    showPizzaprice();
                });
                modal.on('change',"input[name='pizza_size']",function () {
                    let current_product = $(this).parents('.eachPizza');
                    let product_price = current_product.find("input[name='pizza_size']:checked").data('price'); //969
                    current_product.find('.pro_price').html(product_price);
                    current_product.find('.pizzaImage').data('price_family',product_price);
                });
            });
            $('#choosePizza').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);// Button that triggered the modal
                let recipient = button.data('whatever'); // Extract info from data-* attributes
                let modal = $(this);
                modal.on('click', '.pizzaImage', function (e) {
                    let selectPizza =$('.selectPizza.active');
                    let additional_price = $(this).data('price_family');
                    let short_desc = $(this).find('.short_desc').html();
                    let product_title = $(this).parents('.eachPizza').find("input[name='pizza_size']:checked").data('title'); //Family
                    let full_desc = short_desc + product_title;
                    selectPizza.find('.setPizza').html(full_desc);
                    modal.modal('hide');
                    selectPizza.find('i.fa').removeClass('fa-plus').addClass('fa-times-circle').addClass('compulsory-icon');
                    selectPizza.removeClass('active').removeClass('selectPizza').addClass('selectedPizza');
                    setPizzaName();
                    setPizzaPrice(additional_price);
                    $('.optionalPizza').show();
                    showPizzaprice();
                });
                modal.on('change',"input[name='pizza_size']",function () {
                    let current_product = $(this).parents('.eachPizza');
                    let product_price = current_product.find("input[name='pizza_size']:checked").data('price'); //969
                    current_product.find('.pro_price').html(product_price);
                    current_product.find('.pizzaImage').data('price_family',product_price);
                });
            });

            rootParent.on('click', 'i.compulsory-icon', function (e) {
                let parent = $(this).parents('.selectedPizza');
                parent.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus').removeClass('compulsory-icon');
                parent.find('p.setPizza').html('Choose Your Pizza');
                parent.addClass('selectPizza').removeClass('selectedPizza');
                $('.optionaledPizza').hide();
                let optionaledPizza = $('.optionaledPizza');
                optionaledPizza.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus').removeClass('optional-icon');
                optionaledPizza.find('p.setPizza').html('Choose Your Pizza');
                optionaledPizza.addClass('optionalPizza').removeClass('selectedPizza');
                setPizzaName();
                showPizzaprice();
                // $('.addToPrizeCart').attr("disabled", true);
                // $('.addToPrizeCart').hide();
            });
            rootParent.on('click', 'i.optional-icon', function (e) {
                let parent = $(this).parents('.selectedPizza');
                parent.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus').removeClass('optional-icon');
                parent.find('p.setPizza').html('Choose Your Pizza');
                parent.addClass('optionalPizza').removeClass('selectedPizza');
                setPizzaName();
                showPizzaprice();
                // $('.addToPrizeCart').attr("disabled", true);
            });
            $('.addToPrizeCart').on('click',function (event) {
                event.preventDefault();
                var form = rootParent;
                var deal_id = form.find("input[name='product_id']").val();
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
