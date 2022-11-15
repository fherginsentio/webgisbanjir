<?php 
include "../include/koneksi.php";

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>GIS Banjir Kota Padang</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

 <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="/webgisbanjir/admin/index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
				<li>
                    <a href="menu_luasbanjir.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Luas Banjir </p>
                    </a>
                </li>
				<li>
                    <a href="menu_kerugian.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Kerugian Dan Kerusakan</p>
                    </a>
                </li>
				<li>
                    <a href="menu_terpapar.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Penduduk Terpapar</p>
                    </a>
                </li>
				
                <li>
                    <a href="menu_kapasitas.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Kapasitas Banjir</p>
                    </a>
                </li>
                <li>
                    <a href="menu_admin.php">
                        <i class="pe-7s-note2"></i>
                        <p>Tambah Admin</p>
                    </a>
                </li>
<li>

                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
    	<!-- header menu -->
         <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/webgisbanjir/admin/index.php">Menu Admin</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><p>Log out</p></a></li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
		<!-- ending header menu -->

         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Input Data Penduduk Terpapar</h4> <?php include("koneksi.php"); ?>
                            </div>
                            <div class="content">
                                <form action="proses_simpanterpapar.php" method="post">
								
								<?php
								
									if(isset($_GET['id'])!=''){
										
										$eksekusi = mysqli_query($connect,"select * from tb_terpapar where id_terpapar='$_GET[id]' ");
										while($data = mysqli_fetch_array($eksekusi)){
									
											$id_terpapar 		= $data['id_terpapar'];
											$penduduk_terpapar 	= $data['penduduk_terpapar'];
											$rasio_jk 			= $data['rasio_jk'];
											$klmpk_umurrentan 	= $data['klmpk_umurrentan'];
											$penduduk_miskin 	= $data['penduduk_miskin']; 
											$penduduk_cacat 	= $data['penduduk_cacat'];
											$indeks_terpapar 	= $data['indeks_terpapar'];
											$kelas_terpapar 	= $data['kelas_terpapar'];	
											$id_kec 			= $data['id_kec'];
										}


										
									}else{
										
											$id_terpapar 		= "";
											$penduduk_terpapar	= "";
											$rasio_jk 			= "";
											$klmpk_umurrentan 	= "";
											$penduduk_miskin 	= ""; 
											$penduduk_cacat 	= "";
											$indeks_terpapar 	= "";
											$kelas_terpapar 	= "";	
											$id_kec 			= "";
									}
								
								?>
									
									<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ID Kecamatan : </label>
                                                <select id="id_kec" name="id_kec" class="form-control">
													<option value="">- Pilih -</option>
													<?php   
													$ambilkecamatan = mysqli_query($connect,"SELECT * FROM tb_kecamatan");
													while($kecamatan = mysqli_fetch_array($ambilkecamatan)){
														
														$selected = $kecamatan['id_kec'] == $id_kec ? "selected" : "";
													?>
													<option value="<?php echo $kecamatan['id_kec'];?>" <?php echo $selected ?> ><?php echo $kecamatan['nama_kec']?></option>
													<?php } ?>
												</select>
                                            </div>
                                        </div>
									</div>

									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Penduduk Terpapar (Jiwa) :</label>
                                                <input type="text" id="penduduk_terpapar" name="penduduk_terpapar" class="form-control" placeholder="" value="<?php echo $penduduk_terpapar ?>">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Rasio Jenis Kelamin :</label>
                                                <input type="text" id="rasio_jk" name="rasio_jk" class="form-control" placeholder="" value="<?php echo $rasio_jk ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kelompok Umur Rentan :</label>
                                                <input type="text" id="klmpk_umurrentan" name="klmpk_umurrentan" class="form-control" placeholder="" value="<?php echo $klmpk_umurrentan ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Penduduk Miskin :</label>
                                                <input type="text" id="penduduk_miskin" name="penduduk_miskin" class="form-control" placeholder="" value="<?php echo $penduduk_miskin ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Penduduk Cacat :</label>
                                                <input type="text" id="penduduk_cacat" name="penduduk_cacat" class="form-control" placeholder="" value="<?php echo $penduduk_cacat ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Indeks Penduduk Terpapar :</label>
                                                <input type="text" id="indeks_terpapar" name="indeks_terpapar" class="form-control" placeholder="" value="<?php echo $indeks_terpapar ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kelas Penduduk Terpapar :</label>
                                                <input type="text" id="kelas_terpapar" name="kelas_terpapar" class="form-control" placeholder="" value="<?php echo $kelas_terpapar ?>">
                                            </div>
                                        </div>
                                    </div> 
								</div>
									<!-- tambahkan -->
									<input type="text" name="id_terpapar" class="form-control" placeholder=""  value="<?php echo $id_terpapar ?>" hidden >
									<!-- tambahkan -->		
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Input Data</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
		</footer>
    </div>
    
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
		
	<!-- Load file ajax.js yang ada di folder js -->
	<script src="js/ajax.js"></script>
	
	</body>

</html>