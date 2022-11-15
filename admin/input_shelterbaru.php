<?php 
include "../include/koneksi.php";

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>GIS Shelter Kota Padang</title>
	
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

    	<div class="sidebar-wrapper">
            <div class="logo"><img src="logopage.png" width="220px" height="150px"></div>
            <ul class="nav">
                <li>
                    <a href="index.html">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
				<li class="active">
                    <a href="input_shelterbaru.php">
                        <i class="pe-7s-note2"></i>
                        <p>Shelter Baru</p>
                    </a>
                </li>
				<li>
                    <a href="input_videobaru.php">
                        <i class="pe-7s-note2"></i>
                        <p>Video Baru</p>
                    </a>
                </li>
                <li>
                    <a href="input_adminbaru.php">
                        <i class="pe-7s-note2"></i>
                        <p>Admin Baru</p>
                    </a>
                </li>
                <li>
                    <a href="menu_daftarshelter.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Daftar Shelter</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <!-- header menu -->
         <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Menu Admin</a>
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
                                <h4 class="title">Input Shelter Baru</h4>
                            </div>
                            <div class="content">
                                <form action="proses_simpan.php" method="post">
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Shelter</label>
                                                <input type="text" id="namashelter" name="namashelter" class="form-control" placeholder="Nama Shelter" >
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat Shelter</label>
                                                <textarea rows="5" id="alamatshelter" name="alamatshelter" class="form-control" placeholder="" value="">	
												</textarea>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fungsi : </label>
                                                <select id="fungsi" name="fungsi" class="form-control">
													<option value="">- Pilih -</option>
													<?php
													$ambilfungsi = mysql_query("SELECT * FROM markershelter");
													while($fungsi = mysql_fetch_array($ambilfungsi)){
													?>
													<option value="<?php echo $fungsi['fungsimarker'];?>"><?php echo $fungsi['fungsimarker']?></option>
													<?php } ?>
												</select>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Latitude :</label>
                                                <input type="text" id="lat" name="lat" class="form-control" placeholder="Koordinat Latitude" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Longitude :</label>
                                                <input type="text" id="lon" name="lon" class="form-control" placeholder="Koordinat Longitude" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jumlah Lantai</label>
                                                <input type="text" id="jumlahlantai" name="jumlahlantai" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Daya Tampung</label>
                                                <input type="text" id="dayatampung" name="dayatampung" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>
									
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