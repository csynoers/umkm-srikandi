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
				<section class="main-content col-lg-12 col-md-12 col-sm-12">
                    
                    <div class="row">
                    	<form class="form-inline" method="POST" action="comfirm-umkmsrikandimataram.html">
                        <div class="register-account col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading no-margin">
                                <h4><i class="icons icon-money"></i> Konfirmasi Pembayaran</h4>
                            </div>
                            
                            <div class="page-content">
                                  
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>No Order*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input name="no_order" type="number" required>
                                    </div>	
                                    
                                </div>
								
								<div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Atas Nama*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="nama" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Email*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="email" name="email" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nomer Handphone*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="phone" required>
                                    </div>	
                                    
                                </div>
                                  
								<div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nomer Rekening Anda*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="no_rek" required>
                                    </div>	
                                    
                                </div>
								
								<div class="row" style="padding-top: inherit;">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nama Pemilik Rek. Anda*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="nama_rek" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Nama Bank Anda*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="nama_bank" required>
                                    </div>	
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Jumlah Yang Ditransfer *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<input type="text" name="jumlah" required>
                                    </div>	
                                    
                                </div>
								
                                <div class="row">
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Catatan Khusus Untuk Kami*</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<textarea type="text" name="catatan" required style="height: 80px;"></textarea>
                                    </div>	
                                    
                                </div>
                               <br/>
								<div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Spam protection *</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<span> Jawalah Pertanyaan Berikut ini : <?php 
									include 'joinc/captcha.php';
									// membuat obyek class
									$captcha1 = new mathcaptcha();
									// panggil method untuk mengenerate kode
									$captcha1->generatekode();
									$captcha1->showcaptcha();
									echo "</span><input style='display: inline; border-radius: 5px; border: 1px solid #C7C7C7; width:40px;' required='' type=text name='kode' maxlength=6><input type=hidden name=rahasia value='".$_SESSION['kode']."'><br/><br/>";?>
                                    </span>
									</div>	
                                    
                                </div>
								<hr />
								<p>* Wajib Diisi</p>
								 <div class="row">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12" >
                                    	<input class="big purple" type="submit" value="Kirim Konfirmasi Pembayaran" style="float:right;">
                                    </div>
                                    
                                </div>
                            </div>
                            
                    	</div>
					</form>
					</div>
					
				</section>