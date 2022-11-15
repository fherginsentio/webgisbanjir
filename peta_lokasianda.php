<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuLcQqHx8HfXBmYjB8d5cGSD4ULH6A098"></script>
<script>
function initMap() 
{
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 12
}); //ending variabel map

var infoWindow = new google.maps.InfoWindow;
// Menggunakan fungsi HTML5 geolocation.
if (navigator.geolocation) 
 {
   navigator.geolocation.getCurrentPosition(function(position) {
	var pos = {lat: position.coords.latitude,lng: position.coords.longitude};
	
	// menampilkan latitude dan longitude pada id lat dan lng
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
	
	//marker geolocation
	marker = new google.maps.Marker({
	position: pos,
	map: map,
	icon: 'location.png',
	title: 'Posisi Anda',
	animation: google.maps.Animation.DROP,
	});//ending marker geolocation

	//pengaturan posisi tengah peta
	map.setCenter(pos);
	var user_location = position.coords.latitude+","+position.coords.longitude;
   }, function() { //ending navigator geolocation
  handleLocationError(true, map.getCenter()); });
 } else {
  handleLocationError(false, map.getCenter());
 }

//menjalankan fungsi geolocation
function handleLocationError(browserHasGeolocation, pos) {
var map = new google.maps.Map(document.getElementById('map'), {
center: {lat: -0.899603, lng: 100.364264},  
zoom: 13
});
var infoWindow = new google.maps.InfoWindow({map: map});
infoWindow.setPosition(pos);
infoWindow.setContent(browserHasGeolocation ?
	  'Error: The Geolocation service failed.' :
	  'Error: Your browser doesn\'t support geolocation.');
}

google.maps.event.addDomListener(window, 'load', initMap);
}//ending init Map
</script> 
<meta charset="utf-8">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>


<center>Lokasi Anda</center>
<body onLoad="initMap()">
<div id="map" style="width: 1340px; height: 800px" align="center"></div>
</body>

</html>
