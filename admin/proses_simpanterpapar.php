<?php
// Include / load file koneksi.php
include "../include/koneksi.php";
$connect=mysqli_connect("localhost","root","","databasebanjir");
// Ambil data yang dikirim dari form

$id_terpapar = $_POST['id_terpapar'];
$kecamatan = $_POST['id_kec'];
$penduduk_terpapar = $_POST['penduduk_terpapar'];
$rasio_jk = $_POST['rasio_jk'];
$klmpk_umurrentan = $_POST['klmpk_umurrentan'];
$penduduk_miskin = $_POST['penduduk_miskin']; 
$penduduk_cacat = $_POST['penduduk_cacat'];
$indeks_terpapar = $_POST['indeks_terpapar'];
$kelas_terpapar = $_POST['kelas_terpapar'];
$id_terpapar = $_POST['id_terpapar'];

//Pembuatan ID	



	if(!empty($id_terpapar)){
		
		$q="update tb_terpapar set penduduk_terpapar ='$penduduk_terpapar', rasio_jk ='$rasio_jk', klmpk_umurrentan ='$klmpk_umurrentan', penduduk_miskin ='$penduduk_miskin', penduduk_cacat ='$penduduk_cacat', indeks_terpapar ='$indeks_terpapar',kelas_terpapar ='$kelas_terpapar', id_kec ='$kecamatan' where id_terpapar='$id_terpapar'";
		
	}else{
		
		$ceknoid=mysqli_query($connect,"Select max(id_terpapar) as max from tb_terpapar");
		$idmax=mysqli_fetch_array($ceknoid);
		$lihatid=mysqli_num_rows($ceknoid);
		
		
		if ($lihatid>0){
			
			$noid=((int) substr($idmax['max'],4,3))+1;
			$noidbaru='tpp'.sprintf("%03s", $noid);
			
		}else{
			
			$noidbaru='tpp'.'001';
			
		}
		
		$q="INSERT INTO tb_terpapar (id_terpapar,penduduk_terpapar,rasio_jk,klmpk_umurrentan,penduduk_miskin,penduduk_cacat,indeks_terpapar,kelas_terpapar,id_kec) values (
										'$noidbaru','$penduduk_terpapar','$rasio_jk','$klmpk_umurrentan','$penduduk_miskin','$penduduk_cacat','$indeks_terpapar','$kelas_terpapar','$kecamatan')";
										
										
		
		
	}
	
	$eksekusi = mysqli_query($connect,$q);
	
	
	if($eksekusi){
		echo "<script>alert('Data Berhasil Disimpan!');document.location.href='menu_terpapar.php';</script>";
	}else{
		echo "<script>alert('Terjadi kesalahan sistem saat input data!');document.location.href='menu_terpapar.php';</script>";
	}
	

	
?>