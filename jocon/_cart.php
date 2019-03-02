<?php
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM order_temp, produk WHERE id_session='$sid' AND order_temp.id_produk=produk.id_produk");
	$ketemu=mysql_num_rows($sql);
	if($ketemu < 1){
    echo "<script>window.alert('Soory!! Your cart is empty. Fill it up!');
        window.location=('index.php')</script>";
    }
	else
	{  
?>
<style type="text/css">
input[type="number"]{
    height: 24px;
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
                        <h1>Cart <small>King Pheromone</small></h1>
                    </div>
                   
                   <table class="table table-bordered" style="font-size: 13px; height:10px !important; overflow; scroll;">
                       <thead>
                        <tr>
							<th>Thumbnail</th>
                            <th>Product</th>
                            <th width="23%">Qty</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                        </tr>
                       </thead>
                       <tbody>
					   <?php 	
						$cart_qty = 0; 
						$cart_total = 0;
						$sql_cart = mysql_query("SELECT * FROM order_temp AS ot INNER JOIN produk AS p ON id_session='$sid' AND ot.id_produk=p.id_produk");
						while($cart = mysql_fetch_array($sql_cart)){
							
							$cart_diskon	= $cart[harga]* ($cart[discount]/100); 
							$cart_sale	 	= format_rupiah($cart[harga] - $cart_diskon);
							
							$cart_subtotal 	= ($cart['harga']-$cart_diskon) * $cart['jumlah'];
							$cart_total    	= $cart_total + $cart_subtotal;  
							$cart_qty	 	= $cart_qty + $cart[jumlah];
						?>
                        <tr>
							<td><img src="joimg/produk/<?php echo $cart[gambar];?>" class="img-cart" /></td>
							<td><?php echo $cart[nama_produk];?></td>
                            <td>
                                <form class="form-inline" method="POST" action="update-cart.html">
									<input type="hidden" name="id" value="<?php echo $cart[id_order_temp];?>">
                                    <input name="qty" type="number" class="input-mini" value="<?php echo $cart[jumlah];?>" />
                                    <button rel="tooltip" title="Update" class="btn btn-inverse" type="submit"><i class="icon-white icon-refresh"></i></button>
                                    <a href="delete-cart<?php echo $cart[id_order_temp];?>.html" class="btn btn-inverse" rel="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><i class="icon-white icon-trash"></i></a>
                                </form>
                            </td>
                            <td>Rp. <?php echo $cart_sale;?> ,-</td>
                            <td>Rp. <?php echo format_rupiah($cart_subtotal);?> ,-</td>
                        </tr>
						<?php }	?>	
                        
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="t-rights">Quantity</td>
                            <td><?php echo $cart_qty;?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="t-rights"><strong>Total</strong></td>
                            <td><strong>Rp. <?php echo format_rupiah($cart_total);?> ,-</strong></td>
                        </tr>
                       </tbody>
                   </table>
                   <div class="form-actions">
                        <a href="product-king-pheromone.html" class="btn btn-inverse"><i class="icon-white icon-arrow-left"></i> Continue Shopping</a>
                        <a href="checkout.html" class="btn btn-inverse pull-right"><i class="icon-white icon-check"></i> Checkout</a>
                   </div>
                   
                </div>
            </div>
        </div>
      </div>
	<?php }?> 