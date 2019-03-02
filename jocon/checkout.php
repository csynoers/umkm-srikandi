<?php
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM order_temp, produk WHERE id_session='$sid' AND order_temp.id_produk=produk.id_produk");
	$ketemu=mysql_num_rows($sql);
	if($ketemu < 1){
    echo "<script>window.alert('Sorry!! Your cart is empty. Fill it up!');
        window.location=('index.php')</script>";
    }
	else
	{  
?>
<style type="text/css">
.page-content input[type="email"] {
    width: 100%;
    background: #f7f7f7;
    font-size: 14px;
}
input[type="email"] {
    padding: 5px 10px;
    border: 1px solid #e6e6e6;
    height: 35px;
}
input[type="email"] {
    padding: 5px 10px;
    border: 1px solid #e6e6e6;
    height: 40px;
    transition: background 0.3s;
    -webkit-transition: background 0.3s;
    -moz-transition: background 0.3s;
    -ms-transition: background 0.3s;
    -o-transition: background 0.3s;
}
</style>
				<section class="main-content col-lg-12 col-md-12 col-sm-12">
                    
                    <div class="row">
                    	<form class="form-inline" method="POST" action="order-umkmsrikandimataram.html">
                        <div class="col-lg-4 col-md-4 col-sm-4 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4>1.  Detail Informasi <i class="icons icon-right-2"></i></h4>
                            </div>
                            
                            <div class="page-content">
                            	<div class="row">
                         
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Title*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<select class="chosen-select" name="title">
                                        	<option value="Mr">Mr</option>
                                            <option value="Ms">Ms</option>
                                        </select>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nama Depan*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="fname" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nama Belakang*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="lname" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nomer Handphone*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="phone" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Email*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="email" name="email" required>
                                    </div>	
                                    
                                </div>
                                                                
                                <div class="row">
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Alamat*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<textarea type="text" name="alamat" required style="height: 80px;"></textarea>
                                    </div>	
                                    
                                </div>
                               
                                
                                <div class="row" style="padding-top: inherit;">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Kecamatan*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="kecamatan" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Kota*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="kota" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Provinsi*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="provinsi" required>
                                    </div>	
                                    
                                </div>
                                                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Negara *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="negara" required>
                                    </div>	
                                    
                                </div>
								
								<div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Kode Pos *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="kodepos" required>
                                    </div>	
                                    
                                </div>
								<hr />
								<p>* Wajib Diisi</p>
                            </div>
                            
                    	</div>
						
						<div class="col-lg-3 col-md-3 col-sm-3 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4>2.  Metode pembayaran <i class="icons icon-right-2"></i></h4>
                            </div>
                            
                            <div class="page-content">
                            	<div class="row">
                                	
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    	<p><strong>Transfer Bank</strong></p>
										<p>Anda dapat melakukan proses transfer ke rekening berikut :</p>
                                    </div>
									<div class="col-lg-12 col-md-12 col-sm-12">
                                   <?php $check_bank = mysql_query("SELECT * FROM bank ORDER BY nama_bank ASC");
								   while($c_bank = mysql_fetch_array($check_bank)){
									echo "
										<p>
											<img src='joimg/bank/$c_bank[gambar]' title='$c_bank[nama_bank]'> <br />
											No Rekening : $c_bank[no_rekening] <br />
											Atas Nama : $c_bank[nama]
										</p>
									";
								   }
									?>
									</div>
                                </div>
                                
                            </div>
                            
                    	</div>
						
						
						<div class="col-lg-5 col-md-5 col-sm-5 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4>3. Konfirmasi Pesanan <i class="icons icon-check-2"></i></h4>
                            </div>
                            
                            <div class="page-content">
                            	
										<table class="orderinfo-table">
												
													<tr>
														<th>Item</th>
														<th>Harga</th>
														<th>Qty</th>
														<th>Subtotal</th>
													</tr>
												
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
														<td><img src="joimg/produk/small/small_<?php echo $cart_progambar[gambar];?>" class="img-cart" /> <br/>
														<?php echo $cart[nama_produk];?></td>
														<td>Rp. <?php echo format_rupiah($cart_sale);?> ,-</td>
														<td><?php echo $cart[jumlah];?></td>
														<td>Rp. <?php echo format_rupiah($cart_subtotal);?> ,-</td>
													</tr>
												<?php } ?>
												
													<tr>
														<td class="align-right"><span class="price big">Jumlah pesanan akhir</span></td>
														<td><strong>Rp. <?php echo format_rupiah($cart_subharga);?> ,-</strong></td>
														<td><strong><?php echo $cart_qty;?></strong></td>
														<td><span class="price big">Rp. <?php echo format_rupiah($cart_total);?> ,-</span></td>
													</tr>
												
											</table>
                                
                                <div class="row">
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Catatan </p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<textarea name="catatan" type="text" style="height: 80px;"></textarea>
                                    </div>	
                                    
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12" >
                                    	<input class="big purple" type="submit" value="Konfirmasi Pesanan" style="float:right;">
                                    </div>
                                    
                                </div>
                            </div>
                            
                    	</div>
                          
                    </div>
                        
                    
				</section>
				<!-- /Main Content -->
	<?php } ?>