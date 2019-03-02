				<section class="main-content col-lg-6 col-md-6 col-sm-6 col-lg-push-3 col-md-push-3 col-sm-push-3">
              
                    <div class="row">
                    	
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="carousel-heading">
                                <h4>Testimoni</h4>
                            </div>
                            
                    	</div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        	
                            <div class="blog-item">

                                <table class="table" style="font-size:13px;">
									<thead>
										<th style="width: 20%;">Thumbnail</th>
										<th style="width: 35%;">Nama</th>
										<th style="width: 35%;">Tanggal</th>
										<th style="width: 10%;">Detail</th>
									</thead>
									<tbody>
									<?php 
										$pagination = new Pagingfrontend;						
										$batas  	= 6;
										$posisi 	= $pagination->cariPosisi($batas);
										
										$testimoni = mysql_query("SELECT * FROM testimoni ORDER BY tanggal DESC LIMIT $posisi, $batas");
										while($testi = mysql_fetch_array($testimoni)){
									?>
										<tr>
											<td><img src="joimg/testimoni/<?php echo $testi[gambar];?>" class="img-cart" /></td>
											<td><?php echo $testi[nama];?></td>
											<td><?php echo tgl_indo($testi[tanggal]);?></td>
											<td><a href="testimoni-detail<?php echo $testi[id_testimoni];?>.html">Lihat </a></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
											</div>
                            
                        </div>
						
						<?php $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM testimoni"));
							if($jmldata > 6){
						?>
						<div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="pagination">
											
								<?php 
									$jmlhalaman  = $pagination->jumlahHalaman($jmldata, $batas);
									$linkHalaman = $pagination->navHalaman($_GET['halaman'], $jmlhalaman);
									echo "$linkHalaman ";
								?> 
								
							</div>
							
                        </div>
						<?php }?>
                    </div>                   
                    
				</section>
				<!-- /Main Content -->
				
				<!-- Sidebar -->
				<?php include 'joinc/sidebar.php';?>
				<!-- /Sidebar -->
				