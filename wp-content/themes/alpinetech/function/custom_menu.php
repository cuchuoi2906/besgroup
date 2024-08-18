<?php 
function custom_theme_setup() {
	register_nav_menu('custom-menu', 'Main Menu'); // Đăng ký custom menu với slug 'custom-menu' và tên 'Custom Menu'
}
add_action('after_setup_theme', 'custom_theme_setup');

function custom_menu_output() {
	wp_nav_menu(array(
		 'theme_location' => 'custom-menu', // Sử dụng custom menu đã đăng ký
		 'container' => '', // Loại bỏ container của menu
		 'menu_class' => 'nav__inside__list navheader', // Thêm lớp cho menu
		 'fallback_cb' => false, // Vô hiệu hóa menu dự phòng
		 'walker' => new Custom_Walker_Nav_Menu(), // Sử dụng Custom Walker để tạo cấu trúc menu con
	));
}

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	// Hàm ghi đè để tạo cấu trúc menu con
	function start_lvl(&$output, $depth = 0, $args = array()) {
		 $indent = str_repeat("\t", $depth);
		 $output .= "\n$indent<ul class=\"childmenu\">\n";
	}

	// Hàm ghi đè để tạo cấu trúc menu con
	function end_lvl(&$output, $depth = 0, $args = array()) {
		 $indent = str_repeat("\t", $depth);
		 $output .= "$indent</ul>\n";
	}
}


//footer

function custom_theme_setup_footer() {
	register_nav_menu('custom-menu-1', 'Menu Footer 1');
}
add_action('after_setup_theme', 'custom_theme_setup_footer');

function custom_theme_setup_footer2() {
	register_nav_menu('custom-menu-2', 'Menu Footer 2');
}
add_action('after_setup_theme', 'custom_theme_setup_footer2');

function local_footer_1() {
	wp_nav_menu(array(
		'theme_location' => 'custom-menu-1',
		'container' => '',
		'menu_class' => 'footer__list',
		'fallback_cb' => false, 
		'walker' => new Custom_Walker_Nav_Menu(),
	));
}
function local_footer_2() {
	wp_nav_menu(array(
		'theme_location' => 'custom-menu-2',
		'container' => '',
		'menu_class' => 'footer__list',
		'fallback_cb' => false, 
		'walker' => new Custom_Walker_Nav_Menu(),
	));
}