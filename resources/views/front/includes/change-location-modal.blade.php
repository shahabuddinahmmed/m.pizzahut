<div class="modal fade" id="changeLocationModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="sr_wrapper" style="padding: 15px 0px 15px 40px;font-size: 13px;text-transform: unset;font-family: inherit;">
                    <span style="color: #858585;"> <i class="fas fa-map-marker-alt"></i> Delivering to: </span>
                    <span style="margin-right: 10px;">{{ Session::get('Location') }}</span>
                </div>
                <div class="sr_back_button" data-dismiss="modal">
                    <div class="text-right" data-dismiss="modal"><a href="{{route('/')}}"><i class="fa fa-times icon"></i></a></div>
                </div>
            </div>
            <div class="modal-body">
                <button type="button" onclick="event.preventDefault();" data-toggle="modal" data-target="#searchLocationModal" class="change_location">Change</button><br/>
                <a href="{{route('/')}}"><button data-dismiss="modal" type="button" class="continue_location">Continue</button></a>
            </div>
        </div>

    </div>
</div>