    <div class="row-fluid">
        <div class="span12 nav-menus">
            <ul class="nav nav-pills">
                <li <?php if($_GET[mod]=='home'){echo 'class="active"';}?>><a href="home-king-pheromone.html">HOME</a></li>                
                <li <?php if($_GET[mod]=='about'){echo 'class="active"';}?>><a href="about-king-pheromone.html">ABOUT US</a></li>
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">PRODUCTS <b class="caret"></b></a>
                  <ul class="dropdown-menu" id="menu1">
                    <?php
					$nav_category = mysql_query("SELECT * FROM kategori");
					while($nav_cat = mysql_fetch_array($nav_category)){
					?>
					<li>
                        <a href="category-<?php echo substr($nav_cat[nama_seo],0,50);?>-<?php echo $nav_cat[id_kategori];?>.html"><?php echo $nav_cat[nama];?> <!--<i class="icon-chevron-right pull-right"></i>--></a>
                        <!--
						<?php 
						$query_nav_sub_cat = "SELECT * FROM subkategori WHERE id_kategori = $nav_cat[id_kategori]";
						$cek_nsc = mysql_fetch_array(mysql_query($query_nav_sub_cat));
						if (!empty($cek_nsc))
						{
							echo '<ul class="dropdown-menu sub-menu">';
							$nav_sub_cat = mysql_query($query_nav_sub_cat);
							while($nsc = mysql_fetch_array($nav_sub_cat)){
						?>
                            <li><a href="subcategory-<?php echo substr($nsc[nama_seo],0,50);?>-<?php echo $nsc[id_subkategori];?>.html"><?php echo $nsc[nama];?></a></li>
						<?php }
							echo '</ul>';						
						} ?>
						-->
                    </li>
					<?php } ?>
                    <li class="divider"></li>
                    <li><a href="product-king-pheromone.html">All Products</a></li>
                  </ul>
                </li>
                <li <?php if($_GET[mod]=='technology'){echo 'class="active"';}?>><a href="king-pheromone-technologys.html">TECHNOLOGY</a></li>
                <li <?php if($_GET[mod]=='articles' OR $_GET[mod]=='detail_articles'){echo 'class="active"';}?>><a href="articles.html">ARTICLES</a></li>
                <li <?php if($_GET[mod]=='faqs'){echo 'class="active"';}?>><a href="human-king-pheromone-questions-answers.html">FAQ'S</a></li>
                <li <?php if($_GET[mod]=='contact'){echo 'class="active"';}?>><a href="contact-king-pheromone.html">CONTACT US</a></li>
            </ul>
        </div>
    </div>