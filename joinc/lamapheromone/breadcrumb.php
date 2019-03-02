		<div class="row-fluid">
			<div class="span12">
                <ul class="breadcrumb">
                    <li><a href="home-king-pheromone.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">
					<?php
					if($_GET[mod]=='about'){
						echo "About Us";
					}elseif($_GET[mod]=='technology'){
						echo "Technology";
					}elseif($_GET[mod]=='articles'){
						echo "Articles";
					}elseif($_GET[mod]=='detail_articles'){
						echo "Detail Articles";
					}elseif($_GET[mod]=='faqs'){
						echo "FAQ's";
					}elseif($_GET[mod]=='contact'){
						echo "Contact Us";
					}elseif($_GET[mod]=='howtoorder'){
						echo "How To Order";
					}elseif($_GET[mod]=='tos'){
						echo "Terms And Condition";
					}elseif($_GET[mod]=='payment_confirm'){
						echo "Payment Confirmation";
					}elseif($_GET[mod]=='product'){
						echo "All Product";
					}elseif($_GET[mod]=='product_detail'){
						echo "Detail Product";
					}elseif($_GET[mod]=='product_bycategory'){
						echo "Product By Category";
					}elseif($_GET[mod]=='product_bysubcategory'){
						echo "Product By Sub Category";
					}elseif($_GET[mod]=='testimoni'){
						echo "Testimonials";
					}elseif($_GET[mod]=='testimoni_detail'){
						echo "Detail Testimonial";
					}elseif($_GET[mod]=='cart'){
						echo "Cart";
					}elseif($_GET[mod]=='checkout'){
						echo "Checkout";
					}elseif($_GET[mod]=='order'){
						echo "Order";		
					}elseif($_GET[mod]=='confirm_detail'){
						echo "Confirmation Detail";
					}else{
						echo "King Pheromone";
					}					
					?>
					</li>
                </ul>
            </div>
		</div>