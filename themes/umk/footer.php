		<div class="container-footer">
			<div class="container bg_2 sdw br-top-5">
				<div class="row">
					<div class="col-lg-12 text-center">
						<span class="border-line">
							<span class="star"></span>
						</span>
					</div>
				</div>
				<div>
					<?php get_sidebar3(); ?>
				</div>
			</div>
		</div>
		<div class="container-footer text-center">
			<div class="container bg_2 sdw">
				<p class="text-muted">Fakultas Ekonomi dan Bisnis Islam Universitas Muhammadiyah Kendari<p>
				<p class="text-muted">Lt. 4 Jl.KH. Ahmad Dahlan No. 10 Kendari 93117 Sulawesi Tenggara-Indonesia e-mail: fakultas@febi.umkendari.ac.id Fax. 0401-3190710</p>
				<p class="text-muted">Copyrights. © 2001<?php if(date('Y')!='2015'){echo' - '.date('Y');}?> oleh <?php echo $this->config->config['blogname'] ?>. {memory_usage} {elapsed_time}</p>
				<div class="row">
					<div class="col-lg-12" style="padding-top:5px;">
						<div class="bottom_nav">
							<?php echo get_menu_bawah()?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a href="#0" class="cd-top"><i class="fa fa fa-2x fa-chevron-up"></i></a>

		<!-- Modal Buku Tamu -->
		<div class="modal fade" id="m-buku-tamu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo site_url('home/addtestimoni');?>" method="post">
						<div class="modal-header bg_gr">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Isi Buku Tamu</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<strong>Nama</strong>
								<input name="username" id="username" type="text" class="form-control square-btn-adjust required" title="Masukan nama Anda di sini">
							</div>
							<div class="form-group">
								<strong>Email</strong>
								<input name="email" id="email" type="email" class="form-control square-btn-adjust required" title="Masukan email Anda di sini">
							</div>
							<div class="form-group">
								<strong>Instansi / Pekerjaan</strong>
								<input name="instansi" id="instansi" type="text" class="form-control square-btn-adjust required" title="Masukan Instansi / Kantor di sini">
							</div>
							<div class="form-group">
								<strong>Kritik / Saran</strong>
								<textarea name="testimoni" id="testimoni" cols="10" rows="5" class="form-control square-btn-adjust required" title="Masukan kritik / saran di sini"></textarea>
							</div>
						</div>
						<div class="modal-footer bg_gr">
							<button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo base_url('themes/umk/jquery/jquery-2.1.3.min.js');?>"></script>
		<script src="<?php echo base_url('themes/umk/bootstrap/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('themes/umk/plugin/submenu/bootstrap-submenu.min.js');?>"></script>
		<script src="<?php echo base_url('themes/umk/plugin/jscrollpane/jquery.jscrollpane.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/umk/js/social.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/umk/js/custom.js');?>"></script>
		<script type="text/javascript">
		    jQuery(document).ready(function($) {
				$('.social_active').hoverdir( {} );
			});
		</script>
		<script src="<?php echo base_url('themes/umk/plugin/magnific/jquery.magnific-popup.js');?>"></script>
		<script type="text/javascript">
			$('.parent-container').magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
		          enabled:true
		        }
			});
			$('.parent-container-footer').magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
		          enabled:true
		        }
			});
		</script>
		<script src="<?php echo base_url();?>themes/umk/plugin/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		    jQuery(document).ready(function() { 
		        $(".owl-carousel3").owlCarousel({
	                pagination: false,
	                navigation: true,
	                items: 3,
	                addClassActive: true,
	            });
	            $(".owl-carousel6").owlCarousel({
	                pagination: false,
	                navigation: true,
	                items: 6,
	                addClassActive: true,
	            });
		    });
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.box-list-terpopuler').jScrollPane();
				$('.dropdown-submenu > a').submenupicker();
			});
			//pencarian
			$('#pencarian').on('blur', function(){
				$('#form-pencarian').submit();
			});
		</script>
		<!-- tab responsive -->
		<script type="text/javascript">
			$("<a class='right tab-control'><i class='fa fa-angle-right' style='position:absolute;margin-top:-8px;right:5px;cursor:pointer;'></i></a>").appendTo($(".nav-tabs li:not(:last-child)")).each(function(i){
			    var thisLi  = $(this).parents("ul").first().children("li:nth-child("+(i+1)+")"),
			        thisTab = $(thisLi).children("a[href]"),
			        nextLi  = $(this).parents("ul").first().children("li:nth-child("+(i+2)+")"),
			        nextTab = $(nextLi).children("a[href]");
			    $(this).click(function() {
			        $(thisLi).hide();
			        $(nextLi).show();
			        $(nextTab).tab('show');
			    });
			});
			$("<a class='left tab-control'><i class='fa fa-angle-left' style='position:absolute;margin-top:-8px;left:5px;cursor:pointer;'></i></a>").prependTo($(".nav-tabs li:not(:first-child)")).each(function(i){
			    var thisLi = $(this).parents("ul").first().children("li:nth-child("+(i+2)+")"),
			        thisTab = $(thisLi).children("a[href]"),
			        prevLi = $(this).parents("ul").first().children("li:nth-child("+(i+1)+")"),
			        prevTab = $(prevLi).children("a[href]");
			    $(this).click(function() {
			        $(thisLi).hide();
			        $(prevLi).show();
			        $(prevTab).tab('show');
			    });
			});
			$(".nav-tabs li:first-child").prepend("<span class='left tab-control-spacer'> </span>");
			$(".nav-tabs li:last-child").append("<span class='right tab-control-spacer'> </span>");
		</script>
		<!--google language-->
		<script type="text/javascript">
		/*function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
		}*/
		</script>
		<!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<!--google language end-->
		<noscript>activate javascript</noscript>
	</body>
</html>