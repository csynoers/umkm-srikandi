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

	// Hapus header
	if ($module=='subcategory' AND $act=='hapus'){
		
		$cek_produk = mysql_fetch_array(mysql_query("SELECT id_subkategori FROM produk WHERE id_subkategori=$_GET[id]"));

		//cek apakah kategori sedang digunakan dalam subkategori atau tidak
		if(empty($cek_produk)){
			mysql_query("DELETE FROM subkategori WHERE id_subkategori='$_GET[id]'");
		  	header('location:../../media.php?module='.$module);
		}
		else
		{
			echo "<script>alert('Maaf! Sub Kategori yang ingin anda hapus sedang digunakan.'); window.location = '../../media.php?module=".$module."';</script>";
		}
	}


	// Update Page Room
	if ($module=='subcategory' AND $act=='update'){
	
		$nama_seo = seo_title($_POST['nama']);
		
			mysql_query("UPDATE subkategori SET id_kategori 	= '$_POST[kategori]',
												nama			= '$_POST[nama]',
												nama_seo		= '$nama_seo'
										WHERE id_subkategori    = '$_POST[id]' ");
										
		header('location:../../media.php?module='.$module);
	}

	// insert new
	if ($module=='subcategory' AND $act=='insertnew'){
	
		$nama_seo = seo_title($_POST['nama']);
		
		mysql_query("INSERT INTO subkategori(id_kategori, nama, nama_seo )  
								VALUES('$_POST[kategori]', '$_POST[nama]','$nama_seo' )");
		
	  header('location:../../media.php?module='.$module);
	}

}
?>
