<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$idpel = $_POST['idpel']; // Ambil data nis dan masukkan ke variabel nis
$namapel = $_POST['namapel']; // Ambil data nama dan masukkan ke variabel nama
$tarif = $_POST['tarif']; // Ambil data jenis_kelamin dan masukkan ke variabel jenis_kelamin
$daya = $_POST['daya']; // Ambil data telp dan masukkan ke variabel telp
$alamat = $_POST['alamat']; // Ambil data alamat dan masukkan ke variabel alamat
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = $idpel.'-'.date('dmY').'-'.$foto;;
	
	// Set path folder tempat menyimpan fotonya
	$path = "foto/fotorumah/".$fotobaru;

	// Proses upload
	// Cek apakah gambar berhasil diupload atau tidak
	if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$sqlcek ="SELECT * FROM lokasi WHERE idpel='$idpel'";
		$execute=mysql_query($sqlcek); // Eksekusi / Jalankan query
		$data = mysql_fetch_array($execute); // Ambil data dari hasil eksekusi $sqlcek
		
		// Cek apakah file foto sebelumnya ada di folder foto
		if(is_file("foto/fotorumah".$data['fotorumah'])) // Jika foto ada
			unlink("foto/fotorumah".$data['fotorumah']); // Hapus file foto sebelumnya yang ada di folder foto
		
		$sql = "UPDATE lokasi SET namapel='$namapel', alamat='$alamat', tarif='$tarif', daya='$daya', latitude='$latitude', longitude='$longitude', fotorumah='$fotobaru' WHERE idpel='$idpel'";
		$exec=mysql_query($sql); // Eksekusi query update
		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "view.php";
		$html = ob_get_contents();
		ob_end_clean();
		
		// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
		$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data berhasil diubah', // Set pesan
			'html'=>$html // Set html
		);
	}else{ // Jika proses upload gagal
		$response = array(
			'status'=>'gagal', // Set status
			'pesan'=>'Gambar gagal untuk diupload', // Set pesan
		);
	}
}else{ 
// Jika user tidak menceklis checkbox yang ada di form, lakukan :
	// Proses ubah ke Database
	$sql = "UPDATE lokasi SET namapel='$namapel', alamat='$alamat', tarif='$tarif', daya='$daya', latitude='$latitude', longitude='$longitude' WHERE idpel='$idpel'";
	$execute=mysql_query($sql); // Eksekusi query update
	// Eksekusi query update
	
	// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
	ob_start();
	include "view.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil diubah', // Set pesan
		'html'=>$html // Set html
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>
