<?php
	session_start();
	include "../josys/koneksi.php";
	include "../josys/library.php";
	include "../josys/fungsi_input.php";

	$sid  = session_id();
	$id = $_POST['id_pro'];
	$id_kategori = $_POST['kategori'];
	$jumlah = str_replace('-', '', $_POST["qty"]);

if(($id!='') AND ($jumlah!='') AND ($jumlah!=0))
	{
			$sql = mysql_query("SELECT id_produk FROM order_temp WHERE id_produk='$id' AND id_session='$sid'");
			$ketemu=mysql_num_rows($sql);
			
			if ($ketemu=="0")
			{
				/* put the product in cart table
				if(isset($_SESSION['idmember'])){
					mysql_query("INSERT INTO orders_temp (id_member, id_produk, jumlah, id_session, tgl_order_temp, jam_order_temp)
															VALUES ('$_SESSION[idmember]', '$id', 1, '$sid', '$tgl_sekarang', '$jam_sekarang')");
				}else{
				*/	
				mysql_query("INSERT INTO order_temp (id_produk, id_kategori, jumlah, id_session, tgl_order_temp, jam_order_temp)
															VALUES ('$id', '$id_kategori', '$jumlah', '$sid', '$tgl_sekarang', '$jam_sekarang')");
				//}
			}
			else 
			{
				// update product quantity in cart table
				mysql_query("UPDATE order_temp 
						SET jumlah = jumlah + $jumlah
						WHERE id_session ='$sid' AND id_produk='$id'");		
			}
		
		/*
		$sql1 = mysql_query("SELECT * FROM order_temp WHERE id_session='$sid'");
		$total=mysql_num_rows($sql1);
		*/
		
		/*Mulai Delete all cart entries older than one day */
		$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
		mysql_query("DELETE FROM order_temp WHERE tgl_order_temp < '$kemarin'");
		/*Akhir Delete all cart entries older than one day */
		
		header('location: cart-umkmsrikandimataram.html');
	}
	else
	{
	echo "<script>window.alert('Maaf !! Data tidak boleh kosong!!');
        window.location=('index.php')</script>";
	}
?>