<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $judul;?></title>
<link rel="stylesheet" href="<?php echo base_url();?>templates/xhtml/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo base_url();?>templates/xhtml/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url();?>templates/xhtml/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url();?>templates/xhtml/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<style>
    #login-inner th{
        width: 210px;
    }
    #login-inner{
        margin-left: 50px;
    }
    #loginbox{
        padding-top: 50px;
    }
</style>
</head>
<body id="login-bg"> 
    <div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
<!--		<a href="index.html"><img src="<?php echo base_url()?>templates/xhtml/images/shared/logo.png" width="156" height="40" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">	
	<!--  start login-inner -->
	<div id="login-inner">
<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
        "class"=>"login-inp"
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        "class"=>"login-inp"
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
        "class"=>"login-inp"
);
$submit = array(
        "value"=>"Change Password",
        "name"=>"change",        
        "class"=>"submit-login"
        );
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table width="400">
	<tr>
		<td><?php echo form_label('Old Password', $old_password['id']); ?></td>
		<td align="right"><?php echo form_password($old_password); ?></td>
		
	</tr>
        <tr><td style="color: red;" colspan="2" align="right"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?></td></tr>
	<tr>
		<td><?php echo form_label('New Password', $new_password['id']); ?></td>
		<td align="right"><?php echo form_password($new_password); ?></td>		
	</tr>
        <tr><td style="color: red;" colspan="2" align="right"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td></tr>
	<tr>
		<td><?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?></td>
		<td align="right"><?php echo form_password($confirm_new_password); ?></td>		
	</tr>
        <tr><td style="color: red;" colspan="2" align="right"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td></tr>
        <tr><td align="right" colspan="2"><?php echo form_submit($submit); ?></td></tr>
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