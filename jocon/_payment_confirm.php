	<style type="text/css">
		select, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input
		{
			height: 24px;
		}
		.form-horizontal .control-label {
			width: 200px;
		}
		.form-horizontal .controls {
			margin-left: 225px;
		}
		.red
		{
			color: #A60000;
		}
	</style>
	<div class="row-fluid">
        <div class="span3">
            <?php include "joinc/sidebar_left.php";?>
        </div>
        <div class="span9">
            <?php include "joinc/breadcrumb.php";?>
            <div class="row-fluid">
            <div class="span12">
                <div class="box-header">
                    <strong>Send payment confirmation</strong>
                </div>
                <div class="box-content">
                    <div class="content-inner">
                        <form class="form-horizontal" method="POST" action="comfirm-king-pheromone.html">
                            <div class="control-group">
                                <label class="control-label">No Order <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="no_order" type="number" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Atas Nama<span class="red">*</span></label>
                                <div class="controls">
                                  <input name="nama" type="text" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Email <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="email" type="email" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phone <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="phone" type="text" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nomor Rekening Asal <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="no_rek" type="text" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nama Pemilik Rek. Asal <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="nama_rek" type="text" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nama Bank Asal <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="nama_bank" type="text" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Jumlah Yang Ditransfer <span class="red">*</span></label>
                                <div class="controls">
                                  <input name="jumlah" type="text" id="focusedInput" class="input-xlarge focused" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Catatan Khusus Untuk Kami <span class="red">*</span></label>
                                <div class="controls">
                                  <textarea name="catatan" class="input-xlarge" rows="3" required></textarea>
                                </div>
                            </div>
							<div class="control-group">
								<label class="control-label">Spam protection <span class="red">*</span></label>
								<div class="controls">
									<span> Answer this question <?php 
									include 'joinc/captcha.php';
									// membuat obyek class
									$captcha1 = new mathcaptcha();
									// panggil method untuk mengenerate kode
									$captcha1->generatekode();
									$captcha1->showcaptcha();
									echo "</span><input style='display: inline; border-radius: 5px; border: 1px solid #C7C7C7; width:40px;' required='' type=text name='kode' maxlength=6><input type=hidden name=rahasia value='".$_SESSION['kode']."'><br/><br/>";?>
								</div>
							</div>
                            <div class="form-actions">
                                <input type="submit" value="Send" class="btn pull-right" />
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
      </div>