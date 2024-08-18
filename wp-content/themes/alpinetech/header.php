<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Alpinetech_Theme
 * @since Alpinetech_Theme 1.0
 */

?>

<!DOCTYPE html>
<html>
<?php
get_template_part('template-parts/head');
?>

<body <?php body_class(); ?>>
	<header class="header">
		<!-- Header top -->
		<div class="top-nav">
			<div class="container">
				<div class="header_top">
					<div class="header_top_logo">
						<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<?php divclassid_the_custom_logo(); ?>
							<span class="span0"><?php echo get_bloginfo('name'); ?></span>
						</a>
					</div>
					<div class="header_top_info">
						<nav id="nav">
							<div class="container">
								<div class="nav__inside">									
									<?php custom_menu_output() ?>
									<div class="nav__inside__list__icon flag"><a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri() ?>/images/share/uk.png" alt=""></a></div>
								</div>
							</div>
						</nav>
						<div class="righticons">
							<div class="hamburger">
								<div class="hamburger_inside"><span></span><span></span><span></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</header>
