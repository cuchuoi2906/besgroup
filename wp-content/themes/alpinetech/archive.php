<?php
/*
 Template Name: Archive
*/
get_header();
$category = get_queried_object();
$category_title = $category->name;
$category_id = $category->term_id;
$archive_background = get_field('archive_background', $category);
$background_main_visual = get_field('background_main_visual', 'option');
?>
<div class="headtitle loadit" data-ani="fadeInUp" style="background-image:url('<?php echo $archive_background ?? $background_main_visual ?>')">
	<div class="container">
		<div class="headtitle__ins flexbox">
			<h1 class="pagetitle">
				<?php echo $category_title ?>
			</h1>
		</div>
	</div>
</div>

<div class="section main_body p-top secondpages loadit" data-ani="fadeInUp" >
	<div class="container">
		<div class="tabs tabs-default mt-5">		
			<div class="tab-content">			
				<?php
					$args = array(
						'post_status'              => 'publish',
						'posts_per_page'           => 50,
						'cat'                      => $category_id,
						'orderby'                  => 'publish_date'
					);
					$the_query = new WP_Query($args);
				?>
				<div class="tab-pane fade <?php echo $key == 0 ? 'active' : '' ?>" id="tab<?php echo $key ?>">
					<div class="showcase showcase-product">
						<?php
						$row = 0;
						while ($the_query->have_posts()) :
							$the_query->the_post();
							$post_id = get_the_ID();
							$post_title = get_the_title();
							$post_img = get_field('thumbnail');
							$post_description = get_field('discription');
							++$row;
							$is_odd = ($row % 2 === 1);
						?>
							<div class="fww-tb showcase-product-post">
								<a href="<?php echo get_permalink(); ?>" class="showcase-img">
									<img src="<?php echo $post_img ?>" alt="" />
								</a>
								<div class="showcase-text">								
									<div class="loadit" data-ani="fadeInUp">
										<a href="<?php echo get_permalink(); ?>">
											<h2 class="fz24-md mb10 font-larger lh15 f-manrope lh12"><?php echo $post_title; ?></h2>
										</a>
										<p class="lead mb-0"><?php echo $post_description; ?></p>
										<!-- <a class="mt20 fsc underline readmore" href="<?php // echo get_permalink(); 
																											?>">Xem thêm <i class="fa fa-arrow-right ml5"></i></a> -->
									</div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
				</div>			
			</div>
		</div>
	</div>
	<section class="section-testi contactsec pt70 pb70 pt40-md pb40-md" style="background:#003885 url('<?php echo get_template_directory_uri() ?>/images/mv01.png') center bottom no-repeat">
		<div class="container loadit" data-ani="fadeInUp">
			<h2 class="cl-fff f-manrope fz13 center">Liên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất !</h2>
			<div class="mainmv_btn"><a class="btn btn-large btn-primary btn-main uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30" href="/lien-he">Liên Hệ Qua Email</a><a class="btn btn-large btn-border btn-border-white uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30" href="tel:096 933 0966">Gọi Trực Tiếp</a></div>
		</div>
	</section>
</div>
<?php
get_footer();
?>