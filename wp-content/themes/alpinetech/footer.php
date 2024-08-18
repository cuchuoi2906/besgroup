<footer class="footer pt70">
	<div class="container">
		<div class="row">
			<div class="colp-4-1 col-2_20-lg col-1-md mb20-lg">
				<p class="mb20">
					<a href="<?php echo get_home_url() ?>" class="custom-logo-link" rel="home" aria-current="page">
						<img width="242" height="60" src="<?php echo get_template_directory_uri() ?>/images/logo_white.png" class="custom-logo" alt="BES" decoding="async">
					</a>
				</p>
				<?php 
					$footerInfo = get_field('footer_description', 'option');						
				?>
				<?php echo $footerInfo ?>
			</div>
			<div class="colp-2-2 col-2_20-lg col-1-md mb20-lg">
				<div class="linklist linklist-default linklist-arrow linklist-arrow-type1">
					<h2>Liên Kết</h2>
					<?php local_footer_1() ?>
				</div>
			</div>
			<div class="colp-3-3 col-2_20-lg col-1-md mb20-lg">
				<div class="contactlist linklist linklist-default linklist-arrow linklist-arrow-type1">
					<h2>Sản Phẩm và Dịch Vụ</h2>
					<?php local_footer_2() ?>
				</div>
			</div>
			<div class="colp-3-4 col-2_20-lg col-1-md mb20-lg">
				<div class="contactform">					
					<?php echo do_shortcode('[contact-form-7 id="187" title="Form liên hệ 1"]') ?>
				</div>
			</div>
		</div>
	</div>
	<div class="page_top_cont">
		<div class="page_top">
			<div class="to_top"><a class="lh00" href="javascript:void(0)"><img src="<?php echo get_template_directory_uri() ?>/images/share/backtop.png" alt="PAGE UP"></a></div>
		</div>
	</div>
	<div class="footbottom">
		<div class="container">
			<div class="row">
				<div class="col-2-0">
					<p>Copyright 2023 BES</p>
				</div>
				<div class="col-2-0">
					<ul class="fce">
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-instagram"></i></a></li>
						<li><a href=""><i class="fa fa-pinterest"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<script id="__bs_script__">//<![CDATA[
  (function() {
    try {
      var script = document.createElement('script');
      if ('async') {
        script.async = true;
      }
      script.src = 'http://HOST:3001/browser-sync/browser-sync-client.js?v=2.29.3'.replace("HOST", location.hostname);
      if (document.body) {
        document.body.appendChild(script);
      } else if (document.head) {
        document.head.appendChild(script);
      }
    } catch (e) {
      console.error("Browsersync: could not append script tag", e);
    }
  })()
//]]></script>
<script src="<?php echo get_template_directory_uri() ?>/jqueryvendor/anyview/anyview.js"></script>
<script>
	$(document).ready(function() {
		$(".loadit").AniView({
			animateThreshold: 30,
			scrollPollInterval: 30
		});
	});
</script>
<script src="<?php echo get_template_directory_uri() ?>/jqueryvendor/owlcarousel/owl.carousel.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/jqueryvendor/lightbox/lightbox.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>
<!-- Structured data settings -->
<script>
	lightbox.option({
		'resizeDuration': 200,
		'wrapAround': true
	})
</script>
<script>
	$('.mainvs').owlCarousel({
		loop: true,
		navigation: true,
		nav: true,
		navText: ['', ''],
		margin: 0,
		autoplay: true,
		autoplayTimeout: 7000,
		autoplaySpeed: 100,
		responsiveClass: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		items: 1,
		dots: true,
	});
	for (var m = 1; m <= 5; m++) {
		$('.owlslider-item-' + m).owlCarousel({
			loop: true,
			navigation: true,
			nav: true,
			navText: ['', ''],
			margin: 0,
			autoplay: true,
			autoplayTimeout: 7000,
			autoplaySpeed: 100,
			responsiveClass: true,
			dots: true,
			items: m
		});
	}
</script>