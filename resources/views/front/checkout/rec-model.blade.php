@if(isset($recommend->related) && $recommend->related!= null )
    <div class="modal fade" id="pizzaWish" tabindex="-1" role="dialog" aria-labelledby="pizzaWish" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 0 auto;">{{ $recommend->title }} </h4>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="pizzaWish-header"> <h5>Cart Total:<span class="pro_price"> <span id="total">{{Session::get('grandTotal')}}</span></span></h5></div>
                    <div class="wrap-modal-slider">
                        <div class="wish-pizz">
                            @foreach($recommend->related as $rec)
                                <div class="coln">
                                    <div class="card mb-4 pizza-wish">
                                        <img class="card-img-top" src="{{ m_asset($rec->image) }}" data-holder-rendered="true">
                                        <div class="card-body">
                                            <h5>{{ $rec->title }}</h5>
                                            <p class="card-text">{{ $rec->short_description }}</p>
                                            <div class="d-flex justify-content-between align-items-center">

                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    @if($recommend->pizza_size==0)
                                                        <label class="btn btn-sm  btn-secondary active">
                                                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Regular
                                                        </label>
                                                    @elseif($recommend->pizza_size==1)

                                                        <label class="btn btn-sm  btn-secondary">
                                                            <input type="radio" name="options" id="option2" autocomplete="off"> Relular
                                                        </label>
                                                    @else
                                                        <label class="btn btn-sm  btn-secondary">
                                                            <input type="radio" name="options" id="option3" autocomplete="off"> Regular
                                                        </label>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="left-con mt-3">
                                                @if($recommend->pizza_size==0)
                                                    <button type="button" class="btn btn-success" onclick="getOkay({{$rec->id}},'0')">Add <span class="pro_price"> {{ $rec->price_personal }}</span></button>
                                                @elseif($recommend->pizza_size==1)
                                                    <button type="button" class="btn btn-success" onclick="getOkay({{$rec->id}},'1')">Add <span class="pro_price"> {{ $rec->price_medium }}</span></button>
                                                @else
                                                    <button type="button" class="btn btn-success" onclick="getOkay({{$rec->id}},'2')">Add <span class="pro_price"> {{ get_show_price($rec->price_family,$rec->sd) }}</span></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getOkay(id,size){
            $.ajax({
                type:"GET",
                url: "{{ url('rec-cart') }}/"+id+"/"+size,
                success: function (data){
                    $('#total').text(data.total);
                    $('#g_total').text('৳ '+data.total);
                    $('#bill_to').text('৳ '+data.total);
                }
            })
        }
    </script>
@endif


