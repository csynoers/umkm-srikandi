<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#example').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>

		
		<?php
		$aksi="modul/mod_order/aksi_order.php";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">order</h3>
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Name</th> 
    				<th>Order Date</th> 
    				<th width="80px">Status</th> 
    				<th width="70px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$berita = mysql_query("SELECT * FROM orders ORDER BY id_order DESC");
				while($b=mysql_fetch_array($berita)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td><?php echo"$b[nama]" ?></td> 
    				<td><?php echo"$b[tgl_order]" ?></td> 
    				<td><span style='color:<?php if($b['status_order'] == 'Baru'){echo"#19C901;";} elseif($b['status_order'] == 'Canceled'){echo"#FF0000;";} else{echo"#0072CC;";} echo"'>$b[status_order]" ?></td> 
    				<td align="center"><a href="<?php echo"?module=orders&act=edit&id=$b[id_order]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=orders&act=hapus&id=$b[id_order]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			</div><!-- end of #tab1 -->
			<div class="clear"></div>
		</div><!-- end of .tab_container -->
		</article>
		<br />
		<div class="clear"></div>
		
		
		
		<?php break; 
		case"edit":
			$berita = mysql_query("SELECT * FROM orders WHERE id_order='$_GET[id]'");
			$r=mysql_fetch_array($berita);
			
			//$sql5=mysql_query("SELECT * FROM kota WHERE id_kota='$r[id_kota]' ");		
			//$k=mysql_fetch_array($sql5);	
		?>
		<article class="module width_full">
			<header><h3>Edit order</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=orders&act=update&id=<?php echo"$r[id_order]"; ?>'>
				<input type="hidden" name="id" value="<?php echo '$r[id_order]'; ?>">
				<div class="module_content">
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>No. Order</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[id_order]" ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Date and Time Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$r[tgl_order], $r[jam_order] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Status Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:
									<select name='status_order'>
										<?php 
										if($r['status_order']=='baru'){
											echo'	<option value="baru" disabled selected>Baru</option>
													<option value="terkirim">Terkirim</option>
													<option value="batal">Batal</option>';											
										}elseif($r['status_order']=='terkirim'){
											echo'	<option value="baru" disabled>Baru</option>
													<option value="terkirim" selected>Terkirim</option>
													<option value="batal">Batal</option>';																															
										}else{
											echo'	<option value="baru" disabled>Baru</option>
													<option value="terkirim">Terkirim</option>
													<option value="batal" selected>Batal</option>';			
										}
										?>
									</select>
									<input class='butt' type='submit' value='Change Status'>
								</td>
							</tr>
							
						</table>
						<fieldset><label width="100%">Keterangan</label><br /><br />
						<?php
							// tampilkan rincian produk yang di order
							$sql2=mysql_query("SELECT * , o.id_kategori AS idkategori FROM order_detail AS o INNER JOIN produk AS p ON o.id_produk=p.id_produk WHERE o.id_order='$r[id_order]' ");
							   
							//$z = mysql_fetch_array($sql2);
							//var_dump($z);exit();
							echo "<table  class='prodCart' width='100%'>";
													echo "<thead><tr style='border-bottom: 1px solid #DDD; font-weight:bold;'>
															<td class='center'>No.</td>
															<td>Thumbnail</td>
															<td>Produk</td>
															<td>Scent</td>
															<td>Quantity</td>
															<td>Price</td>
															<td>Sub Total</td>
															</thead>
														</tr><tbody>";
												$no=1;
												$total=0;
												$totalberat=0;
												while($ra=mysql_fetch_array($sql2))
												{

													$cart_progambar = mysql_fetch_array(mysql_query("SELECT * from produkgambar WHERE id_produk = '$ra[id_produk]' LIMIT 1"));

													$diskon		= $ra[harga]* ($ra[discount]/100); 
													$sale	 	= format_rupiah($ra[harga] - $diskon);
													
													$subtotal 	= ($ra['harga']-$diskon) * $ra['jumlah'];
													$total    	= $total + $subtotal;  
													$qty	 	= $qty + $ra[jumlah];

													$gambar = "<img width='50' height='50'  src='../joimg/produk/$cart_progambar[gambar]' style='float: left; margin-right: 5px;' />";
												   

													echo "
													<tr style='border-bottom: 1px solid #DDD;'>
														<td class='vtop center' style='vertical-align: middle;'><b>$no.</b></td>
															<input type=hidden name=id[$no] value=$ra[id_order]>
															<input type=hidden name=id_produk value=$ra[id_produk]>
															<input type=hidden name=jumlah value=$ra[jumlah]>
														  <td class='vtop center' style='vertical-align: middle;'>$gambar</td>
														  <td class='left vtop' style='vertical-align: middle;color: #5E5E5E;'>
															<h4 class='prodMeta _capitalize' style='margin-top: 14px;'>$ra[nama_produk]
															</h4>
														  </td>
														  <td class='vtop center' style='vertical-align: middle;'>";
														  $kategori = mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori = $ra[idkategori]"));
														  if(!empty($kategori) AND $kategori!=0){
														  echo $kategori[nama];
															}else{
																echo "Empty";
															}
														  echo "</td>
														  <td class='vtop center' style='vertical-align: middle;'>$ra[jumlah]</td>
														  <td class='vtop' style='vertical-align: middle;'>Rp. $sale,-</td>
														  <td class='vtop' style='vertical-align: middle;'>Rp. ".format_rupiah($subtotal).",-</td>
													  </tr>";
												$no++; 
											  } 
												echo "
												<tr class='fBg'>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td style='text-align:right;padding:5px;'><b>Quantity:</b></td>
													<td class='price right'  style='border-left: 1px solid #fff;'><b>".$qty."</b></td>
												</tr>
												<tr class='fBg'>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td style='text-align:right;padding:5px;'><b>Total:</b></td>
													<td class='price right'  style='border-left: 1px solid #fff;'><b>Rp. ".format_rupiah($total).",-</b></td>
												</tr>";
												echo "</tbody></table>";
						?>
						</fieldset>
						<?php
							$sql4=mysql_query("SELECT * FROM produk WHERE id_produk='$s[id_produk]' ");		
							$m=mysql_fetch_array($sql4);	
						?>
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>Nama Pemesean</label></td>
								<td style="width:70%; margin-bottom:8px;">: <?php echo $r[title];echo ". "; echo"$r[nama]" ?></td>
							</tr><tr>
								<td style="width:30%;"><label>Email</label></td>
								<td style="width:70%; margin-bottom:8px;">: <?php echo"$r[email]" ?></td>
							</tr><tr>
								<td style="width:10%;"><label>No. Telphone</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[phone] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Address</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[alamat] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Kecamatan</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[kecamatan] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Kota</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[kota] " ?></td>
							</tr><tr>
							<td style="width:10%;"><label>Provinsi</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[provinsi] " ?></td>
							</tr><tr>
							<td style="width:10%;"><label>Negara</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[negara] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>ZIP/Postal Code</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[kodepos] " ?></td>
							</tr>
							
						</table>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		
		<div class="clear"></div><br/><br/>
		
		
		
		<?php	
		break;
		 } ?>
		
<?php } ?>