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
		$aksi="modul/mod_sosmed/aksi_sosmed.php";
		switch($_GET[act]){
			default:
		?>
		
		
		<article style="max-width:960px;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">Hotline</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Nama</th> 
					<th>Content</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$hotline = mysql_query("SELECT * FROM hotline ORDER BY id_hotline ASC");
				while($h=mysql_fetch_array($hotline)){
				
				?>
				<tr>  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$h[nama]" ?></td> 
					<td><?php echo"$h[content]" ?></td> 
    				<td style="text-align:center"><a href="<?php echo"?module=hotline&act=edit&id=$h[id_hotline]";?>">
					<input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!--
					<a href="<?php echo"$aksi?module=sosmed&act=hapus&id=$h[id_sosmed]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
					-->
					</td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>		
		
		<?php break; 
		case"edit":
			$hotline = mysql_query("SELECT * FROM hotline WHERE id_hotline='$_GET[id]'");
				$g=mysql_fetch_array($hotline);
		
		?>
		
		<article class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit Hotline</h3>
				
				<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_hotline/aksi_hotline.php?module=hotline&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id_hotline]" ?>'>
				<div class="module_content">

						<fieldset>
							<label>Content</label>
							<input name="content" type="text" value="<?php echo"$g[content]" ?>">
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
		</article><!-- end of post new sosmed -->
		<br />
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>