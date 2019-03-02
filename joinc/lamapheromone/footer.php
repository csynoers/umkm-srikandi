<style type="text/css">
		hr {
		margin: 18px 0;
		border: 0;
		border-top: 1px solid #D2B22C;
		border-bottom: 1px solid #D2B22C;
	}
	.footer a {
		color: #D2B22C;
	}
	.footer a:hover {
		color: #FFF;
	}
	a {
		color: #FFE098;
		text-decoration: none;
	}
	a:hover {
		color: #FFFFFF;
	}
</style>
		<div class="row-fluid footer">
        <div class="span3">
            <h3>Information</h3>
            <ul>
                <li><a href="testimoni-king-pheromone.html">Testimonials</a></li>
				<li><a href="cart-king-pheromone.html"> Shopping Chart</a></li>
				<li><a href="http://pherotruth.com/Forum-Product-Reviews--65" target="_blank">Product Review</a></li>
				<li><a href="how-to-order.html">How To Order</a></li>
                <li><a href="terms-and-condition.html">Terms And Condition</a></li>
            </ul>
        </div>
        <div class="span3">
            <h3>Stay in touch</h3>
            <ul>
			<?php $sosmed = mysql_query("SELECT * FROM sosmed ORDER BY nama ASC");
			while($sm = mysql_fetch_array($sosmed)){
                echo "<li><a href='$sm[link]' target='_blank'>$sm[nama]</a></li>";
			}
			?>
            </ul>
            <p></p>
        </div>
        <div class="span3">
			<h3>Contact Information</h3>
                <address>
                <?php $ci = mysql_fetch_array(mysql_query("SELECT static_content FROM modul WHERE id_modul = 8"));
				echo $ci[static_content];
				?>
				</address>
        </div>
        <div class="span3">
            <h3>Payment Confirmation</h3>
            <p>Already make a payment ? please confirm your payment by filling <a href="payment-confirmation.html"><b>this form</b></a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p> &copy; King Pheromone <?php echo date(Y);?> . All right reserved. Developed by <a href="http://jogjasite.com" target="_blank" title="Jogjasite.com">Jogjasite.com</a></p>
      </footer>