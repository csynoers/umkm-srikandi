
<?php 
	include('../josys/koneksi.php');
	$kat = $_POST['kat'];
	$pils=mysql_query("SELECT * FROM subkategori WHERE id_kategori = '$kat' ORDER BY nama ASC");
	$co = mysql_num_rows($pils);
	if($co != 0){
	while($we=mysql_fetch_array($pils)){
		echo "<option value='$we[id_subkategori]'>$we[nama]</option>";
	}
	}else{echo"<option>Not Found!</option>";}
?>