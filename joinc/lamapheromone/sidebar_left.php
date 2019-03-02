<style type="text/css">
div.ImgSidebarWrapper {
    width: 100%;
    height: auto;
    overflow: hidden;
    text-align: center;
}
img.CropSidebarCenter {
    left: 50%;
    margin-left: -100%;
    position: relative;
    width: 100% !important;
    height: auto !important;
}
.cart a:hover {
    color: #B1B1B1;
}
a {
    color: #FFFFFF;
    text-decoration: none;
}
a:hover {
    color: #FFE098;
}
.cart a {
    color: #F5F5F5;
}
</style>
            <div class="row-fluid">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li>Cart</li>
                    </ul>
                </div>
            </div><!--/row-->
			<div class="row-fluid">
                <div class="span12 cart">
                    <ul>
						<?php 	
						$sid  = session_id();
						$sid_qty = 0; 
						$sid_total = 0;
						$sql_sid_cart = mysql_query("SELECT * FROM order_temp AS ot INNER JOIN produk AS p ON id_session='$sid' AND ot.id_produk=p.id_produk");
						while($sid_cart = mysql_fetch_array($sql_sid_cart)){
							
							$sid_diskon	 = $sid_cart[harga]* ($sid_cart[discount]/100); 
							$sid_sale	 = format_rupiah($sid_cart[harga] - $sid_diskon);
							
							$sid_subtotal   = ($sid_cart['harga']-$sid_diskon) * $sid_cart['jumlah'];
							$sid_total      = $sid_total + $sid_subtotal;  
							$sid_qty	 	= $sid_qty + $sid_cart[jumlah];
						?>
                        <li class="lineBottom">
                            <div class="span7 pull-left"><a href="product-detail-<?php echo substr($sid_cart[produk_seo],0,50);?>-<?php echo $sid_cart[id_produk];?>.html" rel="tooltip" title="See detail"> <?php echo $sid_cart[nama_produk];?></a> <span>[ <?php echo $sid_cart[jumlah];?> ]</span></div>
                            <div class="span5 pull-right">Rp. <?php echo format_rupiah($sid_subtotal);?> ,- <a href="delete-cart<?php echo $sid_cart[id_order_temp];?>.html" class="t-right no-underline" rel="tooltip" title="Remove this product from my cart" onclick="return confirm('Apakah anda yakin menghapus data ini?');">X</a></div>
                        </li>
						<?php }	?>					
                    </ul>
                </div>
            </div><!--/row-->
            <div class="row-fluid">
                <div class="span12 total-price">
                    <ul>
                        <li>
                            <div class="span6 pull-left">Quantity</div>
                            <div class="span6 pull-right"><?php echo $sid_qty;?></div>
                        </li>
                        <li>
                            <div class="span6 pull-left">Total</div>
                            <div class="span6 pull-right">Rp. <?php echo format_rupiah($sid_total);?> ,-</div>
                        </li>
                        <li class="form-inline">
                            <div class="span12"><a href="cart-king-pheromone.html" class="btn btn-inverse pull-left"><i class="icon-white icon-shopping-cart"></i> Cart</a><a href="checkout.html" class="btn btn-inverse pull-right"><i class="icon-white icon-check"></i> Checkout</a></div>
                        </li>
                    </ul>
                </div>
            </div><!--/row-->
            <div class="row-fluid">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li>Category</li>
                    </ul>
                </div>
            </div><!--/row-->
            <div class="row-fluid">
                <ul class="nav nav-tabs nav-stacked">
					<?php
					$sidebar_category = mysql_query("SELECT * FROM kategori");
					while($sid_cat = mysql_fetch_array($sidebar_category)){
					?>
                    <li><a href="category-<?php echo substr($sid_cat[nama_seo],0,50);?>-<?php echo $sid_cat[id_kategori];?>.html"><?php echo $sid_cat[nama];?></a></li>
                    <?php } ?>
                </ul>
            </div><!--/row-->
			<div class="row-fluid">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li>Special Offers</li>
                    </ul>
                </div>
            </div><!--/row-->
            <div class="row-fluid">
                <div class="span12">
                    <ul class="thumbnails">
                        <li class="span12">
                          <div class="thumbnail">
							<?php $sdbr_produk = mysql_query("SELECT * FROM produk ORDER BY RAND() LIMIT 1");
								while($slp = mysql_fetch_array($sdbr_produk)){
							?>
							<div class="ImgSidebarWrapper">
								<a href="product-detail-<?php echo substr($slp[produk_seo],0,50);?>-<?php echo $slp[id_produk];?>.html"><img class="CropSidebarCenter" title="<?php echo $slp[nama_produk];?>" alt="<?php echo $slp[produk_seo];?>" src="joimg/produk/<?php echo $slp[gambar];?>"></a>
							</div>
							<div class="caption">
							  <h5><?php echo $slp[nama_produk];?></h5>
							  <p><s>Price : Rp. <?php echo format_rupiah($slp[harga]);?> ,- </s></p>
							  <p><b>On Sale : Rp. <?php $diskon = $slp[harga]* ($slp[discount]/100); $sale = $slp[harga] - $diskon; echo format_rupiah($sale);?> ,-</b></p>
							</div>
							<?php } ?>
							
                          </div>
                        </li>
                    </ul>
                </div>
            </div>