<div class="content table-responsive table-full-width">
<table class="table table-hover table-striped">
<thead align="center" bgcolor="#FFCC00">
        <th>No</th>
        <th>ID Kecamatan</th>
        <th>Penduduk Terpapar (Jiwa)</th>
		<th>Rasio Jenis Kelamin</th>
		<th>Kelompok Umur Rentan</th>
        <th>Penduduk Miskin</th>
        <th>Penduduk Cacat</th>
		<th>Indeks Penduduk Terpapar</th>
        <th align="center">Kelas Penduduk Terpapar</th>
		        <th align="center">Aksi</th>
</thead>
<?php 
        include("koneksi.php");
        include("../include/pagination1.php");
            if(isset($keyword)){ // Jika veriabel $keyword ada (user telah mengklik tombol search)
                $param = $keyword;
		// Buat query untuk menampilkan data pelanggan berdasarkan IDPEL atau NAMA
		$result= mysqli_query($connect,"SELECT * FROM tb_terpapar");
		//$result=mysqli_query("select * from lokasi");
		}else{ // Jika user belum mengklik tombol search
		// Buat query untuk menampilkan semua data siswa
		$result =mysqli_query($connect,"SELECT * FROM tb_terpapar");
		}		
		$no=1;

		//pagination config start
		$rpp = 10; // jumlah record per halaman
		$reload = "menu_terpapar.php?pagination=true";
		$page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
		$tcount = mysqli_num_rows($result);
		$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
		$count = 0;
		$i = ($page-1)*$rpp;
		$no_urut = ($page-1)*$rpp;
		//pagination config end
		?>
            <tbody>
            <?php
            while(($count<$rpp) && ($i<$tcount)) {
            mysqli_data_seek($result,$i);
            $data = mysqli_fetch_array($result);
            ?>
            <tr>
            <td><?php echo ++$no_urut; ?> </td>
            <td><?php echo $data['id_kec']; ?></td>
            <td><?php echo $data['penduduk_terpapar']; ?></td>
            <td><?php echo $data['rasio_jk']; ?></td>
            <td><?php echo $data['klmpk_umurrentan']; ?></td>
			<td><?php echo $data['penduduk_miskin']; ?></td>
            <td><?php echo $data['penduduk_cacat']; ?></td>
            <td><?php echo $data['indeks_terpapar']; ?></td>
            <td><?php echo $data['kelas_terpapar']; ?></td>
			<td>
			
			<a href="?jenis=edit&id=<?php echo $data['id_terpapar']?>"><span class="btn btn-warning">Edit</span></a>
			<a href="?jenis=hapus&id=<?php echo $data['id_terpapar']?>"><span class="btn btn-danger">Hapus</span></a>
			
			</td>
            </tr>
            <?php
            $i++;
            $count++;
            } 
            ?>
            </tbody>
	</table>
</div><?php echo paginate_one($reload, $page, $tpages); ?>   


<?php 

	if(@$_GET['jenis']=="hapus"){
		
		$hapus	=	mysqli_query($connect,"delete from tb_terpapar where id_terpapar ='$_GET[id]'  ");
		
		
		if($hapus){
			echo "<script>alert('Data Berhasil Dihapus!');document.location.href='menu_terpapar.php';</script>";
		}else{
			echo "<script>alert('Data Gagal Dihapus!');document.location.href='menu_terpapar.php';</script>";
		}
		
	}else if(@$_GET['jenis']=="edit"){
		echo "<script>document.location.href='input_terpapar.php?id=$_GET[id]';</script>";
		
		
	}

?>

