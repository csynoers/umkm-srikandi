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
select, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input
{
    height: 22px;	
}
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
                        <h1>Checkout <small>King Pheromone</small></h1>
                    </div>  
                    <form class="form-horizontal" method="POST" action="order-king-pheromone.html">
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input type="radio" checked="" value="Mr" id="optionsRadios1" name="title" title="Mr.">
                                Mr.                              
                                <input type="radio" value="Ms" id="optionsRadios2" name="title" title="Ms.">
                                Ms.
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">First Name</label>
                            <div class="controls">
                              <input name="fname" type="text" placeholder="First Name" id="focusedInput" class="input-xlarge focused" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Last Name</label>
                            <div class="controls">
                              <input name="lname" type="text" placeholder="Last Name" id="focusedInput" class="input-xlarge focused" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                              <input name="email" type="email" placeholder="Email" id="focusedInput" class="input-xlarge focused" required>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">Address</label>
                            <div class="controls">
                              <textarea name="address" class="input-xlarge" placeholder="Address" rows="3" required></textarea>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">ZIP/Postal Code</label>
                            <div class="controls">
                              <input name="zip" type="text" placeholder="Postal code" id="focusedInput" class="input-xlarge focused" required>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">City</label>
                            <div class="controls">
                                <input name="city" type="text" placeholder="City" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]" data-items="4" data-provide="typeahead" style="margin: 0 auto;" class="input-xlarge" required>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">Country</label>
                            <div class="controls">
                                <input name="country" type="text" placeholder="Country" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]" data-items="4" data-provide="typeahead" style="margin: 0 auto;" class="input-xlarge" required>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">Phone</label>
                            <div class="controls">
                              <input name="phone" type="text" placeholder="Phone" id="focusedInput" class="input-xlarge focused">
                            </div>
                        </div>
						
						<!-- table shopping cart -->
						<h3>Your Order</h3>
                        <hr />                       
						<table class="table table-bordered" style="font-size: 13px;">
						   <thead>
							<tr>
								<th width="13%">Thumbnail</th>
								<th>Product</th>
								<th width="13%">Qty</th>
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
								<td><?php echo $cart[jumlah];?></td>
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
						<!-- table shopping cart -->
                        <div class="form-actions">
                            
							<a href="product-king-pheromone.html" class="btn">Continue Shopping</a>
							<button type="submit" class="btn btn-inverse pull-right">Order</a>
                        </div>
                        
                    </form>
					    
                </div>
            </div>
        </div>
      </div>
	  
<?php } ?>