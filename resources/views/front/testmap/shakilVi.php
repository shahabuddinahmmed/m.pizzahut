<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Map</title>
</head>
<body>
<div id="map" style="height: 300px;width: 600px"></div>
<button onclick="sklMap()"> Locate me </button>
<textarea name="" id="result" cols="30" rows="10"></textarea>
<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    function sklMap() {
        var map, infoWindow, geocoder;
        initMap();
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 6
            });
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder;


            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };


                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);

                    geocoder.geocode({'location': pos}, function(results, status) {
                        if (status === 'OK') {
                            if (results[0]) {
                                // document.getElementById('print').textContent = results[0].formatted_address;
                                console.log(results[0].formatted_address);
                                var locationDetail = results[0].formatted_address;
                                document.getElementById('result').value = locationDetail;
                            } else {
                                window.alert('No results found');
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status);
                        }
                    });


                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeFN4A3eenCTIUYvCI7dViF-N-V5X8RgA&libraries=places,geometry">
</script>
</body>
</html>