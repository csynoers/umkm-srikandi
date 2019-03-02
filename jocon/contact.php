<style type="text/css">
.page-content input[type="email"] , input[type="number"] {
    width: 100%;
    background: #f7f7f7;
    font-size: 14px;
}
input[type="email"], input[type="number"]{
    padding: 5px 10px;
    border: 1px solid #e6e6e6;
    height: 35px;
}
input[type="email"], input[type="number"] {
    padding: 5px 10px;
    border: 1px solid #e6e6e6;
    height: 40px;
    transition: background 0.3s;
    -webkit-transition: background 0.3s;
    -moz-transition: background 0.3s;
    -ms-transition: background 0.3s;
    -o-transition: background 0.3s;
}
</style>
				<section class="main-content col-lg-6 col-md-6 col-sm-6 col-lg-push-3 col-md-push-3 col-sm-push-3">
                    
                    
                    <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading no-margin">
                                <h4>Informasi Kontak</h4>
                            </div>
                            
                            <div class="page-content contact-info">
                            	
                                <iframe width="425" height="350" src="<?php $maps = mysql_fetch_array(mysql_query("SELECT static_content FROM modul WHERE id_modul = 6")); echo $maps[static_content];?>"></iframe>
	                            
                            </div>
                            
                    	</div>
                     </div>  
                        
                        
                    <div class="row">
					
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading no-margin">
                                <h4>Kirim Pesan</h4>
                            </div>
                            
                            <div class="page-content contact-form">
                            	
								<form id="contact-form" method="POST" action="send_message.html">
								
									<label>Name *</label>
									<input name="name" type="text" required>
									
									<label>Email *</label>
									<input name="email" type="email" required>
									
									<label>Message *</label>
									<textarea name="message" rows="5" required></textarea>
									
									<span>* Harus Diisi / Tidak boleh kosong</span>
									<input class="big button pull-right" type="submit" value="Kirim">
									
                                </form>
								
                            </div>
                            
                    	</div>
                        
                        
                  	</div>
                    
				</section>
				
				<!-- Sidebar -->
				<?php include 'joinc/sidebar.php';?>
				<!-- /Sidebar -->