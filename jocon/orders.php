<?php
	function anti_injection($data){
		  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		  return $filter;
		}
	
	$title = anti_injection($_POST['title']);
	$fnama = anti_injection($_POST['fname']);
	$lnama = anti_injection($_POST['lname']);
	$nama = "$fnama $lnama";
	$email = anti_injection($_POST['email']);
	$alamat = anti_injection($_POST['alamat']);
	$kodepos = anti_injection($_POST['kodepos']);
	$kecamatan = anti_injection($_POST['kecamatan']);
	$kota = anti_injection($_POST['kota']);
	$provinsi = anti_injection($_POST['provinsi']);
	$negara = anti_injection($_POST['negara']);
	
	$catatan = anti_injection($_POST['catatan']);
	
	$phone = anti_injection($_POST['phone']);
	$jam = $jam_sekarang;	
	
	$sid  = session_id();
	//$member = mysql_query("SELECT * FROM memberarea WHERE id_session='$sid'");
	//$m=mysql_fetch_array($member);
	
	//$id_member = $m['id_member'];	
	
	//cek pemesan apakah hari ini sudah pernah memesan atau belum berdasarkan email dan tanggal untuk pencocokannya
	$cek_pemesan = mysql_query("SELECT * FROM orders WHERE email='$email' AND tgl_order='$tgl_sekarang'");
	$cek_pm = mysql_fetch_array($cek_pemesan);
	
	if(empty($cek_pm))
	{
	$sql2 = mysql_query("INSERT INTO orders (title, nama, email, alamat, kecamatan, kota, provinsi, negara, kodepos, phone, status_order, tgl_order, jam_order, catatan)
					VALUES ('$title', '$nama', '$email', '$alamat','$kecamatan', '$kota', '$provinsi', '$negara', '$kodepos', '$phone', 'baru', '$tgl_sekarang', '$jam' ,'$catatan')");
	
	$order = mysql_query("SELECT * FROM orders WHERE email='$email' AND tgl_order='$tgl_sekarang' AND jam_order='$jam'");
	$or=mysql_fetch_array($order);
	
	//if(isset($_SESSION['idmember'])){
	//	$ord = mysql_query("SELECT * FROM orders_temp WHERE id_member='$_SESSION[idmember]'");
	//}else{
		$ord = mysql_query("SELECT * FROM order_temp WHERE id_session='$sid'");
	//}
	
	while($o=mysql_fetch_array($ord))
	{
		$sql2 = mysql_query("INSERT INTO order_detail(id_order, id_produk, id_kategori, jumlah)
						VALUES ('$or[id_order]', '$o[id_produk]', '$o[id_kategori]', '$o[jumlah]')");
	}
	
?>
				<section class="main-content col-lg-12 col-md-12 col-sm-12">
                    
                    
                    <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading">
                                <h4>Informasi Pemesanan</h4>
                            </div>
                            
                            <table class="orderinfo-table">
                            	
                                <tr>
                                	<th>No Order</th>
                                    <td><b><?php echo"$or[id_order]"; ?></b> ( No order / No pemesanan ini beguna untuk proses konfirmasi pembayaran)</td>
                                </tr> 
                                
                                <tr>
                                	<th>Nama </th>
                                    <td><?php echo $title; echo ". ";echo $nama;?></td>
                                </tr>
                                
                                <tr>
                                	<th>Email</th>
                                    <td><?php echo $email;?></td>
                                </tr>
                                
                                <tr>
                                	<th>Nomer Telphone</th>
                                    <td><?php echo $phone;?></td>
                                </tr>
                                
                                <tr>
                                	<th>Shipment</th>
                                    <td><?php echo $phone;?></td>
                                </tr>
                                
                                <tr>
                                	<th>Alamat</th>
                                    <td><?php echo $alamat;?></td>
                                </tr>
								
								<tr>
                                	<th>Kecamatan</th>
                                    <td><?php echo $kecamatan;?></td>
                                </tr>
								
                                <tr>
                                	<th>Kota</th>
                                    <td><?php echo $kota;?></td>
                                </tr>
								
								<tr>
                                	<th>Provinsi</th>
                                    <td><?php echo $provinsi;?></td>
                                </tr>
								
								<tr>
                                	<th>Negara</th>
                                    <td><?php echo $negara;?></td>
                                </tr>
								
								<tr>
                                	<th>Kodepos</th>
                                    <td><?php echo $kodepos;?></td>
                                </tr>
								
								<tr>
                                	<th>Catatan</th>
                                    <td><?php echo $catatan;?></td>
                                </tr>
								
                            </table>
                            
                        </div>
                        
                    </div>
                    
                    <div class="row">
                    	
                        
                         <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading">
                                <h4>Daftar produk pesanan Anda</h4>
                            </div>
							
											<table class="orderinfo-table">
												<thead>
													<tr>
														<th colspan="2">Item</th>
														<th>Harga Asli</th>
														<th>Discount</th>
														<th>Harga</th>
														<th>Kuantitas</th>
														<th>Subtotal</th>
													</tr>
												</thead>
												<tbody>
												<?php 	
												$cart_qty = 0; 
												$cart_total = 0;
												$sql_cart = mysql_query("SELECT * FROM order_temp AS ot INNER JOIN produk AS p ON id_session='$sid' AND ot.id_produk=p.id_produk");
												while($cart = mysql_fetch_array($sql_cart)){
													$cart_progambar = mysql_fetch_array(mysql_query("SELECT * from produkgambar WHERE id_produk = '$cart[id_produk]' LIMIT 1"));
													
													$cart_diskon	= $cart[harga]* ($cart[discount]/100); 
													$cart_sale	 	= $cart[harga] - $cart_diskon;
													
													$cart_subtotal 	= ($cart['harga']-$cart_diskon) * $cart['jumlah'];
													$cart_total    	= $cart_total + $cart_subtotal;  
													$cart_qty	 	= $cart_qty + $cart[jumlah];
													
													$cart_subharga	= $cart_subharga + $cart_sale;
												?>
													<tr>
														<td><img src="joimg/produk/small/small_<?php echo $cart_progambar[gambar];?>" class="img-cart" /></td>
														<td><?php echo $cart[nama_produk];?></td>
														<td>Rp <?php echo format_rupiah($cart[harga]);?> ,-</td>
														<td><?php if($cart[discount] == 0){echo "-";}else{echo "Rp. ". format_rupiah($cart_diskon) .",- "; echo " ($cart[discount] %)";}?> </td>
														<td>Rp. <?php echo format_rupiah($cart_sale);?> ,-</td>
														<td><?php echo $cart[jumlah];?></td>
														<td>Rp. <?php echo format_rupiah($cart_subtotal);?> ,-</td>
													</tr>
												<?php } ?>
												
													<tr>
														<td class="align-right" colspan="4"><span class="price big">Jumlah pesanan akhir</span></td>
														<td><strong>Rp. <?php echo format_rupiah($cart_subharga);?> ,-</strong></td>
														<td><strong><?php echo $cart_qty;?></strong></td>
														<td><span class="price big">Rp. <?php echo format_rupiah($cart_total);?> ,-</span></td>
													</tr>
												</tbody>
											</table>
								
                        </div>
                        
                    </div>
	<?php
	
			$pesan="Terimakasih telah melakukan pemesanan online di toko kami<br /><br /> 
					<h3>Data pemesan beserta ordernya adalah sebagai berikut:</h3><br />
					<table style='margin-left:20px;'>
						<tr><td>No. Order</td><td style='width:10px;padding-left:10px'>:</td><td>$or[id_order]</td></tr>
						<tr><td>Nama</td><td style='width:10px;padding-left:10px'> : </td><td>$title . $nama</td></tr>
						<tr><td>Email</td><td style='width:10px;padding-left:10px'> : </td><td>$email</td></tr>
						<tr><td>Phone</td><td style='width:10px;padding-left:10px'> : </td><td>$phone</td></tr>
						<tr><td>Alamat</td><td style='width:10px;padding-left:10px'> : </td><td>$alamat</td></tr>
						<tr><td>Kecamatan</td><td style='width:10px;padding-left:10px'> : </td><td>$kecamatan</td></tr>
						<tr><td>Kota</td><td style='width:10px;padding-left:10px'> : </td><td>$kota</td></tr>
						<tr><td>Provinsi</td><td style='width:10px;padding-left:10px'> : </td><td>$provinsi</td></tr>
						<tr><td>Negara</td><td style='width:10px;padding-left:10px'> : </td><td>$negara</td></tr>
						<tr><td>ZIP/Kodepost</td><td style='width:10px;padding-left:10px'> : </td><td> $kodepos</td></tr>
					</table>
												<table  class='prodCart' width='100%'>
													<thead>
														<tr style='border-bottom: 1px solid #DDD; font-weight:bold;'>
															<th class='center'>No.</td>
															<th>Thumbnail</th>
															<th>Produk</th>
															<th>Kuantitas</th>
															<th>Harga</th>
															<th>Sub Total</th>
														</tr>
													</thead>
													<tbody>
					";
	
										// Tampilkan produk-produk yang telah dimasukkan ke keranjang belanja
											$sid = session_id();
										//	if(isset($_SESSION['idmember'])){
											//	$sql = mysql_query("SELECT * FROM orders_temp, produk WHERE id_member='$_SESSION[idmember]' AND orders_temp.id_produk=produk.id_produk");
											//}else{
												$sql = mysql_query("SELECT * , produk.id_produk AS idproduk FROM order_temp, produk WHERE id_session='$sid' AND order_temp.id_produk=produk.id_produk");
										//	}SELECT * FROM order_temp AS ot INNER JOIN produk AS p ON id_session='$sid' AND ot.id_produk=p.id_produk
											$ketemu=mysql_num_rows($sql);
											
												
												$no=1;
												$total=0;
												$totalberat=0;
												while($r=mysql_fetch_array($sql))
												{
													$cart_progambar = mysql_fetch_array(mysql_query("SELECT * from produkgambar WHERE id_produk = '$r[idproduk]' LIMIT 1"));
													
													$disc        = ($r['discount']/100)*$r['harga'];
													$hargadisc   = number_format(($r['harga']-$disc),0,",",".");
													$subtotal    = ($r['harga']-$disc) * $r['jumlah'];
													$total       = $total + $subtotal; 
													$qty		= $qty + $r['jumlah'];
													
													$subtotal_rp = format_rupiah($subtotal);
													$total_rp    = format_rupiah($total);
													//$gtotal_rp    = format_rupiah($gtotal);
													$okirim_rp    = format_rupiah($ongkoskirim);
													$harga       = format_rupiah($r['harga']);
													
													$pesan.="
													<tr style='border-bottom: 1px solid #DDD;'>
														<td class='vtop center' style='vertical-align: middle;'><b>$no.</b></td>
														  <td class='left vtop' style='vertical-align: middle;color: #5E5E5E;'>
															<img width='50' height='50'  src='http://umkmsrikandimataram.com/joimg/produk/$cart_progambar[gambar]' style='float: left; margin-right: 5px;' />
														  </td>
														  <td class='vtop' style='vertical-align: middle;'>$r[nama_produk]</td>
														  <td class='vtop center' style='vertical-align: middle;'>$r[jumlah]</td>
														  <td class='vtop' style='vertical-align: middle;'>Rp. $hargadisc,-</td>
														  <td class='vtop' style='vertical-align: middle;'>Rp. $subtotal_rp,-</td>
													  </tr>";
													  
												$no++; 
											  } 									  


												$pesan.="
												<tr class='fBg'>
														
													</tr>
													<tr class='fBg'>
													<td></td>
													<td colspan='2' style='text-align:right;padding:5px;'><b>Kuantitas:</b></td>
													<td class='price right' colspan='3' style='border-left: 1px solid #fff;'><b> $qty </b></td></tr>
													<tr class='fBg'>
													<td></td>
													<td colspan='2' style='text-align:right;padding:5px;'><b>Total:</b></td>
													<td class='price right' colspan='3' style='border-left: 1px solid #fff;'><b>Rp. $total_rp,-</b></td></tr>
													<tr class='fBg'>
													<td></td>
													</tbody></table>
													<br /><br /><br />
													
													Silahkan lakukan pembayaran ke :<br /><br />";
													
													$bank = mysql_query("SELECT * FROM bank ORDER BY id_bank");
													while($ba=mysql_fetch_array($bank)){
														$pesan.="
														
														$ba[nama_bank]<br />
														$ba[no_rekening]<br />
														a.n. $ba[nama]<br /><br />
														
														";
													}
												
												$pesan.="
													-------------------------------------------------------------<br />
													Setelah Anda transfer, silahkan konfirmasi pembayaran <a target='_blank' href='http://umkmsrikandimataram.com/payment-confirmation.html'>di sini.</a>

													<hr />
													<p>Email ini dikirim  sebagai tanda transaksi yang telah dilakukan melalui umkmsrikandimataram.com
														dengan menggunakan email <b>$_POST[email]</b>, jika anda merasa tidak pernah melakukan transaksi harap abaikan email ini. </p>
													";
												
												
												$user = mysql_query("SELECT * FROM users WHERE username = 'admin'");
												$us=mysql_fetch_array($user);
												$email = $us['email'];
												
												$subjek="Pemesanan Online UMKM Srikandi Mataram (umkmsrikandimataram.com)";
												// Kirim email dalam format HTML
												$dari = "From: $email \n";
												$dari .= "Content-type: text/html \r\n";
												
												// Kirim email ke kustomer
												mail($_POST['email'],$subjek,$pesan,$dari);
												// Kirim email ke pengelola toko online
												mail($email,$subjek,$pesan,$dari);
												// Kirim email ke pengelola toko online
												mail("caramudah5@gmail.com",$subjek,$pesan,$daris);
												
											
											//if(isset($_SESSION['idmember'])){
											//	$del = mysql_query("DELETE FROM order_temp WHERE id_member = '$_SESSION[idmember]'");
											//}else{
												$del = mysql_query("DELETE FROM order_temp WHERE id_session = '$sid'");
											//}	
											
										?>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>- Cek email anda sebagai konfirmasi dari kami.</h5>
			<h5>- Data order sudah terkirim ke email Kami (<?php echo"$email"; ?>).</h5>
			<h5>- Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka data order Anda akan terhapus (transaksi batal)</h5>
			<br />
		</div>
	</div>
</section>

<?php
}
	else
	{
		echo "<script>window.alert('Hari ini Anda sudah memesan di toko kami! Gunakan email lainnya untuk melakukan pemesanan lagi.');
        window.location=('index.php')</script>";
	}
?>