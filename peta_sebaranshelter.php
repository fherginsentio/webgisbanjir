<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuLcQqHx8HfXBmYjB8d5cGSD4ULH6A098"></script>
    
    <script>
 //variabel Map yang dipake.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13
        });
		var infoWindow = new google.maps.InfoWindow;
		//ending variabel map
		
        // Menggunakan fungsi HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
			  
		// menampilkan latitude dan longitude pada id lat dan lng
        var lat = position.coords.latitude;
    	var lng = position.coords.longitude;
			 
		//marker geolocation
             marker = new google.maps.Marker({
              position: pos,
              map: map,
              icon: 'location.png',
              title: 'Posisi Kamu',
              animation: google.maps.Animation.DROP,
            });//ending marker geolocation
			
			//document.form1.media.value = pos;
			  
			map.setCenter(pos);
            var user_location = position.coords.latitude+","+position.coords.longitude;
			
			
			var url = "ajax_tampilsemua.php";
			$.ajax({
                url: url,
				data : "position="+decodeURI(user_location),
                dataType: 'json',
                cache: true,
                success: function(msg){
                  for(i=0; i < msg.data.shelter.length;i++)
				  {
					var point = new google.maps.LatLng(parseFloat(msg.data.shelter[i].latitude),parseFloat(msg.data.shelter[i].longitude));
					var name = msg.data.shelter[i].namashelter;
					var lat1 = msg.data.shelter[i].latitude;
					var lng1 = msg.data.shelter[i].longitude;
					var address = msg.data.shelter[i].alamat;
					var jumlahlantai = msg.data.shelter[i].jumlahlantai;
					var dayatampung = msg.data.shelter[i].dayatampung;
					var type = msg.data.shelter[i].fungsi;
					var penanda = msg.data.shelter[i].penanda;
					var temukan = "<a href='peta_rutebiasa.php?daddr="+lat1+","+lng1+"'>Temukan</a>";
					var html =  name + "</b><br/>" + address +"</b><br/>"+ 
						jumlahlantai+" Lantai"+"</b><br/>"+
						dayatampung+" orang"+"</b><br/>"+
						temukan;
					var customIcons = {
						Kantor: {
							icon: penanda
						},
						Rumahsakit: {
							icon: penanda
						},
						Pasar: {
							icon: penanda
						},
						Supermarket: {
							icon: penanda
						},
						Perumahan: {
							icon: penanda
						},
						Perumahan: {
							icon: penanda
						},
						Sekolah: {
							icon: penanda
						},
						Kampus: {
							icon: penanda
						},
						Plaza: {
							icon: penanda
						},
						Hotel: {
							icon: penanda
						},
						Ibadah: {
							icon: penanda
						}
					};

					var icon = customIcons[type] || {};
                    tanda = new google.maps.Marker({
                        position: point,
                        map: map,
                        icon: icon.icon,
                        animation: google.maps.Animation.DROP,
					});//ending marker posisi atm

				  function bindInfoWindow(tanda, map, infoWindow, html) {
        			google.maps.event.addListener(tanda, 'click', function() {
        			infoWindow.setContent(html);
        			infoWindow.open(map, tanda);
        			});} //endingbind info windows
				  bindInfoWindow(tanda, map, infoWindow, html);
				  }//ending for	  	
				}//ending success
				});//ending ajax
		
          }, function() {//ending navigator.location
            handleLocationError(true, map.getCenter());
          });
        } else {//ending if location
          handleLocationError(false, map.getCenter());
        }
		function handleLocationError(browserHasGeolocation, pos) {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -2.548926, lng: 118.0148634},
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
		  
	 
	 
	  //fungsi geolocation Jika lokasi ada
      function handleLocationError(browserHasGeolocation, pos) {
        var map = new google.maps.Map(document.getElementById('map'), {
          
          zoom: 13
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }

      google.maps.event.addDomListener(window, 'load', initMap);
    </script>
 

<meta charset="utf-8">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>


<center>Lokasi Shelter</center>
<body onload="initMap()">
<div id="map" align="center" style="width: 1340px; height: 800px"></div>
</body>

</html>
