$(document).ready(function(){
	// Sembunyikan loading simpan, loading ubah, loading hapus, pesan error, pesan sukes, dan tombol reset
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	
	//Func tombol Tambah
	$("#btn-tambah").click(function(){ // Ketika tombol tambah diklik
		$("#btn-ubah, #checkbox_foto").hide(); // Sembunyikan tombol ubah dan checkbox foto
		$("#btn-simpan").show(); // Munculkan tombol simpan
		$("img#img-foto").hide();
		console.log('Jalan');
		
		// Set judul modal dialog menjadi Form Simpan Data
		$("#modal-title").html("Form Simpan data");
	});
	
	$("#btn-simpan").click(function(){ // Ketika tombol simpan di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('idpel', $("#idpel").val()); // Ambil data nis
		data.append('namapel', $("#namapel").val()); // Ambil data nama pelanggan
		data.append('alamat', $("#alamat").val()); // Ambil data alamat
		data.append('tarif', $("#tarif").val()); // Ambil data tarif
		data.append('daya', $("#daya").val()); // Ambil data daya
		data.append('latitude', $("#latitude").val()); // Ambil data latitude
		data.append('longitude', $("#longitude").val()); // Ambil data longitude
		
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-simpan").show(); // Munculkan loading simpan
		
		$.ajax({
			url: 'proses_simpan.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-simpan").hide(); // Sembunyikan loading simpan
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
					$("#view").html(response.html);
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // munculkan alert
			}
		});
	});
	
	//End Func tombol Tambah
	
	//func tombol ubah
	$("#btn-ubah").click(function(){ // Ketika tombol ubah di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('idpel', $("#idpel").val()); // Ambil data nis
		data.append('namapel', $("#namapel").val()); // Ambil data nama
		data.append('alamat', $("#alamat").val()); // Ambil data jenis kelamin
		data.append('tarif', $("#tarif").val()); // Ambil data telepon
		data.append('daya', $("#daya").val()); // Ambil data telepon
		data.append('latitude', $("#latitude").val()); // Ambil data telepon
		data.append('longitude', $("#longitude").val()); // Ambil data telepon
		
		// Cek apakah checkbox ubah foto di ceklis
		if($("#ubah_foto").is(":checked")) // Jika di ceklis
			data.append('ubah_foto', $("#ubah_foto").val()); // Ambil data ubah foto (dari checkbox foto)
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-ubah").show(); // Munculkan loading ubah
		
		$.ajax({
			url: 'proses_ubah.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-ubah").hide(); // Sembunyikan loading ubah
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // Munculkan alert
			}
		});
	});
	//end func tombol ubah
	
	//Function Tombol Cari
	$("#btn-search").click(function(){ // Ketika tombol simpan di klik
		// Ubah text tombol search menjadi SEARCHING... 
		// Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
		$(this).html("SEARCHING...").attr("disabled", "disabled");
		
		$.ajax({
			url: 'search.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: {keyword: $("#keyword").val()}, // Set data yang akan dikirim
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				// Ubah kembali text button search menjadi SEARCH
				// Dan hapus atribut disabled untuk meng-enable kembali button search nya
				$("#btn-search").html("SEARCH").removeAttr("disabled");
				
				// Ganti isi dari div view dengan view yang diambil dari search.php
				$("#view").html(response.hasil);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // munculkan alert
			}
		});
	});
	//Ending Function Tombol Cari
	
	$('#form-modal').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
		$("#btn-reset").click(); // Klik tombol reset agar form kembali bersih
		$("#nis").removeAttr('readonly'); // Enable textbox nis
	});
});
