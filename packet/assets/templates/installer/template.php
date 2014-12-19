<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="user-scalable=no,initial-scale = 1.0,maximum-scale = 1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/inTopcoat/fonts/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/inTopcoat/css/topcoat-desktop-dark.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/inTopcoat/css/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/inTopcoat/css/css/brackets.css">
	<?php foreach($css as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<script>var base_url = '<?php echo base_url()?>';</script>
	<?php foreach($js as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
  </head>
  <body class="dark">
  <div id="wrapper">
	<div class="max-width ">
        <div id="sideNav">    
			<nav class="site">
            <ul>
              <li><a href="<?php echo site_url('');?>" class="copy">Daftar Menu</a></li>
            </ul>
          </nav>
          <div id="pageNav">
			<div class="topcoat-button-bar">			  
			  <div class="topcoat-button-bar__item" >
				
			  </div>
			</div>
            <ul>
				<li><a href="<?php echo site_url('installer');?>" >Home</a></li>
				<li><a href="<?php echo site_url('installer/database')?>">Database</a></li>
				<li><a href="<?php echo site_url('installer/tabel')?>">Tabel</a></li>
				<li><a href="<?php echo site_url('installer/aplikasi')?>">Aplikasi</a></li>
            </ul>
          </div>
        </div>
     </div>
	 <div id="site">
	  <div class="topcoat-navigation-bar" >
		<div class="topcoat-navigation-bar__item center full">
			<a id="slide-menu-button" class="topcoat-icon-button--large--quiet"><span class="topcoat-icon--large topcoat-icon--menu-stack"></span></a>
			<h1 class="topcoat-navigation-bar__title" style="min-height: 40px;"><?php echo $title; ?></h1>			
		</div>	
	  </div>
		<div id="content" class="max-width ">		
		<?php echo @$output; ?>
		</div>
		<div class="clear"></div>
		<div class="topcoat-navigation-bar">
			<div class="topcoat-navigation-bar__item center full">
			copyrights&copy;<?php echo date("Y");?> - <a href="ringkes.com" class="copy">ringkes.com</a> 
			</div>
		</div>
	</div>
  <script src="<?php echo base_url();?>assets/templates/inTopcoat/js/rainbow-custom.min.js"></script>
  <script src="<?php echo base_url();?>assets/templates/inTopcoat/js/main.js"></script>
  </body>
</html>