<div class="container-fluid bg-white">
    <div class="row deli_loc_row">
        <div class="col-md-4">
            <div class="delivery-">
                <img src="{{asset('/')}}front/assets/imgs/{{$icon}}.png" width="25px">
                <span>Mode:</span> {{ Session::get('Mode') }}
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0px;">
            <div class="location-">
                            <span style="float: left">
                            <i name="location" style="color:#95989a" class="icon icon-md ion-md-location"
                               aria-label="location-" ng-reflect-name="location"></i>
                            <span style="padding-left: 5px;"> Location :</span>
                            </span>
                <span id="ellipsis">{{ Session::get('Location') }}</span>
                <input type="hidden" name="shiftingMode" value="{{ $mode }}">
                <button type="button" onclick="event.preventDefault();" data-toggle="modal"
                        data-target="#changeLocationModal"
                        class="btn btn-outline-secondary btn-sm text-uppercase">Change
                </button>
                {{-- <span id="expand_address"><i class="fa fa fa-angle-down icon"></i></span>--}}
            </div>
        </div>
    </div>
</div>