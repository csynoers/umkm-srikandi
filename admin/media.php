<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
 <center>Anda harus login dulu <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.png" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="?module=home">Admin Pages</a></h1>
			<h2 class="section_title">
			<?php if ($_GET[module]=='home') {?>
			Dashboard
			<!-- Main Menu -->
			<?php } elseif ($_GET[module]=='welcome'){?>
			Edit Home
			<?php } elseif ($_GET[module]=='about'){?>
			Edit About Us
			<?php } elseif ($_GET[module]=='technologys'){?>
			Edit Technologys
			<?php } elseif ($_GET[module]=='faqs'){?>
			Edit FAQs
			<?php } elseif ($_GET[module]=='tos'){?>
			Edit Join Reseller
			<?php } elseif ($_GET[module]=='contact'){?>
			Edit Contact
			<?php } elseif ($_GET[module]=='howtoorder'){?>
			Edit How To Order
			<?php } elseif ($_GET[module]=='hotline'){?>
			Edit Hotline

			<!-- Menu Product -->			
			<?php } elseif ($_GET[module]=='product'){?>
			Product
			<?php } elseif ($_GET[module]=='category'){?>
			Category
			<?php } elseif ($_GET[module]=='scent'){?>
			Scent
			<?php } elseif ($_GET[module]=='subcategory'){?>
			Sub Category
			<?php } elseif ($_GET[module]=='orders'){?>
			Order Product
			<?php } elseif ($_GET[module]=='confirmation'){?>
			Payment Confirmation

			<!-- Menu Support -->
			<?php } elseif ($_GET[module]=='articles'){?>
			Articles 
			<?php } elseif ($_GET[module]=='map'){?>
			Edit Maps
			<?php } elseif ($_GET[module]=='slideshow'){?>
			Slideshow
			<?php } elseif ($_GET[module]=='sosmed'){?>
			Kontak
			<?php } elseif ($_GET[module]=='bank'){?>
			Bank
			<?php } elseif ($_GET[module]=='banner'){?>
			Jasa Pengiriman

			<!-- Menu Web -->
			<?php } elseif ($_GET[module]=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET[module]=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET[module]=='keyword'){?>
			Edit Keyword Website

			<!-- Menu Admin -->
			<?php } elseif ($_GET[module]=='user'){?>
			Change Password
			<?php } elseif ($_GET[module]=='useremail'){?>
			Change Email
			<?php } ?>
			</h2><div class="btn_view_site"><a target="_blank" href="../umkmsrikandimataram.html">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="?module=home">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">
			<?php if ($_GET[module]=='home') {?>
			Dashboard
			<!-- Main Menu -->
			<?php } elseif ($_GET[module]=='welcome'){?>
			Edit Home
			<?php } elseif ($_GET[module]=='about'){?>
			Edit About Us
			<?php } elseif ($_GET[module]=='technologys'){?>
			Edit Technologys
			<?php } elseif ($_GET[module]=='faqs'){?>
			Edit FAQs
			<?php } elseif ($_GET[module]=='tos'){?>
			Edit Join Reseller
			<?php } elseif ($_GET[module]=='howtoorder'){?>
			Edit How To Order
			<?php } elseif ($_GET[module]=='hotline'){?>
			Edit Hotline

			<!-- Menu Product -->
			<?php } elseif ($_GET[module]=='product'){?>
			Product
			<?php } elseif ($_GET[module]=='category'){?>
			Category
			<?php } elseif ($_GET[module]=='scent'){?>
			Scent
			<?php } elseif ($_GET[module]=='subcategory'){?>
			Sub Category
			<?php } elseif ($_GET[module]=='orders'){?>
			Order Product
			<?php } elseif ($_GET[module]=='confirmation'){?>
			Payment Confirmation
			
			<!-- Menu Support -->
			<?php } elseif ($_GET[module]=='articles'){?>
			Articles 
			<?php } elseif ($_GET[module]=='map'){?>
			Edit Maps
			<?php } elseif ($_GET[module]=='slideshow'){?>
			Slideshow
			<?php } elseif ($_GET[module]=='sosmed'){?>
			Kontak
			<?php } elseif ($_GET[module]=='bank'){?>
			Bank
			<?php } elseif ($_GET[module]=='banner'){?>
			Jasa Pengiriman

			<!-- Menu Web -->
			<?php } elseif ($_GET[module]=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET[module]=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET[module]=='keyword'){?>
			Edit Keyword Website

			<!-- Menu Admin -->
			<?php } elseif ($_GET[module]=='user'){?>
			Change Password
			<?php } elseif ($_GET[module]=='useremail'){?>
			Change Email
			<?php } ?>
			</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<!-- <form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/> -->

		<h3>Main Menu</h3>
			<ul class="toggle">
				<!--
				<li class="icn_categories"><a href="?module=welcome">Home</a></li>
				-->
				<li class="icn_categories"><a href="?module=about">Tentang Kami</a></li>
				<li class="icn_categories"><a href="?module=tos">Join Reseller</a></li>
				<li class="icn_categories"><a href="?module=howtoorder">Cara Pemesanan</a></li>
				<!--
				<li class="icn_categories"><a href="?module=technologys">Technologys</a></li>
				-->
				<li class="icn_categories"><a href="?module=hotline">Hotline Service</a></li>
		<!--	<li class="icn_categories"><a href="?module=contact">Kontak (CS)</a></li>	-->
				
			</ul>
		<h3>Menu Product</h3>
			<ul class="toggle">
				<li class="icn_categories"><a href="?module=product">Produk</a></li>
				<li class="icn_categories"><a href="?module=category">Kategori</a></li>
				<!--
				<li class="icn_categories"><a href="?module=scent">Scent</a></li>
				-->
				<li class="icn_categories"><a href="?module=subcategory">Sub Kategori</a></li>
			
				<li class="icn_categories"><a href="?module=orders">Pemesanan Produk</a></li>
				<li class="icn_categories"><a href="?module=confirmation">Konfirmasi Pembayaran</a></li>
			</ul>
		<h3>Menu Support</h3>
			<ul class="toggle">
			<!--
				<li class="icn_photo"><a href="?module=artikel">Kategori Artikel</a></li>
				<li class="icn_photo"><a href="?module=artikelterkait">Artikel Terkait</a></li>
				<li class="icn_photo"><a href="?module=album">Album Foto</a></li>
				<li class="icn_photo"><a href="?module=galeri">Foto</a></li>
				
			
				<li class="icn_photo"><a href="?module=articles">Articles</a></li>
			-->	
				<li class="icn_photo"><a href="?module=map">Map</a></li>
		<!--	<li class="icn_photo"><a href="?module=slideshow">Slideshow</a></li>	-->
				<li class="icn_photo"><a href="?module=sosmed">Kontak</a></li>
				<li class="icn_photo"><a href="?module=bank">Bank</a></li>
				<li class="icn_photo"><a href="?module=banner">Jasa Pengiriman</a></li>
			</ul>
		<h3>Menu Web</h3>
			<ul class="toggle">
				<li class="icn_settings"><a href="?module=title">Title</a></li>
				<li class="icn_settings"><a href="?module=description">Description</a></li>
				<li class="icn_settings"><a href="?module=keyword">Keyword</a></li>
			</ul>
		<h3>Admin</h3>
			<ul class="toggle">
				<li class="icn_profile"><a href="?module=user">Change Password</a></li>
				<li class="icn_profile"><a href="?module=useremail">Change Email</a></li>
				<li class="icn_jump_back"><a href="logout.php">Logout</a></li>
			</ul>
		
		<footer>
			<hr />
			<p style="margin-bottom:10px;"><strong>Copyright &copy; 2019 <a target="_blank" href="../umkmsrikandimataram.html">UMKM Srikandi Mataram </a></strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<?php include('content.php'); ?>

	</section>

</body>

</html>
<?php
}
?>