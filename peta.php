<div class="input-group"><!-- Buat sebuah textbox dan beri id keyword -->
	<input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
		<span class="input-group-btn">
		<!-- Buat sebuah tombol search dan beri id btn-search -->
		<button class="btn btn-primary" type="button" id="btn-search">SEARCH</button>
		<a href="" class="btn btn-warning">RESET</a>
		</span>
</div>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTL1Y3hIK6L-NuMojKK_L0NBCh0YGgSd0&callback=showPlaces"></script>-->
<style>
          html, body {
               font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
               font-size: medium;
               }
          #map {
               width: 1255px;
               height: 640px;
               border: 1px solid black;
          }
</style>
 <script>
	 
	 $("#btn-search").bind("click", function(){
		 var keyword = $("#keyword").val(); 
		 showPlaces(keyword); 
	 });
 
 //variabel Map yang dipake.
      function initMap() {
		  var pos = new google.maps.LatLng(-0.971731,100.396544); 
		  var map = new google.maps.Map(document.getElementById('map'), {
			center: pos,
			zoom: 13
        });
		var infoWindow = new google.maps.InfoWindow;
		
	
		//marker PLN
             marker = new google.maps.Marker({
              position: pos,
              map: map,
              icon: 'location.png',
              title: 'Posisi PLN',
            });//ending marker geolocation
			
			
			map.setCenter(pos);
			var url = "ajaxtampilsemua.php";
			$.ajax({
                url: url,
                dataType: 'json',
                cache: true,
                success: function(msg){
                  for(i=0; i < msg.data.atm.length;i++)
				  {
                    var point = new google.maps.LatLng(parseFloat(msg.data.atm[i].latitude),parseFloat(msg.data.atm[i].longitude));
					var name = msg.data.atm[i].nama;
					var lat = msg.data.atm[i].latitude;
					var lng = msg.data.atm[i].longitude;
					var address = msg.data.atm[i].alamat;
					var idlokasi = msg.data.atm[i].idpel;
					var type = msg.data.atm[i].daya;
					var penanda = msg.data.atm[i].penanda;
					var posisi = '-0.971731,100.396544';
					var temukan = "<a href='direction.php?daddr="+lat+ ","+lng+" &id_lokasi="+idlokasi+"&awal="+posisi+" '>Temukan</a>";
					var html =  idlokasi +"</b><br/>"+ name + "</b><br/>" + address +"</b><br/>"+ temukan;
					var customIcons = {
						450: {
							icon: penanda
						},
						900: {
							icon: penanda
						},
						1300: {
							icon: penanda
						},
						16500: {
							icon: penanda
						},
						2200: {
							icon: penanda
						},
						3500:{
							icon: penanda
						},
						33000:{
							icon: penanda
						}
					};

					var icon = customIcons[type] || {};
                    tanda = new google.maps.Marker({
                        position: point,
                        map: map,
                        icon: icon.icon,
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
		      google.maps.event.addDomListener(window, 'load', initMap);
	  }//ending init Map
		
	 
	 function showPlaces(coord) {
		var commaPos = coord.indexOf(',');
		var coordinatesLat = parseFloat(coord.substring(0, commaPos));
		var coordinatesLong = parseFloat(coord.substring(commaPos + 1, coord.length));
		 var pos = new google.maps.LatLng(coordinatesLat, coordinatesLong); 
		 var map = new google.maps.Map(document.getElementById('map'), {
			center: pos,
			zoom: 16
		 });
		 
		var infoWindow = new google.maps.InfoWindow;
		 console.log(coord);
		 //marker PLN
             marker = new google.maps.Marker({
              position: pos,
              map: map,
              icon: 'location.png',
              title: 'Posisi User Input',
              animation: google.maps.Animation.DROP,
            });//ending marker geolocation
		 
		 map.setCenter(pos);
		 var url = "ajaxtampilterdekat.php";
			$.ajax({
                url: url,
				type: 'GET',
                dataType: 'json',
                cache: true,
				data: {position: coord},
                success: function(msg){
                  for(i=0; i < msg.data.atm.length;i++)
				  {
                    var point = new google.maps.LatLng(parseFloat(msg.data.atm[i].latitude),parseFloat(msg.data.atm[i].longitude));
					var name = msg.data.atm[i].nama;
					var lat = msg.data.atm[i].latitude;
					var lng = msg.data.atm[i].longitude;
					var address = msg.data.atm[i].alamat;
					var idlokasi = msg.data.atm[i].idpel;
					var logobank = msg.data.atm[i].logobank;
					var type = msg.data.atm[i].daya;
					var penanda = msg.data.atm[i].penanda;
					var posisiinput = coordinatesLat+','+coordinatesLong;
					var temukan = "<a href='direction.php?daddr="+lat+ ","+lng+"&awal="+posisiinput+" '>Temukan</a>";
					var html =  idlokasi +"</b><br/>"+ name + "</b><br/>" + address +"</b><br/>"+ temukan;
					var customIcons = {
						450: {
							icon: penanda
						},
						900: {
							icon: penanda
						},
						1300: {
							icon: penanda
						},
						16500: {
							icon: penanda
						},
						2200: {
							icon: penanda
						},
						3500:{
							icon: penanda
						},
						33000:{
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
		    google.maps.event.addDomListener(window, 'load', initMap);
	  }//ending showPlaces
	 
	 
	 function testT(coord){
		 console.log(coord);
	 }
	 
    </script>
    <div id="page" class="content">
   	<div id="map"></div>
	</div>