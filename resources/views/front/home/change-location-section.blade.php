<div class="selection  shadow-lg has_location" style="background-color: #fff;display: none;">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;width: 100%;font-size: 16px;margin: 20px 0px 10px 0px;">
                <span style="color: #858585;"> <i class="fas fa-map-marker-alt"></i> Delivering to: </span><br/>
                <span style="margin-right: 10px;">{{ Session::get('Location') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style=" text-align: center; width: 100%; font-size: 14px;">
                <button type="button" onclick="showSetLocation()" class="change_location">Change</button><br/>
                @php $selectHomePage = \App\HomePageSelect::find(1) @endphp
                @if ($selectHomePage->selected_value==1)
                    <a href="{{route('all-pizza')}}"><button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>
                @elseif($selectHomePage->selected_value==2)
                    <a href="{{route('all-pasta')}}"><button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>
                @elseif($selectHomePage->selected_value==3)
                    <a href="{{route('all-appetisers')}}"><button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>
                @elseif($selectHomePage->selected_value==4)
                    <a href="{{route('all-deals')}}"><button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>
                @elseif($selectHomePage->selected_value==5)  
                    <a href="{{route('all-drinks')}}"><button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>
                @endif
                {{--<button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>--}}
            </div>
        </div>
    </div>

</div>

    {{--<span style="color: #858585;"> <i class="fas fa-map-marker-alt"></i> Delivering to: </span>
    <span style="margin-right: 10px;">{{ Session::get('Location') }}</span>
    <button type="button" onclick="showSetLocation()" class="change_location">Change</button><br/>
    <a href="{{route('all-pizza')}}"><button data-dismiss="modal" type="button" class="continue_location"> See all deals & menus </button></a>
--}}
<script !src="">
    var hasNotLocation = document.getElementsByClassName("no_location")[0];
    var hasLocation = document.getElementsByClassName("has_location")[0];
    window.onload = function () {
        let storeID = '{{Session::has('StoreID')}}';
        if(storeID){
            hasLocation.style.display = "block";
            hasNotLocation.style.display = "none";
        }else{
            hasNotLocation.style.display = "block";
            hasLocation.style.display = "none";
        }
    };
    function showSetLocation(){
        hasNotLocation.style.display = "block";
        hasLocation.style.display = "none";
    }
</script>