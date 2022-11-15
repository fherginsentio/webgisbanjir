<?php
$koneksi    = mysqli_connect("localhost", "root", "", "databasebanjir");
$penjualan  = mysqli_query($koneksi, "SELECT indeks FROM tb_terpapar order by ID asc");
$merk       = mysqli_query($koneksi, "SELECT id_kec FROM tb_terpapar order by ID asc");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran (Doughnut)</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['id_kec'] . '",';}?>],
            datasets: [
            {
              label: "Indeks Penduduk Terpapar",
              data: [<?php while ($p = mysqli_fetch_array($penjualan)) { echo '"' . $p['indeks'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
				'#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193',
				'#979143'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>