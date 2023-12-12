<div class="modal fade" id="searchLocationModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="sr_wrapper">
                    <span class="text-center">
                        Your Location
                        @php $selectHomePage = \App\HomePageSelect::find(1) @endphp
                        @if ($selectHomePage->selected_value==1)
                            <input type="hidden" name="destinationURL" value="{{route('all-pizza')}}">
                        @elseif($selectHomePage->selected_value==2)
                            <input type="hidden" name="destinationURL" value="{{route('all-pasta')}}">
                        @elseif($selectHomePage->selected_value==3)
                            <input type="hidden" name="destinationURL" value="{{route('all-appetisers')}}">
                        @elseif($selectHomePage->selected_value==4)
                            <input type="hidden" name="destinationURL" value="{{route('all-deals')}}">
                        @elseif($selectHomePage->selected_value==5)  
                            <input type="hidden" name="destinationURL" value="{{route('all-drinks')}}">  
                        @endif
                    </span>
                </div>
                <div class="sr_back_button" data-dismiss="modal">
                    <a href="{{route('/')}}"><i class="fa fa-times icon"></i></a>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control w-100 searchLocationField" id="pac-input" aria-describedby="emailHelp" placeholder="Search Your Location" style="font-size: 12px;">
                </div>
                <!-- <div class="location-note item item-block item-md">
                    <div class="searchLocation" style="font-size: 13px;float: left;display: block;color: #6ba4e7;text-align: center;cursor: pointer;">
                        <img src="{{asset('/')}}front/assets/imgs/icon-geo.svg" alt="delivery" width="25px"> Find my current location
                    </div>
                </div> -->
            </div>
            <div class="modal-body">

                <div id="map" style="height: 350px; position: relative; overflow: hidden;"></div>
                <!-- <div id="map2" style="height: 350px;"></div> -->
                <div id="infowindow-content">
                    <img src="" width="16" height="16" id="place-icon">
                    <span id="place-name" class="title"></span><br>
                    <span id="place-address"></span>
                </div>
                <div class="col-md-12">
                    <div class="location-note item item-block item-md">
                        <div class="searchLocation"
                            style="font-size: 12px; display: block;color: #6ba4e7;text-align: center;cursor: pointer; width: 100%">
                            <!-- <img src="{{asset('/')}}client_end/images/icon-geo.svg" alt="delevery" width="14px"> -->
                            <button type="button" class="btn btn-secendary btn-block continue_location">Confirm Location</button>
                        </div>
                    </div>
                </div>
                

                <!-- {{--<div class="gps_wrapper searchLocation" style="cursor: pointer">
                    <ion-item style="">
                        <ion-icon item-start="" name="gps" role="img" class="icon icon-md ion-md-gps item-icon" aria-label="gps"
                                  ng-reflect-name="gps" style="padding-right: 10px;">
                        </ion-icon>
                        Use Current Location <br/><span>Using GPS</span>
                    </ion-item>
                </div>--}} -->

                <!-- <div class="recent_wrapper" style="">
                    <ion-list style="">
                        <i color="fill-grey" name="search" role="img" style="color: #e0e0e0;float: left; padding-right: 10px;"
                           class="icon icon-md icon-md-fill-grey ion-md-search" aria-label="search" ng-reflect-color="fill-grey"
                           ng-reflect-name="search"></i>RecentSearches
                    </ion-list>
                </div> -->

                <!-- <div class="location_wrapper" style="">
                    @foreach($recent_searches as $recent_search)
                        <ion-list>
                            <i color="fill-grey" name="location" role="img" style="color: #e0e0e0;float: left; padding-right: 10px;"
                               class="icon icon-md icon-md-fill-grey ion-md-location" aria-label="location" ng-reflect-color="fill-grey"
                               ng-reflect-name="location"></i>
                            <a href="#" onclick="setLocationDetails('{{$recent_search->location}}','{{$recent_search->store}}','{{$recent_search->mode}}')">{{$recent_search->location}}</a>
                        </ion-list><br/>
                    @endforeach
                </div> -->
            </div>
            <div class="modal-footer"></div>
        </div>

    </div>
</div>

<script !src="">
    function setLocationDetails(set_location,set_store,shipping_mode) {
        let destinationURL = $('#searchLocationModal').find("input[name='destinationURL']").val();
        if (set_location.length > 0 && set_store.length > 0) {
            let location = set_location;
            if(shipping_mode == 'takeaway'){
                if (set_store.indexOf(',') > -1)
                {
                }else{
                    location = 'false';
                }
            }
            let url = "{{url('store-filter')}}?location="+encodeURIComponent(location)+"&store="+set_store+"&mode="+shipping_mode+"&destinationURL="+destinationURL+"&save=no";
            // window.location.replace(url);
            window.location.replace(url);
        } else {
            alert('Please Turn On Your Location');
            $(".splash").fadeOut("slow")
        }
    }
</script>