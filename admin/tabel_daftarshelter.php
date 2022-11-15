<div class="content table-responsive table-full-width">
<table class="table table-hover table-striped">
<thead align="center" bgcolor="#FFCC00">
        <th>No</th>
        <th>Nama Shelter</th>
        <th>Alamat Shelter</th>
        <th>Fungsi</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Jumlah Lantai</th>
        <th>Daya Tampung</th>
        <th align="center">Ket.</th>
</thead>
		<?php 
        include("../include/koneksi.php");
        include("../include/pagination1.php");
            if(isset($keyword)){ // Jika veriabel $keyword ada (user telah mengklik tombol search)
                $param = $keyword;
		// Buat query untuk menampilkan data pelanggan berdasarkan IDPEL atau NAMA
		$result= mysql_query("SELECT * FROM daftarshelter ");
		//$result=mysql_query("select * from lokasi");
		}else{ // Jika user belum mengklik tombol search
		// Buat query untuk menampilkan semua data siswa
		$result =mysql_query("SELECT * FROM daftarshelter");
		}		
		$no=1;

		//pagination config start
		$rpp = 10; // jumlah record per halaman
		$reload = "menu_daftarshelter.php?pagination=true";
		$page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
		$tcount = mysql_num_rows($result);
		$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
		$count = 0;
		$i = ($page-1)*$rpp;
		$no_urut = ($page-1)*$rpp;
		//pagination config end
		?>
            <tbody>
            <?php
            while(($count<$rpp) && ($i<$tcount)) {
            mysql_data_seek($result,$i);
            $data = mysql_fetch_array($result);
            ?>
            <tr>
            <td><?php echo ++$no_urut; ?> </td>
            <td><?php echo $data['namashelter']; ?></td>
            <td><?php echo $data['alamatshelter']; ?></td>
            <td><?php echo $data['fungsi']; ?></td>
            <td><?php echo $data['latitude']; ?></td>
            <td><?php echo $data['longitude']; ?></td>
            <td><?php echo $data['jumlahlantai']; ?></td>
            <td><?php echo $data['dayatampung']; ?></td>
            <td></td>
            </tr>
            <?php
            $i++;
            $count++;
            } 
            ?>
            </tbody>
	</table>
</div><?php echo paginate_one($reload, $page, $tpages); ?>                          