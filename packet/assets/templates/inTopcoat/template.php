<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="user-scalable=no,initial-scale = 1.0,maximum-scale = 1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/inTopcoat/fonts/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/inTopcoat/css/topcoat-mobile-dark.min.css">
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
			  <div class="topcoat-button-bar__item">
				<a href="<?php echo site_url('setting');?>" class="topcoat-button-bar__button nodecor">Setting</a>
			  </div>
			  
			</div>
            <ul>				
				<?php 				
				$x = $this->config->item("crud_position");
				?>
				<li><a href="<?php echo site_url($x.'/crud');?>" >Home</a></li>
				<?php
				$tables = $this->db->list_tables();
				foreach ($tables as $table)
				{
				$detil = explode('rel',$table);
				if(!empty($detil[0])==TRUE){
					if(($detil[0]!='user_autologin')&&($detil[0]!='user_profiles')&&($detil[0]!='login_attempts')&&($detil[0]!='ci_sessions')&&($detil[0]!='generalsettings')){
				?>
				<li><a href="<?php echo site_url(@$x.'/crud/'.$detil[0])?>"><?php echo $detil[0];?></a></li>
				<?php }}}?>
            </ul>
          </div>
        </div>
     </div>
	 <div id="site">
	  <div class="topcoat-navigation-bar">
		<div class="topcoat-navigation-bar__item center full">
			<a id="slide-menu-button" class="topcoat-icon-button--large--quiet"><span class="topcoat-icon--large topcoat-icon--menu-stack"></span></a>
			<h1 class="topcoat-navigation-bar__title"><?php echo $title; ?></h1>			
		</div>	
	  </div>
		<div id="content" class="max-width ">
		<div id="page-heading">
            <h3 style="text-transform: capitalize;"><?php echo str_replace("_", " ", @$this->uri->segment(2));?></h3>
		</div>
		<?php echo @$output; ?>
		<div class="render">render: {elapsed_time} detik</div>
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