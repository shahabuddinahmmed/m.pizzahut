<script !src="">

    $('#productCustomize').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);// Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var modal = $(this);
        var selected_name = $('input[name=pizza_size]:checked').data('name');
        var selected_price = $('input[name=pizza_size]:checked').data('price');
        $.ajax({
            type: 'GET',
            url: "{{URL::to('product-details')}}/" + recipient,
            success: function (msg) {
                var product = JSON.parse(msg);
                console.log(product);
                var product_id = product.id;
                var product_title = product.title;
                var product_short_description = product.short_description;
                var item_quantity = parseInt($('.item-qty').html());
                var full_name = product_title;
                var total_price = selected_price;//product.price_family;
                let checked_fa = 'fa-plus';
                var added_toppings = [];
                modal.find('.modal-body .pizza-title').html(product_title);
                modal.find('.modal-body .pizza-desc').html(product_short_description);
                modal.find('.modal-footer #total_price').html(total_price);
                modal.find('.modal-footer input[name=product_id]').val(product_id);
                modal.find('.modal-footer input[name=product_name]').val(product_title);
                modal.find('.modal-footer input[name=product_price]').val(total_price);
                modal.find('.modal-footer input[name=product_qty]').val(item_quantity);

                let setProducts = function () {
                    let total_product = '';
                    if (product.price_family > 0) {
                        let visual_product = "<tr><td><div class='pizza-builder-group-item pizzaName'>Family</div>" +
                            "<div class='pizzaPrice' style='visibility: hidden' >:product_price</div></td>" +
                            "<td class='custom_piza_check' data-name='product' data-size='price_family'><i aria-hidden='true' class='fa :checked_fa'></i></td></tr>";
                        visual_product = visual_product.replace(':product_price', product.price_family);
                        if (selected_name == 'price_family') {
                            visual_product = visual_product.replace(':checked_fa', 'fa-check');
                        } else {
                            visual_product = visual_product.replace(':checked_fa', 'fa-plus');
                        }
                        total_product += visual_product;
                    }
                    if (product.price_medium > 0) {
                        let visual_product = "<tr><td><div class='pizza-builder-group-item pizzaName'>Medium</div>" +
                            "<div class='pizzaPrice' style='visibility: hidden'>:product_price</div></td>" +
                            "<td class='custom_piza_check' data-name='product' data-size='price_medium'><i aria-hidden='true' class='fa :checked_fa'></i></td></tr>";
                        visual_product = visual_product.replace(':product_price', product.price_medium);
                        if (selected_name == 'price_medium') {
                            visual_product = visual_product.replace(':checked_fa', 'fa-check');
                        } else {
                            visual_product = visual_product.replace(':checked_fa', 'fa-plus');
                        }
                        total_product += visual_product;
                    }
                    if (product.price_personal > 0) {
                        let visual_product = "<tr><td><div class='pizza-builder-group-item pizzaName'>Personal</div>" +
                            "<div class='pizzaPrice' style='visibility: hidden' >:product_price</div></td>" +
                            "<td class='custom_piza_check' data-name='product' data-size='price_personal'><i aria-hidden='true' class='fa :checked_fa'></i></td></tr>";
                        visual_product = visual_product.replace(':product_price', product.price_personal);
                        if (selected_name == 'price_personal') {
                            visual_product = visual_product.replace(':checked_fa', 'fa-check');
                        } else {
                            visual_product = visual_product.replace(':checked_fa', 'fa-plus');
                        }
                        total_product += visual_product;
                    }
                    $('#product_content').html(total_product);
                };

                let setIngredients = function () {
                    let crusts = product.ingredients;
                    let total_ingredients = "<tr>\n" +
                        "                            <td>\n" +
                        "                                <div class=\"pizza-builder-group-item\" >Pan\n" +
                        "                                </div>\n" +
                        "                            </td>\n" +
                        "                            <td>\n" +
                        "                                <span class=\"group-item-price\" >\n" +
                        "                                </span>\n" +
                        "                            </td>\n" +
                        "                            <td class=\"custom_piza_check\" data-name=\"crust\" ><i class=\"fa fa-check text-right\" aria-hidden=\"true\"></i>\n" +
                        "                            </td>\n" +
                        "                        </tr>";
                    for (let i = 0; i < crusts.length; i++) {
                        let crust = "<tr>\n" +
                            "                            <td>\n" +
                            "                                <div class=\"pizza-builder-group-item pizzaName\" >:ingredient_name\n" +
                            "                                </div>\n" +
                            "                            </td>\n" +
                            "                            <td class='group-item-price'>\n" +
                            "                                +<span class=\"pizzaPrice\" >:ingredient_price\n" +
                            "                                </span>\n" +
                            "                            </td>\n" +
                            "                            <td class=\"custom_piza_check\" data-name=\"crust\" ><i class=\"fa fa-plus text-right\" aria-hidden=\"true\"></i>\n" +
                            "                            </td>\n" +
                            "                        </tr>";
                        let ingredient = crusts[i];
                        let ingredient_name = ingredient.name;
                        let ingredient_price = ingredient.price;
                        crust = crust.replace(':ingredient_name', ingredient_name);
                        crust = crust.replace(':ingredient_price', ingredient_price);
                        total_ingredients += crust;
                    }
                    $('#crust_content').html(total_ingredients);
                };
                let setToppings = function (price) {
                    let toppings = product.addons;
                    let total_toppings = '';
                    for (let i = 0; i < toppings.length; i++) {
                        let visual_topping = "<tr>\n" +
                            "                            <td>\n" +
                            "                                <div class=\"pizza-builder-group-item pizzaName\" >:topping_name\n" +
                            "                                </div>\n" +
                            "                            </td>\n" +
                            "                            <td class='group-item-price'>\n" +
                            "                                +<span class='pizzaPrice' >:topping_price\n" +
                            "                                </span>\n" +
                            "                            </td>\n" +
                            "                            <td class=\"custom_piza_check\" data-name=\"toppings\"><i class=\"fa fa-plus text-right\" aria-hidden=\"true\"></i>\n" +
                            "                            </td>\n" +
                            "                        </tr>";
                        let topping = toppings[i];
                        let topping_name = topping.name;
                        let topping_price = topping[price];
                        visual_topping = visual_topping.replace(':topping_name', topping_name);
                        visual_topping = visual_topping.replace(':topping_price', topping_price);
                        total_toppings += visual_topping;
                    }
                    $('#toppings_content').html(total_toppings);

                };

                setProducts();
                setIngredients();
                setToppings(selected_name);
                $('#current_toppings').html('');
                $('.modal-body').off('click').on('click', '.custom_piza_check', function (e) {
                    if ($(this).find('i').hasClass('fa-check')) { //then change back to the original one
                    } else {
                        let item_name = $(this).data('name');
                        let addToppings = function () {
                            let visual_topping = "<tr>\n" +
                                "                            <td>\n" +
                                "                                <div class=\"pizza-builder-group-item pizzaName\" >:addon_name\n" +
                                "                                </div>\n" +
                                "                            </td>\n" +
                                "                            <td class='group-item-price'>\n" +
                                "                                +<span class=\"pizzaPrice\" >:addon_price\n" +
                                "                                </span>\n" +
                                "                            </td>\n" +
                                "                            <td class=\"custom_piza_check\" data-name=\"toppings\" ><i style='visibility: hidden;' class=\"fa fa-check text-right\" aria-hidden=\"true\"></i>\n" +
                                "                            </td>\n" +
                                "                            <td class=\"custom_piza_check\" data-name=\"remove-toppings\"><i class=\"fa fa-times-circle text-right\" aria-hidden=\"true\"></i>\n" +
                                "                            </td>\n" +
                                "                        </tr>";
                            let topping_name = $(this).parent('tr').find('.pizzaName').html();
                            let topping_price = $(this).parent('tr').find('.pizzaPrice').html();
                            visual_topping = visual_topping.replace(':addon_name', topping_name);
                            visual_topping = visual_topping.replace(':addon_price', topping_price);
                            $('#current_toppings').append(visual_topping);
                        }.bind(this);
                        let removeToppings = function () {
                            $(this).parent('tr').remove();
                        }.bind(this);
                        let addCheckIcon = function () {
                            // var this = $(e.currentTarget);
                            $(this).find('i').removeClass('fa-plus').addClass('fa-check');
                            var this_tr = $(this).parents('tr');
                            $(this).closest('tbody').children().not(this_tr).each(function () {
                                $(this).find('i').removeClass('fa-check').addClass('fa-plus');
                            });
                        }.bind(this);
                        let calculateTotalPrice = function () {
                            full_name = product_title + '<br/>' + 'Size - ';
                            total_price = 0;
                            $('.custom_piza_check').each(function () {
                                if ($(this).children('i').hasClass('fa-check')) {
                                    let name = $(this).parent('tr').find('.pizzaName').html();
                                    let price = $(this).parent('tr').find('.pizzaPrice').html();
                                    // let price = $(this).data('price');
                                    if (typeof name !== "undefined") {
                                        full_name += name + '<br/>';
                                    }
                                    if (typeof price !== "undefined") {
                                        total_price += parseFloat(price);
                                    }
                                }
                            });
                            if (full_name.length > 0) {
                                $('#full_name').html(full_name);
                                $('.modal-footer input[name=product_name]').val(full_name);
                            }
                            if (item_quantity > 1)
                                total_price = (total_price * item_quantity).toFixed(2);
                            $('#total_price').html(total_price);
                            $('.modal-footer input[name=product_price]').val(total_price);
                        }.bind(this);
                        let toppingsPrice = function (product_size) {
                            $('#current_toppings').html('');
                            $.when(addCheckIcon()).done(function () {
                                setToppings(product_size);
                            });
                        };
                        if (item_name == 'product') {
                            let product_size = $(this).data('size');
                            console.log(product_size);
                            $.when(toppingsPrice(product_size)).done(function () {
                                calculateTotalPrice();
                            });
                        } else if (item_name == 'toppings') {
                            $.when(addToppings()).done(function () {
                                calculateTotalPrice();
                            });
                        } else if (item_name == 'remove-toppings') {
                            $.when(removeToppings()).done(function () {
                                calculateTotalPrice();
                            });
                        } else {
                            $.when(addCheckIcon()).done(function () {
                                calculateTotalPrice();
                            });
                        }
                    }
                });
                $('input[name="current_toppings"]').change(function () {
                    if (this.checked) {
                        $(this).parents('tr').find('.group-item-price').html('+99')
                        // alert("Checked");
                    } else {
                        $(this).parents('tr').find('.group-item-price').html('')
                    }
                });
                var setTotalPrice = function (qty) {
                    $('.item-qty').html(qty);
                    modal.find('.modal-footer input[name=product_qty]').val(qty);
                    var grand_total_price = (total_price * item_quantity).toFixed(2);
                    $('#total_price').html(grand_total_price);
                    // $('.modal-footer input[name=product_price]').val(grand_total_price);
                };
                $('#minus-circle').click(function () {
                    if (item_quantity > 1) {
                        item_quantity -= 1;
                        setTotalPrice(item_quantity);
                    }
                });
                $('#plus-circle').click(function () {
                    item_quantity += 1;
                    setTotalPrice(item_quantity);
                });
            }
        });
    });


</script>