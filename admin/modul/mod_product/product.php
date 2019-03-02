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
		<!-- TinyMCE 4.x -->
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript">
	tinymce.init({
			selector: "textarea",
			plugins: "table",
			tools: "inserttable",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste jbimages",
				"textcolor",
				"autoresize",
				"pagebreak",
				
			],

			//toolbar: "pagebreak save charmap advhr| insertfile undo redo | styleselect,formatselect,fontselect,fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | jbimages | print preview media | forecolor backcolor emoticons | anchor",
			toolbar:"pagebreak save charmap| insertfile undo redo | styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | jbimages | print preview media | forecolor backcolor emoticons | justifyleft justifycenter justifyright justifyfull | cut copy paste pastetext pasteword | search replace | blockquote |link unlink anchor image cleanup help code | insertdate inserttime preview | tablecontrols | hr removeformat visualaid | sub sup | iespell media advhr | print | ltr rtl | fullscreen | insertlayer moveforward movebackward absolute |styleprops spellchecker | cite abbr acronym del ins attribs | visualchars nonbreaking template | insertimage",
			relative_urls: false
	 });
	</script>
<!-- /TinyMCE -->
<style>.ui-widget-header{background:none;border:none;}</style>

	<script type="text/javascript">
		function kat() { 
		
		var kat = $('select#kategori option:selected').val();
	 
		$.ajax( {
			type: 'POST',
			url: 'subkategori.php',
			data: {kat:kat}, 

			success: function(data) {
				$('#subkategori').html(data);
			}
		} );
	}
	</script>
		
		<?php
		$aksi="modul/mod_product/aksi_product.php";
		$module="product";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Product Name</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Code Product</th> 
    				<th>Name</th> 
    				<th>Category</th> 
    				<th width="13%">Date</th> 
    				<th width="70px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$berita = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC");
				while($b=mysql_fetch_array($berita)){
				$tanggal = tgl_indo($b['tgl_masuk']);
				
				$katt = mysql_query("SELECT * FROM kategori where id_kategori='$b[id_kategori]'");
				$tkatt=mysql_fetch_array($katt);
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no";?></td> 
    				<td align="center"><?php echo $b[kodeproduk];?></td> 
    				<td><?php echo "$b[nama_produk]" ?></td> 
    				<td><?php echo $tkatt['nama']; ?></td> 
    				<td><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id_produk]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id_produk]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
					
					</td> 
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
		case"insertnew":
		?>
		
		<article class="module width_full">
			<header><h3>Add Product</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
				
				<div class="module_content">
						<fieldset><label>Code Product</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="kodeproduk" type="text" placeholder="Please input uniq code product">
						</fieldset>
						<fieldset><label>Product Name</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="nama_produk" type="text" placeholder="Please input name product">
						</fieldset>
						<fieldset><label>Category</label><br /><br />
							<select id='kategori' name="kategori" onchange='kat()' required>
								<?php
								$kateg = mysql_query("SELECT * FROM kategori ORDER BY nama");
								while($tkateg=mysql_fetch_array($kateg)){
								?>
								<option value="<?php echo $tkateg['id_kategori'];?>"><?php echo $tkateg['nama'];?></option>
								<?php
								}
								?>
							</select>
						</fieldset>
						<fieldset><label>Sub Category</label><br /><br />
							<select id='subkategori' name="sub" required>
								<option value ='0' selected> Select Subcategory</option>
							</select>
						</fieldset>
						
						<fieldset><label>Rating (between 1 and 5)</label><br /><br />
							<input style="width:96%; margin-bottom:8px; margin-left: 10px;" name="rating" type="number" min="1" max="5" placeholder="Sample 5 , Number Only" required>
						</fieldset>
						<fieldset><label>Price (Rp)</label><br /><br />
							<input style="width:96%; margin-bottom:8px; margin-left: 10px;" name="harga" type="number" placeholder="Sample 100000 , Number Only" required>
						</fieldset>
						<fieldset><label>Discount (%)</label><br /><br />
							<input style="width:96%; margin-bottom:8px; margin-left: 10px;" name="discount" type="number"  placeholder="Sample 5 , Number Only">
						</fieldset>
						<fieldset><label>Tag</label><br /><br />
							<input style="width:96%; margin-bottom:8px; margin-left: 10px;" name="tag" type="text" placeholder="Sample : Promo, New Product or Limited Edition">
						</fieldset>
						<fieldset><label>Description</label><br /><br />
							<textarea name="deskripsi" id="jogmce"></textarea>
						</fieldset>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<br /><br /><label>Thumbnail</label>
							<input style="margin-left:10px;" type="file" name="fupload[]" size="40" multiple="multiple" accept="image/*">
							<br /><br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 380 x 380px. Tipe file harus jpg/jpeg
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		<?php break; 
		case"edit":
			$berita = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
			$r=mysql_fetch_array($berita);
		?>
		
		<article class="module width_full">
			<header><h3>Edit product</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id_produk]" ?>'>
				<div class="module_content">
						<fieldset><label>Code Product</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="kodeproduk" type="text" value="<?php echo"$r[kodeproduk]" ?>">
						</fieldset>
						<fieldset><label>Produk Name</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="nama_produk" type="text" value="<?php echo"$r[nama_produk]" ?>">
						</fieldset>
						<fieldset><label>Kategori</label><br /><br />
							<select id='kategori' name="kategori" onchange='kat()' required>
								<?php
								//$sub = mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[id_kategori]'");
								//$s=mysql_fetch_array($sub);
								$kateg = mysql_query("SELECT * FROM kategori order by nama");
								while($tkateg=mysql_fetch_array($kateg)){
								if($tkateg['id_kategori']==$r['id_kategori']){
								?>
								<option value="<?php echo $tkateg['id_kategori'];?>" selected><?php echo $tkateg['nama'];?></option>
								<?php
								}else{
								?>
								<option value="<?php echo $tkateg['id_kategori'];?>"><?php echo $tkateg['nama'];?></option>
								<?php
								}
								}
								?>
							</select>
						</fieldset>
						<fieldset><label>Subkategori</label><br /><br />
							<select id='subkategori' name="sub" required>
								<?php
								//$subkateg = mysql_query("SELECT * FROM subkategori order by nama WHERE id_kategori='$r[id_kategori]'");

								$pilsx = mysql_query("SELECT * FROM subkategori WHERE id_kategori = '$r[id_kategori]' ORDER BY nama ASC");
								$cox = mysql_num_rows($pilsx);
								if($cox != 0){
	
								$kateg = mysql_query("SELECT * FROM subkategori order by nama");
								while($tsubkateg=mysql_fetch_array($kateg)){
								if($tsubkateg['id_subkategori']==$r['id_subkategori']){
								?>
								<option value="<?php echo $tsubkateg['id_subkategori'];?>" selected><?php echo $tsubkateg['nama'];?></option>
								<?php
								}else{
								?>
								<option value="<?php echo $tsubkateg['id_subkategori'];?>"><?php echo $tsubkateg['nama'];?></option>
								<?php
								}
								}
								}else{echo"<option>Not Found!</option>";}
								?>
							</select>
						</fieldset>
						<fieldset><label>Rating (between 1 and 5)</label><br /><br />
							<input style="width:96%; margin-bottom:8px; margin-left: 10px;"  value="<?php echo"$r[rating]" ?>" name="rating" type="number" min="1" max="5" placeholder="Sample 5 , Number Only" required>
						</fieldset>
						<fieldset><label>Price (Rp)</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="harga" type="text" value="<?php echo"$r[harga]" ?>" placeholder="Rp" required>
						</fieldset>
						<fieldset><label>Discount (%)</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="discount" type="text" value="<?php echo"$r[discount]" ?>" placeholder="%">
						</fieldset>
						<fieldset><label>Tag</label><br /><br />
							<input style="width:96%; margin-bottom:8px; margin-left: 10px;" name="tag" type="text" value="<?php echo"$r[tag]" ?>" placeholder="Sample : Promo, New Product, or Limited Edition">
						</fieldset>
						<fieldset><label>Description</label><br /><br />
							<textarea name="deskripsi" id="jogmce"><?php echo"$r[deskripsi]" ?></textarea>
						</fieldset>

					<?php 
						$product_img = mysql_query("SELECT * FROM produkgambar WHERE id_produk = '$r[id_produk]' ORDER BY id_produkgambar DESC");
						while($proimg = mysql_fetch_array($product_img)){
					?>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							&nbsp;&nbsp;<img width="270px" src="../joimg/produk/<?php echo"$proimg[gambar]" ?>">
							<br /><br /><label><a href="<?php echo"$aksi?module=$module&act=hapusgambar&id=$proimg[id_produkgambar]";?>" onclick="return confirm('Apakah anda yakin menghapus gambar ini?');" class="alt_btn" style="color: red;"><b> Delete</b></a></label>
						</fieldset>
					<?php } ?>
						<hr/>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<br /><br /><label>Thumbnail</label>
							<input style="margin-left:10px;" type="file" name="fupload[]" size="40" multiple="multiple" accept="image/*">
							<br /><br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 380 x 380px. Tipe file harus jpg/jpeg
						</fieldset>
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