<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	include "../../../josys/koneksi.php";
	include "../../../josys/fungsi_thumb.php";
	include "../../../josys/fungsi_seo.php";
	include "../../../josys/watermark.php";

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Hapus
	if ($module=='product' AND $act=='hapus'){
		
		$tampil=mysql_query("SELECT * FROM produkgambar WHERE id_produk='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		$del_img_produk=mysql_query("SELECT * FROM produkgambar WHERE id_produk='$_GET[id]'");
		if($ex['gambar'] != ''){
			while($zx = mysql_fetch_array($del_img_produk)){
			unlink("../../../joimg/produk/$zx[gambar]");
			unlink("../../../joimg/produk/small/small_$zx[gambar]");
			}
			mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
			mysql_query("DELETE FROM produkgambar WHERE id_produk='$_GET[id]'");
		}else {
		mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
		mysql_query("DELETE FROM produkgambar WHERE id_produk='$_GET[id]'");
		}
	  header('location:../../media.php?module='.$module);
	}

	// Hapus Gambar Product
	if ($module=='product' AND $act=='hapusgambar'){

		$tampil=mysql_query("SELECT * FROM produkgambar WHERE id_produkgambar='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
		unlink("../../../joimg/produk/$ex[gambar]");
		unlink("../../../joimg/produk/small/small_$ex[gambar]");
		mysql_query("DELETE FROM produkgambar WHERE id_produkgambar='$_GET[id]'");
		}else {
		mysql_query("DELETE FROM produkgambar WHERE id_produkgambar='$_GET[id]'");
		}
	  header('location:../../media.php?module='.$module);
	}

	// Update
	if ($module=='product' AND $act=='update'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		//$nama_file      = $_FILES['fupload']['name'];
		//$acak           = rand(000000,999999);
		//$nama_file_unik = $acak.$nama_file; 
		
		$nama_seo = seo_title($_POST['nama_produk']);
		$deskripsi = mysql_real_escape_string($_POST['deskripsi']);
	  
		if(!empty($lokasi_file)){
		
		//$tampil=mysql_query("SELECT gambar FROM produkgambar WHERE id_produk='$_POST[id]'");
		//$ex=mysql_fetch_array($tampil);
		//	if($ex['gambar'] != ''){
		//		unlink("../../../joimg/produk/$ex[gambar]");
				//unlink("../../../joimg/produk/king-pheromone_$ex[gambar]");
			//}
		
		//UploadProduk($nama_file_unik);
		//watermark_image("../../../joimg/produk/$nama_file_unik", "../../../joimg/produk/$nama_file_unik");
		
	  
		mysql_query("UPDATE produk SET 		id_kategori		= '$_POST[kategori]',
											id_subkategori	= '$_POST[sub]',
											rating			= '$_POST[rating]',
											kodeproduk		= '$_POST[kodeproduk]',
											nama_produk		= '$_POST[nama_produk]',
											produk_seo		= '$nama_seo',
											deskripsi		= '$deskripsi',
											harga			= '$_POST[harga]',
											discount		= '$_POST[discount]',
											tag 			= '$_POST[tag]'
										WHERE id_produk		= '$_POST[id]'");

		//MULTI UPLOAD IMAGE
		$valid_formats = array("jpg", "png", "gif");
		//$max_file_size = 1024*100; //100 kb
		$path = "../../../joimg/produk/"; // Upload directory
		//$count = 0;

			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
				// Loop $_FILES to execute all files
				foreach ($_FILES['fupload']['name'] as $f => $name) {     
				    if ($_FILES['fupload']['error'][$f] == 4) {
				        continue; // Skip file if any error found
				    }	       
				    if ($_FILES['fupload']['error'][$f] == 0) {	           
				        if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
							$message[] = "$name is not a valid format";
							continue; // Skip invalid file formats
						}
				        else{ // No error found! Move uploaded files 

				        	$nama_file      = $_FILES['fupload']['name'][$f];
							$acak           = rand(000000,999999);
							$nama_file_unik = $acak.$nama_file;

				            if(move_uploaded_file($_FILES["fupload"]["tmp_name"][$f], $path.$nama_file_unik)) {
				   
	  							  $vfile_upload = $path . $nama_file_unik;

				            	 //identitas file asli
								  $im_src = imagecreatefromjpeg($vfile_upload);
								  $src_width = imageSX($im_src);
								  $src_height = imageSY($im_src);

								  //Simpan dalam versi small 350 pixel
								  //Set ukuran gambar hasil perubahan
								  $dst_width = 150;
								  $dst_height = ($dst_width/$src_width)*$src_height;

								  //proses perubahan ukuran
								  $im = imagecreatetruecolor($dst_width,$dst_height);
								  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

								  //Simpan gambar
								  imagejpeg($im,"../../../joimg/produk/small/" . "small_" . $nama_file_unik);
								  
								  //Hapus gambar di memori komputer
								  imagedestroy($im_src);
								  imagedestroy($im);

				            	//insert banyak gambar ke database produkgambar
				            	mysql_query("INSERT INTO produkgambar(id_produk, nama, gambar) VALUES('$_POST[id]', '$_POST[nama_produk]', '$nama_file_unik')");
				            }
				        }
				    }
				}
			}
			//END MULTI UPLOAD IMAGE



		}else{
	  
			mysql_query("UPDATE produk SET 	id_kategori		= '$_POST[kategori]',
											id_subkategori	= '$_POST[sub]',
											rating			= '$_POST[rating]',
											kodeproduk		= '$_POST[kodeproduk]',
											nama_produk		= '$_POST[nama_produk]',
											produk_seo		= '$nama_seo',
											deskripsi		= '$deskripsi',
											harga			= '$_POST[harga]',
											discount		= '$_POST[discount]',
											tag 			= '$_POST[tag]'
										WHERE id_produk		= '$_POST[id]'");										
		}
		header('location:../../media.php?module='.$module);
	}
	// Insert new
	if ($module=='product' AND $act=='insertnew'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		//$nama_file      = $_FILES['fupload']['name'];
		//$acak           = rand(000000,999999);
		//$nama_file_unik = $acak.$nama_file;
		//$nama_file_unik = "x";
		
		$nama_seo = seo_title($_POST['nama_produk']);
		$deskripsi = mysql_real_escape_string($_POST['deskripsi']);
	  
		if(!empty($lokasi_file)){
	  
		//UploadProduk($nama_file_unik);
		//watermark_image("../../../joimg/produk/$nama_file_unik", "../../../joimg/produk/$nama_file_unik");
		
		mysql_query("INSERT INTO produk(id_kategori,
										id_subkategori,
										rating,
										tgl_masuk,
										kodeproduk,
										nama_produk,
										produk_seo,
										deskripsi,
										harga,
										discount,
										tag)  
								VALUES(
										'$_POST[kategori]',
										'$_POST[sub]',
										'$_POST[rating]',
										now(),
										'$_POST[kodeproduk]',
										'$_POST[nama_produk]',
										'$nama_seo',
										'$deskripsi',
										'$_POST[harga]',
										'$_POST[discount]',
										'$_POST[tag]')");

		//ambil id_produk terakhir yang diinputkan
		$id_last_insert = mysql_fetch_array(mysql_query("SELECT last_insert_id() AS last_id_produk FROM produk"));
		$last_id_produk = $id_last_insert['last_id_produk'];

		//MULTI UPLOAD IMAGE
		$valid_formats = array("jpg", "png", "gif");
		//$max_file_size = 1024*100; //100 kb
		$path = "../../../joimg/produk/"; // Upload directory
		//$count = 0;

			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
				// Loop $_FILES to execute all files
				foreach ($_FILES['fupload']['name'] as $f => $name) {     
				    if ($_FILES['fupload']['error'][$f] == 4) {
				        continue; // Skip file if any error found
				    }	       
				    if ($_FILES['fupload']['error'][$f] == 0) {	           
				        if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
							$message[] = "$name is not a valid format";
							continue; // Skip invalid file formats
						}
				        else{ // No error found! Move uploaded files 

				        	$nama_file      = $_FILES['fupload']['name'][$f];
							$acak           = rand(000000,999999);
							$nama_file_unik = $acak.$nama_file;

				            if(move_uploaded_file($_FILES["fupload"]["tmp_name"][$f], $path.$nama_file_unik)) {
				   
	  							  $vfile_upload = $path . $nama_file_unik;

				            	 //identitas file asli
								  $im_src = imagecreatefromjpeg($vfile_upload);
								  $src_width = imageSX($im_src);
								  $src_height = imageSY($im_src);

								  //Simpan dalam versi small 350 pixel
								  //Set ukuran gambar hasil perubahan
								  $dst_width = 150;
								  $dst_height = ($dst_width/$src_width)*$src_height;

								  //proses perubahan ukuran
								  $im = imagecreatetruecolor($dst_width,$dst_height);
								  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

								  //Simpan gambar
								  imagejpeg($im,"../../../joimg/produk/small/" . "small_" . $nama_file_unik);
								  
								  //Hapus gambar di memori komputer
								  imagedestroy($im_src);
								  imagedestroy($im);

				            	//insert banyak gambar ke database produkgambar
				            	mysql_query("INSERT INTO produkgambar(id_produk, nama, gambar) VALUES('$last_id_produk', '$_POST[nama_produk]', '$nama_file_unik')");
				            }
				        }
				    }
				}
			}
			//END MULTI UPLOAD IMAGE
		}
		else{
		mysql_query("INSERT INTO produk(
										id_kategori,
										id_subkategori,
										stok,
										tgl_masuk,
										kodeproduk,
										nama_produk,
										produk_seo,
										deskripsi,
										harga,
										discount)  
								VALUES(
										'$_POST[kategori]',
										'$_POST[sub]',
										'$_POST[stok]',
										now(),
										'$_POST[nama_produk]',
										'$nama_seo',
										'$deskripsi',										
										'$_POST[harga]',
										'$_POST[discount]',
										'$_POST[tag]'
										 )");
		
		}
		
	  header('location:../../media.php?module='.$module);
	}

}
?>
