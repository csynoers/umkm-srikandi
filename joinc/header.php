    <head>   
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php $description=mysql_query("SELECT static_content FROM modul WHERE id_modul = 10");
			$descrip=mysql_fetch_array($description);
			echo "$descrip[static_content]";?>">
		<meta name="keywords" content="<?php $keywords=mysql_query("SELECT static_content FROM modul WHERE id_modul = 11");
			$keyword=mysql_fetch_array($keywords);
			echo "$keyword[static_content]";?>">

        <!-- Title -->
        <title><?php $title=mysql_query("SELECT static_content FROM modul WHERE id_modul = 9");
			$judul=mysql_fetch_array($title);
			echo "$judul[static_content]";?></title>
        
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>
		
		<link type="image/png" href="iconic.png" rel="icon">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/perfect-scrollbar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
   		<link rel="stylesheet" href="css/animation.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.css">
		<link rel="stylesheet" href="css/chosen.css">
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<link rel="stylesheet" href="css/ie.css">
        <![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" href="css/fontello-ie7.css">
		<![endif]-->
        <style type="text/css">
		body {
    		font-size: 14px;
		    font: 300 14px 'Roboto', Helvetica, Arial, sans-serif;
		}
		#search-bar {
			padding: 7px 120px 0 0;
		}
		@media (min-width: 1200px){
			.container {
				width: 1100px;
			}
		}
		
		.sidebar-box-heading h4 {
			padding-left: initial;
		}
		h4 {
			font-size: 14px;
		}
		.sidebar-box-heading {
			height: initial;
		}
		/*buttton color add cart*/
		span.add-to-cart {
			background: rgba(86, 2, 150, 0.63);
		}
		span.add-to-cart:hover {
			background: #A349FF;
		}
		/*input keyword in searching*/
		input[type="text"], select {
			padding: 5px 10px;
			border: 1px solid #e6e6e6;
			height: 35px;
		}
		#search-bar .chosen-single {
			height: 37px;
		}
		
		/*table menu , atur lebar menu utama*/
		#main-navigation>ul {
			table-layout: auto;
		}
		
		/*style navigation top header menu*/
		#top-header li a {
			color: #262626;
			font-size: 14px;
			font-weight: 500;
		}
		
		/*style hover menu dropdown*/
		#main-navigation li ul.normal-dropdown li:hover>a {
			background: #333333;
		}
		#main-navigation.style1>ul>li:hover>a, #main-navigation.style1>ul>li:hover, #main-navigation.style1>ul>li.current-item, #main-navigation.style1>ul>li.current-item>a {
			background: #3d3d3d!important;
		}
		#main-navigation .nav-search {
			background: #262626;
		}
		#search-button input[type="submit"] {
			background: #3d3d3d;
		}
		#search-button:hover input[type="submit"] {
			background: #3d3d3d;
		}
		/*contanainer*/
		.container {
			background: #FFFFFF;
			background: -moz-linear-gradient(top, #FFFFFF 82%, #FFFFFF 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(82%,#FFFFFF), color-stop(100%,#FFFFFF));
			background: -webkit-linear-gradient(top, #FFFFFF 82%,#FFFFFF 100%);
			background: -o-linear-gradient(top, #FFFFFF 82%,#FFFFFF 100%);
			background: -ms-linear-gradient(top, #FFFFFF 82%,#FFFFFF 100%);
			background: linear-gradient(to bottom, #FFFFFF 82%,#FFFFFF 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FFFFFF', endColorstr='#FFFFFF',GradientType=0 );
		}
		
		.carousel-heading {
			height: initial;
		}
		
		/*style custum product tag*/
		span.product-tag {
			background: rgb(239, 0, 255);
		}
		
		.pagination>a.actived>div{
			background : #D2D2D2;
		}
		.disabled {
			 pointer-events: none; cursor: default; background : #D2D2D2;
		 }
		 
		 /*style detail product*/
		.product-single {
			background: #FFFFFF;
			margin-bottom: 30px;
		}
		.main-content table {
			background: #FFFFFF;
		}
		table#mytable, table#mytable td
		{
			border: none !important;
		}
		
		/*style buttton submit addtocart*/
		.addtocart{
		    color: #FFFFFF;
			background: #262626;
		    width: inherit;
			display: inline-block;
			padding: 10px 20px 10px 15px;
			margin: 1px 0;
			font-size: 16px;
			transition: background 0.3s;
			-webkit-transition: background 0.3s;
			-moz-transition: background 0.3s;
			-ms-transition: background 0.3s;
			-o-transition: background 0.3s;
		}
		.addtocart:hover {
			background: #3d3d3d;
		}
		
		.delcart{
		    color: #FFFFFF;
			background: #262626;
		    width: inherit;
			display: inline-block;
			margin: 1px 0;
			font-size: 14px;
			padding: 3px 5px 3px 5px;
			transition: background 0.3s;
			-webkit-transition: background 0.3s;
			-moz-transition: background 0.3s;
			-ms-transition: background 0.3s;
			-o-transition: background 0.3s;
		}
		.delcart:hover {
			background: #3d3d3d;
		}
		
		.upcart{
		    color: #FFFFFF;
			background: #262626;
		    width: inherit;
			display: inline-block;
			margin: 1px 0;
			font-size: 14px;
			padding: 3px 5px 3px 5px;
			transition: background 0.3s;
			-webkit-transition: background 0.3s;
			-moz-transition: background 0.3s;
			-ms-transition: background 0.3s;
			-o-transition: background 0.3s;
		}

		.upcart:hover {
			background: #3d3d3d;
		}
		
		/*dropdon font size navigasi*/
		.box-dropdown a.button {
			font-size: 10px !important;
		}
		/*font size tag produk*/
		span.product-tag {
			font-size: 12px;
		}
		h5 {
			font-size: 14px;
		}
		
		.kontak {
			height: 70px;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		
		</style>
    </head>