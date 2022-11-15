
<script src="grafik/js/Chart.js"></script>



			 
<?php
	include('grafik/koneksi.php');
	
	$Grafik	=	$_GET['jenis'];
	
	if(!empty($Grafik)){
		
		if($Grafik==1){
	
			$terpapar = $koneksi->query("SELECT * FROM tb_terpapar INNER JOIN tb_kecamatan ON tb_terpapar.id_kec=tb_kecamatan.id_kec order by tb_terpapar.id_kec asc");
				while($data = $terpapar->fetch_assoc()){
					$labels[] = $data['nama_kec'];
					$index[] =  str_replace(',','.',$data['indeks_terpapar']);
					
					if($data['kelas_terpapar']=="SEDANG"){
					$color[] = "orange";
				}else if($data['kelas_terpapar']=="TINGGI"){
					$color[] = "red";
				}else{
					$color[] = "green";
				}
			}
			
			echo '<h2><center>GRAFIK INDEK PENDUDUK TERPAPAR BANJIR</center></h2>';
						
			echo "<div style='text-align:center; margin-bottom:20px'>";
			
			echo "<span  style='background-color:red; padding:5px; color:white; margin-right:10px'> Tinggi</span>";
			echo "<span  style='background-color:orange; padding:5px; color:white; margin-right:10px'> Sedang</span>";
			echo "<span  style='background-color:green; padding:5px; color:white; margin-right:10px'> Rendah</span>";
			
			echo"</div>";
			
		}else if($Grafik==2){
	
			$kapasitas = $koneksi->query("SELECT * FROM tb_kapasitas INNER JOIN tb_kecamatan ON tb_kapasitas.id_kec=tb_kecamatan.id_kec order by tb_kapasitas.id_kec asc");
			while($data = $kapasitas->fetch_assoc()){
					$labels[] = $data['nama_kec'];
					$index[] =  str_replace(',','.',$data['indeks_kapasitas']);
					
					if($data['kelas_kapasitas']=="SEDANG"){
					$color[] = "orange";
				}else if($data['kelas_kapasitas']=="TINGGI"){
					$color[] = "red";
				}else{
					$color[] = "green";
				}
			}
			
			echo '<h2><center>GRAFIK INDEK KAPASITAS BANJIR</center></h2>';
						
			echo "<div style='text-align:center; margin-bottom:20px'>";
			
			echo "<span  style='background-color:red; padding:5px; color:white; margin-right:10px'> Tinggi</span>";
			echo "<span  style='background-color:orange; padding:5px; color:white; margin-right:10px'> Sedang</span>";
			echo "<span  style='background-color:green; padding:5px; color:white; margin-right:10px'> Rendah</span>";
			
			echo"</div>";
			
		}else if($Grafik==3){
	
			$rugi = $koneksi->query("SELECT * FROM tb_kerugian INNER JOIN tb_kecamatan ON tb_kerugian.id_kec=tb_kecamatan.id_kec order by tb_kerugian.id_kec asc");
			while($data = $rugi->fetch_assoc()){
					$labels[] = $data['nama_kec'];
					$index[] =   str_replace(',','.',$data['indeks_kerugianrupiah']);
									
				if($data['kelas_kerugianrupiah']=="SEDANG"){
					$color[] = "orange";
				}else if($data['kelas_kerugianrupiah']=="TINGGI"){
					$color[] = "red";
				}else{
					$color[] = "green";
				}
			  
			}
			
			echo '<h2><center>GRAFIK INDEK KERUGIAN</center></h2>';
						
			echo "<div style='text-align:center; margin-bottom:20px'>";
			
			echo "<span  style='background-color:red; padding:5px; color:white; margin-right:10px'> Tinggi</span>";
			echo "<span  style='background-color:orange; padding:5px; color:white; margin-right:10px'> Sedang</span>";
			echo "<span  style='background-color:green; padding:5px; color:white; margin-right:10px'> Rendah</span>";
			
			echo"</div>";
			
		}else if($Grafik==4){
	
			$luas = $koneksi->query("SELECT * FROM tb_luasbahaya INNER JOIN tb_kecamatan ON tb_luasbahaya.id_kec=tb_kecamatan.id_kec order by tb_luasbahaya.id_kec asc");
			while($data = $luas->fetch_assoc()){
					$labels[] = $data['nama_kec'];
					$index[] =  str_replace(',','.',$data['indeks_bahaya']);
					
									
				if($data['kelas_bahaya']=="SEDANG"){
					$color[] = "orange";
				}else if($data['kelas_bahaya']=="TINGGI"){
					$color[] = "red";
				}else{
					$color[] = "green";
				}
			}
			
			echo '<h2><center>GRAFIK INDEK LUAS BAHAYA</center></h2>';
						
			echo "<div style='text-align:center; margin-bottom:20px'>";
			
			echo "<span  style='background-color:red; padding:5px; color:white; margin-right:10px'> Tinggi</span>";
			echo "<span  style='background-color:orange; padding:5px; color:white; margin-right:10px'> Sedang</span>";
			echo "<span  style='background-color:green; padding:5px; color:white; margin-right:10px'> Rendah</span>";
			
			echo"</div>";
			
		}else if($Grafik==5){
	
			$rusak = $koneksi->query("SELECT * FROM tb_kerugian INNER JOIN tb_kecamatan ON tb_kerugian.id_kec=tb_kecamatan.id_kec order by tb_kerugian.id_kec asc");
			while($data = $rusak->fetch_assoc()){
				$labels[] = $data['nama_kec'];
				$index[] =   str_replace(',','.',$data['indeks_rusaklingkungan']);
				
				if($data['kelas_rusaklingkungan']=="SEDANG"){
					$color[] = "orange";
				}else if($data['kelas_rusaklingkungan']=="TINGGI"){
					$color[] = "red";
				}else{
					$color[] = "green";
				}	
				
				
			}
			
			echo '<h2><center>GRAFIK INDEK KERUSAKAN LINGKUNGAN</center></h2><br></br>';
			
			echo "<div style='text-align:center; margin-bottom:20px'>";
			
			echo "<span  style='background-color:red; padding:5px; color:white; margin-right:10px'> Tinggi</span>";
			echo "<span  style='background-color:orange; padding:5px; color:white; margin-right:10px'> Sedang</span>";
			echo "<span  style='background-color:green; padding:5px; color:white; margin-right:10px'> Rendah</span>";
			
			echo"</div>";
			
		}
		
	}
	
	/* var_dump($index); */
	/* "red", "green", "blue", "purple", "magenta" */
?>

<div class="chart-container" style="position: fixed;  width:80%; margin-left:9%">
	<canvas id="barchart"></canvas>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("barchart").getContext("2d");
	var barChartData = {
	labels: <?= json_encode($labels); ?>,
	
	datasets: [{
	  label: 'Indeks Data',
	   backgroundColor : [
	   
	   <?php
			
				foreach ($color as $cl){
	   
	   ?>
          "<?php echo $cl?>",
		  
				<?php }?>
		  
        ],
	  
	  borderColor: 'rgb(124,252,0)',
	  borderWidth: 1,
	  
	  data: <?= json_encode($index); ?>,
	  
	}]
	};
	
	window.onload = function() {
		window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				
				options: {
					responsive: true,
					legend: {
						
						display : false,
					},
					title: {
						display: true,
						position: 'left',
						text: 'Nilai Indeks'
					},

					scales: {
      yAxes: [{
        id: 'A',
        type: 'linear',
        position: 'left',
		ticks: {
          max: 1,
          min: 0
        },

      }]
    }
					
				}
		});
	};
</script>
