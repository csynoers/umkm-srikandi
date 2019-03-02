<?php 
$cari = $_POST['search'];

if(isset($cari))
{ 
	if(!empty($cari))
	{
?>			
			<section class="main-content col-lg-6 col-md-6 col-sm-6 col-lg-push-3 col-md-push-3 col-sm-push-3">
										
					<!-- Featured Products -->                   
					<div class="row"> 
						
						<div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading">
                                <h4>Menampilkan Produk Berdasarkan Hasil Pencarian</h4>
                            </div>
                            
                    	</div>
					<?php
						//$sql_artikel="SELECT * FROM articles WHERE  title LIKE '%" . $cari . "%' OR content LIKE '%" . $cari  ."%'";
						$homeproduk = mysql_query("SELECT * FROM produk WHERE kodeproduk LIKE '%" . $cari . "%' OR nama_produk LIKE '%" . $cari . "%' OR deskripsi LIKE '%" . $cari . "%' OR  tag LIKE '%" . $cari . "%' ORDER BY id_produk DESC");
						while($hproduk = mysql_fetch_array($homeproduk)){
								
							$hprodukgambar = mysql_fetch_array(mysql_query("SELECT * FROM produkgambar WHERE id_produk = '$hproduk[id_produk]' LIMIT 1"));
					?>
                        <!-- Product Item -->
                        <div class="col-lg-4 col-md-4 col-sm-4 product">                            
                        <form method="POST" action="add-into-cart.html">
							<input type="hidden" name="id_pro" value="<?php echo $hproduk[id_produk];?>">
							<input type="hidden" name="qty" value="1">
							<input type="hidden" name="kategori" value="<?php echo $hproduk[id_kategori];?>">
							<div class="product-image">
								<?php if(!empty($hproduk[tag])){
								echo "<span class='product-tag'> $hproduk[tag]</span>";
								}?>
                                
                                <a href="product-detail-<?php echo substr($hproduk[produk_seo],0,50);?>-<?php echo $hproduk[id_produk];?>.html" title="Detail <?php echo $hproduk[nama_produk];?>">
									<img src="joimg/produk/small/small_<?php echo $hprodukgambar[gambar];?>" alt="<?php echo $hproduk[nama_produk];?>">
								</a>
                            </div>
                            
                            <div class="product-info" style="height: 18%;">
                                <h5><a href="product-detail-<?php echo substr($hproduk[produk_seo],0,50);?>-<?php echo $hproduk[id_produk];?>.html"><?php echo $hproduk[nama_produk];?></a></h5>
                                <span class="price"><?php if($hproduk[discount]!=0){echo "<del>Rp."; echo format_rupiah($hproduk[harga]); echo ",- </del> <br/>"; } ;?> Rp. <?php $diskon = $hproduk[harga]* ($hproduk[discount]/100); $sale = $hproduk[harga] - $diskon; echo format_rupiah($sale);?> ,-</span>
                                <div class="rating readonly-rating" data-score="<?php echo $hproduk[rating];?>"></div>
                            </div>
                            
                            <div class="product-actions">
								<button class="addtocart" type="submit"><i class="icons icon-basket-2"></i> Beli </button>
							</div>
						</form>
                        </div>
                        <!-- Product Item -->
                        <?php } ?>
	
                    </div>
					<!-- /Featured Products -->
					
					
						
				</section>
				
				<!-- Sidebar -->
				<?php include 'joinc/sidebar.php';?>
				<!-- /Sidebar -->
<?php 
	}
	else
	{
		echo  "<div class='alert alert-warning' ><b>Sorry. </b>Please enter a search query</div>";
	}
}
else
{
	echo  "<div class='alert alert-warning' ><b>Sorry. </b>Please enter a search query</div>";
}
?>