<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">
		<meta name="webcrawlers" content="all">
		<meta name="rating" content="general">
	    <meta name="spiders" content="all">
		<meta name="revisit-after" content="7">
		<meta name="googlebot" content="noodp">
		<!-- meta open graph facebook -->
		<?php $meta = get_meta()?>
		<meta property="og:site_name" content="<?php echo $this->config->config['blogname'] ?>"/>
		<meta property="og:url" content="<?php echo$meta['u'];?>" />
		<meta property="og:title" content="<?php echo $this->config->config['blogname'] ?>" />
		<meta property="og:description" content="<?php echo$meta['d'];?>" />
		<meta name="description" content="<?php echo$meta['d'];?>" />
		<meta name="keywords" content="<?php echo$meta['k'];?>" />
		<meta property="og:image" content="<?php echo$meta['i'];?>" />

		<link rel="shortcut icon" href="<?php echo $this->config->config['blogimgheader'] ?>" type="image/x-icon"/>
		<title><?php echo $this->config->config['blogname'] ?></title>
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url('themes/umk/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/plugin/submenu/bootstrap-submenu.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/css/lihat3.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/css/umk.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/plugin/animate/animate.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/plugin/jscrollpane/jquery.jscrollpane.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/plugin/owl-carousel/owl.carousel.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/plugin/smarticker/jquery.smarticker.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('themes/umk/font-awesome/font-awesome.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('themes/umk/plugin/magnific/magnific-popup.css');?>" rel="stylesheet">
	</head>

	<body style="<?php background();?>">
		<!-- <div class="body-background"></div>
		<div id="google_translate_element" style="position:fixed;top:10px;right:0px;z-index:99999"></div>
		-->

	<div class="container sdw" style="padding:0px;">
		<div class="top_nav">
			<?php echo get_menu_atas()?>
		</div>
	</div>

	<div class="header">
		<div class="container sdw bg_white1" style="padding:0px;">
			<div class="logo-area">
				<div id="myCarousel2" class="carousel carousel-fade slide" data-ride="carousel">
					<div class="carousel-inner box-carousel-utama" role="listbox" style="position:absolute;z-index:0;max-height:158px;overflow:hidden;">
						<?php echo get_slideshow()?>
					</div>
				</div>
				<div class="row" style="background:url(<?php echo base_url('themes/umk/img/umk.png');?>);">
					<div class="col-lg-8 col-sm-8" style="padding:0px 15px;">
						<?php if($this->config->config['blogimgheader2']):?><img src="<?php echo $this->config->config['blogimgheader2'] ?>" class="img-logo-beranda"><?php endif;?>
					</div>
					<div class="col-lg-1 col-sm-1 hidden-xs">
					</div>
					<div class="col-lg-3 col-sm-3" style="padding:0px 15px;max-height:158px;overflow:hidden;">
						<?php if($this->config->config['blogimgpemimpin']):?><img class="hidden-xs" style="width:50%;float:left;" src="<?php echo $this->config->config['blogimgpemimpin'] ?>" title="<?php echo $this->config->config['blogpemimpin'] ?>"><?php endif;?>
						<?php if($this->config->config['blogimgwpemimpin']):?><img class="hidden-xs" style="width:50%;float:right;" src="<?php echo $this->config->config['blogimgwpemimpin'] ?>" title="<?php echo $this->config->config['blogwpemimpin'] ?>"><?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="header hidden-xs">
		<div class="container">
			<div class="row text-right">
				<div class="col-lg-12 tautan-beranda-atas" style="padding:3px 10px;margin-top:-30px;margin-bottom:0px;">
					<?php echo get_tautan_li('link2')?>
				</div>
			</div>
		</div>
	</div> -->

	<div id="menu-utama">
		<div class="header">
			<nav class="navbar navbar-default">
				<div class="container bg_6">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="<?php if (isset($is_home)) {echo'active';} ?>"><a href="<?php echo site_url();?>">Home</a></li>
							<?php echo get_menu('bounceIn animated')?>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<!-- Begin page content -->
		<div class="container-beranda">
			<div class="container bg_7 sdw">
				<!-- headline & pencarian -->
				<div class="row sdw">
					<div class="col-lg-9 col-sm-9" style="padding: 0px;">
						<div class="smarticker3">
							<ul>
							<?php echo get_newsticker(10)?>
							</ul>
						</div>
						<script type="text/javascript" src="<?php echo base_url('themes/umk/plugin/smarticker/smarticker.js');?>"></script>
						<script type="text/javascript">
							$('.smarticker3').smarticker({
								theme: 4,
								speed: 1500,
								pausetime: 3600,
								title: 'Sekilas Info: ',
								rounded: false,
								shadow: false,
								animation: 'typing'
							});
						</script>
					</div>
					<div class="col-lg-3 col-sm-3" style="padding:0px;">
						<?php echo get_search()?>
					</div>
				</div>
			</div>
		</div>
	</div>