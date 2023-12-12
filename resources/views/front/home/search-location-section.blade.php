<div class="selection no_location">

    <!-- Nav tabs Center -->

    <ul class="nav center_tab">

        <li class="active" style="margin-right: 2%">
            <a href="" onclick="shiftingMode('delivery')" data-toggle="tab" style="float: left;">
                <img src="{{asset('/')}}front/assets/imgs/bike.gif" alt="delivery" width="25px"> Delivery
            </a>
        </li>
        <!--<li style="margin-left: 2%">-->
        <!--    <a href="" onclick="shiftingMode('takeaway')" data-toggle="tab" style="float: right;">-->
        <!--        <img src="{{asset('/')}}front/assets/imgs/collection.gif" alt="delivery" width="25px"> Take-Away-->
        <!--    </a>-->
        <!--</li>-->
         <li style="margin-left: 2%">
            <a href="" onclick="shiftingMode('takeaway')"  data-toggle="modal"
               data-target="#searchLocationModal" style="float: right;" >
                <img src="{{asset('/')}}front/assets/imgs/collection.gif" alt="delivery" width="25px"> Take-Away
            </a>
        </li>
    </ul>
    @if(Session::get('message'))
        <div class="alert alert-success" id="success-alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{Session::get('message')}}</strong>
        </div>
@endif
<!--End of Nav tabs Center -->
    <div class="tab-content">
        <div id="faq-cat-1" class="tab-pane fade">
            <div class="segment-width location-bar box-shadow-card">
                <a href="{{route('search-location',['type'=>'delivery'])}}">
                    <div class="scerch_input" full="">
                        {{--<i color="fill-grey" name="search" role="img"
                           class="search-icon icon icon-md icon-md-fill-grey ion-md-search" aria-label="search"
                           ng-reflect-color="fill-grey" ng-reflect-name="search"
                           placeholder="Enter your location"></i>--}}
                        <input type="text" class="search_placeholder" placeholder="Enter your delivery location"/>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </a>
                <div class="location-note item item-block item-md">
                    <div style="margin: 10px 0px 3px -15px;font-size: 13px; float: left;" id="lbl-30">Or
                        click below to {{Session::get('Mode')}}
                        <span>Auto Detect</span> your current location
                    </div>
                </div>
                <!-- <div id="map" style="height: 0%;"></div> -->
            </div>
        </div>
        <div id="faq-cat-2" class="tab-pane fade in active">
            <div id="faq-cat-1" class="segment-width location-bar box-shadow-card">
                <a href="{{--route('product-details',['id'=>$product->id])--}}"
                   onclick="event.preventDefault();" data-toggle="modal"
                   data-target="#searchLocationModal" >
                    <div class="scerch_input">
                        {{-- <i color="fill-grey" name="search" role="img"
                            class="search-icon icon icon-md icon-md-fill-grey ion-md-search" aria-label="search"
                            ng-reflect-color="fill-grey" ng-reflect-name="search"
                            placeholder="Enter your location"></i>
                         <input type="text" class="search_location" placeholder="Search your Location"/>--}}
                        <input type="text" class="search_placeholder" placeholder="Enter your delivery location"/>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </a>
                <div class="location-note item item-block item-md">
                    <div style="margin: 15px 0px 3px 15px;font-size: 13px;float: left;display: block;color: #6ba4e7;text-align: center;touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" class="searchLocation" >
                        <img src="{{asset('/')}}front/assets/imgs/icon-geo.svg" alt="delivery" width="25px"> Find my current location
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="shiftingMode" value="delivery"/>
    </div><!-- <div class="tab-content"> -->

</div>