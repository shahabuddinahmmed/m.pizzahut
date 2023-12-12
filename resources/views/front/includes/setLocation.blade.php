<style>
    .gps_wrapper {
        margin-top: 0px !important;
    }
    .search_location{
        padding: 10px 10px 10px 10px;
        border: none;
        text-align:left;
        float: left;
    }
    .scerch_button{
        padding: 0px !important;
        border: 1px #b2b2b2 solid;
        overflow: auto;
    }
    .search-icon{
        float: left;
        padding: 7px;
        color: #e0e0e0;
    }

    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 0%;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        margin-top: 2px;
        background-color: #fff;
        font-family: sans-serif;
        font-size: 13px;
        font-weight: 300;
        margin-left: 10px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 308px;
        border: none;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }

    .pac-container {
        background-color: #FFF;
        z-index: 1050;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .sr_back_button{
        margin-top: 20px;
    }
</style>
<script>
    $(document).ready(function() {
        var sklLatLng = {};

        var script2 = document.createElement('script');
        script2.src = '{{asset('/')}}front/searchLocation.js';			//eqfeed_callback1(	{"type":"FeatureCollection","metadata": ...........)
        document.getElementsByTagName('head')[0].appendChild(script2);
        $('#searchLocationModal').on('show.bs.modal', function (event) {
            $('#pizzaOnLoad').modal('hide');
            var modal = $(this);
            modal.find('.searchLocation').val('');
            let destinationURL = modal.find("input[name='destinationURL']").val();
            let shipping_mode = $("input[name='shiftingMode']").val();
            let set_location = '';
            let set_store = '';
            let long = '';
            let latt = '';
            window.searchinitMap({
                setLocation: function (result,lat,lon) {
                    // console.log(result);
                    // sklLatLng.lat = latitude;
                    // sklLatLng.lng = longitude;
                    // setLocationDetails(result);
                    set_location = result;
                    latt  = lat;
                    long  = lon;
                    locationLog(set_location,latt,long);
                },
                setStore: function (result) {
                    if (shipping_mode == 'delivery') {
                        if(Array.isArray(result)) {
                            if(result.length){
                                if (confirm('Currently you are not in delivery area. Would you like to go for a Take-Away?')) {
                                    shipping_mode = 'takeaway';
                                    set_store = result;
                                    setLocationDetails(set_location, set_store, shipping_mode, destinationURL);
                                } else {
                                    $(".splash").fadeOut("slow");
                                }
                            }else{
                                alert('No Available Outset in your area');
                                $(".splash").fadeOut("slow");
                            }
                        }else{
                            set_store = result;
                            setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                        }
                    } else if (shipping_mode == 'takeaway') {
                        if(!Array.isArray(result)){
                            // if (confirm('You are in a Delivery area. Do you want to Delivery?')) {
                            //     shipping_mode = 'delivery';
                            //     set_store = result;
                            //     setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                            // } else {
                            $(".splash").fadeOut("slow");
                            set_location = 'false';
                            set_store = result;
                            setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                            // }
                        }else{
                            if(result.length){
                                set_store = result;
                                setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                            }else{
                                alert('No Available Outset in your area');
                                $(".splash").fadeOut("slow");
                            }
                        }
                    }
                    // console.log(result);
                }
            })
        });


        $("#searchLocationModal").on('shown.bs.modal', function(){
            $(this).find('.searchLocationField').focus();
        });
        
       
        var script1 = document.createElement('script');
        script1.src = '{{asset('/')}}front/myLocation.js';			//eqfeed_callback1(	{"type":"FeatureCollection","metadata": ...........)
        document.getElementsByTagName('head')[0].appendChild(script1);
        // window.eqfeed_callback1 = function(results){
        //     map.data.addGeoJson(results);
        // }

        $('.searchLocation').on('click',function() {
            // $(".splash").fadeIn("slow");
            let destinationURL = $('#searchLocationModal').find("input[name='destinationURL']").val();
            let shipping_mode = $("input[name='shiftingMode']").val();
            let set_location = '';
            let set_store = '';
            let longitude = '';
            let latitude  = '';
            window.initMap  ({
                sklLatLng:sklLatLng,
                setLocation: function (result,lat,long) {
                    // console.log(result);
                    set_location = result;
                    // setLocationDetails(result);
                    latitude  = lat;
                    longitude = long;
                    locationLog(set_location,latitude,longitude);
                },
                setStore: function (result) {
                    if (shipping_mode == 'delivery') {
                        if(Array.isArray(result)){
                            if(result.length){
                                if (confirm('Currently you are not in delivery area. Would you like to go for a Take-Away?')) {
                                    shipping_mode = 'takeaway';
                                    set_store = result;
                                    setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                                } else {
                                    $(".splash").fadeOut("slow");
                                }
                            }else{
                                alert('No Available Outset in your area');
                                $(".splash").fadeOut("slow");
                            }
                        }else{
                            set_store = result;
                            setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                        }
                    } else if (shipping_mode == 'takeaway') {
                        if(!Array.isArray(result)){
                            // if (confirm('Currently you are in delivery area. Would you like to Delivery?')) {
                            //     shipping_mode = 'delivery';
                            //     set_store = result;
                            //     setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                            // } else {
                            $(".splash").fadeOut("slow");
                            set_location = 'false';
                            set_store = result;
                            setLocationDetails(set_location,set_store,shipping_mode,destinationURL);
                            // }
                        }else{
                            if(result.length) {
                                set_store = result;
                                setLocationDetails(set_location, set_store, shipping_mode, destinationURL);
                            }else{
                                alert('No Available Outset in your area');
                                $(".splash").fadeOut("slow")
                            }
                        }
                    }
                    // console.log(result);
                }
            });
        });



        function setLocationDetails(set_location,set_store,shipping_mode,destinationURL) {
            if (set_location.length > 0 && set_store.length > 0) {
                        {{--            let url = "{{route('save-location',['location'=>':location','store'=>':store','mode'=>':mode'])}}";--}}
                let url = "{{url('store-search')}}?location="+encodeURIComponent(set_location)+"&store="+set_store+"&mode="+shipping_mode+"&destinationURL="+destinationURL;
                // url = url.replace('llll', set_location);
                // url = url.replace('ssss', set_store);
                // url = url.replace('mmmm', shipping_mode);
                window.location.replace(url);
            } else {
                alert('Please Turn On Your Location');
                $(".splash").fadeOut("slow")
            }
        }

        function locationLog(location,latitude,longitude) {
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            var loc  = location;
            var lat  = latitude;
            var long = longitude;
            $.ajax({
                type:'POST',

                url:'insert-location-log',

                data:{loc:loc,lat:lat,long:long},

                success:function(data){
                }
            });


        }

    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeFN4A3eenCTIUYvCI7dViF-N-V5X8RgA&libraries=places,geometry"
        async defer></script>
