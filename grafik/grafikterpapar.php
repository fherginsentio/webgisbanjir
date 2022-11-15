<?php
include('koneksi.php');
$kapasitas = $koneksi->query("SELECT * FROM tb_terpapar INNER JOIN tb_kecamatan ON tb_terpapar.id_kec=tb_kecamatan.id_kec order by tb_terpapar.id_kec asc");
while($data = $terpapar->fetch_assoc()){
  $labels[] = $data['nama_kec'];
  $index_terpapar[] =  (float)$data['indeks_terpapar'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Penduduk Terpapar</title>
  <script src="js/Chart.js"></script>
  <style type="text/css">

  </style>
</head>

<body>
  <h1>Grafik Penduduk Terpapar</h1>
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
      data: <?= json_encode($index_terpapar); ?>,
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
						text: 'indeks penduduk terpapar'
					}
				}
			});
  };
</script>