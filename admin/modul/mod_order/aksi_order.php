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
	$idp=$_GET['id'];
	
	
	if ($module=='orders' AND $act=='hapus'){
		mysql_query("DELETE FROM orders WHERE id_order = '$_GET[id]' ");
		mysql_query("DELETE FROM order_detail WHERE id_order = '$_GET[id]' ");
								
		header('location:../../media.php?module=orders');
	}
	
	elseif ($module=='orders' AND $act=='update'){
		 mysql_query("UPDATE orders SET status_order = 
						'$_POST[status_order]' WHERE 
						id_order = '$idp'");
		 //update stock jika status sedang proses pengiriman atau proses terkirim maka stock dikurangi
		 //jika batal maka stock akan ditambahkan lagi
		 /*
		 if($_POST[status_order]=='terkirim'){
		 	mysql_query("UPDATE produk SET stok = stok - $_POST[jumlah] WHERE id_produk = '$_POST[id_produk]'");
		 }
		 elseif($_POST[status_order]=='batal'){
		 	mysql_query("UPDATE produk SET stok = stok + $_POST[jumlah] WHERE id_produk = '$_POST[id_produk]'");
		 }
		*/
	header('location:../../media.php?module='.$module);
	}

}
?>
