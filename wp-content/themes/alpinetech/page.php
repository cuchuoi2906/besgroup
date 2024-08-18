<?php
get_header();
$background_main_visual = get_field('background_main_visual', 'option');
$pape_title = get_the_title();
?>
<div class="headtitle loadit" data-ani="fadeInUp" style="background-image:url('<?php echo $background_main_visual ?>')">
	<div class="container">
		<div class="headtitle__ins flexbox">
			<h1 class="pagetitle">
				<?php echo $pape_title ?>
			</h1>
		</div>
	</div>
</div>
<div class="section main_body p-top secondpages otherpages loadit" data-ani="fadeInUp" >
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile; // End of the loop.
		?>
	</div>	
</div>
<section class="section-testi contactsec pt70 pb70 pt40-md pb40-md" style="background:#003885 url('<?php echo get_template_directory_uri() ?>/images/mv01.png') center bottom no-repeat">
		<div class="container loadit" data-ani="fadeInUp">
			<h2 class="cl-fff f-manrope fz13 center">Liên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất !</h2>
			<div class="mainmv_btn"><a class="btn btn-large btn-primary btn-main uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30" href="/lien-he">Liên Hệ Qua Email</a><a class="btn btn-large btn-border btn-border-white uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30" href="tel:096 933 0966">Gọi Trực Tiếp</a></div>
		</div>
	</section>
<?php
get_footer();
?>
