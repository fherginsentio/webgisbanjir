<div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead align="center">
                                        <th>No</th>
                                    	<th>ID Pelanggan</th>
                                    	<th>Nama Pelanggan</th>
                                    	<th>Koordinat</th>
                                    	<th align="center">Ket.</th>
                                    </thead>
                                    <?php 
									include("koneksi.php");
									include("pagination1.php");
										if(isset($keyword)){ // Jika veriabel $keyword ada (user telah mengklik tombol search)
											$param = $keyword;
											// Buat query untuk menampilkan data pelanggan berdasarkan IDPEL atau NAMA
			$result= mysql_query("SELECT * FROM lokasi WHERE idpel LIKE '$param' OR namapel LIKE '$param' ");
											//$result=mysql_query("select * from lokasi");
											}else{ // Jika user belum mengklik tombol search
											// Buat query untuk menampilkan semua data siswa
											$result =mysql_query("SELECT * FROM lokasi");
											}		
											$no=1;
									
									//pagination config start
        							$rpp = 10; // jumlah record per halaman
        							$reload = "datatabel.php?pagination=true";
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
                                        	<td><?php echo $data['idpel']; ?></td>
                                        	<td><?php echo $data['namapel']; ?></td>
                                        	<td><?php echo $data['latitude'].','.$data['longitude']; ?></td>
                                        	<td><a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no_urut; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a><a></a></a><a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="lihat(<?php echo $no_urut; ?>);" class="btn btn-default"><span class="pe-7s-id"></span></a></td>
                                        </tr>
                                        <input type="hidden" id="idpel-value-<?php echo $no_urut; ?>" value="<?php echo $data['idpel']; ?>">
                                        <input type="hidden" id="namapel-value-<?php echo $no_urut; ?>" value="<?php echo $data['namapel']; ?>">
                                        <input type="hidden" id="latitude-value-<?php echo $no_urut; ?>" value="<?php echo $data['latitude']; ?>">
                                        <input type="hidden" id="longitude-value-<?php echo $no_urut; ?>" value="<?php echo $data['longitude']; ?>">
                                        <input type="hidden" id="tarif-value-<?php echo $no_urut; ?>" value="<?php echo $data['tarif']; ?>">
                                        <input type="hidden" id="daya-value-<?php echo $no_urut; ?>" value="<?php echo $data['daya']; ?>">
                                        <input type="hidden" id="alamat-value-<?php echo $no_urut; ?>" value="<?php echo $data['alamat']; ?>">
                                        <input type="hidden" id="foto-value-<?php echo $no_urut; ?>" value="<?php echo $data['fotorumah']; ?>">
                                      <?php
										$i++;
										$count++;
										} 
									  ?>
                                    </tbody>
                                </table>
                            </div><?php echo paginate_one($reload, $page, $tpages); ?>
                            
<script>
// Fungsi ini akan dipanggil ketika tombol edit diklik
function edit(no){
	$("#btn-simpan").hide(); // Sembunyikan tombol simpan
	$("#btn-ubah, #checkbox_foto").show(); // Munculkan tombol ubah dan checkbox foto
	
	// Set judul modal dialog menjadi Form Ubah Data
	$("#modal-title").html("Form Ubah data");
	
	var idpel = $("#idpel-value-" + no).val(); // Ambil nis dari input type hidden
	var namapel = $("#namapel-value-" + no).val(); // Ambil nama dari input type hidden
	var latitude = $("#latitude-value-" + no).val(); // Ambil latitude dari input type hidden
	var longitude = $("#longitude-value-" + no).val(); // Ambil longitude dari input type hidden
	var tarif = $("#tarif-value-" + no).val(); // Ambil daya dari input type hidden
	var daya = $("#daya-value-" + no).val(); // Ambil daya dari input type hidden
	var alamat = $("#alamat-value-" + no).val(); // Ambil alamat dari input type hidden
	var foto = $("#foto-value-" + no).val();
	
	// Set value dari textbox nis yang ada di form
	// Set textbox nis menjadi Readonly
	$("#idpel").val(idpel).attr("readonly","readonly");	
	$("#namapel").val(namapel); // Set value dari textbox nama yang ada di form
	$("#latitude").val(latitude); // Set value dari textbox latitude yang ada di form
	$("#longitude").val(longitude); // Set value dari textbox longitude yang ada di form
	$("#tarif").val(tarif); // Set value dari textbox daya yang ada di form
	$("#daya").val(daya); // Set value dari textbox daya yang ada di form
	$("#alamat").val(alamat); // Set value dari textbox alamat yang ada di form
	$("img#img-foto").attr("src","foto/fotorumah/"+foto);
	$("#foto").val();
	
}

// Fungsi ini akan dipanggil ketika tombol lihat diklik
function lihat(no){
	$("#btn-simpan,  #checkbox_foto, #foto").hide(); // Sembunyikan tombol simpan
	$("#btn-ubah").hide(); // Munculkan tombol ubah dan checkbox foto
	
	// Set judul modal dialog menjadi Form Ubah Data
	$("#modal-title").html("Form Lihat data");
	
	var idpel = $("#idpel-value-" + no).val(); // Ambil nis dari input type hidden
	var namapel = $("#namapel-value-" + no).val(); // Ambil nama dari input type hidden
	var latitude = $("#latitude-value-" + no).val(); // Ambil latitude dari input type hidden
	var longitude = $("#longitude-value-" + no).val(); // Ambil longitude dari input type hidden
	var tarif = $("#tarif-value-" + no).val(); // Ambil daya dari input type hidden
	var daya = $("#daya-value-" + no).val(); // Ambil daya dari input type hidden
	var alamat = $("#alamat-value-" + no).val(); // Ambil alamat dari input type hidden
	var foto = $("#foto-value-" + no).val();
	// Set value dari textbox nis yang ada di form
	// Set textbox nis menjadi Readonly
	$("#idpel").val(idpel).attr("readonly","readonly");	
	$("#namapel").val(namapel).attr("readonly","readonly"); // Set value dari textbox nama yang ada di form
	$("#latitude").val(latitude).attr("readonly","readonly"); // Set value dari textbox latitude yang ada di form
	$("#longitude").val(longitude).attr("readonly","readonly");// Set value dari textbox longitude yang ada di form
	$("#tarif").val(tarif).attr("readonly","readonly"); // Set value dari textbox daya yang ada di form
	$("#daya").val(daya).attr("readonly","readonly"); // Set value dari textbox daya yang ada di form
	$("#alamat").val(alamat).attr("readonly","readonly"); // Set value dari textbox alamat yang ada di form
	$("img#img-foto").attr("src","foto/fotorumah/"+foto);
	$("#foto").val("");
}
</script>                           