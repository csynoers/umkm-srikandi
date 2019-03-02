					<section class="main-content col-lg-6 col-md-6 col-sm-6 col-lg-push-3 col-md-push-3 col-sm-push-3">
              
                    <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading">
                                <h4>Join Reseller</h4>
                            </div>
                            
                    	</div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="blog-item">

                                <div class="blog-info">
									<?php 
										$about = mysql_fetch_array(mysql_query("SELECT static_content FROM modul WHERE id_modul = 5"));
										echo $about[static_content];
									?>
                                </div>
                            </div>
                            
                        </div>
                    </div>                   
                    
				</section>
				<!-- /Main Content -->
				
				<!-- Sidebar -->
				<?php include 'joinc/sidebar.php';?>
				<!-- /Sidebar -->