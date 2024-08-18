<?php get_header(); ?>
<div class="section main_body p-top">
	<div class="mainmv">
		<?php		
		$background = get_group_field('main_visual', 'background');
		$gallery = get_group_field('main_visual', 'images_gallery');
		?>
		<div class="mainvs owl-theme owl-carousel custom_class">
			<?php
			$main_slider = get_field('main_slider');
			foreach ($main_slider as $key => $slide) :
			?>
				<div class="item-owl">
					<div class="bgmv" style="background-image:url(<?php echo $slide['background'] ?>">
						<div class="container">
							<div class="mainmv-c center-md m0a">
								<h2 class="cl-fff fz40 fz36-sm loadit" data-ani="fadeInUp"><?php echo $slide['title'] ?></h2>
								<div class="mainmv_desp loadit" data-ani="fadeInUp">
									<p class='lh20 lh16-md cl-fff mt20 mb20 lsp05 max-w50p max-w100p-md font-medium fz16-md mt10-md'>
										<?php echo $slide['content'] ?>
									</p>
								</div>
								<div class="mainmv_btn loadit" data-ani="fadeInUp">
									<?php
									$buttons = $slide['buttons'];
									foreach ($buttons as $key2 => $button) :
										$class = $key2 == 'button_1' ? 'btn btn-large  btn-primary btn-main uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30' : 'btn btn-large btn-border btn-border-white uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30';
										if (isset($button) && !empty($button)) :
									?>
											<a href='<?php echo  $button["url"] ?>' class='<?php echo $class ?>' id='<?php echo $key2 ?>'>
												<?php echo $button['title'] ?>
											</a>
									<?php
										endif;
									endforeach;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			endforeach;
			?>			
		</div>
		<!-- <div class="mainvIllust"> -->
			<?php
			// foreach ($gallery as $image) {
			// 	$image_url = $image['url'];
			// 	$image_width = $image['width'];
			// 	$image_height = $image['height'];
			?>
				<!-- <div class="loadit" data-ani="fadeInRightBig"><img src="<?php // echo $image_url ?>" alt=""></div> -->
			<?php
			//}
			?>
		<!-- </div> -->
	</div>


	<section class="pb50 pb40-md section1">
		<?php
		$p_title = get_group_field('production', 'title');
		$p_content = get_group_field('production', 'content');
		$p_tabs = get_group_field('production', 'tab_content');
		?>
		<div class="sectiontitle center loadit" data-ani="fadeInUp">
			<div class="container">
				<div class="text_center pt50 pb50 cl-000">
					<h2 class="mt6 mb6"><?php echo $p_title ?></h2>
					<div class="font-normal">
						<div class='max-w63p m0a max-w100p-md txt' style="display:none"><?php echo trim($p_content) ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="tabs tabs-default mt-5">
				<ul class="nav-tabs">
					<?php foreach ($p_tabs as $key => $p_tab) { ?>
						<li class="nav-item"><a class="nav-link <?php echo $key == 0 ? 'active' : '' ?>" href="#tab<?php echo $key ?>"><?php echo $p_tab['tab_name'] ?></a>
						<?php } ?>
				</ul>
				<div class="tab-content">
					<?php foreach ($p_tabs as $key => $p_tab) { ?>
						<?php
						$args = array(
							'post_status'              => 'publish',
							'posts_per_page'           => 3,
							'cat'                      => $p_tab['tab_category'],
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
												<h2 class="fz24-md mb10 font-larger lh15 f-manrope lh12"><?php echo $post_title; ?></h2>
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
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<section class="bgcl-f3f4f5 pb50 pt50 pb40-md pt40-md">
		<?php
		$busi_title = get_group_field('business_areas', 'title');
		$busi_content = get_group_field('business_areas', 'content');		
		?>
		<div class="sectiontitle center loadit" data-ani="fadeInUp">
			<div class="container">
				<div class="text_center pb50 cl-000">
					<h2 class="mt6 mb6"><?php echo trim($busi_title) ?></h2>
					<div class="lead mb-0 txt loadit" data-ani="fadeInUp" style="max-width:600px; margin: 0 auto; line-height: 0px !important; color: #666 !important;">
						<?php echo trim($busi_content) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="column-service-6 vusion01-section vusion02-service mb20 mt20">
			<?php
				$business_areas = get_field('business_areas', 'option');
			?>	
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

	<section class="section01 pt50 pb60 pt20-md pb20-md">
		<div class="column-service-3 vusion01-section mb20 mt20">
			<div class="container">
				<div class="logoexpert">
					<?php divclassid_the_custom_logo(); ?>
				</div>
				<div class="row">
					<?php
					$general_information = get_field('general_information');
					foreach ($general_information as $key => $info) {
					?>
						<div class="center col-3-50 col-3_20-lg col-1-md mb30-md">
							<div class="loadit" data-ani="fadeInUp">
								<a class="column_icon_a" href="<?php echo $info['link']['url'] ?>">
									<img src="<?php echo $info['icon_image'] ?>" alt="" />
									<h2 class="font-medium mt14 mb14"><?php echo trim($info['title']) ?></h2>
									<p class="txt"><?php echo trim($info['content']) ?></p>
									<img class="iconw" src="<?php echo  get_template_directory_uri() ?>/images/more.svg" alt="" class="arrow" />
								</a>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<section class="section01 pt50 pb60 pt20-md pb20-md section_partners">		
		<?php 
			$partners = get_field('partners');																
			foreach ($partners as $key => $partner) : ?>
		<a href="javascript:void(0)">
			<img src="<?php echo esc_url($partner['sizes']['medium']); ?>" alt="" />
		</a>
		<?php endforeach; ?>		
	</section>

	<section class="section-testi contactsec pt70 pb70 pt40-md pb40-md" style="background:#003885 url('<?php echo get_template_directory_uri() ?>/images/mv01.png') center bottom no-repeat">
		<div class="container loadit" data-ani="fadeInUp">
			<h2 class="cl-fff f-manrope fz13 center">Liên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất !</h2>
			<div class="mainmv_btn"><a class="btn btn-large btn-primary btn-main uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30" href="/lien-he">Liên Hệ Qua Email</a><a class="btn btn-large btn-border btn-border-white uppercase lsp1 btn-medium-md btn-normal-sm btn-arrow por br30" href="tel:096 933 0966">Gọi Trực Tiếp</a></div>
		</div>
	</section>
</div>
<?php get_footer(); ?>