						<?php
							$no_order		= trim($_POST['no_order']);
							$nama			= trim($_POST['nama']);
							$email			= trim($_POST['email']);
							$phone			= trim($_POST['phone']);
							$no_rekening	= trim($_POST['no_rek']);
							$nama_rekening	= trim($_POST['nama_rek']);
							$nama_bank		= trim($_POST['nama_bank']);
							$jumlah			= trim($_POST['jumlah']);
							$catatan		= trim($_POST['catatan']);
							
					if($no_order!='' && $nama!='' && $email!='' && $phone!='' && $no_rekening!='' && $nama_rekening!='' && $nama_bank!='' && $jumlah!='' && $catatan!='')
					{
							if(!empty($_POST['kode'])) {
								if($_POST['kode'] == $_POST['rahasia']) {
										
									mysql_query("INSERT INTO konfirmasi(id_order, email, name, phone, no_rekening, nama_rekening, nama_bank, jumlah, catatan ) 
															 VALUES('$no_order', '$email', '$nama', '$phone', '$no_rekening', '$nama_rekening', '$nama_bank', '$jumlah', '$catatan')");
												
									//cek no_order tersedia apa tidak
									$cek_idorder = mysql_fetch_array(mysql_query("SELECT id_order FROM orders WHERE id_order = $no_order"));
									if(!empty($cek_idorder[id_order])){				
										
												?>
					
							<div class="row-fluid">
								<div class="span3">
									<?php include "joinc/sidebar_left.php";?>
								</div>
								<div class="span9">
									<?php include "joinc/breadcrumb.php";?>
									<div class="row-fluid">
									<div class="span12">
										<div class="box-header">
											<strong>Detail Confirmation</strong>
										</div>
										<div class="box-content">
											<div class="content-inner">
												
												<table style="margin-left:20px;">
													<tr><td>No Order</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$no_order"; ?></td></tr>
													<tr><td>Atas Nama</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$nama"; ?></td></tr>
													<tr><td>Email</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$email"; ?></td></tr>
													<tr><td>Phone</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$phone"; ?></td></tr>
													<tr><td>Nomor Rekening Asal</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$no_rekening"; ?></td></tr>
													<tr><td>Nama Pemilik Rek. Asal</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$nama_rekening"; ?></td></tr>
													<tr><td>Nama Bank Asal</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$nama_bank"; ?></td></tr>
													<tr><td>Jumlah Yang Ditransfer</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$jumlah"; ?></td></tr>
													<tr><td>Catatan Khusus Untuk Kami</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$catatan"; ?></td></tr>
												</table>
												
												<br />
												<h4>- Terimakasih Atas Konfirmasi Pembayaran Anda.</h4>
												<h4>- Data Konfirmasi Pembayaran sudah terkirim ke email Anda (<?php echo"$email"; ?>).</h4>

											</div>
										</div>
									</div>
									</div>
									
								</div>
							  </div>
							
												<?php
												
												$pesan="Terimakasih telah melakukan pemesanan online di toko kami<br /><br /> 
														<h3>Data Konfirmasi Pembayaran adalah sebagai berikut:</h3><br />
														<table style='margin-left:20px;'>
															<tr><td>No Order</td><td style='width:10px;padding-left:10px'> : </td><td>$no_order</td></tr>
															<tr><td>Atas Nama</td><td style='width:10px;padding-left:10px'> : </td><td>$nama</td></tr>
															<tr><td>Email</td><td style='width:10px;padding-left:10px'> : </td><td>$email</td></tr>
															<tr><td>Phone</td><td style='width:10px;padding-left:10px'> : </td><td>$phone</td></tr>
															<tr><td>Nomor Rekening Asal</td><td style='width:10px;padding-left:10px'> : </td><td>$no_rekening</td></tr>
															<tr><td>Nama Pemilik Rek. Asal</td><td style='width:10px;padding-left:10px'> : </td><td>$nama_rekening</td></tr>
															<tr><td>Nama Bank Asal</td><td style='width:10px;padding-left:10px'> : </td><td>$nama_bank</td></tr>
															<tr><td>Jumlah Yang Ditransfer</td><td style='width:10px;padding-left:10px'> : </td><td>$jumlah</td></tr>
															<tr><td>Catatan Khusus Untuk Kami</td><td style='width:10px;padding-left:10px'> : </td><td>$catatan</td></tr>
														</table>
												
														<br />
														<h3>- Terimakasih Atas Konfirmasi Pembayaran Anda.</h3>
														<h3>- Data Konfirmasi Pembayaran sudah terkirim ke email Anda ($email).</h3>
														<hr />
														<p>Email ini dikirim  sebagai tanda transaksi yang telah dilakukan melalui kingpheromone.com 
															dengan menggunakan email <b>$_POST[email]</b>, jika anda merasa tidak pernah melakukan transaksi harap abaikan email ini. </p>
														";
												$subjek="Konfirmasi Pemabayaran Online King Pheromone (kingpheromone.com)";
												// Kirim email dalam format HTML
												$dari = "From: azzep24@gmail.com \n";
												$dari .= "Content-type: text/html \r\n";
												
												// Kirim email ke kustomer
												mail($_POST['email'],$subjek,$pesan,$dari);
												// Kirim email ke pengelola toko online
												mail("azzep24@gmail.com",$subjek,$pesan,$dari);
							
									}	else{
											echo "<script type='text/javascript'>alert('Maaf, No Order tidak sesuai ! Silahkan Cek No Pemesanan Anda.'); window.location.href='payment-confirmation.html'</script>";
											}									
										} else {
											echo "<script type='text/javascript'>alert('Wrong code please Try Again!'); window.location.href='payment-confirmation.html'</script>";
											
										}
									} else {
										echo "<script type='text/javascript'>alert('Wrong code please Try Again!'); window.location.href='payment-confirmation.html'</script>";
									}
					}
					else 
					{
						echo "<script type='text/javascript'>alert('Maaf, data tidak boleh kosong!'); window.location.href='payment-confirmation.html'</script>";
					}