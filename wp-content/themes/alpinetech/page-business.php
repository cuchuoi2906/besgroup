<?php
/*
 Template Name: Business
*/
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
<div class="section main_body p-top secondpages loadit" data-ani="fadeInUp" >
	<div class="container">
		<div class="post_content">
			<?php
				while ( have_posts() ) :
					the_post();					
				endwhile; 
			?>
		</div>
		<section class="pb50 pt50 pb40-md pt40-md">
			<?php
			$business_areas = get_field('business_areas', 'option');
			?>	
			<div class="column-service-6 vusion01-section vusion02-service mb20 mt20">
				<div class="container">
					<div class="row">
						<?php foreach ($business_areas as $key => $services) { ?>
							<?php 
								$link = $services['link'];
								if (empty($link)) {
									$link = '#';
								} else {
									$link = $link['url'];
								}
							?>
							<div class="center vusion02-service-ct">
								<div class="loadit" data-ani="fadeInUp">									
									<a class="column_icon_a" href="<?php echo $link ?>"><img src="<?php echo $services['image'] ?>" alt="">
										<h2 class="font-medium mt14 mb14"><?php echo trim($services['title']) ?></h2>
										<p class="txt" style="display:none"><?php echo trim($services['content']) ?></p>
									</a>
								</div>
							</div>
						<?php
						} ?>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
get_footer();
?>