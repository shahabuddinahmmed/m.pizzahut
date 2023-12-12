// This example creates a simple polygon representing the Bermuda Triangle.
var infoWindow, geocoder;
var sklLatLng = {};
var addressName = null;


var gulshanDelivery,
    gulshan2Delivery,
    dhanmondiDelivery,
    dhanmondi2Delivery,
    bailyDelivery,
    uttaraDelivery,
    uttara2Delivery,
    mirpurDelivery,
    mirpur2Delivery,
    bhataraDelivery,
    bananiDelivery,
    wariDelivery,
    savarDelivery,
    coxDelivery,
    gulshanDistance,
    gulshan2Distance,
    dhanmondiDistance,
    dhanmondi2Distance,
    bailyDistance,
    uttaraDistance,
    uttara2Distance,
    mirpurDistance,
    mirpur2Distance,
    bhataraDistance,
    bananiDistance,
    savarDistance,
    coxDistance,
    wariDistance,
    chittagongDistance,
    sylhetDistance,
    jamunaDistance;


function searchinitMap({setLocation,setStore}) {

    var gulshanOutlet = new google.maps.LatLng(23.77661, 90.41682);
    var gulshan2Outlet = new google.maps.LatLng(23.7887, 90.41615);
    var dhanmondiOutlet = new google.maps.LatLng(23.74744, 90.37031);
    var bailyOutlet = new google.maps.LatLng(23.74198, 90.41007);
    var uttaraOutlet = new google.maps.LatLng(23.87411, 90.39189);
    var chittagongOutlet = new google.maps.LatLng(22.35697, 91.82133);
    var sylhetOutlet = new google.maps.LatLng(24.89638, 91.86822);
    var jamunaOutlet = new google.maps.LatLng(23.81356, 90.42434);


    //new
    var dhanmondi2Coords = [
        {lat: 23.75323, lng:90.36621},
        {lat: 23.75736, lng:90.37449},
        {lat: 23.75125, lng:90.37833},
        {lat: 23.7528, lng:90.38272},
        {lat: 23.74967, lng:90.39285},
        {lat: 23.73868, lng:90.39097},
        {lat: 23.73252, lng:90.38525},
        {lat: 23.73952, lng:90.38314},
        {lat: 23.73885, lng:90.38101},
        {lat: 23.73568, lng:90.37971},
        {lat: 23.73826, lng:90.37617}
    ];
    var dhanmondi2Outlet = new google.maps.LatLng(23.7402737, 90.3741712);

    //new
    var uttara2Coords = [
        {lat: 23.87806, lng:90.38606},
        {lat: 23.87555, lng:90.38041},
        {lat: 23.865, lng:90.38113},
        {lat: 23.85757, lng:90.38667},
        {lat: 23.86145, lng:90.39279},
        {lat: 23.86064, lng:90.39998},
        {lat: 23.85541, lng:90.40415},
        {lat: 23.85772, lng:90.40621},
        {lat: 23.86813, lng:90.41354},
        {lat: 23.87527, lng:90.41176},
        {lat: 23.8747, lng:90.40586},
        {lat: 23.87467, lng:90.40064},
        {lat: 23.88046, lng:90.40073},
        {lat: 23.87962, lng:90.3924},
        {lat: 23.88779, lng:90.3896},
        {lat: 23.88715, lng:90.38668}
    ];

    var uttara2Outlet = new google.maps.LatLng(23.8682043, 90.3909394);


    var mirpurCoords = [
        {lat: 23.84096, lng:90.37567},
        {lat: 23.82226, lng:90.37763},
        {lat: 23.81038, lng:90.36746},
        {lat: 23.81026, lng:90.361},
        {lat: 23.81305, lng:90.35635},
        {lat: 23.81615, lng:90.35594},
        {lat: 23.81605, lng:90.3527},
        {lat: 23.82874, lng:90.35125},
        {lat: 23.83077, lng:90.35321},
        {lat: 23.84043, lng:90.36471},
        {lat: 23.8388, lng:90.37242}
    ];

    var mirpurOutlet = new google.maps.LatLng(23.8248757, 90.355866);

    //new
    var mirpur2Coords = [
        {lat: 23.79716, lng:90.37221},
        {lat: 23.79469, lng:90.36545},
        {lat: 23.78573, lng:90.36697},
        {lat: 23.77768, lng:90.36207},
        {lat: 23.78173, lng:90.35219},
        {lat: 23.78666, lng:90.34792},
        {lat: 23.79527, lng:90.3481},
        {lat: 23.8042, lng:90.34451},
        {lat: 23.81601, lng:90.35266},
        {lat: 23.81613, lng:90.35592},
        {lat: 23.81305, lng:90.35633},
        {lat: 23.81022, lng:90.36099},
        {lat: 23.81093, lng:90.37516},
        {lat: 23.80333, lng:90.37643},
        {lat: 23.80262, lng:90.37057}

    ];

    var mirpur2Outlet = new google.maps.LatLng(23.8004096, 90.3469136);

    // new
    var bhataraCoords = [
        {lat: 23.83519, lng:90.41447},
        {lat: 23.83619, lng:90.41828},
        {lat: 23.82413, lng:90.42051},
        {lat: 23.82514, lng:90.42944},
        {lat: 23.82731, lng:90.44102},
        {lat: 23.82833, lng:90.45803},
        {lat: 23.81672, lng:90.45932},
        {lat: 23.81611, lng:90.44159},
        {lat: 23.81097, lng:90.43256},
        {lat: 23.80904, lng:90.43083},
        {lat: 23.8049, lng:90.42218},
        {lat: 23.79768, lng:90.4234},
        {lat: 23.7967, lng:90.41968},
        {lat: 23.80707, lng:90.41641},
        {lat: 23.80954, lng:90.42131},
        {lat: 23.82125, lng:90.41766}
    ];



    var bhataraOutlet = new google.maps.LatLng(23.8129419, 90.4190477);

    //new
    var bananiCoords = [
        {lat: 23.7838, lng:90.41919},
        {lat: 23.80568, lng:90.41568},
        {lat: 23.80451, lng:90.40676},
        {lat: 23.79925, lng:90.40193},
        {lat: 23.79547, lng:90.3976},
        {lat: 23.79072, lng:90.39726},
        {lat: 23.78539, lng:90.39948},
        {lat: 23.78343, lng:90.39246},
        {lat: 23.77806, lng:90.39313},
        {lat: 23.77752, lng:90.39552},
        {lat: 23.77895, lng:90.39814}
    ];

    var bananiOutlet = new google.maps.LatLng(23.7925677, 90.3996093);

    var wariCoords = [
        {lat: 23.73036, lng:90.41516},
        {lat: 23.72659, lng:90.42147},
        {lat: 23.72148, lng:90.42112},
        {lat: 23.72207, lng:90.42711},
        {lat: 23.71464, lng:90.42518},
        {lat: 23.70993, lng:90.41875},
        {lat: 23.70799, lng:90.41112},
        {lat: 23.71302, lng:90.41387},
        {lat: 23.71449, lng:90.40863},
        {lat: 23.71946, lng:90.40966},
        {lat: 23.72298, lng:90.41187}
    ];

    var wariOutlet = new google.maps.LatLng(23.7538262, 90.358544);

    var savarCoords = [
        {lat: 23.87989, lng:90.2747},
        {lat: 23.8401, lng:90.26599},
        {lat: 23.82126, lng:90.2576},
        {lat: 23.8271, lng:90.25024},
        {lat: 23.87259, lng:90.25653},
        {lat: 23.88693, lng:90.26598},
        {lat: 23.88969, lng:90.27204}
    ];

    var savarOutlet = new google.maps.LatLng(23.8551596,90.2579279);

    //new
    var coxCoords = [
        {lat: 21.44085, lng:91.96407},
        {lat: 21.44326, lng:91.97686},
        {lat: 21.43197, lng:91.98018},
        {lat: 21.42335, lng:91.98639},
        {lat: 21.42923, lng:92.00274},
        {lat: 21.42727, lng:92.00587},
        {lat: 21.41652, lng:91.986},
        {lat: 21.4035, lng:91.99432},
        {lat: 21.40278, lng:91.99201}
    ];

    var coxOutlet = new google.maps.LatLng(21.42674, 91.97851);


    // Construct the polygon.
    var savarTriangle = new google.maps.Polygon({
        paths: savarCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });
    // Construct the polygon.
    var coxTriangle = new google.maps.Polygon({
        paths: coxCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });


    // Construct the polygon.
    var dhanmondi2Triangle = new google.maps.Polygon({
        paths: dhanmondi2Coords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var uttara2Triangle = new google.maps.Polygon({
        paths: uttara2Coords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });


    // Construct the polygon.
    var mirpurTriangle = new google.maps.Polygon({
        paths: mirpurCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });
    //
    //
    // Construct the polygon.
    var mirpur2Triangle = new google.maps.Polygon({
        paths: mirpur2Coords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var bhataraTriangle = new google.maps.Polygon({
        paths: bhataraCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var bananiTriangle = new google.maps.Polygon({
        paths: bananiCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var wariTriangle = new google.maps.Polygon({
        paths: wariCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    var branches = [

        { tag:'gulshanTriangle', name: 'Pizza Hut Gulshan', location: 'Road # 140, SE(F)- 1, Bir Uttam Mir Shawkat Ali Sarak, (South Avenue), Gulshan - 1, Dhaka- 1212.' },
        { tag:'gulshan2Triangle', name: 'Pizza Hut RM Center' , location: 'House- 101( 2nd Floor), Gulshan Avenue, Gulshan - 2, Dhaka-1212'  },
        { tag:'dhanmondiTriangle', name: 'Pizza Hut Dhanmondi' , location: 'Plot # 754, Satmasjid Road, Dhanmondi, Dhaka- 1205' },
        { tag:'dhanmondi2Triangle', name: 'Pizza Hut Delivery Dhanmondi' , location: 'Dr. Refat Ullahs Happy Arcade, House-03, Road-03, Dhanmondi, Dhaka' },
        { tag:'bailyTriangle', name: 'Pizza Hut Baily Road', location: '3, New Baily Road, 10, Natok Sarani, Gold Hunt Shopping Complex, Dhaka.'  },
        { tag:'uttaraTriangle', name: 'Pizza Hut Uttara' , location: 'Plot # 13, Sec # 13, Sonargaon, Janapath, Uttara, Dhaka-1230' },
        { tag:'uttara2Triangle', name: 'Pizza Hut Delivery Uttara', location: 'H#06, Road#02, Ahmed Plaza (Gr. Flr), Sector-03, Uttara, Dhaka-1230' },
        { tag:'bhataraTriangle', name: 'Pizza Hut Delivery Bhatara', location: 'Adept N. R. Complex, Plot- Ka 5/2, Bashundhara Link Road, Jagannathpur, Badda, Dhaka-1229' },
        { tag:'bananiTriangle', name: 'Pizza Hut Delivery Banani' , location: 'Plot- 50, Road- 11, Block- C, Banani Police Station, Banani, Dhaka-1213.' },
        { tag:'mirpurTriangle', name: 'Pizza Hut Delivery Mirpur' , location: 'Spring Rahmat E Tuba, Plot-132, Road-2, Block- A, Section- 12,  Mirpur, Dhaka' },
        { tag:'mirpur2Triangle', name: 'Pizza Hut Delivery Sony' , location: 'Sony Cinema Bhaban, Ist Floor, Plot-1, Block-D,Sector-02, Mirpur, Dhaka-1216' },
        { tag:'wariTriangle', name: 'Pizza Hut Delivery Wari' , location: 'A.K. Famous Tower, 41 Rankin Street, Wari, Dhaka' },
        { tag:'savarTriangle', name: 'Pizza Hut Delivery Savar' , location: 'M.K Tower, 1st Floor (right side), Holding-B-16/1 Jaleshwar, Savar Union' },
        { tag:'coxTriangle', name: 'Pizza Hut Delivery Cox Bazar' , location: 'Plot No 08, Block A, Near At Long Beach Out Side, Kalatoli Road, New Beach Rd, Coxs Bazar-4700' },
        { tag:'chittagongTriangle', name: 'Pizza Hut Chittagong' , location: 'Plot No 08, Block A, Near At Long Beach Out Side, Kalatoli Road, New Beach Rd, Coxs Bazar-4700' },
        { tag:'sylhetTriangle', name: 'Pizza Hut Sylhet' , location: 'Plot No 08, Block A, Near At Long Beach Out Side, Kalatoli Road, New Beach Rd, Coxs Bazar-4700' },
        { tag:'jamunaTriangle', name: 'Pizza Hut Jamuna Future Park' , location: 'Plot No 08, Block A, Near At Long Beach Out Side, Kalatoli Road, New Beach Rd, Coxs Bazar-4700' }

    ];

    let distanceArray = [];
    let today = new Date();

    var setLatlng = function setLatlng(){


        let day = today.getDay();

        gulshanDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), gulshanOutlet);
        distanceArray.push(gulshanDistance);

        gulshan2Distance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), gulshan2Outlet);
        distanceArray.push(gulshan2Distance);

        dhanmondiDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondiOutlet);
        distanceArray.push(dhanmondiDistance);

        bailyDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bailyOutlet);
        distanceArray.push(bailyDistance);

        uttaraDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), uttaraOutlet);
        distanceArray.push(uttaraDistance);

        chittagongDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), chittagongOutlet);
        distanceArray.push(chittagongDistance);

        sylhetDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), sylhetOutlet);
        distanceArray.push(sylhetDistance);

        jamunaDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), jamunaOutlet);
        distanceArray.push(jamunaDistance);



        dhanmondi2Delivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondi2Triangle);
        dhanmondi2Distance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondi2Outlet);
        distanceArray.push(dhanmondi2Distance);

        uttara2Delivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), uttara2Triangle);
        uttara2Distance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), uttara2Outlet);
        distanceArray.push(uttara2Distance);

        bhataraDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bhataraTriangle);
        bhataraDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bhataraOutlet);
        // if(day != 3){
        distanceArray.push(bhataraDistance);
        // }

        bananiDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bananiTriangle);
        bananiDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bananiOutlet);
        distanceArray.push(bananiDistance);

        mirpurDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), mirpurTriangle);
        mirpurDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), mirpurOutlet);
        distanceArray.push(mirpurDistance);

        mirpur2Delivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), mirpur2Triangle);
        mirpur2Distance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), mirpur2Outlet);
        distanceArray.push(mirpur2Distance);

        wariDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), wariTriangle);
        wariDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), wariOutlet);
        distanceArray.push(wariDistance);


        savarDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), savarTriangle);
        savarDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), savarOutlet);
        distanceArray.push(savarDistance);


        coxDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), coxTriangle);
        coxDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), coxOutlet);
        distanceArray.push(coxDistance);

        if (dhanmondi2Delivery)
        {
            console.log(branches[3].tag);
            setStore(branches[3].tag);
        }
        else if (uttara2Delivery)
        {
            console.log(branches[6].tag);
            setStore(branches[6].tag);
        }
        else if (bhataraDelivery)
        {
            console.log(branches[7].tag);
            setStore(branches[7].tag);
        }
        else if (bananiDelivery)
        {
            setStore(branches[8].tag);
            console.log(branches[8].tag);
        }
        else if (mirpurDelivery)
        {
            console.log(branches[9].tag);
            setStore(branches[9].tag);
        }
        else if (mirpur2Delivery)
        {
            console.log(branches[10].tag);
            setStore(branches[10].tag);
        }
        else if (wariDelivery)
        {
            console.log(branches[11].tag);
            setStore(branches[11].tag);
        }
        else if (savarDelivery)
        {
            console.log(branches[12].tag);
            setStore(branches[12].tag);
        }else if (coxDelivery)
        {
            console.log(branches[13].tag);
            setStore(branches[13].tag);
        }
        else
        {
            // console.log(distanceArray);
            let nearestOutlet = distanceArray.sort((a,b) => a - b).slice(0, 2);
            let nearestOutlet_1 = nearestOutlet[0];
            let nearestOutlet_2 = nearestOutlet[1];
            let takeAway = [];
            let minimum_distance = 20.00;
            // console.log(nearestOutlet);

            if (nearestOutlet_1 == gulshanDistance || nearestOutlet_2 == gulshanDistance)
            {
                if(gulshanDistance < minimum_distance)
                    takeAway.push([branches[0].tag,gulshanDistance]);
            }

            if(nearestOutlet_1 == gulshan2Distance || nearestOutlet_2 == gulshan2Distance){
                if(gulshan2Distance < minimum_distance)
                    takeAway.push([branches[1].tag,gulshan2Distance]);
            }

            if(nearestOutlet_1 == dhanmondiDistance || nearestOutlet_2 == dhanmondiDistance){
                if(dhanmondiDistance < minimum_distance)
                    takeAway.push([branches[2].tag,dhanmondiDistance]);
            }

            if(nearestOutlet_1 == dhanmondi2Distance || nearestOutlet_2 == dhanmondi2Distance){
                if(dhanmondi2Distance < minimum_distance)
                    takeAway.push(branches[3].tag,dhanmondi2Distance);
            }

            if(nearestOutlet_1 == bailyDistance || nearestOutlet_2 == bailyDistance){
                if(bailyDistance < minimum_distance)
                    takeAway.push([branches[4].tag,bailyDistance]);
            }

            if(nearestOutlet_1 == uttaraDistance || nearestOutlet_2 == uttaraDistance){
                if(uttaraDistance < minimum_distance)
                    takeAway.push([branches[5].tag,uttaraDistance]);
            }

            if(nearestOutlet_1 == uttara2Distance || nearestOutlet_2 == uttara2Distance){
                if(uttara2Distance < minimum_distance)
                    takeAway.push([branches[6].tag,uttara2Distance]);
            }

            if(nearestOutlet_1 == bhataraDistance || nearestOutlet_2 == bhataraDistance){
                if(bhataraDistance < minimum_distance)
                    takeAway.push([branches[7].tag,bhataraDistance]);
            }

            if(nearestOutlet_1 == bananiDistance || nearestOutlet_2 == bananiDistance){
                if(bananiDistance < minimum_distance)
                    takeAway.push([branches[8].tag,bananiDistance]);
            }

            if(nearestOutlet_1 == mirpurDistance || nearestOutlet_2 == mirpurDistance){
                if(mirpurDistance < minimum_distance)
                    takeAway.push([branches[9].tag,mirpurDistance]);
            }

            if(nearestOutlet_1 == mirpur2Distance || nearestOutlet_2 == mirpur2Distance) {
                if(mirpur2Distance < minimum_distance)
                    takeAway.push([branches[10].tag,mirpur2Distance]);
            }

            if(nearestOutlet_1 == wariDistance || nearestOutlet_2 == wariDistance){
                if(wariDistance < minimum_distance)
                    takeAway.push([branches[11].tag,wariDistance]);
            }
            if(nearestOutlet_1 == savarDistance || nearestOutlet_2 == savarDistance){
                if(savarDistance < minimum_distance)
                    takeAway.push([branches[12].tag,savarDistance]);
            }
            if(nearestOutlet_1 == coxDistance || nearestOutlet_2 == coxDistance){
                if(coxDistance < minimum_distance)
                    takeAway.push([branches[13].tag,coxDistance]);
            }
            if(nearestOutlet_1 == chittagongDistance || nearestOutlet_2 == chittagongDistance){
                if(chittagongDistance < minimum_distance)
                    takeAway.push([branches[14].tag,chittagongDistance]);
            }
            if(nearestOutlet_1 == sylhetDistance || nearestOutlet_2 == sylhetDistance){
                if(sylhetDistance < minimum_distance)
                    takeAway.push([branches[15].tag,sylhetDistance]);
            }
            // if(day != 3) {
            if(nearestOutlet_1 == jamunaDistance || nearestOutlet_2 == jamunaDistance){
                if(jamunaDistance < minimum_distance)
                    takeAway.push([branches[16].tag,jamunaDistance]);
            }
            // }
            setStore(takeAway);
        }


        //calculates distance between two points in km's
        function calculateDistance(pointer_1, pointer_2) {
            var dist = (google.maps.geometry.spherical.computeDistanceBetween(pointer_1, pointer_2) / 1000).toFixed(2);
            return parseFloat(dist);

        }
    };


    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13
    });
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');
    var types = document.getElementById('type-selector');
    var strictBounds = document.getElementById('strict-bounds-selector');

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

    var autocomplete = new google.maps.places.Autocomplete(input);

    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);

    //Search the result only in Bangladesh
    autocomplete.setComponentRestrictions(
        {'country': ['bd']});

    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(
        ['address_components', 'geometry', 'icon', 'name']);

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            // setLocation(latitude,longitude);
            sklLatLng.lat = latitude;
            sklLatLng.lng = longitude;
            // setLatlng();
            // console.log(latitude);
            // console.log(longitude)
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;
        // infowindow.open(map, marker);
        setLocation(address);
        setLatlng();
    });
}
