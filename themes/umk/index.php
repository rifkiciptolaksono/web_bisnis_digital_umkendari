<?php get_header(); ?>

<?php if (isset($is_home)) { ?>
<!-- Begin page content -->
<div class="container-beranda">
	<div class="container bg_patern_h sdw">
		<div class="row">
			<div class="col-lg-3 col-sm-3 hidden-xs" style="margin-top:5px;padding-top:5px;">
				<?php get_sidebar1(); ?>
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="row box-carousel-utama-col" style="padding: 0px 10px;">
					<div class="col-lg-12 bg_abu">
						<div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel">
							<?php echo get_slider_post_b1('berita',5,true,'myCarousel');?>
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 bg_primary" style="<?php if(get_tautan(3,'link2')!=null){?>margin-top:5px;<?php }?>padding-top:0px;padding-bottom:0px;">
						<div class="carousel-beranda-utama">
							<?php echo get_tautan(3,'link2')?>
						</div>
					</div>
				</div>

				<div class="row" style="<?php if(get_banner('utama')!=''){?>padding: 10px 10px 0px 10px;<?php }?>">
					<div class="col-lg-12" style="padding:0px;">
						<div class="banner-utama">
							<div id="myCarousel2" class="carousel carousel-fade slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
									<?php echo get_banner('utama')?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div role="tabpanel" style="margin-bottom:10px;">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#berita-umum" aria-controls="berita umum" role="tab" data-toggle="tab"><i class="fa fa-rss"></i> <?php echo $this->config->config['berita-1']?></a></li>
								<li role="presentation"><a href="#berita-daerah" aria-controls="berita daerah" role="tab" data-toggle="tab"><i class="fa fa-rss"></i> <?php echo $this->config->config['berita-2']?></a></li>
								<li role="presentation"><a href="#pengumuman" aria-controls="pengumuman" role="tab" data-toggle="tab"><i class="fa fa-bullhorn"></i> Pengumuman</a></li>
								<li role="presentation"><a href="#event" aria-controls="event" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i> Agenda & <i class="fa fa-picture-o"></i> Galeri</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fadeIn animated active" id="berita-umum">
									<?php echo list_tab_post('berita-1',5,'img')?>
								</div>
								<div role="tabpanel" class="tab-pane fadeIn animated" id="berita-daerah">
									<?php echo list_tab_post('berita-2',5,'img')?>
								</div>
								<div role="tabpanel" class="tab-pane fadeIn animated" id="pengumuman">
									<?php echo list_tab_post_2('pengumuman',5,'img')?>
								</div>
								<div role="tabpanel" class="tab-pane fadeIn animated row" id="event">
									<div class="col-lg-8 col-sm-8 bg_primary">
										<div class="agenda-beranda-atas" style="padding: 0px 5px;">
											<h4 class="title-widget"><i class="fa fa-calendar" style="color:#0d2d6c;"></i> <span>AGENDA KERJA</span><hr/></h4>
											<ul class="box-list-agenda-kerja">
												<?php echo list_event(5)?>
											</ul>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 bg_primary">
										<div class="agenda-beranda-atas" style="padding: 0px 5px;">
											<h4 class="title-widget"><i class="fa fa-picture-o" style="color:#0d2d6c;"></i> <span>GALERI FOTO</span><hr/></h4>
											<div class="thumbnail-album-beranda galeri">
											<?php echo get_thumbnail_album(5)?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div style="padding:0px 5px;display: table;content: " ";clear: both;" class="bg_white">
							<h4 class="title-widget"><i class="fa fa-film" style="color:#111;"></i> <span>VIDEO TERBARU</span><hr/></h4>
							<?php echo get_video(4)?>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-3 col-sm-3" style="margin-top:5px;padding-top:5px;">
				<?php get_sidebar2(); ?>
			</div>
		</div>
		<div class="row bg_abu2">
			<div class="col-lg-12 carousel-beranda-bawah">
				<?php echo get_tautan(6,'link')?>
			</div>
		</div>
	</div>
</div>
<?php }else{ ?>
<!-- Begin page content -->
<div class="container-beranda">
	<div class="container bg_patern_h sdw">
		<?php if (isset($is_home)) { ?>
		<!-- headline & pencarian -->
		<div class="row">
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
			<div class="col-lg-3 col-sm-3" style="padding:0px;margin-bottom:10px;padding-top:0px">
				<?php //echo get_search()?>
			</div>
		</div>
		<!-- headline & pencarian end -->
		<?php }?>
		<div class="row">
			<?php if (isset($is_page)) { ?>
			<div class="col-lg-3 col-sm-3" style="margin-top:10px;padding-top:0px;">
				<!-- <div class="widget bg_primary" style="margin-bottom:10px;">
					<?php echo get_search()?>
				</div> -->
				<div id="sidebar">
					<?php echo get_list_page();?>
				</div>
				<?php get_sidebar1(); ?>
			</div>
			<?php }?>
			<div class="col-lg-9 col-sm-9 bg_white">
				<?php echo $content; ?>
			</div>
			<?php if (isset($is_article)) { ?>
			<div class="col-lg-3 col-sm-3" style="margin-top:10px;padding-top:0px;">
				<!-- <div class="widget bg_primary" style="margin-bottom:10px;">
					<?php echo get_search()?>
				</div> -->
				<?php get_sidebar2(); ?>
			</div>
			<?php }?>
		</div>
		<div class="row bg_abu2">
			<div class="col-lg-12 carousel-beranda-bawah">
				<?php echo get_tautan(6,'link')?>
			</div>
		</div>
	</div>
</div>
<?php }?>
<?php get_footer(); ?>