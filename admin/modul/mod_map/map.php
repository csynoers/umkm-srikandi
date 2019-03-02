<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
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
				"pagebreak"
			],

			//toolbar: "pagebreak save charmap advhr| insertfile undo redo | styleselect,formatselect,fontselect,fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | jbimages | print preview media | forecolor backcolor emoticons | anchor",
			toolbar:"pagebreak save charmap| insertfile undo redo | styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | jbimages | print preview media | forecolor backcolor emoticons | justifyleft justifycenter justifyright justifyfull | cut copy paste pastetext pasteword | search replace | blockquote |link unlink anchor image cleanup help code | insertdate inserttime preview | tablecontrols | hr removeformat visualaid | sub sup | iespell media advhr | print | ltr rtl | fullscreen | insertlayer moveforward movebackward absolute |styleprops spellchecker | cite abbr acronym del ins attribs | visualchars nonbreaking template | insertimage",
			relative_urls: false
	 });
	</script>
<!-- /TinyMCE -->
		
		<?php 	$aksi="modul/mod_map/aksi_map.php";
				$map = mysql_query("SELECT * FROM modul WHERE id_modul='6'");
				$w=mysql_fetch_array($map);
				?>
		
		<article class="module width_full">
			<header><h3>Edit Map</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=map&act=update'>
				<input type='hidden' name='id' value='<?php echo"$w[id_modul]" ?>'>
				<div class="module_content">
							<input name="isi" rows="12" value="<?php echo"$w[static_content]" ?>" style="width: 96%; border-radius: 3px; padding: 4px;">
						<div class="clear"></div>
				</div>
				<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Cara menggunakan <b>MAP</b> : masuk ke <b><i>GOOGLE MAP</i></b> -> Cari tempat yang ingin di pakai titik mapnya
				<br/> &nbsp;&nbsp;&nbsp;&nbsp; masuk ke icon <b><i>Setting</i></b> -> sematkan peta
				<br/> &nbsp;&nbsp;&nbsp;&nbsp; copy link dari <b><i>HTTPS</i></b> sampai selesai <b><i>" / petik 2 HTTPS</i></b>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
<?php } ?>