<?php
// Include / load file koneksi.php
include "../include/koneksi.php";
$connect=mysqli_connect("localhost","root","","databasebanjir");
// Ambil data yang dikirim dari form

$id_kapasitas = $_POST['id_kapasitas'];
$kecamatan = $_POST['id_kec'];
$indekskapasitasdaerah = $_POST['indeks_kapasitasdaerah'];
$klskapasitasdaerah = $_POST['kelas_kapasitasdaerah'];
$indekssiapsiagalurah = $_POST['indeks_siapsiagalurah'];
$klssiapsiagalurah = $_POST['kelas_siapsiagalurah']; 
$indekskapasitas = $_POST['indeks_kapasitas'];
$klskapasitas = $_POST['kelas_kapasitas'];
$id_kapasitas = $_POST['id_kapasitas'];

//Pembuatan ID
	
	
	
	if(!empty($id_kapasitas)){
		
		$q="update tb_kapasitas set indeks_kapasitasdaerah ='$indekskapasitasdaerah', kelas_kapasitasdaerah ='$klskapasitasdaerah', indeks_siapsiagalurah ='$indekssiapsiagalurah', kelas_siapsiagalurah ='$klssiapsiagalurah', indeks_kapasitas ='$indekskapasitas', kelas_kapasitas ='$klskapasitas' , id_kec ='$kecamatan' where id_kapasitas='$id_kapasitas'";
		
	}else{
		
		$ceknoid=mysqli_query($connect,"Select max(id_kapasitas) as max from tb_kapasitas");
		$idmax=mysqli_fetch_array($ceknoid);
		$lihatid=mysqli_num_rows($ceknoid);
		
		
		if ($lihatid>0){
			
			$noid=((int) substr($idmax['max'],4,3))+1;
			$noidbaru='kap'.sprintf("%03s", $noid);
			
		}else{
			
			$noidbaru='kap'.'001';
			
		}
		
		$q="INSERT INTO tb_kapasitas (id_kapasitas,indeks_kapasitasdaerah,kelas_kapasitasdaerah,indeks_siapsiagalurah,kelas_siapsiagalurah,indeks_kapasitas,kelas_kapasitas,id_kec) values (
										'$noidbaru','$indekskapasitasdaerah','$klskapasitasdaerah','$indekssiapsiagalurah','$klssiapsiagalurah','$indekskapasitas','$klskapasitas','$kecamatan')";
										
										
		
		
	}
	
	$eksekusi = mysqli_query($connect,$q);
	
	
	if($eksekusi){
		echo "<script>alert('Data Berhasil Disimpan!');document.location.href='menu_kapasitas.php';</script>";
	}else{
		echo "<script>alert('Terjadi kesalahan sistem saat input data!');document.location.href='menu_kapasitas.php';</script>";
	}
	

	
?>