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
		$d_artikel = mysql_fetch_array(mysql_query("SELECT * FROM articles WHERE id_articles = $_GET[id]"));
		?>
            <div class="row-fluid">
                <div class="span12 ImgWrapper">
                    <img class="CropCenter" alt="<?php echo $d_artikel[seo];?>" title="<?php echo $d_artikel[title];?>" src="joimg/articles/<?php echo $d_artikel[image];?>" >
                </div>
			</div>
			<div class="row-fluid">
                <div class="span12 product-detail" style="padding-top: 3%; border-bottom: 1px solid #333; margin-bottom: 3%;">
                    <h3 style="border-bottom: none; margin-bottom: 2px;"><a href="detail-articles-<?php echo substr($d_artikel[seo],0,50);?>-<?php echo $d_artikel[id_articles];?>.html"><?php echo $d_artikel[title];?></a></h3>
                    <?php echo $d_artikel[content];?>
                </div>
            </div>
        </div>
	</div>