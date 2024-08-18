<?php
function custom_body_class($classes)
{
	// Thêm lớp body class tùy chỉnh vào đây
	$classes[] = 'toppage navlevel_2 navtype_default text_false logotype_image navstate_show';
	return $classes;
}
add_filter('body_class', 'custom_body_class');
