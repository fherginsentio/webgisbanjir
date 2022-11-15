<?php

$tabel = $_GET['tabel'];




if($jenis=="hapus"){
	
	
	if($tabel=="tb_luasbahaya"){
		$primary = "id_luas";
	}
	
	$hapus	=	mysqli_query($connect,"delete from $tabel where $primary ='$id'  ");
	
}
?>