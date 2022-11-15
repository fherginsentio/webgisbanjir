<?php

include 'koneksi.php';

$data = $_GET['id'];

$hapus = mysqli_query($koneksi,"DELETE FROM tb_admin where id_admin='$id'");

if($hapus){
	echo "<script>alert('Data Berhasil Di Hapus');document.location='menu_admin.php'</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus, Coba Ulangi Lagi');document.location='menu_admin.php'</script>";
}
?>