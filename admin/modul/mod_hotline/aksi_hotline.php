<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../josys/koneksi.php";
//include "../../../josys/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update hotline
if ($module=='hotline' AND $act=='update'){

	mysql_query("UPDATE hotline SET content = '$_POST[content]'
                            WHERE id_hotline = '$_POST[id]'");

  header('location:../../media.php?module='.$module);
}
// Hapus Sosmed
/*if ($module=='sosmed' AND $act=='hapus'){
  
	mysql_query("DELETE FROM sosmed WHERE id_sosmed='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}
*/
// Update Tambah sosmed
/*if ($module=='sosmed' AND $act=='insertnew'){
  
	mysql_query("INSERT INTO sosmed(nama,
									link) 
                            VALUES('$_POST[nama]',
									'$_POST[link]')");
	header('location:../../media.php?module='.$module);
}
*/
}
?>
