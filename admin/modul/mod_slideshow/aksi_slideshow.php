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

$module=$_GET['module'];
$act=$_GET['act'];

// Update slideshow
if ($module=='slideshow' AND $act=='update'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
	if(!empty($lokasi_file)){
	
	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG");
        window.location=("../../media.php?module=<?php echo $module.'&act=edit&id='.$_POST['id'] ?>")</script>;
    <?php die();}
  
	$tampil=mysql_query("SELECT * FROM slide WHERE id_slide='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/slide/$ex[gambar]");
		}
	
	UploadSlide($nama_file_unik);
  
   		mysql_query("UPDATE slide SET nama 		= '$_POST[nama]',
									gambar		= '$nama_file_unik'
                            WHERE id_slide  	= '$_POST[id]'");
	}
	else
	{
		mysql_query("UPDATE slide SET 	nama 	= '$_POST[nama]'
                            WHERE id_slide  = '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}
// Update Hapus Message
if ($module=='slideshow' AND $act=='hapus'){
  
    $tampil=mysql_query("SELECT * FROM slide WHERE id_slide='$_GET[id]'");
	$ex=mysql_fetch_array($tampil);
	
	if($ex[gambar] != ''){
	unlink("../../../joimg/slide/$ex[gambar]");
	mysql_query("DELETE FROM slide WHERE id_slide='$_GET[id]'");
	}else {
	mysql_query("DELETE FROM slide WHERE id_slide='$_GET[id]'");
	}
  header('location:../../media.php?module='.$module);
}

// Update Tambah slideshow
if ($module=='slideshow' AND $act=='insertnew'){
  
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
	if(!empty($lokasi_file)){
	
	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG");
        window.location=("../../media.php?module=<?php echo $module.'&act=edit&id='.$_POST['id'] ?>")</script>;
    <?php die();}
  
	UploadSlide($nama_file_unik);
  
    mysql_query("INSERT INTO slide(nama, gambar) 
                            VALUES('$_POST[nama]', '$nama_file_unik')");
	}
	else{
	mysql_query("INSERT INTO slide(nama) 
                            VALUES('$_POST[nama]')");
	}
  header('location:../../media.php?module='.$module);
}

}
?>
