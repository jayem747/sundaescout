<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SundaeScout home</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <header>
    <div class="topnav">
      <a href="index.php"><img src="assets/logo.png" width="25px"></a>
      <a href="account.php">account</a>
      <?php
      session_start();
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo '<a href="logout.php">log uit</a>';
      }
      ?>
    </div>
  </header>
  <div id="map"></div>

  <script>
    function initMap() {
    var leiden = { lat: 52.1601, lng: 4.4970 };
    var map = new google.maps.Map(document.getElementById('map'), {
        center: leiden,
        zoom: 13
    });

    var input = document.createElement('input');
    input.id = 'search-bar';
    input.type = 'text';
    input.placeholder = 'Search for a location in Leiden...';
    input.style.margin = '10px';

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox(input);

    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length === 0) {
        return;
        }

        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
        if (!place.geometry) {
            console.log('Returned place contains no geometry');
            return;
        }

        var marker = new google.maps.Marker({
            map: map,
            title: place.name,
            position: place.geometry.location
        });

        bounds.extend(place.geometry.location);
        });

        map.fitBounds(bounds);
    });

    // Generate a random route
    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: true,
        preserveViewport: true
    });

    var request = {
        origin: leiden,
        destination: leiden,
        travelMode: google.maps.TravelMode.DRIVING
    };

    directionsService.route(request, function(result, status) {
        if (status === google.maps.DirectionsStatus.OK) {
        directionsRenderer.setDirections(result);
        }
    });
    }


    window.onload = function() {
      initMap();
    };
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initMap" async defer></script>
</body>
</html>
