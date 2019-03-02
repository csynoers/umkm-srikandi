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

$module=$_GET['module'];
$act=$_GET['act'];

// Update category
if ($module=='category' AND $act=='update'){
  
  $nama_seo 	  = seo_title($_POST['nama']);
		
		mysql_query("UPDATE kategori SET nama 	= '$_POST[nama]',
									nama_seo	= '$nama_seo', menu = '$_POST[menu]'
                            WHERE id_kategori	= '$_POST[id]'");

  header('location:../../media.php?module='.$module);
}
// Update Hapus kategori
if ($module=='category' AND $act=='hapus'){
  
  $cek_produk = mysql_fetch_array(mysql_query("SELECT id_kategori FROM produk WHERE id_kategori=$_GET[id]"));

  //cek apakah kategori sedang digunakan dalam subkategori atau tidak
  if(empty($cek_produk)){
	mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
	header('location:../../media.php?module='.$module);
  }
  else
  {
    echo "<script>alert('Maaf! Kategori yang ingin anda hapus sedang digunakan.'); window.location = '../../media.php?module=".$module."';</script>";
  }
}

// Update Tambah kategori
if ($module=='category' AND $act=='insertnew'){
  
  	$nama_seo 	  = seo_title($_POST['nama']);

	mysql_query("INSERT INTO kategori(nama, nama_seo, menu) 
                            VALUES('$_POST[nama]', '$nama_seo', '$_POST[menu]')");
	
  header('location:../../media.php?module='.$module);
}

}
?>