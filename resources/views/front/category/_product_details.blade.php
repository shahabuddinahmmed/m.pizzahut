<div class="modal fade" id="prd_{{$product->id}}" tabindex="3" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <img class="custom-top-img" src="{{asset('/')}}front/assets/imgs/2503.jpg"
                 alt="{{$product->title}}">
            <div class="modal-header">
                <div class="sr_back_button" data-dismiss="modal">
                    <a href="{{route('/')}}"><i class="fa fa-times-circle icon" style="color: #fff;"></i></a>
                </div>
                <h4 class="modal-title cust_title pizza-title">{{$product->title}}</h4>
            </div>
            <div class="modal-body">
                <div class="pizza-desc">{{$product->short_description}}</div>
                <div id="full_name"></div>
                <div class="pizza-builder-group-title" data-toggle="collapse"
                     data-target="#size_{{$product->id}}">Select Pizza Size
                </div>
                <div id="size_{{$product->id}}" class="collapse in">
                    <table width="100%">
                        <theah>
                            <tr>
                                <th width="80%"></th>
                                <th width="20%"></th>
                            </tr>
                        </theah>
                        <tbody id="product_content">
                        @php($checked = 'fa-check')
                        @if ($product->price_family > 0)
                            <tr>
                                <td>
                                    <div class='pizza-builder-group-item pizzaName'>
                                        Family
                                    </div>
                                    <div class='pizzaPrice'
                                         style='visibility: hidden;height: 0px;'>{{$product->price_family}}</div>
                                </td>
                                <td class='custom_piza_check' data-name='product'
                                    data-size_id="{{$product->id.'001'}}"
                                    data-price="{{$product->price_family}}"
                                    data-product_number={{$product_number}}
                                            data-size='price_family'>
                                    <i aria-hidden='true'
                                       class='fa {{$checked}}'></i>
                                </td>
                            </tr>
                            @php($checked = 'fa-plus')
                        @endif
                        @if($product->price_medium > 0)
                            <tr>
                                <td>
                                    <div class='pizza-builder-group-item pizzaName'>
                                        Medium
                                    </div>
                                    <div class='pizzaPrice'
                                         style='visibility: hidden;height: 0px;'>{{$product->price_medium}}</div>
                                </td>
                                <td class='custom_piza_check' data-name='product'
                                    data-size_id="{{$product->id.'002'}}"
                                    data-price="{{$product->price_medium}}"
                                    data-product_number={{$product_number}}
                                            data-size='price_medium'>
                                    <i aria-hidden='true'
                                       class='fa {{$checked}}'></i>
                                </td>
                            </tr>
                            @php($checked = 'fa-plus')
                        @endif
                        @if($product->price_personal > 0)
                            <tr>
                                <td>
                                    <div class='pizza-builder-group-item pizzaName'>
                                        Personal
                                    </div>
                                    <div class='pizzaPrice'
                                         style='visibility: hidden;height: 0px;'>{{$product->price_personal}}</div>
                                </td>
                                <td class='custom_piza_check' data-name='product'
                                    data-size_id="{{$product->id.'009'}}"
                                    data-price="{{$product->price_personal}}"
                                    data-product_number={{$product_number}}
                                            data-size='price_personal'
                                >
                                    <i aria-hidden='true'
                                       class='fa {{$checked}}'></i>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="pizza-builder-group-title" data-toggle="collapse"
                     data-target="#crust_{{$product->id}}">Select Pizza Crust
                </div>
                <div id="crust_{{$product->id}}" class="collapse in">
                    <table width="100%">
                        <theah>
                            <tr>
                                <th width="10%"></th>
                                <th width="50%"></th>
                                <th width="20%"></th>
                                <th width="10%"></th>
                                <th width="10%"></th>
                            </tr>
                        </theah>
                        <tbody id="crust_content">
                        @php($crusts = $product->ingredients)
                        @php($all_crust = $product->ingredients->all())
                        @if(count($all_crust) > 0)
                            @php($ingredient1 = $all_crust[0])

                            <tr data-price_family="{{$ingredient1['price_family']}}"
                                data-price_medium="{{$ingredient1['price_medium']}}"
                                data-price_personal="{{$ingredient1['price_personal']}}">
                                <td>
                                    <div class="pizza-builder-group-item pizzaName">
                                        {{$ingredient1->name}}
                                    </div>
                                </td>
                                <td class='group-item-price'>
                                    <span class="pizzaPrice">{{$ingredient1[$pizza_size]}}</span>
                                </td>
                                <td class="custom_piza_check"
                                    data-name="crust"
                                    data-ingredient_id="{{$ingredient1->id}}"
                                    data-size_id="{{$product->id.'00'.$ingredient1->id}}"
                                >
                                    <i class="fa fa-check text-right"
                                       aria-hidden="true"></i>
                                </td>
                            </tr>
                        @endif
                        @if(count($all_crust) > 1)
                            @php($ingredient2 = $all_crust[1])
                            <tr data-price_family="{{$ingredient2['price_family']}}"
                                data-price_medium="{{$ingredient2['price_medium']}}"
                                data-price_personal="{{$ingredient2['price_personal']}}"
                                @if($pizza_size != 'price_medium' && in_array($product->category_id, [4,8,9,6]))
                                style="display: none;"
                                    @endif>

                                <td>
                                    <div class="pizza-builder-group-item pizzaName">
                                        {{$ingredient2->name}}
                                    </div>
                                </td>
                                <td class='group-item-price'>
                                    <span class="pizzaPrice">{{$ingredient2[$pizza_size]}}</span>
                                </td>
                                <td class="custom_piza_check"
                                    data-name="crust"
                                    data-ingredient_id="{{$ingredient2->id}}"
                                    data-size_id="{{$product->id.'00'.$ingredient2->id}}">
                                    <i class="fa fa-plus text-right"
                                       aria-hidden="true"></i>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="pizza-builder-group-title" data-toggle="collapse"
                     data-target="#active_toppings_{{$product->id}}">Current
                    toppings
                </div>
                <div id="active_toppings_{{$product->id}}" class="collapse in">
                    <table width="100%">
                        <theah>
                            <tr>
                                <th width="10%"></th>
                                <th width="50%"></th>
                                <th width="20%"></th>
                                <th width="20%"></th>
                            </tr>
                        </theah>
                        <tbody id="current_toppings"></tbody>
                    </table>
                </div>
                <div class="pizza-builder-group-title" data-toggle="collapse"
                     data-target="#toppings_{{$product->id}}">Toppings List
                </div>
                <div id="toppings_{{$product->id}}" class="collapse in toppings">
                    <table width="100%">
                        <theah>
                            <tr>
                                <th width="60%"></th>
                                <th width="20%"></th>
                                <th width="20%"></th>
                            </tr>
                        </theah>
                        <tbody id="toppings_content">
                        @php($toppings = $product->addons)
                        @php($toppings = $product->addons)
                        @foreach($toppings as $addons)
                            <tr data-price_family="{{$addons['price_family']}}"
                                data-price_medium="{{$addons['price_medium']}}"
                                data-price_personal="{{$addons['price_personal']}}">
                                <td>
                                    <div class="pizza-builder-group-item pizzaName">
                                        {{$addons->name}}
                                    </div>
                                </td>
                                <td class='group-item-price'>
                                    <span class="pizzaPrice">{{$addons[$pizza_size]}}</span>
                                </td>
                                <td class="custom_piza_check" data-name="toppings">
                                    <i class="fa fa-plus text-right"
                                       aria-hidden="true"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="qty_card">
                    <table>
                        <tr>
                            <td width="80%"><span class="storename">Quantity</span></td>
                            <td width="20%">
                                <span class="storename quantity">
                                    <div class="minus-circle">
                                        <button id="minus-circle" type="button">
                                            <i class="fa fa-minus-circle"></i></button>
                                    </div>
                                    <div class="item-qty"> 1 </div>
                                    <div class="plus-circle">
                                        <button id="plus-circle" type="button"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div><!-- .store_card -->
            </div>
            <div class="modal-footer">
                <form action="#" method="post">
                    <input type="hidden" name="product_id">
                    <input type="hidden" name="product_virtual_id" value="786">
                    <input type="hidden" name="product_name">
                    <input type="hidden" name="product_qty" min="1">
                    <input type="hidden" name="product_price">
                    <input type="hidden" name="product_image">
                    <button type="button" class="checkout_btn addToCustomCart"> Add To
                        Cart <span class="text-right ml-5"
                                   id="total_price">00.00</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>