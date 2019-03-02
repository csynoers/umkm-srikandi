<style type="text/css">
input[type="number"] {
    padding: 5px 10px;
    border: 1px solid #e6e6e6;
    height: 35px;
}
</style>
<script type="text/javascript" src="assetongkir/js/jquery.min.js"></script>
<script type="text/javascript" src="assetongkir/js/script.js"></script>
			
<section class="main-content col-lg-12 col-md-12 col-sm-12">
              
    <div class="row">
                  
			<div class="col-lg-12 col-md-12 col-sm-12">
                        	
                <div class="carousel-heading">
                    <h4>Hitung Ongkos Kirim</h4>
                </div>
					
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					
					<div class="col-lg-4 col-md-4 col-sm-4">
					<!-- <form method="POST" action="gettotal.php"> -->
						<div class="four columns">
							Asal<br/>
							<select id="oriprovince">
								<option>Provinsi</option>
							</select>
							<br/><br/><br/>
							<select name="oricity" id="oricity">
								<option>Kota</option>
							</select>			
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="four columns">
							Tujuan<br/>
							<select id="desprovince">
								<option>Provinsi</option>
							</select>
							<br/><br/><br/>
							<select name="descity" id="descity">
								<option>Kota</option>
							</select> 
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<div class="two columns">
							Layanan<br/>
							<select name="service" id="service">
								<option value="all">Semua</option>
								<option value="jne">JNE</option>
								<option value="pos">POS</option>
								<option value="tiki">TIKI</option>
							</select> 
							<br/><br/>
							Berat (gram)<br/>
							<input name="weight"  style="width:100px" id="berat" type="number">
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<div class="two columns">
							<br/>
							<button type="big button purple small" onclick="cekHarga()" style="background: #262626!important; padding: 5px 15px; font-size: 14px; height: 30px; color: white;">Cek Biaya</button> 
						</div>
					</div>
					<!-- </form> -->
					
				</div>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12">
					<h3>Harga</h3>
					
					<table class="orderinfo-table">
						<thead>
						<tr>
							<th>Kurir</th>
							<th>Servis</th>
							<th>Deskripsi Servis</th>
							<th>Lama Kirim (hari)</th>
							<th>Total Biaya (Rp)</th>
						</tr>
						</thead>
						<tbody id="resultsbox"></tbody>
					</table>
				
			<hr/>
			</div>
			
	</div>		
</section>

		<!--BANNER -->
				
				<?php 
				$banner = mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
				$jml_banner = mysql_num_rows($banner);
				if($jml_banner > 0){
				?>
				<section class="main-content col-lg-12 col-md-12 col-sm-12">
				<!-- Product Brands -->
					<div class="products-row row">
						
						<!-- Carousel Heading -->
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<div class="carousel-heading">
								<h4>Cek Ongkos Kirim Dari Sumber Penyedia Jasa Layanan :</h4>
								<div class="carousel-arrows">
									<i class="icons icon-left-dir"></i>
									<i class="icons icon-right-dir"></i>
								</div>
							</div>
							
						</div>
						<!-- /Carousel Heading -->
						
						<!-- Carousel -->
						<div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">
							
							<div class="owl-carousel" data-max-items="5">
									
									<?php 
									while ($bnr = mysql_fetch_array($banner)){
									?>
									<!-- Slide Banner -->
									<div>
										<div class="product">
											<a href="<?php echo $bnr[link];?>" target="_blank"><img src="joimg/banner/<?php echo $bnr[gambar];?>" alt="<?php echo $bnr[nama];?>" title="<?php echo $bnr[nama];?>"></a>
										</div>
									</div>
									<!-- /Slide Banner-->
									<?php } ?>							
							</div>
							
						</div>
						<!-- /Carousel -->
						
					</div>
					<!-- /Product Brands -->
				</section>
			<?php }	?>