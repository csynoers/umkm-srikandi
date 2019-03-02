				<!-- Sidebar Left-->
				
				<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
					
					<!-- Kontak -->
					<div class="row sidebar-box black">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="sidebar-box-heading">
                            	<i class="icons icon-contacts"></i>
								<h4>Kontak</h4>
							</div>
							<div class="sidebar-box-content">
								<ul>
								<?php
									$footer_sosmed = mysql_query("SELECT * FROM sosmed ORDER BY nama ASC");
									while($fp_sosmed = mysql_fetch_array($footer_sosmed)){
								?>	
									<li data-toggle="tooltip" data-placement="top" title="<?php echo $fp_sosmed[nama];?>"><a href="<?php echo $fp_sosmed[link];?>" title="<?php echo $fp_sosmed[nama];?>" target="_blank"><img src="joimg/sosmed/<?php echo $fp_sosmed[gambar];?>" class="kontak" /> </a></li>
								<?php } ?>
								</ul>
							</div>
						</div>					
					</div>
					<!-- /Kontak -->
					
					<!-- Pembayaran Melalui -->
					<div class="row sidebar-box black">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="sidebar-box-heading">
                            	<i class="icons icon-money-1"></i>
								<h4>Pembayaran Melalui</h4>
							</div>
							<div class="sidebar-box-content">
                                <table class="compare-table">
                                    <?php $sid_bank = mysql_query("SELECT * FROM bank ORDER BY nama_bank ASC");
									while($s_bank = mysql_fetch_array($sid_bank)){
									?>
                                    <tr>
                                        <td class="product-thumbnail"><img src="joimg/bank/<?php echo $s_bank[gambar];?>" alt="<?php echo $s_bank[nama_bank];?>" title="<?php echo $s_bank[nama_bank];?>"></td>
                                    </tr>
									<tr><td style="padding: inherit;"><p align="center">Atas Nama : <?php echo $s_bank[nama];?></p></td></tr>
									<tr><td style="padding: inherit;"><p align="center">No. Rek : <?php echo $s_bank[no_rekening];?></p></td></tr>
									<hr/>
									<?php }?>                                    
                                </table>
							</div>
						</div>					
					</div>
					<!-- /Pembayaran Melalui -->

					<!-- Cek Resi Pengiriman -->
					<div class="row sidebar-box black">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="sidebar-box-heading" style="margin-bottom: 5%;">
                            	<i class="icons icon-check-empty-1"></i>
								<h4>Cek Resi Pengiriman</h4>
							</div>
							<div class="sidebar-box-content">
								<form method="get" action="http://www.cekresi.com" target="_BLANK">
									<input type="text" placeholder="Masukkan no resi..." name="noresi" style="width:100%;"/>
									
									<p align="center">
										<input type="submit" value="cek resi" />
									</p>
								</form>
							</div>
						</div>
					</div>
					<!-- /Cek Resi Pengiriman -->
					
					<!-- Cek Biaya Pengiriman -->
					<div class="row sidebar-box black">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<a href="cek_ongkir.html">
							<div class="sidebar-box-heading">
                            	<i class="icons icon-money-2"></i>
								<h4>Cek Ongkos Kirim</h4>
							</div>
							</a>
						</div>
					</div>
					<!-- /Cek Biaya Pengiriman -->										
					
					<!-- Tag-->
							<div class="col-lg-3 col-md-3 col-sm-6">
								<h4>Tag</h4>
								<ul>
									<?php $tags_produk = mysql_query("SELECT tag FROM produk GROUP BY tag ORDER BY tag ASC");
									while($tag = mysql_fetch_array($tags_produk)){
										if(!empty($tag[tag])){
									?>
									<li><a href="<?php echo "bytag-". str_replace(' ', '-', strtolower(substr($tag[tag],0,50)))  .".html";?>"><i class="icons icon-right-dir"></i> <?php echo $tag[tag];?></a></li>
									<?php }} ?>	
								</ul>
								</br>
							</div>
							<!-- /Tag -->
					
					

				</aside>
				<!-- /Sidebar Left-->
				
				<!-- Sidebar Right-->
				<aside class="sidebar right-sidebar col-lg-3 col-md-3 col-sm-3">
					
					<!-- Categories -->
					<div class="row sidebar-box black">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="sidebar-box-heading">
								<i class="icons icon-list"></i>
								<h4>Semua Produk</h4>
							</div>
							
							<div class="sidebar-box-content">
								<ul>
								<?php
								$rightsidproduk = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 5");
								while($rsproduk = mysql_fetch_array($rightsidproduk)){
								echo "
									<li><a href='product-detail-". substr($rsproduk[produk_seo],0,50) ."-". $rsproduk[id_produk] .".html'>". $rsproduk[nama_produk] ."</a></li>
									";
								} ?>
									<li><a class="purple" href="product-umkmsrikandimataram.html"><b>TAMPILKAN SEMUA PRODUK</b></a></li>
								</ul>
							</div>
							
						</div>
							
					</div>
					<!-- /Categories -->
					
					<!-- Produk Spesial -->
					<div class="row sidebar-box black">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="sidebar-box-heading">
                            <i class="icons icon-award-2"></i>
								<h4>Produk Spesial</h4>
							</div>
							
							<div class="sidebar-box-content">
								<div class="sidebar-box-content">
								<table class="bestsellers-table">
									<?php $sdbr_produk = mysql_query("SELECT * FROM produk ORDER BY RAND() LIMIT 4");
										while($slp = mysql_fetch_array($sdbr_produk)){
											
											$s_produkgambar = mysql_fetch_array(mysql_query("SELECT * FROM produkgambar WHERE id_produk = '$slp[id_produk]' LIMIT 1"));
									?>
									<tr>
										<td class="product-thumbnail"><a href="product-detail-<?php echo substr($slp[produk_seo],0,50);?>-<?php echo $slp[id_produk];?>.html"><img src="joimg/produk/small/small_<?php echo $s_produkgambar[gambar];?>" alt="<?php echo $slp[produk_seo];?>" title="Detail <?php echo $slp[nama_produk];?>"></a></td>
										<td class="product-info">
											<p><a href="product-detail-<?php echo substr($slp[produk_seo],0,50);?>-<?php echo $slp[id_produk];?>.html"><?php echo $slp[nama_produk];?></a></p>
											<span class="price"><?php if($slp[discount]!=0){echo "<del>Rp."; echo format_rupiah($slp[harga]); echo ",- </del> <br/>"; } ;?> Rp. <?php $diskon = $slp[harga]* ($slp[discount]/100); $sale = $slp[harga] - $diskon; echo format_rupiah($sale);?> ,-</span>
										</td>
									</tr>
									<?php } ?>
									
								</table>
							</div>
							</br>
							
						</div>
						
					</div>
					
					<!-- Statistik-->
					<div class="row sidebar-box black">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<?php
							 $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
				 			 $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
				  			 $hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal'"), 0); 
				 			 $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
							?>
							
					<div class="sidebar-box-heading">
					<i class="icons icon-user"></i>
					<h4>Visitor</h4>
					</div>	
                            
					<div class="row sidebar-box blue">
					
					<?php
					$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
				 	$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
				  	$hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal'"), 0); 
				 	$totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					?>
					<ul>
					<li style="margin-bottom: 10px;"><span style="margin-right: 25px;font-weight: bold;">Today Views</span> : <strong><?php echo $pengunjung;?> </strong></li>
					<li style="margin-bottom: 10px;"><span style="margin-right: 31px;font-weight: bold;">Total Views</span> : <strong><?php echo $totalpengunjung;?> </strong></li>
					<li style="margin-bottom: 10px;"><span style="margin-right: 15px;font-weight: bold;">Today Visitors</span> : <strong><?php echo $hits;?> </strong></li>
					<li style="margin-bottom: 10px;"><span style="margin-right: 21px;font-weight: bold;">Total Visitors</span> : <strong><?php echo $totalhits;?> </strong></li>
							</ul>
					</div>
					</div>
					</div>
					<!-- / Statistik -->
					
					
					
					
				</aside>
				<!-- /Sidebar Right-->