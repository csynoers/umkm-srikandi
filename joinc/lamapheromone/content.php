<!--===================== MODUL CONTENT HOME =====================-->
<?php if($_GET['mod']=='home') { 
	include "jocon/home.php" ;?>

<!--===================== MODUL CONTENT ABOUT ====================-->
<?php } elseif($_GET['mod']=='about') {
	include "jocon/about.php" ;?>

<!--===================== MODUL CONTENT PRODUCTS ====================-->
<?php } elseif($_GET['mod']=='product') {
	include "jocon/product.php" ;?>

<?php } elseif($_GET['mod']=='product_detail') {
	include "jocon/product_detail.php" ;?>
	
<?php } elseif($_GET['mod']=='product_bycategory') {
	include "jocon/product_bycategory.php" ;?>
	
<?php } elseif($_GET['mod']=='product_bysubcategory') {
	include "jocon/product_bysubcategory.php" ;?>
	
<!--===================== MODUL CONTENT TECHNOLOGY ====================-->
<?php } elseif($_GET['mod']=='technology') {
	include "jocon/technology.php" ;?>

<!--===================== MODUL CONTENT TESTIMONI ====================-->
<?php } elseif($_GET['mod']=='testimoni') {
	include "jocon/testimoni.php" ;?>

<?php } elseif($_GET['mod']=='testimoni_detail') {
	include "jocon/testimoni_detail.php" ;?>
	
<!--===================== MODUL CONTENT ARTICLES ====================-->
<?php } elseif($_GET['mod']=='articles') {
	include "jocon/articles.php" ;?>
	
<?php } elseif($_GET['mod']=='detail_articles') {
	include "jocon/detail_articles.php" ;?>
	
<!--===================== MODUL CONTENT FAQS ====================-->
<?php } elseif($_GET['mod']=='faqs') {
	include "jocon/faqs.php" ;?>

<!--===================== MODUL CONTENT CONTACT ====================-->
<?php } elseif($_GET['mod']=='contact') {
	include "jocon/contact.php" ;?>

<!--===================== MODUL CONTENT TOS ====================-->
<?php } elseif($_GET['mod']=='tos') {
	include "jocon/terms_condition.php" ;?>

<!--===================== MODUL CONTENT how to order ====================-->
<?php } elseif($_GET['mod']=='howtoorder') {
	include "jocon/howtoorder.php" ;?>

<!--===================== MODUL CONTENT PAYMENT CONFIRMATION ====================-->
<?php } elseif($_GET['mod']=='payment_confirm') {
	include "jocon/payment_confirm.php" ;?>
	
<?php } elseif($_GET['mod']=='confirm_detail') {
	include "jocon/confirm_aksi.php" ;?>

<!--===================== MODUL CONTENT CART ====================-->
<?php } elseif($_GET['mod']=='cart') {
	include "jocon/cart.php" ;?>

<?php } elseif($_GET['mod']=='add_into_cart') {
	include "jocon/add_cart.php" ;?>	
	
<?php } elseif($_GET['mod']=='update_cart') {
	include "jocon/update_qty_cart.php" ;?>

<?php } elseif($_GET['mod']=='delete_cart') {
	include "jocon/delete_cart.php" ;?>
	
<!--===================== MODUL CONTENT CHECKOUT ====================-->
<?php } elseif($_GET['mod']=='checkout') {
	include "jocon/checkout.php" ;?>

<!--===================== MODUL CONTENT ORDER ====================-->
<?php } elseif($_GET['mod']=='order') {
	include "jocon/orders.php" ;?>

<!--===================== MODUL CONTENT PENCARIAN ====================-->
<?php } elseif($_GET['mod']=='cari') {
	include "jocon/result.php" ;?>
<!--===================== MODUL CONTENT END ====================-->
<?php } ?>