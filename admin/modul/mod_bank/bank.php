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
		$aksi="modul/mod_bank/aksi_bank.php";
		switch($_GET['act']){
			default:
		?>
		
		<article style="width:65%;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">Bank</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Nama Bank</th> 
    				<th>No Rekening</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$slide = mysql_query("SELECT * FROM bank");
				while($s=mysql_fetch_array($slide)){
				
				?>
				<tr>  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$s[nama_bank]" ?></td> 
    				<td><?php echo"$s[no_rekening]" ?></td> 
    				<td style="text-align:center"><a href="<?php echo"?module=bank&act=edit&id=$s[id_bank]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"$aksi?module=bank&act=hapus&id=$s[id_bank]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Post New Bank</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_bank/aksi_bank.php?module=bank&act=insertnew'>
				<div class="module_content">
						<fieldset>
							<label>Nama Bank</label>
							<input name="nama" type="text">
						</fieldset>
						<fieldset>
							<label>No Rekening</label>
							<input name="no_rekening" type="text">
						</fieldset>
						<fieldset>
							<label>Nama Pemilik</label>
							<input name="nama_pemilik" type="text">
						</fieldset>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Logo Bank</label><br /><br />
							<input style="margin-left:10px; margin-right:-20px;" type="file" name="fupload" required>
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 185 x 130px.
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
			$slideshow = mysql_query("SELECT * FROM bank WHERE id_bank='$_GET[id]'");
				$g=mysql_fetch_array($slideshow);
		?>
		
		<article class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit Bank</h3>
				
				<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_bank/aksi_bank.php?module=bank&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id_bank]" ?>'>
				<div class="module_content">
						<fieldset>
							<label>Nama Bank</label>
							<input name="nama" type="text" value="<?php echo"$g[nama_bank]" ?>">
						</fieldset>
						<fieldset>
							<label>No Rekening</label>
							<input name="no_rekening" type="text" value="<?php echo"$g[no_rekening]" ?>">
						</fieldset>
						<fieldset>
							<label>Nama Pemilik</label>
							<input name="nama_pemilik" type="text" value="<?php echo"$g[nama]" ?>">
						</fieldset>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Thumbnail</label><br /><br />
							<img width="200px" style="margin-left:5px;" src="../joimg/bank/<?php echo"$g[gambar]" ?>">
						</fieldset>
							
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Change Thumbnail</label><br /><br />
							<input style="margin-left:10px; margin-right:-20px;" type="file" name="fupload">
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 870 x 400px.
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
		<br />
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>