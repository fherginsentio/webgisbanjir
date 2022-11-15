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
                    <a href="/webgisbanjir/admin/index.php"">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
				<li>
                    <a href="/webgisbanjir/admin/menu_luasbanjir.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Luas Banjir </p>
                    </a>
                </li>
				<li>
                    <a href="/webgisbanjir/admin/menu_kerugian.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Kerugian Dan Kerusakan</p>
                    </a>
                </li>
				<li>
                    <a href="/webgisbanjir/admin/menu_terpapar.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Penduduk Terpapar</p>
                    </a>
                </li>
				
                <li>
                    <a href="/webgisbanjir/admin/menu_kapasitas.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Kapasitas Banjir</p>
                    </a>
                </li>
                <li>
                    <a href="/webgisbanjir/admin/menu_admin.php">
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
                        <li><a href="/webgisbanjir/admin/logout.php"><p>Log out</p></a></li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
		<!-- ending header menu -->
        

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tabel Penduduk Terpapar</h4>
                                <p class="category">Data Penduduk Terpapar Akibat Banjir Kota Padang</p>
                          	</div>
                            </div>
                            <!---- Buat sebuah div dengan id="view" yang digunakan untuk menampung data yang ada pada tabel siswa di database-->
                            <div id="view"><?php include "tabel_terpapar.php"; ?></div>
							<a href="/webgisbanjir/admin/input_terpapar.php"><p>Input Data Penduduk Terpapar</p></a>
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