

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
    chittagongDistance,
    sylhetDistance,
    jamunaDistance,
    uttara2Distance,
    mirpurDistance,
    mirpur2Distance,
    bhataraDistance,
    bananiDistance,
    savarDistance,
    coxDistance,
    wariDistance;



function initMap({sklLatLng,setLocation,setStore}) {

    var sylhetOutlet = new google.maps.LatLng(24.89638, 91.86822);
    var jamunaOutlet = new google.maps.LatLng(23.81356, 90.42434);

    //new
    // var bailyCoords = [
    //     {lat: 23.7513522, lng: 90.3991895},
    //     {lat: 23.7456872, lng: 90.4088328},
    //     {lat: 23.7448094, lng: 90.4030987},
    //     {lat: 23.7350869, lng: 90.4172471},
    //     {lat: 23.7392099, lng: 90.4189898},
    //     {lat: 23.7437237, lng: 90.4183087},
    //     {lat: 23.7422312, lng: 90.422768},
    //     {lat: 23.7313247, lng: 90.4147661},
    //     {lat: 23.7335115, lng: 90.4121976},
    //     {lat: 23.7327627, lng: 90.4075485},
    //     {lat: 23.7373257, lng: 90.3981534}
    // ];
    var bailyCoords = [
            {lat: 23.7456872, lng: 90.4088328},
            {lat: 23.7513522, lng: 90.3991895},
            {lat: 23.7448094, lng: 90.4030987},
            {lat: 23.7373257, lng: 90.3981534},
            {lat: 23.7327627, lng: 90.4075485},
            {lat: 23.7335115, lng: 90.4121976},
            {lat: 23.7313247, lng: 90.4147661},
            {lat: 23.7350869, lng: 90.4172471},
            {lat: 23.7392099, lng: 90.4189898},
            {lat: 23.7422312, lng: 90.422768},
            {lat: 23.7437237, lng: 90.4183087}   //Khidma Hospital
        ];
    var bailyOutlet = new google.maps.LatLng(23.74198, 90.41007);
    
    //new
    var chittagongCoords = [
        {lat: 22.3513508, lng: 91.8222285},
        {lat: 22.35336, lng: 91.82333},
        {lat: 22.35617, lng: 91.82497},
        {lat: 22.3566828, lng: 91.8283675},
        {lat: 22.35921, lng: 91.82698},
        {lat: 22.36163, lng: 91.82432},
        {lat: 22.36247, lng: 91.82304},
        {lat: 22.3629, lng: 91.82088},
        {lat: 22.36332, lng: 91.81692},
        {lat: 22.36448, lng: 91.81504},
        {lat: 22.36194, lng: 91.81064},
        {lat: 22.35575, lng: 91.81427},
        {lat: 22.3643433, lng: 91.8105649},
        {lat: 22.3506195, lng: 91.8185771}
    ];
    var chittagongOutlet = new google.maps.LatLng(22.35697, 91.82133);

    //new
    var gulshanCoords = [
        {lat: 23.78058, lng:90.42555},
        {lat: 23.78018, lng:90.4165},
        {lat: 23.78052, lng:90.4065},
        {lat: 23.77213, lng:90.40415},
        {lat: 23.77019, lng:90.40857},
        {lat: 23.76862, lng:90.41146},
        {lat: 23.77284, lng:90.4159},
        {lat: 23.77671, lng:90.42562},
        {lat: 23.7703, lng:90.42447}
    ];
    var gulshanOutlet = new google.maps.LatLng(23.77661, 90.41682);

    //new
    var gulshan2Coords = [
        {lat: 23.79747, lng:90.42319},
        {lat: 23.79476, lng:90.41452},
        {lat: 23.79343, lng:90.41},
        {lat: 23.79047, lng:90.41183},
        {lat: 23.78044, lng:90.41177},
        {lat: 23.78051, lng:90.4166},
        {lat: 23.78073, lng:90.42543},
        {lat: 23.79214, lng:90.42443},
        {lat: 23.78899, lng:90.42501},
        {lat: 23.78393, lng:90.42564}
    ];
    var gulshan2Outlet = new google.maps.LatLng(23.7887, 90.41615);

    //new
    /*var uttaraCoords = [
        {lat: 23.8765227, lng:90.3860926},
        {lat: 23.8802787, lng:90.3900201},
        {lat: 23.8871627, lng:90.391569},
        {lat: 23.8814409, lng:90.3960774},
        {lat: 23.8800573, lng:90.4008467},
        {lat: 23.8823416, lng:90.4074905},
        {lat: 23.8745921, lng:90.4041609},
        {lat: 23.8698766, lng:90.4055338},
        {lat: 23.8696442, lng:90.4008712},
        {lat: 23.8695247, lng:90.3976958},
        {lat: 23.8694798, lng:90.3929095},
        {lat: 23.8694067, lng:90.3848064},
        {lat: 23.8693261, lng:90.3829536}
    ];
    var uttaraCoords = [
        {lat: 23.8765227, lng:90.3860926},
        {lat: 23.8802787, lng:90.3900201},
        {lat: 23.8871627, lng:90.391569},
        {lat: 23.8814409, lng:90.3960774},
        {lat: 23.8800573, lng:90.4008467},
        {lat: 23.8823416, lng:90.4074905},
        {lat: 23.8698766, lng:90.4055338},
        {lat: 23.8696442, lng:90.4008712},
        {lat: 23.8695247, lng:90.3976958},
        {lat: 23.8694798, lng:90.3929095},
        {lat: 23.8694067, lng:90.3848064},
        {lat: 23.8693261, lng:90.3829536},
        {lat: 23.8696435, lng:90.4000173},
        {lat: 23.881326, lng:90.410893}
    ];*/
    var uttaraCoords = [
        {lat: 23.8692094, lng:90.3785656},
        {lat: 23.8696774, lng:90.4059994},
        {lat: 23.8816681, lng:90.4061626},
        {lat: 23.8799157, lng:90.3919012},
        {lat: 23.8875149, lng:90.3912206},
        {lat: 23.8878119, lng:90.3863668},
        {lat: 23.8785561, lng:90.3860919},
        {lat: 23.8754277, lng:90.3795654}
    ];
    var uttaraOutlet = new google.maps.LatLng(23.87411, 90.39189);

    //new
    var dhanmondiCoords = [
        {lat: 23.7459151, lng:90.3748503},
        {lat: 23.7419227, lng:23.7419227},
        {lat: 23.755355, lng:90.3598632},
        {lat: 23.7563747, lng:90.3619912},
        {lat: 23.7586664, lng:90.3663987},
        {lat: 23.762753, lng:90.3775518},
        {lat: 23.754772, lng:90.3763741},
        {lat: 23.7527571, lng:90.3629415},
        {lat: 23.7483446, lng:90.3642564},
        {lat: 23.753787, lng:90.3583351},
        {lat: 23.7519254, lng:90.3777592}
    ];
    var dhanmondiOutlet = new google.maps.LatLng(23.74744, 90.37031);
    
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
    /*var uttara2Coords = [
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
    var uttara2Coords = [
        {lat: 23.8753014, lng:90.4117084},
        {lat: 23.8683137, lng:90.4137052},
        {lat: 23.8695002, lng:90.400496},
        {lat: 23.8695224, lng:90.3933204},
        {lat: 23.8692793, lng:90.3791346},
        {lat: 23.8693116, lng:90.3837996},
        {lat: 23.8578241, lng:90.3867707},
        {lat: 23.8649549, lng:90.3811062},
        {lat: 23.8613682, lng:90.3933647},
        {lat: 23.856054, lng:90.4029884},
        {lat: 23.8587398, lng:90.4132707},
        {lat: 23.8708661, lng:90.4124623}
    ];*/
    var uttara2Coords = [
        {lat: 23.8692094, lng:90.3785656},
        {lat: 23.8467745, lng:90.3972994},
        {lat: 23.8514846, lng:90.4062258},
        {lat: 23.8696774, lng:90.4059994}
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
    var bailyTriangle = new google.maps.Polygon({
        paths: bailyCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var chittagongTriangle = new google.maps.Polygon({
        paths: chittagongCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var gulshanTriangle = new google.maps.Polygon({
        paths: gulshanCoords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

    // Construct the polygon.
    var gulshan2Triangle = new google.maps.Polygon({
        paths: gulshan2Coords,
        strokeColor: 'green',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: 'green',
        fillOpacity: 0.35
    });

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
    var dhanmondiTriangle = new google.maps.Polygon({
        paths: dhanmondiCoords,
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
    var uttaraTriangle = new google.maps.Polygon({
        paths: uttaraCoords,
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

        { tag:'gulshanTriangle', name: 'Pizza Hut Delivery Gulshan', location: 'Road # 140, SE(F)- 1, Bir Uttam Mir Shawkat Ali Sarak, (South Avenue), Gulshan - 1, Dhaka- 1212.' },
        { tag:'gulshan2Triangle', name: 'Pizza Hut Delivery RM Center' , location: 'House- 101( 2nd Floor), Gulshan Avenue, Gulshan - 2, Dhaka-1212'  },
        { tag:'dhanmondiTriangle', name: 'Pizza Hut Dhanmondi' , location: 'Plot # 754, Satmasjid Road, Dhanmondi, Dhaka- 1205' },
        { tag:'dhanmondi2Triangle', name: 'Pizza Hut Delivery Dhanmondi2' , location: 'Dr. Refat Ullahs Happy Arcade, House-03, Road-03, Dhanmondi, Dhaka' },
        { tag:'bailyTriangle', name: 'Pizza Hut Baily Road', location: '3, New Baily Road, 10, Natok Sarani, Gold Hunt Shopping Complex, Dhaka.'  },
        { tag:'uttaraTriangle', name: 'Pizza Hut Delivery Uttara' , location: 'Plot # 13, Sec # 13, Sonargaon, Janapath, Uttara, Dhaka-1230' },
        { tag:'uttara2Triangle', name: 'Pizza Hut Delivery Uttara2', location: 'H#06, Road#02, Ahmed Plaza (Gr. Flr), Sector-03, Uttara, Dhaka-1230' },
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
    let map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: 23.780951, lng: 90.398927},
        mapTypeId: 'terrain'
    });

    infoWindow = new google.maps.InfoWindow;
    geocoder = new google.maps.Geocoder;


    var setLatlng = function setLatlng(){


        let day = today.getDay();

        sylhetDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), sylhetOutlet);
        distanceArray.push(sylhetDistance);

        jamunaDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), jamunaOutlet);
        distanceArray.push(jamunaDistance);


        bailyDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bailyTriangle);
        bailyDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), bailyOutlet);
        distanceArray.push(bailyDistance);

        chittagongDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), chittagongTriangle);
        chittagongDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), chittagongOutlet);
        distanceArray.push(chittagongDistance);

        dhanmondiDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondiTriangle);
        dhanmondiDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondiOutlet);
        distanceArray.push(dhanmondiDistance);

        gulshanDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), gulshanTriangle);
        gulshanDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), gulshanOutlet);
        distanceArray.push(gulshanDistance);

        gulshan2Delivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), gulshan2Triangle);
        gulshan2Distance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), gulshan2Outlet);
        distanceArray.push(gulshan2Distance);

        dhanmondi2Delivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondi2Triangle);
        dhanmondi2Distance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), dhanmondi2Outlet);
        distanceArray.push(dhanmondi2Distance);


        uttaraDelivery = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), uttaraTriangle);
        uttaraDistance = calculateDistance(new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng), uttaraOutlet);
        distanceArray.push(uttaraDistance);

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

        if (dhanmondiDelivery)
        {
            console.log(branches[2].tag);
            setStore(branches[2].tag);
        }
        else if (bailyDelivery)
        {
            console.log(branches[4].tag);
            setStore(branches[4].tag);
        }
        else if (chittagongDelivery)
        {
            console.log(branches[14].tag);
            setStore(branches[14].tag);
        }
        else if (gulshanDelivery)
        {
            console.log(branches[0].tag);
            setStore(branches[0].tag);
        }
        else if (dhanmondi2Delivery)
        {
            console.log(branches[3].tag);
            setStore(branches[3].tag);
        }
        else if (gulshan2Delivery)
        {
            console.log(branches[1].tag);
            setStore(branches[1].tag);
        }
        else if (uttaraDelivery)
        {
            console.log(branches[5].tag);
            setStore(branches[5].tag);
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

    if(Object.keys(sklLatLng).length === 0) {



        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                let pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };


                sklLatLng.lat = pos.lat;
                sklLatLng.lng = pos.lng;


                // sklLatLng.lat = 23.813629;
                // sklLatLng.lng = 90.422628;


                // infoWindow.setPosition(pos);
                // infoWindow.setContent('Your Location');
                // infoWindow.open(map);
                // map.setCenter(pos);

                console.log(pos.lat+'----'+pos.lng);

                geocoder.geocode({'location': pos}, function(results, status) {

                    if (status === 'OK') {
                        if (results[0]) {
                            // document.getElementById('print').textContent = results[0].formatted_address;
                            console.log(results[0].formatted_address);
                            setLocation(results[0].formatted_address,sklLatLng.lat,sklLatLng.lng);
                            setLatlng();
                            addressName = results[0].formatted_address;
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }

                });

                setTimeout(function() {

                    infoWindow.setPosition(pos);
                    // infoWindow.setContent('Your Location');
                    infoWindow.setContent(addressName);
                    infoWindow.open(map);
                    map.setCenter(pos);
                    // console.log(sklLatLng.lat);
                }, 1000);

            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    } else {
        // setLocation('error');
        geocoder.geocode({'location': sklLatLng}, function(results, status) {

            if (status === 'OK') {
                if (results[0]) {
                    // document.getElementById('print').textContent = results[0].formatted_address;
                    console.log(results[0].formatted_address);
                    setLocation(results[0].formatted_address);
                    setLatlng();
                    addressName = results[0].formatted_address;
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }

        });
        // setLatlng();
    }


    gulshanTriangle.setMap(map);
    gulshan2Triangle.setMap(map);
    dhanmondiTriangle.setMap(map);
    dhanmondi2Triangle.setMap(map);
    bailyTriangle.setMap(map);
    chittagongTriangle.setMap(map);
    uttaraTriangle.setMap(map);
    uttara2Triangle.setMap(map);
    mirpurTriangle.setMap(map);
    mirpur2Triangle.setMap(map);
    bhataraTriangle.setMap(map);
    bananiTriangle.setMap(map);
    wariTriangle.setMap(map);
    savarTriangle.setMap(map);
    coxTriangle.setMap(map);

}
