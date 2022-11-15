<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuLcQqHx8HfXBmYjB8d5cGSD4ULH6A098"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
<script>
jQuery(document).ready(function($) { 

    var map = new google.maps.Map(document.getElementById("mapcanvas"), {
        zoom: 13,
        mapTypeId: 'roadmap'
    });

    // Try HTML5 geolocation
	var lat,lng;
	if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.setCenter(pos);
            map.setZoom(13);
			show_route(position.coords.latitude, position.coords.longitude);
		}, function() {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
		console.log("Tidak support google map");
    } 
	function show_route(lat, lng){
		// Change this depending on the name of your PHP file
		var user_location = lat+","+lng;
		console.log(user_location);
		$.get("ajax_jalurevakuasi.php?position="+user_location, function( xml ) {
			var markers = xml.documentElement.getElementsByTagName("marker");
			console.log(markers);
			for (var i = 0; i < markers.length; i++) {
				addMarkerPair( markers[i], map, i );
			}
		}, 'xml' );
	}
});

function addMarkerPair( pair, map, panel ) {
    function get( name ) {
        return pair.getAttribute( name );
	}
	
    var title = get("markers");
    var mode = get("mode");
    var startpoint = new google.maps.LatLng(
        +get("startlat"),
        +get("startlng")
    );
    var endpoint = new google.maps.LatLng(
        +get("endlat"),
        +get("endlng")
    );
    calcRoute( map, mode, startpoint, endpoint, panel );
    console.log(title);
}

function calcRoute( map, mode, startpoint, endpoint, panel ) {
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById('panel'+panel));
    var request = {
        origin: startpoint,
        destination: endpoint,
        //waypoints: waypts,
        travelMode: google.maps.DirectionsTravelMode[mode]
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
}
</script>
</head>

<center>Jalur Evakuasi Menuju Shelter Terdekat</center>
<body>
    <div class="row clearfix">
		<div class="col-md-12 column">
		<div class="row clearfix">
		<div class="col-md-12 column">
		<div id="mapcanvas" style="width: 1340px; height: 800px" ></div>
		<div id="panel0" style="width: 400px; float:left;">Jalur Evakuasi 1</div>
		<div id="panel1" style="width: 400px; float:left;">Jalur Evakuasi 2</div>
		<div id="panel2" style="width: 400px; float:left;">Jalur Evakuasi 3</div>  <!-- LETAK RUTE -->
		</div>
		</div>
		
		</div>
	</div>
</div>
	
</body>
</html>