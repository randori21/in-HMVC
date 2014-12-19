<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Selamat datang di Project Generator</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {		
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 30px 10px 10px 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container" class="light">
	<h1>Modul Installasi <span style="text-transform: capitalize;" class="copy"><?php echo str_replace("_", " ", @$this->uri->segment(2));?></span></h1>
<form action="<?php echo base_url('auth/register');?>" method="post">
	<div id="body">			
		<p>User:</p>
		<code><input type="text" name="user"></code>

		<p>Email:</p>
		<code><input type="text" name="email"></code>
		
		<p>Password:</p>
		<code><input type="text" name="password"></code>
		
		<p>Ulangi password:</p>
		<code><input type="text" name="repassword"></code>
		
		<p>Aksi</p>
		<code><input type="reset" class="topcoat-button" name="batal" value="Batal"><input class="topcoat-button--cta" type="submit" name="kirim" value="Melanjutkan"></code>

		<p>Sebelum menggunakan program ini, anda harus mendapat izin dari <a href="#container" class="copy">ringkes.com</a>.</p>
	</div>
</form>
	<p class="footer">Halaman dirender dalam <strong>{elapsed_time}</strong> detik</p>
</div>

</body>
</html>