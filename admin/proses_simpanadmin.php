<?php
// Include / load file koneksi.php
include "../include/koneksi.php";
$connect=mysqli_connect("localhost","root","","databasebanjir");
// Ambil data yang dikirim dari form

$id_admin = $_POST['id_admin'];
$username = $_POST['username'];
$email = $_POST['email_admin'];
$alamat = $_POST['almt_admin'];
$handphone = $_POST['hp_admin']; 
$password = $_POST['password'];
$id_admin = $_POST['id_admin'];

//Pembuatan ID
	
	
	
	if(!empty($id_admin)){
		
		$q="update tb_admin set username ='$username', email_admin ='$email', almt_admin ='$alamat', hp_admin ='$handphone', password ='$password' where id_admin='$id_admin'";
		
	}else{
		
		$ceknoid=mysqli_query($connect,"Select max(id_admin) as max from tb_admin");
		$idmax=mysqli_fetch_array($ceknoid);
		$lihatid=mysqli_num_rows($ceknoid);
		
		
		if ($lihatid>0){
			
			$noid=((int) substr($idmax['max'],4,3))+1;
			$noidbaru='2020'.sprintf("%03s", $noid);
			
		}else{
			
			$noidbaru='2020'.'001';
			
		}
		
		$q="INSERT INTO tb_admin (id_admin,username,email_admin,almt_admin,hp_admin,password) values (
										'$noidbaru','$username','$email','$alamat','$handphone','$password')";
										
										
		
		
	}
	
	$eksekusi = mysqli_query($connect,$q);
	
	
	if($eksekusi){
		echo "<script>alert('Data Berhasil Disimpan!');document.location.href='menu_admin.php';</script>";
	}else{
		echo "<script>alert('Terjadi kesalahan sistem saat input data!');document.location.href='menu_admin.php';</script>";
	}
	

	
?>