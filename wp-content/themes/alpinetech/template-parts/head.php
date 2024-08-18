<?php
/**
 * The template part for displaying Head
 *
 * @package WordPress
 * @subpackage Raintemplates
 * @since Raintemplates 1.0
 */
?>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- if IEmeta(http-equiv='X-UA-Compatible', content='IE=edge,chrome=1')-->
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<title><?php wp_title(); ?></title>
    <meta name="keywords" content="BES, phần mềm, chuyển đổi số, nông nghiệp, cách mạng, giải pháp">
    <meta name="description" content="Công ty hàng đầu cung cấp Giải pháp hệ thống phần mềm và Dịch vụ công nghệ mang tính kết nối, chuyển đổi số;  hướng tới các Tổ chức, Doanh nghiệp và Xã hội;">
	<?php
		// Lấy tiêu đề và mô tả của trang
		$title = get_post_meta(get_the_ID(), '_yoast_wpseo_title', true);
		$description = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);

		// Hiển thị tiêu đề và mô tả
		if (!empty($title)) {
			echo '<title>' . esc_html($title) . '</title>';
		}

		if (!empty($description)) {
			echo '<meta name="description" content="' . esc_attr($description) . '">';
		}
	?>

    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="format-detection" content="telephone=no">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.png" sizes="32x32">
    <!-- Canonical -->
    <link rel="canonical" href="">
    <!-- CSS MAIN-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/jqueryvendor/owlcarousel/owl.carousel.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/jqueryvendor/owlcarousel/owl.theme.default.min.css" media="screen">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/base.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">
    <!--JS MAIN -->
    <script src="<?php echo get_template_directory_uri() ?>/jqueryvendor/jquery/jquery.js"></script>
  </head>