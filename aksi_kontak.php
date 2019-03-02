<?php
include ("josys/koneksi.php");

$name = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$message = mysql_real_escape_string($_POST['message']);

if(!empty($name))
{
	if(!empty($email))
	{
		if(!empty($message))
		{
			mysql_query("INSERT INTO kontak (nama,email,pesan)
			VALUES ('$name', '$email', '$message')");
			
			echo "<script>alert('Successfully Send To Admin! Thank you.'); window.location = 'contact-umkmsrikandimataram.html';</script>";
		}
		else
		{
			echo "<script>alert('sorry! Please enter your message.'); window.location = 'contact-umkmsrikandimataram.html';</script>";
		}
	}
	else
	{
			echo "<script>alert('sorry! Please enter your email.'); window.location = 'contact-umkmsrikandimataram.html';</script>";
	}
}
else
{
	echo "<script>alert('sorry! Please enter your name.'); window.location = 'contact-umkmsrikandimataram.html';</script>";
}
?>