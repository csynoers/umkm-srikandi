		<style type="text/css">
		a.button.big {
			font-size: 14px;
			padding: 10px 30px;
			height: 36px;
		}
		.tab-heading a.button {
			background: rgb(182, 2, 255)!important;
		}
		.tab-heading a:hover, .tab-heading a.button.active {
			background: #9442B5!important;
		}		
		</style>
				<section class="main-content col-lg-6 col-md-6 col-sm-6 col-lg-push-3 col-md-push-3 col-sm-push-3">
					
                    <div id="product-single">
					
						<!-- Product -->
						<div class="product-single">
							
							<div class="row">
								<?php 
										$id_testimoni = $_GET['id'];
										$testimoni_detail = mysql_fetch_array(mysql_query("SELECT * FROM testimoni WHERE id_testimoni = $id_testimoni"));
								?>
									
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="carousel-heading">
										<h4>Testimoni dari : <?php echo $testimoni_detail[nama];?></h4>
									</div>
								</div>
								
								<!-- Product Images Carousel -->
								<div class="col-lg-12 col-md-12 col-sm-12 product-single-image">
									<div id="product-slider">
										<ul class="slides">
											<li>
												<img title="<?php echo $testimoni_detail[nama];?>" src="joimg/testimoni/<?php echo $testimoni_detail[gambar];?>" />
											</li>
										</ul>
									</div>
								</div>
								<!-- /Product Images Carousel -->
								
								
							</div>
							
						</div>
						<!-- /Product -->
						
						
						<!-- Product Tabs -->
						<div class="row">
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<?php echo $testimoni_detail[isi];?>
								
							</div>
							
						</div>
						<!-- /Product Tabs -->
					
					</div>				
					
				</section>
				<!-- /Main Content -->
				
				<!-- Sidebar -->
				<?php include 'joinc/sidebar.php';?>
				<!-- /Sidebar -->
				
			
				
