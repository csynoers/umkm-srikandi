<style type="text/css">
	div.ImgWrapper {
    width: 160px;
    height: 160px
    overflow: hidden;
    text-align: center;
}
img.CropCenter {
    left: 50%;
    margin-left: -100%;
    position: relative;
    width: 700px !important;
    height: 300px !important;
}
</style>

	<div class="row-fluid">
        <div class="span3">
            <?php include "joinc/sidebar_left.php";?>
        </div>
		<div class="span9">
		<?php include "joinc/breadcrumb.php";?>
		<?php
		$pagination = new Pagingfrontend;						
		$batas  	= 3;
		$posisi 	= $pagination->cariPosisi($batas);
				
		$artikel = mysql_query("SELECT * FROM articles ORDER BY id_articles DESC LIMIT $posisi, $batas");
		while($ar = mysql_fetch_array($artikel)){
		?>
            <div class="row-fluid">
                <div class="span12 ImgWrapper">
                    <img class="CropCenter" alt="<?php echo $ar[seo];?>" title="<?php echo $ar[title];?>" src="joimg/articles/<?php echo $ar[image];?>" >
                </div>
			</div>
			<div class="row-fluid">
                <div class="span12 product-detail" style="padding-top: 3%; border-bottom: 1px solid #333; margin-bottom: 3%;">
                    <h3 style="border-bottom: none; margin-bottom: 2px;"><a href="detail-articles-<?php echo substr($ar[seo],0,50);?>-<?php echo $ar[id_articles];?>.html"><?php echo $ar[title];?></a></h3>
                    <?php echo substr($ar[content], 0, 300);echo "...";?>
                </div>
            </div>
		<?php }?>
			<div class="pagination">
                    <ul>					
					<?php 
						$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM articles"));
						$jmlhalaman  = $pagination->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $pagination->navHalaman($_GET['halaman'], $jmlhalaman);
						echo "<center><div class='des-pages'>$linkHalaman </div></center>";
					?> 
					</ul>
			</div>		
        </div>
		
	</div>