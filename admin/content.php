<?php
include "../josys/koneksi.php";
include "../josys/library.php";
include "../josys/fungsi_combobox.php";
include "../josys/class_paging.php";
include "../josys/fungsi_indotgl.php";
include "../josys/fungsi_rupiah.php";

// Bagian Home
if ($_GET[module]=='home'){
	if ($_SESSION['leveluser']=='admin'){ ?>
	<h4 class="alert_info">Selamat Datang, di UMKMSrikandiMataram.com Pada "Admin Panel".</h4>
		
	<article class="module width_full">
		<header><h3>Stats</h3></header>
		<div class="module_content">
			
			<?php
				error_reporting(0);
				  // Statistik user
				  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
				  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
				  $waktu   = time(); // 

				  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
				  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
				  // Kalau belum ada, simpan data user tersebut ke database
				  if(mysql_num_rows($s) == 0){
				  } 
				  else{
				  }

				  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
				  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
				  $hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal'"), 0); 
				  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
				  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
				  $bataswaktu       = time() - 300;
				  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

				  $path = "joinc/counter/";
				  $ext = ".png";

				  $tothitsgbr = sprintf("%06d", $tothitsgbr);
				  for ( $i = 0; $i <= 9; $i++ ){
					   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
				  }

				?>
			
			
			<article class="stats_overview">
				<div class="overview_today">
					<p class="overview_day">Today</p>
					<p class="overview_count"><?php echo"$pengunjung"; ?></p>
					<p class="overview_type">Visits</p>
					<p class="overview_count"><?php echo"$hits"; ?></p>
					<p class="overview_type">Views</p>
				</div>
				<div class="overview_previous">
					<p class="overview_day">All Time</p>
					<p class="overview_count"><?php echo"$totalpengunjung"; ?></p>
					<p class="overview_type">Visits</p>
					<p class="overview_count"><?php echo"$totalhits"; ?></p>
					<p class="overview_type">Views</p>
				</div>
			</article>
			<div class="clear"></div>
		</div>
	</article><!-- end of stats article --><?php
  }
}

//=========================== Main Menu ====================================\\
// Bagian Home
elseif ($_GET[module]=='welcome'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_home/home.php";
  }
}

// Bagian about
elseif ($_GET[module]=='about'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_about/about.php";
  }
}

// Bagian technologys
elseif ($_GET[module]=='technologys'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_technologys/technologys.php";
  }
}

// Bagian hotline
elseif ($_GET[module]=='hotline'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hotline/hotline.php";
  }
}

// Bagian tos
elseif ($_GET[module]=='tos'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tos/tos.php";
  }
}

// Bagian contact
elseif ($_GET[module]=='contact'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_contact/contact.php";
  }
}

// Bagian how to order
elseif ($_GET[module]=='howtoorder'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_howtoorder/howtoorder.php";
  }
}

//=========================== Menu Product ====================================\\
// Bagian product
elseif ($_GET[module]=='product'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_product/product.php";
  }
}

// Bagian Category
elseif ($_GET[module]=='category'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_category/category.php";
  }
}

// Bagian Subcategory
elseif ($_GET[module]=='subcategory'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subcategory/subcategory.php";
  }
}

// Bagian Scent
elseif ($_GET[module]=='scent'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_scent/scent.php";
  }
}

// Bagian Order Produk
elseif ($_GET[module]=='orders'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_order/order.php";
  }
}

// Bagian payment confirmation
elseif ($_GET[module]=='confirmation'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_confirmation/confirmation.php";
  }
}

//=========================== Menu Support ====================================\\
// Bagian articles
elseif ($_GET[module]=='articles'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_articles/articles.php";
  }
}

// Bagian map
elseif ($_GET[module]=='map'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_map/map.php";
  }
}

// Bagian Slideshow
elseif ($_GET[module]=='slideshow'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_slideshow/slideshow.php";
  }
}

// Bagian Testimoni
elseif ($_GET[module]=='testimoni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_testimoni/testimoni.php";
  }
}

// Bagian Social Media
elseif ($_GET[module]=='sosmed'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sosmed/sosmed.php";
  }
}

// Bagian Bank
elseif ($_GET[module]=='bank'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bank/bank.php";
  }
}

// Bagian Banner
elseif ($_GET[module]=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

//=========================== Menu Web ====================================\\
// Bagian Title
elseif ($_GET[module]=='title'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_title/title.php";
  }
}

// Bagian Description
elseif ($_GET[module]=='description'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_description/description.php";
  }
}

// Bagian Keyword
elseif ($_GET[module]=='keyword'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_keyword/keyword.php";
  }
}

//=========================== Menu Admin ====================================\\
// Bagian User
elseif ($_GET[module]=='user'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_user/user.php";
  }
}

// Bagian Email User
elseif ($_GET[module]=='useremail'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_useremail/useremail.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b><center>MODUL BELUM ADA ATAU BELUM LENGKAP</center></b></p>";
}
?>
