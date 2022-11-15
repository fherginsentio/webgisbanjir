<?php
// Include / load file koneksi.php
include "../include/koneksi.php";
$connect=mysqli_connect("localhost","root","","databasebanjir");
// Ambil data yang dikirim dari form


$id_rugi = $_POST['id_rugi'];
$kecamatan = $_POST['id_kec'];
$fisik = $_POST['fisik'];
$ekonomi = $_POST['ekonomi'];
$totalrugi = $_POST['tot_kerugianrupiah'];
$indeksrugi = $_POST['indeks_kerugianrupiah']; 
$kelasrugi = $_POST['kelas_kerugianrupiah'];
$totalrusak = $_POST['tot_rusaklingkungan'];
$indeksrusak = $_POST['indeks_rusaklingkungan'];
$kelasrusak = $_POST['kelas_rusaklingkungan'];
$id_rugi = $_POST['id_rugi'];

//Pembuatan ID	



	if(!empty($id_rugi)){
		
		$q="update tb_kerugian set fisik ='$fisik', ekonomi ='$ekonomi', tot_kerugianrupiah ='$totalrugi', kelas_rusaklingkungan ='$kelasrusak', id_kec ='$kecamatan' where id_rugi='$id_rugi'";
		
	}else{
		
		$ceknoid=mysqli_query($connect,"Select max(id_rugi) as max from tb_kerugian");
		$idmax=mysqli_fetch_array($ceknoid);
		$lihatid=mysqli_num_rows($ceknoid);
		
		
		if ($lihatid>0){
			
			$noid=((int) substr($idmax['max'],4,3))+1;
			$noidbaru='rugi'.sprintf("%03s", $noid);
			
		}else{
			
			$noidbaru='rugi'.'001';
			
		}
		
		$q="INSERT INTO tb_kerugian (id_rugi,fisik,ekonomi,tot_kerugianrupiah,indeks_kerugianrupiah,kelas_kerugianrupiah,tot_rusaklingkungan,indeks_rusaklingkungan,kelas_rusaklingkungan,id_kec) values (
										'$noidbaru','$fisik ','$ekonomi','$totalrugi','$indeksrugi','$kelasrugi','$totalrusak','$indeksrusak','$kelasrusak','$kecamatan')";
										
										
		
		
	}
	
	$eksekusi = mysqli_query($connect,$q);
	
	
	if($eksekusi){
		echo "<script>alert('Data Berhasil Disimpan!');document.location.href='menu_kerugian.php';</script>";
	}else{
		echo "<script>alert('Terjadi kesalahan sistem saat input data!');document.location.href='menu_kerugian.php';</script>";
	}
	

	
?>