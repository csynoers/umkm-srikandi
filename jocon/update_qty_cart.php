<?php
	session_start();
	ob_start();
	include "../josys/koneksi.php";
	include "../josys/library.php";
	include "../josys/fungsi_input.php";

	$sid  	= session_id();
	
	$id    	= $_POST['id'];
	$qty 	= str_replace('-', '', $_POST["qty"]);// quantity
	
	/*
	$pro 	= mysql_query("SELECT * FROM order_temp WHERE id_order_temp ='$id'");
	$pr		= mysql_fetch_array($pro);
  
	$prod	= mysql_query("SELECT * FROM produk WHERE id_produk ='$pr[id_produk]'");
	$p 		= mysql_fetch_array($prod);
	
	if($qty > $p[stok])
	{
		echo "<script>window.alert('Sorry !! Jumlah yang anda masukan melebihi stok produk yang tersedia!');window.location=('cart-king-pheromone.html')</script>";
	}
	else
	{
		*/
		if($qty == 0 OR $qty=='')
		{
			echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');window.location=('cart-umkmsrikandimataram.html')</script>";
		} // tambahan update ada disini
		else
		{
			mysql_query("UPDATE order_temp SET jumlah = '".$qty."'
			WHERE id_order_temp = '".$id."' AND id_session = '".$sid."' ");
			header('Location: cart-umkmsrikandimataram.html');
		}  
  //}
?>