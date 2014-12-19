<!DOCTYPE html PUBLIC "-//W3C//DTD adminProject 1.0 Strict//EN" "http://www.w3.org/TR/adminProject1/DTD/adminProject1-strict.dtd">
<html xmlns="http://www.w3.org/1999/adminProject">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>
<meta charset="utf-8" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/templates/adminProject/css/datePicker.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/templates/adminProject/css/screen.css" type="text/css" media="screen" title="default" />
<?php foreach($css as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<script>var base_url = '<?php echo base_url()?>';</script>
<?php foreach($js as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
textarea
{
    width: 400px;
}
</style>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url();?>assets/templates/adminProject/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
//$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
        <div id="logo">
	<a href=""><img src="<?php echo base_url()?>assets/templates/adminProject/images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
                        <a href="<?php echo base_url()."index.php/admin/akun";?>" id="logout"><img src="<?php echo base_url()?>assets/templates/adminProject/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></a>
			<div class="nav-divider">&nbsp;</div>
			<a href="<?php echo base_url()."index.php/auth/logout";?>" id="logout"><img src="<?php echo base_url()?>assets/templates/adminProject/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>	
					
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">		
		<ul class="select"><li><a href="<?php echo site_url('');?>"><b>Home</b> </a></li></ul>
        <div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href=""><b>Project</b><!--[if IE 7]><!--></a><!--<![endif]--><!--class="current"-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub"><!-- terpilih //class="select_sub show" -->
			<ul class="sub">                                
                <li><a href="<?php echo site_url('crud/proyek')?>">Proyek</a></li>
				<li><a href="<?php echo site_url('crud/tahap')?>">Tahapan Proyek</a></li>
				<li><a href="<?php echo site_url('adminProject/generate')?>">Generate</a></li>							
			</ul>
		</div>		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
        <ul class="select"><li><a href=""><b>Service</b><!--[if IE 7]><!--></a><!--<![endif]--><!--class="current"-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub"><!-- terpilih //class="select_sub show" -->
			<ul class="sub">                                
                <li><a href="<?php echo site_url('crud/pesan')?>">Pesan</a></li>
				<li><a href="<?php echo site_url('crud/client')?>">Client</a></li>						
			</ul>
		</div>		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>  
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href=""><b>Data Setting</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">				
				<li><a href="<?php echo site_url('crud/paket')?>">Paket</a></li> 
				<li><a href="<?php echo site_url('crud/kebutuhan')?>">Kebutuhan</a></li> 				
				<li><a href="<?php echo site_url('crud/jenispaket')?>">Jenis Paket</a></li>                                
				<li><a href="<?php echo site_url('crud/jenisusaha')?>">Jenis Usaha</a></li> 				
				<li><a href="<?php echo site_url('crud/jenistahap')?>">Jenis Tahapan Proyek</a></li>
				<li><a href="<?php echo site_url('crud/satuan')?>">Satuan</a></li> 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<?php if(@$jenis_user == 1){?>
		<div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="#nogo"><b>Setting</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
                                <li><a href="<?php echo site_url('setting/')?>">Setting</a></li>
                                <li><a href="<?php echo site_url('user/boss/Jenis')?>">Jenis User</a></li>
								<li><a href="<?php echo site_url('winget/boss')?>">Winget</a></li>
								<li><a href="<?php echo site_url('theme/boss')?>">Theme</a></li>
								<li><a href="<?php echo site_url('template/boss')?>">Theme Admin</a></li>
                        </ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
                <?php }?>
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href=""><b>Laporan</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo site_url('adminProject/rekap')?>">Rekap Perbulan</a></li>
				<li><a href="#nogo">Rekap Per Karyawan</a></li>
				<li><a href="#nogo">Grafik adminProject/presensi</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>                
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading"><?//=$jenis;?>
            <h1 style="text-transform: capitalize;"><?php echo str_replace("_", " ", @$head);?></h1>
	</div>
	<!-- end page-heading -->
        <?php echo @$output; ?>

	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
	Admin &copy; 2011 | Copyright RingkeS.com <a href="http://www.ringkes.com" id="footer"> | Project Website</a> | All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>