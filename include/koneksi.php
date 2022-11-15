<?php
//File KOneksi Ke DataBase

$usr="root";
$pwd="";
$nmdb="databasebanjir";

//KOneksi
#mysqli_connect("localhost",$usr,$pwd,$nmdb) or die('Koneki Gagal');
$connect=mysqli_connect("localhost",$usr,$pwd,$nmdb) or die('Koneki Gagal');

if($connect){
	echo "x";
}

//aktifkan 
#mysqli_select_db($nmdb) or die ('Database Tidak Ditemukan!');

?>