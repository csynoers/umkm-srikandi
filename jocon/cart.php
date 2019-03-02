<?php
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM order_temp, produk WHERE id_session='$sid' AND order_temp.id_produk=produk.id_produk");
	$ketemu=mysql_num_rows($sql);
	if($ketemu < 1){
    echo "<script>window.alert('Maaf!! Keranjang Belanja Anda Kosong..!');
        window.location=('index.php')</script>";
    }
	else
	{  
?>
								<section class="main-content col-lg-12 col-md-12 col-sm-12">
                    
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
                        	
											<div class="carousel-heading">
												<h4><i class="icons icon-basket-2"></i> Keranjang Belanja</h4>
											</div>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
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
														<td>
														<form class="form-inline" method="POST" action="update-cart.html">
															<input type="hidden" name="id" value="<?php echo $cart[id_order_temp];?>">
															<input name="qty" type="number" class="input-mini" value="<?php echo $cart[jumlah];?>" />
															<button rel="tooltip" title="Perbaharui" class="upcart" type="submit"><i class="icons icon-retweet"></i> Perbaharui </button>
														</form>
														<button class="button delcart" ><a href="delete-cart<?php echo $cart[id_order_temp];?>.html" style="color: #FFFFFF;" rel="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><i class="icon-white icon-trash"></i> Hapus</a></button>
														</td>
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
										<div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 2%;">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6">
													<a href="product-umkmsrikandimataram.html" class="button purple small"><i class="icons icon-left-2"></i> Lanjutkan Belanja</a>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6">
													<a href="checkout.html" class="button purple small" style="float:right;"><i class="icons icon-check"></i> Lanjut Ke Pembayaran</a>
												</div>
											</div>
										</div>
										
										
									</div>
								
								</section>
<?php }?> 