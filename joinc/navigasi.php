		<style type="text/css">
			span.nav-caption {
				font-size: 14px;
			}
			#logo {
				padding-top: 0px;
				padding-left: 15px;
			}
			
			.header {
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
		</style>
				<!-- Top Header -->
					<div id="top-header">
						
						<div class="row">
							
							<nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">
								<ul class="pull-left">
									<li class="black"><a href="about-umkmsrikandimataram.html">Tentang Kami</a></li>
									<li class="black"><a href="payment-confirmation.html">Konfirmasi</a></li>
							<!--	<li class="black"><a href="testimoni-umkmsrikandimataram.html">Testimoni</a></li>	-->
									<li class="black"><a href="join-reseller.html">Join Reseller</a></li>
									<li class="black"><a href="how-to-order.html">Cara Pemesanan</a></li>
									<li class="black"><a href="contact-umkmsrikandimataram.html">Kontak</a></li>
								</ul>
							</nav>
							
							<nav class="col-lg-5 col-md-5 col-sm-5">
								<ul class="pull-right">
									<li class="black"><a href="#"><i class="icons icon-basket-1"></i> Troli Belanja : <?php 	
										$sid  = session_id(); 
										$sql_tot_cart = mysql_query("SELECT * FROM order_temp WHERE id_session='$sid' ");
										$total_cart=mysql_num_rows($sql_tot_cart); echo $total_cart;
										?> Item(s)</a>
										<ul id="login-dropdown" class="box-dropdown">
											<li>
                                            	<div class="box-wrapper">
													<h4><b>Daftar Belanja</b></h4>
                                                   <table class="orderinfo-table" style="font-size: 12px; width: 100%;">
														<tr>
															<th>Item</th>
															<th>Harga</th>
															<th>Qty</th>
															<th>Subtotal</th>
														</tr>
													
													<?php 	
													$nav_cart_qty = 0; 
													$nav_cart_total = 0;
													$nav_sql_cart = mysql_query("SELECT * FROM order_temp AS ot INNER JOIN produk AS p ON id_session='$sid' AND ot.id_produk=p.id_produk");
													while($nav_cart = mysql_fetch_array($nav_sql_cart)){
														//$nav_cart_progambar = mysql_fetch_array(mysql_query("SELECT * from produkgambar WHERE id_produk = '$nav_cart[id_produk]' LIMIT 1"));
														
														$nav_cart_diskon	= $nav_cart[harga]* ($nav_cart[discount]/100); 
														$nav_cart_sale	 	= $nav_cart[harga] - $nav_cart_diskon;
														
														$nav_cart_subtotal 	= ($nav_cart['harga']-$nav_cart_diskon) * $nav_cart['jumlah'];
														$nav_cart_total    	= $nav_cart_total + $nav_cart_subtotal;  
														$nav_cart_qty	 	= $nav_cart_qty + $nav_cart[jumlah];
														
														$nav_cart_subharga	= $nav_cart_subharga + $nav_cart_sale;
													?>
														<tr>
															<td><?php echo $nav_cart[nama_produk];?></td>
															<td>Rp. <?php echo format_rupiah($nav_cart_sale);?> ,-</td>
															<td><?php echo $nav_cart[jumlah];?></td>
															<td>Rp. <?php echo format_rupiah($nav_cart_subtotal);?> ,-</td>
														</tr>
													<?php } ?>
													
														<tr>
															<td class="align-right"><span class="price big">Jumlah pesanan akhir</span></td>
															<td><strong>Rp. <?php echo format_rupiah($nav_cart_subharga);?> ,-</strong></td>
															<td><strong><?php echo $nav_cart_qty;?></strong></td>
															<td><span class="price big">Rp. <?php echo format_rupiah($nav_cart_total);?> ,-</span></td>
														</tr>
													
												</table>
                                                </div>
												<div class="footer">
													<a class="button pull-right" href="cart-umkmsrikandimataram.html"> Detail Kerangjang Belanja</a>
												</div>
											</li>
										</ul>
									</li>
									<li class="black"><a href="checkout.html"><i class="icons icon-check-2"></i> Ke Pembayaran</a></li>
								</ul>
							</nav>
							
						</div>
						
					</div>
					<!-- /Top Header -->
					
					
					
					<!-- Main Header -->
					
					<div id="main-header">
						
						<div class="row">
							
							<div id="logo" class="col-lg-12 col-md-12 col-sm-12">
								<a href="umkmsrikandimataram.html" style="text-align:center"  title="UMKM Srikandi Mataram - Jual makanan & Minuman, Herbal dan Kerajinan tangan" class="header" ><img src="img/lalala.jpg" alt="Alifa Hijab - Grosir dan Ecerean Hijab"></a>
							</div>
					<!--		
							<nav id="middle-navigation" class="col-lg-8 col-md-8 col-sm-8">
								<ul class="pull-right">
									<li class="blue">
										<a href="compare_products.html"><i class="icons icon-docs"></i>0 Items</a>
                                    </li>
									<li class="red">
										<a href="wishlist.html"><i class="icons icon-heart-empty"></i>2 Items</a>
                                    </li>
									<li class="orange">
										<a href="order_info.html"><i class="icons icon-basket-2"></i>
										<?php 	
										$sid  = session_id(); 
										$sql_tot_cart = mysql_query("SELECT * FROM order_temp WHERE id_session='$sid' ");
										$total_cart=mysql_num_rows($sql_tot_cart); echo $total_cart;
										?>
										</a>
                                    	<ul id="cart-dropdown" class="box-dropdown parent-arrow">
											<li>
                                            	<div class="box-wrapper parent-border">
                                                    <p>Recently added item(s)</p>
                                                    
                                                    <table class="cart-table">
                                                    	<tr>
                                                    		<td><img src="img/products/sample1.jpg" alt="product"></td>
                                                            <td>
                                                                <h6>Lorem ipsum dolor</h6>
                                                                <p>Product code PSBJ3</p>
                                                            </td>
                                                            <td>
                                                            	<span class="quantity"><span class="light">1 x</span> $79.00</span>
                                                                <a href="#" class="parent-color">Remove</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                    		<td><img src="img/products/sample1.jpg" alt="product"></td>
                                                            <td>
                                                                <h6>Lorem ipsum dolor</h6>
                                                                <p>Product code PSBJ3</p>
                                                            </td>
                                                            <td>
                                                            	<span class="quantity"><span class="light">1 x</span> $79.00</span>
                                                                <a href="#" class="parent-color">Remove</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                    		<td><img src="img/products/sample1.jpg" alt="product"></td>
                                                            <td>
                                                                <h6>Lorem ipsum dolor</h6>
                                                                <p>Product code PSBJ3</p>
                                                            </td>
                                                            <td>
                                                            	<span class="quantity"><span class="light">1 x</span> $79.00</span>
                                                                <a href="#" class="parent-color">Remove</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                    <br class="clearfix">
                                                </div>
                                                
												<div class="footer">
													<table class="checkout-table pull-right">
                                                    	<tr>
                                                        	<td class="align-right">Tax:</td>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                        	<td class="align-right">Discount:</td>
                                                            <td>$37.00</td>
                                                        </tr>
                                                        <tr>
                                                        	<td class="align-right"><strong>Total:</strong></td>
                                                            <td><strong class="parent-color">$999.00</strong></td>
                                                        </tr>
                                                    </table>
												</div>
                                                
                                                <div class="box-wrapper no-border">
                                                	<a class="button pull-right parent-background" href="#">Checkout</a>
													<a class="button pull-right" href="order_info.html">View Cart</a>
                                                </div>
											</li>
										</ul>
                                    </li>
									<li><a class="flag" href="#"><span class="english-flag"></span>English</a>
                                    	<ul class="box-dropdown parent-arrow">
											<li>
                                            	<div class="box-wrapper no-padding parent-border">
                                                    <table class="language-table">
                                                    	<tr>
                                                        	<td class="flag"><span class="english-flag"></span></td>
                                                            <td class="country"><a href="#">English</a></td>
                                                        </tr>
                                                        <tr>
                                                        	<td class="flag"><span class="german-flag"></span></td>
                                                            <td class="country"><a href="#">German</a></td>
                                                        </tr>
                                                        <tr>
                                                        	<td class="flag"><span class="french-flag"></span></td>
                                                            <td class="country"><a href="#">French</a></td>
                                                        </tr>
                                                        <tr>
                                                        	<td class="flag"><span class="italian-flag"></span></td>
                                                            <td class="country"><a href="#">Italian</a></td>
                                                        </tr>
                                                        <tr>
                                                        	<td class="flag"><span class="spanish-flag"></span></td>
                                                            <td class="country"><a href="#">Spanish</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
											</li>
										</ul>
                                    	
                                    </li>
									
								</ul>
							</nav>
							-->
						</div>
						
					</div>
					<!-- /Main Header -->
					
					
					<!-- Main Navigation -->
					<nav id="main-navigation" class="style1">
						<ul>
							
							<li class="black">
								<a href="umkmsrikandimataram.html">
									<span class="nav-caption">Home</span>
								</a>
							</li>
							
							<?php
								$nav_kategori = mysql_query("SELECT * FROM kategori WHERE menu='Y' ORDER BY id_kategori");
								while($navkat = mysql_fetch_array($nav_kategori)){
							?>
							<li class="black">
								<a href="<?php echo "category-". substr($navkat[nama_seo],0,50) ."-". $navkat[id_kategori] .".html";?>" title="<?php echo $navkat['nama'];?>" alt="<?php echo $navkat['nama_seos'];?>">
									<span class="nav-caption"><?php echo $navkat['nama'];?></span>
								</a>
								<?php
									$query_cek_subkategori = "SELECT * FROM subkategori WHERE id_kategori = '$navkat[id_kategori]'";
									$nav_cek_subkategori = mysql_fetch_array(mysql_query($query_cek_subkategori));
									if(!empty($nav_cek_subkategori)){
								?>
									<ul class="normal-dropdown normalAniamtion">
										<?php 
										$nav_subkategori = mysql_query($query_cek_subkategori);
										while($navsub = mysql_fetch_array($nav_subkategori)){
										echo "
										<li><a href='subcategory-". substr($navsub[nama_seo],0,50) ."-". $navsub[id_subkategori] .".html' alt='$navsub[nama_seo]'> $navsub[nama] </a></li>
										";} ?>
									</ul>
									<?php }?>
							</li>
							<?php } ?>
														
							<li class="nav-search">
                                	<i class="icons icon-search-1"></i>
							</li>
							
						</ul>
						
						<div id="search-bar">
						<form method="POST" action="searching.html">	
							<div class="col-lg-12 col-md-12 col-sm-12">
                            	<table id="search-bar-table">
                                    <tr>
                                    	<td class="search-column-1">
                                            <input name="search" type="text" placeholder="Enter your keyword">
                                        </td>
                                    </tr>
                                </table>
							</div>
							<div id="search-button">
								<input type="submit" value="">
								<i class="icons icon-search-1"></i>
							</div>
						</form>
						</div>
						
					</nav>
					<!-- /Main Navigation -->