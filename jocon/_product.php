<style type="text/css">
div.ImgWrapper {
    width: 100%;
    height: auto;
    overflow: hidden;
    text-align: center;
}
img.CropCenter {
    left: 50%;
    margin-left: -100%;
    position: relative;
    width: 100% !important;
    height: auto !important;
}
</style>

	<div class="row-fluid">
        <div class="span3">
           <?php include "joinc/sidebar_left.php";?>
        </div>
		<div class="span9">
		<?php include "joinc/breadcrumb.php";?> 
            <div class="row-fluid">
                <div class="span12">
					<div class="page-header">
                        <h1>All Product <small>King Pheromone</small></h1>
                    </div>
                <ul class="thumbnails">
				<?php 
				$pagination = new Pagingfrontend;						
				$batas  	= 6;
				$posisi 	= $pagination->cariPosisi($batas);
						
				$new = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi, $batas");
				while($np = mysql_fetch_array($new)){
				?>
					<li class="span4">
					  <div class="thumbnail">
						<div class="ImgWrapper">
							<a href="product-detail-<?php echo substr($np[produk_seo],0,50);?>-<?php echo $np[id_produk];?>.html"><img class="CropCenter" title="<?php echo $np[nama_produk];?>" alt="<?php echo $np[produk_seo];?>" src="joimg/produk/<?php echo $np[gambar];?>"></a>
						</div>
						<div class="caption">
						  <h5><?php echo $np[nama_produk];?></h5>
						  <p><s>Price : Rp. <?php echo format_rupiah($np[harga]);?> ,- </s></p>
						  <p><b>On Sale : Rp. <?php $diskon = $np[harga]* ($np[discount]/100); $sale = $np[harga] - $diskon; echo format_rupiah($sale);?> ,-</b></p>
						</div>
					  </div>
					</li>
				<?php } ?>
                </ul>
                <div class="pagination">
                    <ul>					
					<?php 
						$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
						$jmlhalaman  = $pagination->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $pagination->navHalaman($_GET['halaman'], $jmlhalaman);
						echo "<center><div class='des-pages'>$linkHalaman </div></center>";
					?> 
					</ul>
                </div>
                </div>
            </div>
            
        </div>
      </div>