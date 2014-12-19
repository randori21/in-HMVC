<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title><?php echo $title; ?></title>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="description" content="<?php echo $nama;?>" />
<meta name="keywords" content="keywords, here" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/themes/green/images/logo.png"/>


<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/themes/green/css/screen.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
<link type="text/css" href="<?php echo base_url();?>assets/themes/green/css/tabs-1.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/themes/green/js/jquery.tools.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/green/css/superfish.css"/>
    <script type="text/javascript" src="<?php echo base_url();?>assets/themes/green/js/hoverIntent.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/themes/green/js/superfish.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/green/css/scrollable-horizontal.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/green/css/scrollable-buttons.css"/>

    <script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("ul.tabs").tabs("div.panes > div");
            jQuery('ul.sf-menu').superfish();
            
            $("div.scrollable").scrollable();
            $(".items img").click(function() {
                 var url = $(this).attr("src").replace("", "");
                 var wrap = $("#image_wrap").fadeTo("medium", 0.5);
                 var img = new Image();
                 img.onload = function() {
                 wrap.fadeTo("fast", 1);
                 wrap.find("img").attr("src", url);
                     };
                     img.src = url;
            }).filter(":first").click();
        });
        function clean(){
            document.searching.qsearch.value='';            
        }
	</script>
    <style type="text/css">        
        #image_wrap {
	         width:677px;
	         margin:15px 0 15px 40px;
	         padding:15px 0;
	         text-align:center;
	         background-color:#efefef;
	         border:2px solid #fff;
	         outline:1px solid #ddd;
	         -moz-ouline-radius:4px;
        }
    </style>

</head>

<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="wrap-header">
		<h1 id="logo-text"><?php echo $nama;?></h1>
        <p id="slogan"><?php echo $slogan;?></p>
	</div>
	<div id="header">		
	
            <a name="top"></a>

            
            <p id="home"></p>
            <?php echo $menu;?>              
            <p id="rss-feed"><a href="<?php echo base_url();?>rss" class="feed">RSS</a></p>
	<!-- /header -->					
	</div>
	
<!-- wrap -->
<div id="wrap">
	<?php echo $this->load->get_section('block'); ?>
	<!-- featured -->
		<div id="content">
		<!-- content -->			
			<?php echo $output; ?> 
			<?php echo $this->load->get_section('sidebar'); ?>
			<?php echo $this->load->get_section('home'); ?>
		<!-- /content -->
		</div>  
	<!-- /featured -->
</div>
<!-- /wrap -->
<!-- footer -->	
<div id="footer">
	<div id="footer-top"></div>
	<!-- footer-outer -->	
	<div id="footer-outer" class="clear"><div id="footer-wrap">
	
		<!-- footer-bottom -->
		<div id="footer-bottom">
	
			<div class="bottom-left">
				<p>
				&copy; <?php echo date('Y');?> <strong>Hak Cipta <?php echo $copy;?></strong>&nbsp; &nbsp; &nbsp;
                                <a href="http://www.increativestudi.com/" title="Website Creative" style="color: #212B3A;">.</a>
				</p>
			</div>		
	
			<div class="bottom-right">
				<p>		
					<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | 
		   		    <a href="http://validator.w3.org/check/referer">XHTML</a>	|
					<a href="<?php echo base_url();?>">Home</a> |
					<strong><a href="#top" class="back-to-top">Back to Top</a></strong>								
				</p>
			</div>

		<!-- /footer-bottom -->		
		</div>
	
	<!-- /footer-outer -->		
	</div></div>		

<!-- /footer -->
</div>

</body>
</html>
