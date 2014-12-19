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

	<div id="body">			
		<p>Keterangan:</p>
		<code>Proses installasi telah selesai. Silahkan menghapus modul ini dengan klik tombol <a href="<?php echo site_url('installer/selesai/hapus');?>" class="topcoat-button--cta">Hapus</a></code>

		<p>Anda dapat menggunakan aplikasi dengan pilihan menu:</p>
		<code><a href="<?php echo site_url();?>" class="topcoat-button">Aplikasi</a> <a href="<?php echo site_url("auth/register");?>" class="topcoat-button">Administrator</a></code>

		<p>Silahkan menggunakan aplikasi yang telah berhasil di-install, dan tetap berkunjung ke <a href="http://ringkes.com" class="copy">ringkes.com</a>.</p>
	</div>

	<p class="footer">Halaman dirender dalam <strong>{elapsed_time}</strong> detik</p>
</div>

</body>
</html>