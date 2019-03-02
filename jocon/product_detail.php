		<style type="text/css">
		a.button.big {
			font-size: 14px;
			padding: 10px 30px;
			height: 36px;
		}
		.tab-heading a.button {
			background: #262626!important;
		}
		.tab-heading a:hover, .tab-heading a.button.active {
			background: #262626!important;
		}		
		</style>
				<section class="main-content col-lg-6 col-md-6 col-sm-6 col-lg-push-3 col-md-push-3 col-sm-push-3">
					
                    <div id="product-single">
					
						<!-- Product -->
						<div class="product-single">
							
							<div class="row">
								<?php 
										$id_product = $_GET['id'];
										$product_detail = mysql_fetch_array(mysql_query("SELECT * FROM produk AS p INNER JOIN produkgambar AS pg WHERE p.id_produk = '$id_product' AND pg.id_produk = '$id_product'"));
								?>
									
								<div class="col-lg-12 col-md-12 col-sm-12">
                        	
									<div class="carousel-heading">
										<h4><?php echo $product_detail[nama_produk];?></h4>
									</div>
									
								</div>
								
								<!-- Product Images Carousel -->
								<div class="col-lg-12 col-md-12 col-sm-12 product-single-image">
									
									<div id="product-slider">
										<ul class="slides">
											<li>
												<img class="cloud-zoom" src="joimg/produk/<?php echo $product_detail[gambar];?>" data-large="joimg/produk/<?php echo $product_detail[gambar];?>" alt="<?php echo $proruct_detail[produk_seo];?>" />
											</li>
										</ul>
									</div>
									<div id="product-carousel">
										<ul class="slides">
										<?php $detail_produkgambar = mysql_query("SELECT * FROM produkgambar WHERE id_produk = '$id_product' ORDER BY id_produkgambar ASC");
										while($d_produkgambar = mysql_fetch_array($detail_produkgambar)){
										?>
											<li>
												<a class="fancybox" rel="product-images" href="joimg/produk/small/small_<?php echo $d_produkgambar[gambar];?>"></a>
												<img src="joimg/produk/<?php echo $d_produkgambar[gambar];?>" data-large="joimg/produk/<?php echo $d_produkgambar[gambar];?>"/>
											</li>
										<?php } ?>
										</ul>
										<div class="product-arrows">
											<div class="left-arrow">
												<i class="icons icon-left-dir"></i>
											</div>
											<div class="right-arrow">
												<i class="icons icon-right-dir"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /Product Images Carousel -->
								
								
								<div class="col-lg-12 col-md-12 col-sm-12 product-single-info">
									
									<h2>Detail Produk <?php echo $product_detail[nama_produk];?></h2>
									<div class="rating-box">
										<span>Rating</span> :
										<div class="rating readonly-rating" data-score="<?php echo $product_detail[rating];?>"></div>
										
										<span>Category</span> : <?php $d_category = mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori = '$product_detail[id_kategori]'"));echo "<a href='category'>$d_category[nama]</a>";?>
									</div>
																	
									<span class="price">
										<?php if($product_detail[discount]!=0){echo "<del>Rp."; echo format_rupiah($product_detail[harga]); echo ",- </del>"; } ;?>
										Rp. <?php $diskon = $product_detail[harga]* ($product_detail[discount]/100); $sale = $product_detail[harga] - $diskon; echo format_rupiah($sale);?> ,-
									</span>
									<span>Kode Produk</span> : <?php echo $product_detail[kodeproduk];?>
								
								<form method="POST" action="add-into-cart.html">
									<input type="hidden" name="id_pro" value="<?php echo $product_detail[id_produk];?>">
									<input type="hidden" name="kategori" value="<?php echo $product_detail[id_kategori];?>">
									<table class="product-actions-single" id="mytable">
										<tr>
											<td>Kuantitas :</td>
											<td>
												<div class="numeric-input">
													<input type="text" name="qty" value="1">
													<span class="arrow-up"><i class="icons icon-up-dir"></i></span>
													<span class="arrow-down"><i class="icons icon-down-dir"></i></span>
												</div>
												<button class="addtocart" type="submit"><i class="icons icon-basket-2"></i> Beli </button>
											</td>
										</tr>
									</table> 
								</form>
								
								</div>
								
							</div>
							
						</div>
						<!-- /Product -->
						
						
						<!-- Product Tabs -->
						<div class="row">
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="tabs">
								
									<div class="tab-heading">
										<a href="#tab1" class="button big">Detail</a>
										<a href="#tab2" class="button big">Produk Terkait</a>
										<a href="#tab3" class="button big">Produk Lainnya</a>
									</div>
									
									<div class="page-content tab-content">
										
										<div id="tab1">
											<?php echo $product_detail[deskripsi];?>
										</div>
										
										<div id="tab2">
											<?php
											$dproduk_terkait = mysql_query("SELECT * FROM produk WHERE id_kategori = '$product_detail[id_kategori]' ORDER BY id_produk DESC LIMIT 4");
											while($dpro_terkait = mysql_fetch_array($dproduk_terkait)){
								
											$dprodukgambar = mysql_fetch_array(mysql_query("SELECT * FROM produkgambar WHERE id_produk = '$dpro_terkait[id_produk]' LIMIT 1"));
											?>
											<!-- Product Terkait -->
											<div class="col-lg-6 col-md-6 col-sm-6 product">                            
											<form method="POST" action="add-into-cart.html">
												<input type="hidden" name="id_pro" value="<?php echo $dpro_terkait[id_produk];?>">
												<input type="hidden" name="qty" value="1">
												<input type="hidden" name="kategori" value="<?php echo $dpro_terkait[id_kategori];?>">
												<div class="product-image">
													<?php if(!empty($dpro_terkait[tag])){
													echo "<span class='product-tag'> $dpro_terkait[tag]</span>";
													}?>
													
													<a href="product-detail-<?php echo substr($dpro_terkait[produk_seo],0,50);?>-<?php echo $dpro_terkait[id_produk];?>.html" title="Detail <?php echo $dpro_terkait[nama_produk];?>">
														<img src="joimg/produk/small/small_<?php echo $dprodukgambar[gambar];?>" alt="<?php echo $dpro_terkait[nama_produk];?>">
													</a>
												</div>
												
												<div class="product-info" style="height: 18%;">
													<h5><a href="product-detail-<?php echo substr($dpro_terkait[produk_seo],0,50);?>-<?php echo $dpro_terkait[id_produk];?>.html"><?php echo $dpro_terkait[nama_produk];?></a></h5>
													<span class="price"><?php if($dpro_terkait[discount]!=0){echo "<del>Rp."; echo format_rupiah($dpro_terkait[harga]); echo ",- </del> <br/>"; } ;?> Rp. <?php $diskon = $dpro_terkait[harga]* ($dpro_terkait[discount]/100); $sale = $dpro_terkait[harga] - $diskon; echo format_rupiah($sale);?> ,-</span>
													<div class="rating readonly-rating" data-score="<?php echo $dpro_terkait[rating];?>"></div>
												</div>
												
												<div class="product-actions">
													<button class="addtocart" type="submit"><i class="icons icon-basket-2"></i> Add to cart </button>
												</div>
											</form>
											</div>
											<!-- Product Terkait -->
											<?php } ?>
											
										</div>
										
										<div id="tab3">
											
											<?php
											$dproduk_lainnya = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 4");
											while($dproduk_lain = mysql_fetch_array($dproduk_lainnya)){
								
											$dprodukgambar_t = mysql_fetch_array(mysql_query("SELECT * FROM produkgambar WHERE id_produk = '$dproduk_lain[id_produk]' LIMIT 1"));
											?>
											<!-- Product Terkait -->
											<div class="col-lg-6 col-md-6 col-sm-6 product">
											<form method="POST" action="add-into-cart.html">
												<input type="hidden" name="id_pro" value="<?php echo $dproduk_lain[id_produk];?>">
												<input type="hidden" name="qty" value="1">
												<input type="hidden" name="kategori" value="<?php echo $dproduk_lain[id_kategori];?>">											
												<div class="product-image">
													<?php if(!empty($dproduk_lain[tag])){
													echo "<span class='product-tag'> $dproduk_lain[tag]</span>";
													}?>
													
													<a href="product-detail-<?php echo substr($dproduk_lain[produk_seo],0,50);?>-<?php echo $dproduk_lain[id_produk];?>.html" title="Detail <?php echo $dproduk_lain[nama_produk];?>">
														<img src="joimg/produk/small/small_<?php echo $dprodukgambar_t[gambar];?>" alt="<?php echo $dproduk_lain[nama_produk];?>">
													</a>
												</div>
												
												<div class="product-info" style="height: 18%;">
													<h5><a href="product-detail-<?php echo substr($dproduk_lain[produk_seo],0,50);?>-<?php echo $dproduk_lain[id_produk];?>.html"><?php echo $dproduk_lain[nama_produk];?></a></h5>
													<span class="price"><?php if($dproduk_lain[discount]!=0){echo "<del>Rp."; echo format_rupiah($dproduk_lain[harga]); echo ",- </del> <br/>"; } ;?> Rp. <?php $diskon = $dproduk_lain[harga]* ($dproduk_lain[discount]/100); $sale = $dproduk_lain[harga] - $diskon; echo format_rupiah($sale);?> ,-</span>
													<div class="rating readonly-rating" data-score="<?php echo $dproduk_lain[rating];?>"></div>
												</div>
												
												<div class="product-actions">
													<button class="addtocart" type="submit"><i class="icons icon-basket-2"></i> Add to cart </button>
												</div>
											</form>
											</div>
											<!-- Product Terkait -->
											<?php } ?>											
											
										</div>
										
									</div>
									
								</div>
								
							</div>
							
						</div>
						<!-- /Product Tabs -->
					
					</div>				
					
				</section>
				<!-- /Main Content -->
				
				<!-- Sidebar -->
				<?php include 'joinc/sidebar.php';?>
				<!-- /Sidebar -->
				