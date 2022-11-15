<?php
// Include / load file koneksi.php
include "../include/koneksi.php";

// Ambil data yang dikirim dari form

$namashelter = $_POST['namashelter'];
$alamatshelter = $_POST['alamatshelter']; 
$fungsi = $_POST['fungsi'];
$latitude = $_POST['lat'];
$longitude = $_POST['lon'];
$jumlahlantai = $_POST['jumlahlantai'];
$dayatampung = $_POST['dayatampung'];


//Pembuatan ID
$ceknoid=mysql_query("Select max(idshelter) as max from daftarshelter");
$idmax=mysql_fetch_array($ceknoid);
$lihatid=mysql_num_rows($ceknoid);
if ($lihatid>0)
{ $noid=((int) substr($idmax['max'],4,3))+1;
		$noidbaru='ST-'.sprintf("%03s", $noid);
	}
else
		$noidbaru='ST-'.'001';
		
/*
 *echo $namashelter;
echo $alamatshelter; 
echo $fungsi;
echo $latitude;
echo $longitude;
echo $jumlahlantai;
echo $dayatampung;
echo $noidbaru;
*/

$eksekusi = mysql_query("INSERT INTO daftarshelter VALUES('$noidbaru','$namashelter','$alamatshelter','$latitude','$longitude','$fungsi','$jumlahlantai','$dayatampung')");
if(!$eksekusi){
?>
<script>alert('Terjadi kesalahan sistem saat input data!');document.location.href="inp-pendaftaranbaru.php";
</script>
<?php }else{ ?>
<script>alert('Data Berhasil Disimpan');document.location.href="menu_daftarshelter.php"
</script>
<?php } ?>
