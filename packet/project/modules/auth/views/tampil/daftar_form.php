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
    h3{
        color: #161616;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }
    #kotak{
        border: solid #ccc 1px;
        background-color: #aaa;
        padding-bottom: 10px;
    }
    #logo {
        float: left;
        height: 35px;
        margin: 75px 0 0 15px;
    }
    .isian{
        border: solid #efefef 1px;
        background-color: #ccc;
        height: 30px;
        padding: 0 3px 0 3px;
    }
    #login-inner{
        margin: 30px;
    }
    #login-inner th{
        width: 210px;
    }
</style>
</head>
<body id="login-bg">
    <!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo">
<!--		<a href="index.html"><img src="<?php echo base_url()?>assets/templates/xhtml/images/shared/logo.png" width="156" height="40" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="kotak">	
	<!--  start login-inner -->
	<div id="login-inner">
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
                "class"=>"isian"
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
        "class"=>"isian"
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        "class"=>"isian"
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        "class"=>"isian"
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
        'size'	=> 30,
        "class"=>"isian"
);
$submit = array(
        "value"=>"Register",
        "name"=>"register",        
        "class"=>"submit-login"
        );

?>
<?php echo form_open($this->uri->uri_string()); ?>
<table width="440">
        <tr>
            <td colspan="3" align="left" style="color: red;">
                <h3>Registration Form</h3>
		</td>
	</tr>
	<?php if ($use_username) { ?>
        
	<tr>
            <th align="left" width="400"><?php echo form_label('Username', $username['id']); ?></th>
		<td align="right"><?php echo form_input($username); ?></td>
                <td style="color: red;">&nbsp;</td>
	</tr>
        <tr>
            <td colspan="3" align="right" style="color: red;">
			<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
		</td>
	</tr>
        
	<?php } ?>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td align="right"><?php echo form_input($email); ?></td>
                <td style="color: red;">&nbsp;</td>
	</tr>
        <tr>
                <td colspan="3" align="right" style="color: red;">
			<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td align="right"><?php echo form_password($password); ?></td>
                <td style="color: red;">&nbsp;</td>
	</tr>
        <tr>
                <td colspan="3" align="right" style="color: red;">
			<?php echo form_error($password['name']); ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
		<td align="right"><?php echo form_password($confirm_password); ?></td>
                <td style="color: red;">&nbsp;</td>
	</tr>
        <tr>
                <td colspan="3" align="right" style="color: red;">
			<?php echo form_error($confirm_password['name']); ?>
		</td>
	</tr>
	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
                <td style="color: red;">&nbsp;</td>
		
	</tr>
        <tr>
                <td colspan="3" align="right" style="color: red;">
			<?php echo form_error('recaptcha_response_field'); ?>
		</td><?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr align="right">
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
    <tr align="right">
		<td align="left"><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td align="right"><?php echo form_input($captcha); ?></td>
		<td style="color: red;"></td>
	</tr>
        <tr>
            <td colspan="3" align="right" style="color: red;">
                        <?php echo form_error($captcha['name']); ?>
		</td>
	</tr>
	<?php }
	} ?>
        <tr>
            <td colspan="3" align="right">
                <?php echo form_submit($submit); ?>
		</td>
	</tr>
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