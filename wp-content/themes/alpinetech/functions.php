<?php require_once('inc/page-header.php'); ?>
<?php require_once('inc/pagination.php'); ?>
<?php require_once('inc/util_lib.php'); ?>
<?php require_once('function/function.php'); ?>
<?php require_once('function/bodyclass.php'); ?>
<?php require_once('function/custom_menu.php'); ?>
<?php require_once('function/postype_homeui.php'); ?>
<?php require_once('function/postype_optionpage.php'); ?>
<?php require_once('function/breadcrumb.php'); ?>
<?php
// Kiểm tra và hạn chế tần suất request từ cùng một IP
function limit_requests_from_ip() {
    // Số lượng request tối đa cho phép trong khoảng thời gian
    $max_requests = 3; // Số lượng request tối đa cho phép
    $time_period = 1; // Khoảng thời gian (giây)

    $ip = $_SERVER['REMOTE_ADDR']; // Lấy địa chỉ IP của client

    // Kiểm tra xem IP đã được lưu trong transient không
    $request_count = get_transient("ip_request_count_$ip");

    if ($request_count === false) {
        // Nếu transient không tồn tại, tạo mới và đặt giá trị ban đầu là 1
        set_transient("ip_request_count_$ip", 1, $time_period);
    } else {
        // Ngược lại, tăng giá trị hiện tại của transient lên 1
        $request_count++;
        set_transient("ip_request_count_$ip", $request_count, $time_period);
    }

    // Kiểm tra xem số lượng request từ IP có vượt quá giới hạn không
    if ($request_count > $max_requests) {
        // Nếu vượt quá, hiển thị thông báo hoặc thực hiện hành động bạn muốn ở đây
        die("Bạn đã vượt quá số lượng request cho phép trong khoảng thời gian này.");
    }
}

// Hook vào quá trình xử lý request của WordPress
add_action('init', 'limit_requests_from_ip');
?>