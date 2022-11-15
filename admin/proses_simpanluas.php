<?php
// Include / load file koneksi.php
include "../include/koneksi.php";
$connect=mysqli_connect("localhost","root","","databasebanjir");
// Ambil data yang dikirim dari form

$id_luas = $_POST['id_luas'];
$kecamatan = $_POST['id_kec'];
$rendah = $_POST['rendah'];
$sedang = $_POST['sedang'];
$tinggi = $_POST['tinggi'];
$luasbanjir = $_POST['tot_luas']; 
$indeksbanjir = $_POST['indeks_bahaya'];
$kelasbanjir = $_POST['kelas_bahaya'];
$id_luas = $_POST['id_luas'];

//Pembuatan ID
	
	
	
	if(!empty($id_luas)){
		
		$q="update tb_luasbahaya set rendah ='$rendah', sedang ='$sedang', tinggi ='$tinggi', tot_luas ='$luasbanjir', indeks_bahaya ='$indeksbanjir', kelas_bahaya ='$kelasbanjir' , id_kec ='$kecamatan' where id_luas='$id_luas'";
		
	}else{
		
		$ceknoid=mysqli_query($connect,"Select max(id_luas) as max from tb_luasbahaya");
		$idmax=mysqli_fetch_array($ceknoid);
		$lihatid=mysqli_num_rows($ceknoid);
		
		
		if ($lihatid>0){
			
			$noid=((int) substr($idmax['max'],4,3))+1;
			$noidbaru='luas'.sprintf("%03s", $noid);
			
		}else{
			
			$noidbaru='luas'.'001';
			
		}
		
		$q="INSERT INTO tb_luasbahaya (id_luas,rendah,sedang,tinggi,tot_luas,indeks_bahaya,kelas_bahaya,id_kec) values (
										'$noidbaru','$rendah','$sedang','$tinggi','$luasbanjir','$indeksbanjir','$kelasbanjir','$kecamatan')";
										
										
		
		
	}
	
	$eksekusi = mysqli_query($connect,$q);
	
	
	if($eksekusi){
		echo "<script>alert('Data Berhasil Disimpan!');document.location.href='menu_luasbanjir.php';</script>";
	}else{
		echo "<script>alert('Terjadi kesalahan sistem saat input data!');document.location.href='menu_luasbanjir.php';</script>";
	}
	

	
?>