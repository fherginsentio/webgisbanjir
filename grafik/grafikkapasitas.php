<?php
include('koneksi.php');
$kapasitas = $koneksi->query("SELECT * FROM tb_kapasitas INNER JOIN tb_kecamatan ON tb_kapasitas.id_kec=tb_kecamatan.id_kec order by tb_kapasitas.id_kec asc");
while($data = $kapasitas->fetch_assoc()){
  $labels[] = $data['nama_kec'];
  $index_kapasitas[] =  (float)$data['indeks_kapasitas'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Kapasitas Banjir</title>
  <script src="js/Chart.js"></script>
  <style type="text/css">

  </style>
</head>

<body>
  <h1>Grafik Kapasitas banjir</h1>
  <div class="container">
     <canvas id="barchart" width="100%"height="100%"></canvas>
  </div>

</body>

</html>

<script type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var barChartData = {
    labels: <?= json_encode($labels); ?>,
    datasets: [{
      label: 'Dataset 1',
      backgroundColor: 'rgb(124,252,0)',
      borderColor: 'rgb(124,252,0)',
      borderWidth: 1,
      data: <?= json_encode($index_kapasitas); ?>,
    }]
  };
  window.onload = function() {
    window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'indeks kapasitas banjir'
					}
				}
			});
  };
</script>