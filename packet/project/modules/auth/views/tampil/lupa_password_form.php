<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $judul;?></title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/templates/xhtml/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo base_url();?>assets/templates/xhtml/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url();?>assets/templates/xhtml/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url();?>assets/templates/xhtml/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
    <div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
<!--		<a href="index.html"><img src="<?php echo base_url()?>assets/templates/xhtml/images/shared/logo.png" width="156" height="40" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">	
	<!--  start login-inner -->
	<div id="login-inner">
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
        "class"=>"login-inp"
);
$submit = array(
        "value"=>"Get a new password",
        "name"=>"reset",        
        "class"=>"submit-login"
        );
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>    
<?php echo form_open($this->uri->uri_string()); ?>
<table>
     <tr><td colspan="2" align="right">Kirimkan email anda untuk reset password anda.</td></tr>
     <tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>		
	</tr>
     <tr><td style="color: red;" colspan="2" align="right"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td></tr>
    <tr><td colspan="2" align="right"><?php echo form_submit($submit); ?></td></tr>
</table>
<?php echo form_close(); ?>
        </div>
        
 	<!--  end login-inner -->
	<div class="clear"></div>
	
 </div>
 <!--  end loginbox --> 
</div>
<!-- End: login-holder -->
</body>
</html>