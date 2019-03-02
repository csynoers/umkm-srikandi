<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>

		<?php
			$user = mysql_query("SELECT * FROM users WHERE username='admin'");
				$g=mysql_fetch_array($user);
		
		if($_POST['email']!=''){
					
					mysql_query("UPDATE users SET 	email = '$_POST[email]'
                            WHERE username  = 'admin'");
							
					echo '<h4 class="alert_success">Email changed</h4><br/>';
					header('location:../../media.php?module=useremail');
		}else{		
		?>
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Change Email Admin</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='?module=useremail'>
				<input type="hidden" name="username" value="<?php echo"$g[username]" ?>">
				<div class="module_content">
						<fieldset>
							<label>Email Admin</label>
							<input name="email" type="text" value="<?php echo $g[email];?>"  placeholder="Email Administrator">
						</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="submit" value="Change" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		
		
<?php } } ?>