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
<style>
    #login-inner th{
        width: 210px;
    }
    #loginbox{
        padding-top: 90px;
    }
</style>
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
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
        "class" =>"login-inp"
);
$submit = array(
        "value"=>"Delete account",
        "name"=>"cancel",        
        "class"=>"submit-login"
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>		
	</tr>
        <tr>
            <td style="color: red;" colspan="2"  align="right"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
        </tr>
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