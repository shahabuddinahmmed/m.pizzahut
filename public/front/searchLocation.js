// This example creates a simple polygon representing the Bermuda Triangle.
var infoWindow, map, marker, geocoder, autocomplete;
var sklLatLng = {};
var addressName = null;

var gulshanDelivery,
  gulshan2Delivery,
  gulshan3Delivery,
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
  adaborDelivery,
  adaborDistance,
  banasreeDelivery,
  greenroadDelivery,
  uttara6Delivery,
  basaboDelivery,
  basaboDistance,
  greenroadDistance,
  uttara6Distance,
  banasreeDistance,
  shewraparaDelivery,
  shewraparaDistance,
  gulshanDistance,
  gulshan2Distance,
  gulshan3Distance,
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

function searchinitMap({ setLocation, setStore }) {
  let origin_url = window.location.origin;
  if (origin_url.match("localhost/")) {
    origin_url = "http://localhost/pizzahut";
  }
  fetch(origin_url + "/front/locations_new.json")
    .then((response) => {
      return response.json();
    })
    .then((jsondata) => {
      var basaboCoords = jsondata.basaboCoords;
      var shewraparaCoords = jsondata.shewraparaCoords;
      var banasreeCoords = jsondata.banasreeCoords;
      var adaborCoords = jsondata.adaborCoords;
      var bailyCoords = jsondata.bailyCoords;
      var chittagongCoords = jsondata.chittagongCoords;
      var gulshanCoords = jsondata.gulshanCoords;
      var gulshan2Coords = jsondata.gulshan2Coords;
      var gulshan3Coords = jsondata.gulshan3Coords;
      var dhanmondiCoords = jsondata.dhanmondiCoords;
      var dhanmondi2Coords = jsondata.dhanmondi2Coords;
      var uttaraCoords = jsondata.uttaraCoords;
      var uttara2Coords = jsondata.uttara2Coords;
      var mirpurCoords = jsondata.mirpurCoords;
      var mirpur2Coords = jsondata.mirpur2Coords;
      var bhataraCoords = jsondata.bhataraCoords;
      var bananiCoords = jsondata.bananiCoords;
      var wariCoords = jsondata.wariCoords;
      var savarCoords = jsondata.savarCoords;
      var coxCoords = jsondata.coxCoords;
      var greenroadCoords = jsondata.greenroadCoords;
      var uttara6Coords = jsondata.uttara6Coords;

      var branches = jsondata.brances;

      var sylhetOutlet = new google.maps.LatLng(24.89638, 91.86822);
      var jamunaOutlet = new google.maps.LatLng(23.81356, 90.42434);

      var shewraparaOutlet = new google.maps.LatLng(23.791973, 90.374087);
      var banasreeOutlet = new google.maps.LatLng(23.766091, 90.42594);
      var adaborOutlet = new google.maps.LatLng(
        23.771137104490823,
        90.35935406828615
      );
      var bailyOutlet = new google.maps.LatLng(23.74198, 90.41007);
      var chittagongOutlet = new google.maps.LatLng(22.35697, 91.82133);
      var gulshanOutlet = new google.maps.LatLng(23.77661, 90.41682);
      var gulshan2Outlet = new google.maps.LatLng(23.7887, 90.41615);
      var gulshan3Outlet = new google.maps.LatLng(
        23.79866833976555,
        90.41233970683658
      );
      var dhanmondiOutlet = new google.maps.LatLng(23.74744, 90.37031);
      var dhanmondi2Outlet = new google.maps.LatLng(23.7402737, 90.3741712);
      var uttaraOutlet = new google.maps.LatLng(23.87411, 90.39189);
      var uttara2Outlet = new google.maps.LatLng(23.8682043, 90.3909394);
      var mirpurOutlet = new google.maps.LatLng(23.8248757, 90.355866);
      var mirpur2Outlet = new google.maps.LatLng(23.8004096, 90.3469136);
      var bhataraOutlet = new google.maps.LatLng(23.8129419, 90.4190477);
      var bananiOutlet = new google.maps.LatLng(23.7925677, 90.3996093);
      var wariOutlet = new google.maps.LatLng(23.7538262, 90.358544);
      var savarOutlet = new google.maps.LatLng(23.8551596, 90.2579279);
      var coxOutlet = new google.maps.LatLng(21.42674, 91.97851);
      var greenroadOutlet = new google.maps.LatLng(
        23.751749861677528,
        90.38735044303785
      );
      var uttara6Outlet = new google.maps.LatLng(
        23.868120095689378,
        90.4036728250483
      );
      var basaboOutlet = new google.maps.LatLng(
        23.742051480004903,
        90.42941960966982
      );

      // Construct the polygon.

      var greenroadTriangle = new google.maps.Polygon({
        paths: greenroadCoords,
        strokeColor: "red",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "red",
        fillOpacity: 0.35,
      });

      var basaboTriangle = new google.maps.Polygon({
        paths: basaboCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "red",
        fillOpacity: 0.35,
      });

      var uttara6Triangle = new google.maps.Polygon({
        paths: uttara6Coords,
        strokeColor: "red",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "red",
        fillOpacity: 0.35,
      });

      var shewraparaTriangle = new google.maps.Polygon({
        paths: shewraparaCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var banasreeTriangle = new google.maps.Polygon({
        paths: banasreeCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var adaborTriangle = new google.maps.Polygon({
        paths: adaborCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var bailyTriangle = new google.maps.Polygon({
        paths: bailyCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var chittagongTriangle = new google.maps.Polygon({
        paths: chittagongCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var gulshanTriangle = new google.maps.Polygon({
        paths: gulshanCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var gulshan2Triangle = new google.maps.Polygon({
        paths: gulshan2Coords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var gulshan3Triangle = new google.maps.Polygon({
        paths: gulshan3Coords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var savarTriangle = new google.maps.Polygon({
        paths: savarCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });
      // Construct the polygon.
      var coxTriangle = new google.maps.Polygon({
        paths: coxCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var dhanmondiTriangle = new google.maps.Polygon({
        paths: dhanmondiCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var dhanmondi2Triangle = new google.maps.Polygon({
        paths: dhanmondi2Coords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var uttaraTriangle = new google.maps.Polygon({
        paths: uttaraCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var uttara2Triangle = new google.maps.Polygon({
        paths: uttara2Coords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var mirpurTriangle = new google.maps.Polygon({
        paths: mirpurCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });
      //
      //
      // Construct the polygon.
      var mirpur2Triangle = new google.maps.Polygon({
        paths: mirpur2Coords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var bhataraTriangle = new google.maps.Polygon({
        paths: bhataraCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var bananiTriangle = new google.maps.Polygon({
        paths: bananiCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      // Construct the polygon.
      var wariTriangle = new google.maps.Polygon({
        paths: wariCoords,
        strokeColor: "green",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "green",
        fillOpacity: 0.35,
      });

      let distanceArray = [];
      let today = new Date();

      var setLatlng = function setLatlng() {
        let day = today.getDay();

        sylhetDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          sylhetOutlet
        );
        distanceArray.push(sylhetDistance);

        jamunaDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          jamunaOutlet
        );
        distanceArray.push(jamunaDistance);

        bailyDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          bailyTriangle
        );
        bailyDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          bailyOutlet
        );
        distanceArray.push(bailyDistance);

        chittagongDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          chittagongTriangle
        );
        chittagongDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          chittagongOutlet
        );
        distanceArray.push(chittagongDistance);

        dhanmondiDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          dhanmondiTriangle
        );
        dhanmondiDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          dhanmondiOutlet
        );
        distanceArray.push(dhanmondiDistance);

        gulshanDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          gulshanTriangle
        );
        gulshanDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          gulshanOutlet
        );
        distanceArray.push(gulshanDistance);

        gulshan2Delivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          gulshan2Triangle
        );
        gulshan2Distance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          gulshan2Outlet
        );
        distanceArray.push(gulshan2Distance);

        gulshan3Delivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          gulshan3Triangle
        );
        gulshan3Distance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          gulshan3Outlet
        );
        distanceArray.push(gulshan3Distance);

        dhanmondi2Delivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          dhanmondi2Triangle
        );
        dhanmondi2Distance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          dhanmondi2Outlet
        );
        distanceArray.push(dhanmondi2Distance);

        uttaraDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          uttaraTriangle
        );
        uttaraDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          uttaraOutlet
        );
        distanceArray.push(uttaraDistance);

        uttara2Delivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          uttara2Triangle
        );
        uttara2Distance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          uttara2Outlet
        );
        distanceArray.push(uttara2Distance);

        bhataraDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          bhataraTriangle
        );
        bhataraDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          bhataraOutlet
        );
        // if(day != 3){
        distanceArray.push(bhataraDistance);
        // }

        bananiDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          bananiTriangle
        );
        bananiDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          bananiOutlet
        );
        distanceArray.push(bananiDistance);

        mirpurDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          mirpurTriangle
        );
        mirpurDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          mirpurOutlet
        );
        distanceArray.push(mirpurDistance);

        mirpur2Delivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          mirpur2Triangle
        );
        mirpur2Distance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          mirpur2Outlet
        );
        distanceArray.push(mirpur2Distance);

        wariDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          wariTriangle
        );
        wariDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          wariOutlet
        );
        distanceArray.push(wariDistance);

        savarDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          savarTriangle
        );
        savarDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          savarOutlet
        );
        distanceArray.push(savarDistance);

        coxDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          coxTriangle
        );
        coxDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          coxOutlet
        );
        distanceArray.push(coxDistance);

        adaborDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          adaborTriangle
        );
        adaborDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          adaborOutlet
        );
        distanceArray.push(adaborDistance);

        banasreeDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          banasreeTriangle
        );
        banasreeDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          banasreeOutlet
        );
        distanceArray.push(banasreeDistance);

        shewraparaDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          shewraparaTriangle
        );
        shewraparaDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          shewraparaOutlet
        );
        distanceArray.push(shewraparaDistance);

        greenroadDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          greenroadTriangle
        );
        greenroadDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          greenroadOutlet
        );
        distanceArray.push(greenroadDistance);

        uttara6Delivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          uttara6Triangle
        );
        uttara6Distance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          uttara6Outlet
        );
        distanceArray.push(uttara6Distance);

        basaboDelivery = google.maps.geometry.poly.containsLocation(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          basaboTriangle
        );
        basaboDistance = calculateDistance(
          new google.maps.LatLng(sklLatLng.lat, sklLatLng.lng),
          basaboOutlet
        );
        distanceArray.push(basaboDistance);

        if (dhanmondiDelivery) {
          console.log(branches[2].tag);
          setStore(branches[2].tag);
        } else if (bailyDelivery) {
          console.log(branches[4].tag);
          setStore(branches[4].tag);
        } else if (chittagongDelivery) {
          console.log(branches[14].tag);
          setStore(branches[14].tag);
        } else if (dhanmondi2Delivery) {
          console.log(branches[3].tag);
          setStore(branches[3].tag);
        } else if (gulshanDelivery) {
          console.log(branches[0].tag);
          setStore(branches[0].tag);
        } else if (gulshan2Delivery) {
          console.log(branches[1].tag);
          setStore(branches[1].tag);
        } else if (gulshan3Delivery) {
          console.log(branches[20].tag);
          setStore(branches[20].tag);
        } else if (uttaraDelivery) {
          console.log(branches[5].tag);
          setStore(branches[5].tag);
        } else if (uttara2Delivery) {
          console.log(branches[6].tag);
          setStore(branches[6].tag);
        } else if (bhataraDelivery) {
          console.log(branches[7].tag);
          setStore(branches[7].tag);
        } else if (bananiDelivery) {
          setStore(branches[8].tag);
          console.log(branches[8].tag);
        } else if (mirpurDelivery) {
          console.log(branches[9].tag);
          setStore(branches[9].tag);
        } else if (mirpur2Delivery) {
          console.log(branches[10].tag);
          setStore(branches[10].tag);
        } else if (wariDelivery) {
          console.log(branches[11].tag);
          setStore(branches[11].tag);
        } else if (savarDelivery) {
          console.log(branches[12].tag);
          setStore(branches[12].tag);
        } else if (coxDelivery) {
          console.log(branches[13].tag);
          setStore(branches[13].tag);
        } else if (adaborDelivery) {
          console.log(branches[17].tag);
          setStore(branches[17].tag);
        } else if (banasreeDelivery) {
          console.log(branches[18].tag);
          setStore(branches[18].tag);
        } else if (shewraparaDelivery) {
          console.log(branches[19].tag);
          setStore(branches[19].tag);
        } else if (greenroadDelivery) {
          console.log(branches[21].tag);
          setStore(branches[21].tag);
        } else if (uttara6Delivery) {
          console.log(branches[22].tag);
          setStore(branches[22].tag);
        } else if (basaboDelivery) {
          console.log(branches[23].tag);
          setStore(branches[23].tag);
        } else {
          // console.log(distanceArray);
          let nearestOutlet = distanceArray.sort((a, b) => a - b).slice(0, 2);
          let nearestOutlet_1 = nearestOutlet[0];
          let nearestOutlet_2 = nearestOutlet[1];
          let takeAway = [];
          let minimum_distance = 20.0;
          // console.log(nearestOutlet);

          if (
            nearestOutlet_1 == gulshanDistance ||
            nearestOutlet_2 == gulshanDistance
          ) {
            if (gulshanDistance < minimum_distance)
              takeAway.push([branches[0].tag, gulshanDistance]);
          }

          if (
            nearestOutlet_1 == gulshan2Distance ||
            nearestOutlet_2 == gulshan2Distance
          ) {
            if (gulshan2Distance < minimum_distance)
              takeAway.push([branches[1].tag, gulshan2Distance]);
          }

          if (
            nearestOutlet_1 == gulshan3Distance ||
            nearestOutlet_2 == gulshan3Distance
          ) {
            if (gulshan3Distance < minimum_distance)
              takeAway.push([branches[20].tag, gulshan3Distance]);
          }

          if (
            nearestOutlet_1 == dhanmondiDistance ||
            nearestOutlet_2 == dhanmondiDistance
          ) {
            if (dhanmondiDistance < minimum_distance)
              takeAway.push([branches[2].tag, dhanmondiDistance]);
          }

          if (
            nearestOutlet_1 == dhanmondi2Distance ||
            nearestOutlet_2 == dhanmondi2Distance
          ) {
            if (dhanmondi2Distance < minimum_distance)
              takeAway.push(branches[3].tag, dhanmondi2Distance);
          }

          if (
            nearestOutlet_1 == bailyDistance ||
            nearestOutlet_2 == bailyDistance
          ) {
            if (bailyDistance < minimum_distance)
              takeAway.push([branches[4].tag, bailyDistance]);
          }

          if (
            nearestOutlet_1 == uttaraDistance ||
            nearestOutlet_2 == uttaraDistance
          ) {
            if (uttaraDistance < minimum_distance)
              takeAway.push([branches[5].tag, uttaraDistance]);
          }

          if (
            nearestOutlet_1 == uttara2Distance ||
            nearestOutlet_2 == uttara2Distance
          ) {
            if (uttara2Distance < minimum_distance)
              takeAway.push([branches[6].tag, uttara2Distance]);
          }

          if (
            nearestOutlet_1 == bhataraDistance ||
            nearestOutlet_2 == bhataraDistance
          ) {
            if (bhataraDistance < minimum_distance)
              takeAway.push([branches[7].tag, bhataraDistance]);
          }

          if (
            nearestOutlet_1 == bananiDistance ||
            nearestOutlet_2 == bananiDistance
          ) {
            if (bananiDistance < minimum_distance)
              takeAway.push([branches[8].tag, bananiDistance]);
          }

          if (
            nearestOutlet_1 == mirpurDistance ||
            nearestOutlet_2 == mirpurDistance
          ) {
            if (mirpurDistance < minimum_distance)
              takeAway.push([branches[9].tag, mirpurDistance]);
          }

          if (
            nearestOutlet_1 == mirpur2Distance ||
            nearestOutlet_2 == mirpur2Distance
          ) {
            if (mirpur2Distance < minimum_distance)
              takeAway.push([branches[10].tag, mirpur2Distance]);
          }

          if (
            nearestOutlet_1 == wariDistance ||
            nearestOutlet_2 == wariDistance
          ) {
            if (wariDistance < minimum_distance)
              takeAway.push([branches[11].tag, wariDistance]);
          }
          if (
            nearestOutlet_1 == savarDistance ||
            nearestOutlet_2 == savarDistance
          ) {
            if (savarDistance < minimum_distance)
              takeAway.push([branches[12].tag, savarDistance]);
          }
          if (
            nearestOutlet_1 == coxDistance ||
            nearestOutlet_2 == coxDistance
          ) {
            if (coxDistance < minimum_distance)
              takeAway.push([branches[13].tag, coxDistance]);
          }
          if (
            nearestOutlet_1 == chittagongDistance ||
            nearestOutlet_2 == chittagongDistance
          ) {
            if (chittagongDistance < minimum_distance)
              takeAway.push([branches[14].tag, chittagongDistance]);
          }
          if (
            nearestOutlet_1 == sylhetDistance ||
            nearestOutlet_2 == sylhetDistance
          ) {
            if (sylhetDistance < minimum_distance)
              takeAway.push([branches[15].tag, sylhetDistance]);
          }
          // if(day != 3) {
          if (
            nearestOutlet_1 == jamunaDistance ||
            nearestOutlet_2 == jamunaDistance
          ) {
            if (jamunaDistance < minimum_distance)
              takeAway.push([branches[16].tag, jamunaDistance]);
          }
          // }
          if (
            nearestOutlet_1 == adaborDistance ||
            nearestOutlet_2 == adaborDistance
          ) {
            if (adaborDistance < minimum_distance)
              takeAway.push([branches[17].tag, adaborDistance]);
          }
          if (
            nearestOutlet_1 == banasreeDistance ||
            nearestOutlet_2 == banasreeDistance
          ) {
            if (banasreeDistance < minimum_distance)
              takeAway.push([branches[18].tag, banasreeDistance]);
          }
          if (
            nearestOutlet_1 == shewraparaDistance ||
            nearestOutlet_2 == shewraparaDistance
          ) {
            if (shewraparaDistance < minimum_distance)
              takeAway.push([branches[19].tag, shewraparaDistance]);
          }
          if (
            nearestOutlet_1 == greenroadDistance ||
            nearestOutlet_2 == greenroadDistance
          ) {
            if (greenroadDistance < minimum_distance)
              takeAway.push([branches[21].tag, greenroadDistance]);
          }
          if (
            nearestOutlet_1 == uttara6Distance ||
            nearestOutlet_2 == uttara6Distance
          ) {
            if (uttara6Distance < minimum_distance)
              takeAway.push([branches[22].tag, uttara6Distance]);
          }
          if (
            nearestOutlet_1 == basaboDistance ||
            nearestOutlet_2 == basaboDistance
          ) {
            if (basaboDistance < minimum_distance)
              takeAway.push([branches[23].tag, basaboDistance]);
          }
          setStore(takeAway);
        }

        //calculates distance between two points in km's
        function calculateDistance(pointer_1, pointer_2) {
          var dist = (
            google.maps.geometry.spherical.computeDistanceBetween(
              pointer_1,
              pointer_2
            ) / 1000
          ).toFixed(2);
          return parseFloat(dist);
        }
      };

      var card = document.getElementById("pac-card");
      var input = document.getElementById("pac-input");
      var types = document.getElementById("type-selector");
      var strictBounds = document.getElementById("strict-bounds-selector");

      displayCurrentLocation();

      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 23.804093, lng: 90.4152376 },
        zoom: 18,
      });

      map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

      autocomplete = new google.maps.places.Autocomplete(input);

      // Bind the map's bounds (viewport) property to the autocomplete object,
      // so that the autocomplete requests use the current map bounds for the
      // bounds option in the request.
      autocomplete.bindTo("bounds", map);

      //Search the result only in Bangladesh
      autocomplete.setComponentRestrictions({ country: ["bd"] });

      // Set the data fields to return when the user selects a place.
      autocomplete.setFields([
        "address_components",
        "geometry",
        "icon",
        "name",
      ]);

      var infowindow = new google.maps.InfoWindow();
      var infowindowContent = document.getElementById("infowindow-content");
      infowindow.setContent(infowindowContent);
      var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29),
      });

      autocomplete.addListener("place_changed", function () {
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
          console.log(latitude);
          console.log(longitude);
          // latInput.value = latitude;
          // lngInput.value = longitude;

          var location = {
            lat: latitude,
            lng: longitude,
            searchLocation: "Google",
          };

          sessionStorage.setItem("location", JSON.stringify(location));
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17); // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = "";
        if (place.address_components) {
          address = [
            (place.address_components[0] &&
              place.address_components[0].short_name) ||
              "",
            (place.address_components[1] &&
              place.address_components[1].short_name) ||
              "",
            (place.address_components[2] &&
              place.address_components[2].short_name) ||
              "",
          ].join(" ");
        }

        infowindowContent.children["place-icon"].src = place.icon;
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-address"].textContent = address;
        // infowindow.open(map, marker);
        setLocation(address, latitude, longitude);
        setLatlng();
      });

      function displayCurrentLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
            let myCustomLocation = JSON.parse(
              sessionStorage.getItem("location")
            );
            let currentLatLng;
            // console.log(myCustomLocation)
            if (myCustomLocation) {
              currentLatLng = {
                lat: parseFloat(myCustomLocation.lat),
                lng: parseFloat(myCustomLocation.lng),
              };
            } else {
              currentLatLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
              };
            }

            // const currentLatLng = {
            //     lat: position.coords.latitude,
            //     lng: position.coords.longitude,
            // };

            // Reverse geocode the current location to get the address
            reverseGeocode(currentLatLng);

            // Initialize the map with the current location
            // initialLocation = currentLatLng;

            map = new google.maps.Map(document.getElementById("map"), {
              center: currentLatLng,
              zoom: 18,
            });

            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
            autocomplete.bindTo("bounds", map);

            //Search the result only in Bangladesh
            autocomplete.setComponentRestrictions({
              country: ["bd"],
            });

            // Set the data fields to return when the user selects a place.
            autocomplete.setFields([
              "address_components",
              "geometry",
              "icon",
              "name",
            ]);

            marker = new google.maps.Marker({
              position: currentLatLng,
              map: map,
              draggable: true,
            });

            google.maps.event.addListener(marker, "dragend", function () {
              updateLocationFromMarker();
            });

            var infowindow = new google.maps.InfoWindow();
            var infowindowContent =
              document.getElementById("infowindow-content");
            infowindow.setContent(infowindowContent);

            google.maps.event.addListener(
              autocomplete,
              "place_changed",
              function () {
                infowindow.close();
                marker.setVisible(true);
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                  alert("No details available for input: '" + place.name + "'");
                  return;
                }

                map.setCenter(place.geometry.currentLatLng);
                marker.setPosition(place.geometry.currentLatLng);
                updateLocationFromMarker();

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
                  var latitude = place.geometry.location.lat();
                  var longitude = place.geometry.location.lng();
                  // setLocation(latitude,longitude);
                  sklLatLng.lat = latitude;
                  sklLatLng.lng = longitude;
                  // setLatlng();
                  console.log(latitude);
                  console.log(longitude);
                  // latInput.value = latitude;
                  // lngInput.value = longitude;
                  var location = {
                    lat: latitude,
                    lng: longitude,
                    searchLocation: "Google",
                  };

                  sessionStorage.setItem("location", JSON.stringify(location));
                } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17); // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = "";
                if (place.address_components) {
                  address = [
                    (place.address_components[0] &&
                      place.address_components[0].short_name) ||
                      "",
                    (place.address_components[1] &&
                      place.address_components[1].short_name) ||
                      "",
                    (place.address_components[2] &&
                      place.address_components[2].short_name) ||
                      "",
                  ].join(" ");
                }

                infowindowContent.children["place-icon"].src = place.icon;
                infowindowContent.children["place-name"].textContent =
                  place.name;
                infowindowContent.children["place-address"].textContent =
                  address;
                // infowindow.open(map, marker);
                setLocation(address, latitude, longitude);
                setLatlng();
              }
            );
          });
        } else {
          input.value = "Geolocation is not supported by your browser.";
        }
      }

      function reverseGeocode(location) {
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: location }, function (results, status) {
          if (status === "OK" && results[0]) {
            let check = "Custom";
            updateLocationSession(results, check);
          }
        });
      }

      function updateLocationFromMarker() {
        const markerPosition = marker.getPosition();
        geocoder.geocode(
          { location: markerPosition },
          function (results, status) {
            if (status === "OK" && results[0]) {
              let check = "Custom";
              updateLocationSession(results, check);
            }
          }
        );
      }
      function updateLocationSession(results, check) {
        const fullAddress = results[0].formatted_address;
        input.value = fullAddress;
        var location = {
          lat: results[0].geometry.location.lat(),
          lng: results[0].geometry.location.lng(),
          searchLocation: check,
        };
        sessionStorage.setItem("location", JSON.stringify(location));
      }
    });
}
