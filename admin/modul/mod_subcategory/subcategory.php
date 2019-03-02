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
		$aksi="modul/mod_subcategory/aksi_subcategory.php";
		$module="subcategory";
		switch($_GET['act']){
			default:
		?>
		
		
		<article style="min-width:535px; width: 65%;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">Sub Categories</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Name</th>
    				<th>Category</th> 
    				<th>Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$slide = mysql_query("SELECT * FROM subkategori ORDER BY id_subkategori ASC");
				while($s=mysql_fetch_array($slide)){
				
				$categ = mysql_query("SELECT * FROM kategori WHERE id_kategori = $s[id_kategori]");
				while($cat = mysql_fetch_array($categ)){
				?>
				<tr>  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$s[nama]" ?></td>
    				<td><?php echo"$cat[nama]" ?></td> 
    				<td style="text-align:center"><a href="<?php echo"?module=$module&act=edit&id=$s[id_subkategori]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"$aksi?module=$module&act=hapus&id=$s[id_subkategori]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; }} ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Add Sub Categories</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo $aksi;?>?module=<?php echo $module;?>&act=insertnew'>
				<div class="module_content">
						<fieldset>
							<label>Name</label>
							<input name="nama" type="text">
						</fieldset>
						<fieldset><label>Category</label><br /><br />
							<select name="kategori" style="width:91%; margin:2px 10px;">
								<?php
								$kateg = mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
								while($tkateg=mysql_fetch_array($kateg)){
								?>
								<option value="<?php echo $tkateg['id_kategori'];?>"><?php echo $tkateg['nama'];?></option>
								<?php
								}
								?>
							</select>
						</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		<?php break; 
		case"edit":
			$berita = mysql_query("SELECT * FROM subkategori WHERE id_subkategori='$_GET[id]' ");
			$r=mysql_fetch_array($berita);
			
		?>
		
		<article style="min-width:750px;" class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit Sub Categiory</h3>
				
				<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo $aksi;?>?module=<?php echo $module;?>&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id_subkategori]" ?>'>
				<div class="module_content">
						<fieldset>
							<label>Name</label>
							<input style="width:89%" name="nama" type="text" value="<?php echo"$r[nama]" ?>">
						</fieldset>
						<fieldset><label>Category</label><br /><br />
							<select name="kategori" style="width:91%; margin:2px 10px;">
								<?php
								$kateg = mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
								while($tkateg=mysql_fetch_array($kateg)){
								?>
								<option value="<?php echo $tkateg['id_kategori'];?>" <?php if($tkateg[id_kategori]==$r[id_kategori]){echo "selected";} ;?>><?php echo $tkateg['nama'];?></option>
								<?php
								}
								?>
							</select>
						</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		
		<div class="clear"></div><br/><br/>
		
		
		
		<?php	
		break;
		 } ?>
		
<?php } ?>