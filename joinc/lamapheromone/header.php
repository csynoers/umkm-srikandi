  <head>
    <meta charset="utf-8">
    <title><?php $title=mysql_query("SELECT static_content FROM modul WHERE id_modul = 9");
			$judul=mysql_fetch_array($title);
			echo "$judul[static_content]";?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php $description=mysql_query("SELECT static_content FROM modul WHERE id_modul = 10");
			$descrip=mysql_fetch_array($description);
			echo "$descrip[static_content]";?>">
    <meta name="keywords" content="<?php $keywords=mysql_query("SELECT static_content FROM modul WHERE id_modul = 11");
			$keyword=mysql_fetch_array($keywords);
			echo "$keyword[static_content]";?>">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<style type="text/css">
		a:hover {
			text-decoration: none;
		}
		body {
			background-color: black;
			color: #D2B22C;//#9D824E;//
		}
		
		div.LogoImgWrapper {
			width: 372px;
			height: 79px;
			overflow: hidden;
			text-align: center;
		}
		img.LogoCropCenter {
			left: 50%;
			margin-left: -100%;
			position: relative;
			width: 372px !important;
			height: 79px !important;
		}
		.nav-pills > li > a {
			color: #D2B22C;
		}
		.nav-pills > .active > a, .nav-pills > .active > a:hover {
			color: balck;
			background-color: #D2B22C;
		}
		.nav > li > a:hover {
			text-decoration: none;
			background-color: #CCA506;//#D2B22C;
			color: black;
		}
		.navbar .btn, .navbar .btn-group {
			margin-top: 0px;
		}
		.breadcrumb li {
			display: inline-block;
			text-shadow: 0 1px 0 #000000;
		}
		.breadcrumb {
			padding: 7px 14px;
			margin: 0 0 18px;
			list-style: none;
			background-color: #040404;
			background-image: -moz-linear-gradient(top, #ffffff, #f5f5f5);
			background-image: -ms-linear-gradient(top, #ffffff, #f5f5f5);
			background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#000000), to(#000000));
			background-image: -webkit-linear-gradient(top, #000000, #000000);
			background-image: -o-linear-gradient(top, #ffffff, #f5f5f5);
			background-image: linear-gradient(top, #ffffff, #f5f5f5);
			background-image: -moz-linear-gradient(center top , #000, #000);
			background-repeat: repeat-x;
			border: 1px solid #D2B22C;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#f5f5f5', GradientType=0);
			-webkit-box-shadow: inset 0 1px 0 #000000;
			-moz-box-shadow: inset 0 1px 0 #ffffff;
			box-shadow: inset 0 1px 0 #000000;
		}
		.form-actions {
			background-color: ##d8ff2d;
		}
		.account a {
			color: #FFFFFF;
		}
		.account a:hover {
			color: #FFF;
			text-decoration: overline;
		}
		.account ul li#your-account {
			border-right: 1px solid #D2B22C;
		}
		.dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover {
			color: #FFFFFF;
			text-decoration: none;
			background-color: #D2B22C;
		}
	</style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../../../html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>