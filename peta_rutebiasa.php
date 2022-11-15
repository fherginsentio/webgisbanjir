<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
   <meta charset="utf-8">
  <title>Sistem Evakuasi Gempa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body onLoad="getLocation()">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><?php include "config/menu.php"; ?>
					
				</div>	
			</nav>	
		</div>
	</div>
	<br>
	<br>
		<div class="row clearfix">
			<div class="col-md-12 column">
				<h1><center>Rute Shelter Pilihan</center></h1>
			<br>
			<div  id="mapcanvas"> 
            
            <script>
var view = document.getElementById("tampilkan");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 
function showPosition(position) {


// AWAL SETTING MARKER SAYA
    lat = position.coords.latitude;
    lon = position.coords.longitude;
		
    latlon = new google.maps.LatLng(lat, lon)
    mapcanvas = document.getElementById('mapcanvas')
    mapcanvas.style.height = '400px';
    mapcanvas.style.width = '1100px';
 
    var myOptions = {
    center:latlon,
    zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    }
// AKHIR SETTING AWAL MARKER SAYA
// SET PETA
    var directionsService = new google.maps.DirectionsService();
     var directionsDisplay = new google.maps.DirectionsRenderer();
// AKHIR PETA
   
    var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
      var infoWindow = new google.maps.InfoWindow;
	 
// PETA
	 directionsDisplay.setMap(map);
     directionsDisplay.setPanel(document.getElementById('panel'));

     var request = {
       origin: latlon, 
       destination: '<?php $daddr3=$_GET['daddr']; echo $daddr3;?>',
       travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
	 //AKHIR PETA
}
 
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
            break;
        case error.POSITION_UNAVAILABLE:
            view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
            break;
        case error.TIMEOUT:
            view.innerHTML = "Requestnya timeout bro"
            break;
        case error.UNKNOWN_ERROR:
            view.innerHTML = "An unknown error occurred."
            break;
    }
 }
 
 
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
 
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
 
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
 
      request.open('GET', url, true);
      request.send(null);
    }
 
    function doNothing() {}
	
</script>
            
            </div>
            <div id="panel"   style="width: 300px; float:right;"></div>
			</div>
		</div>
</div>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuLcQqHx8HfXBmYjB8d5cGSD4ULH6A098&callback=mapcanvas"></script>
</body>
</html>
