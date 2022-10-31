<?php
session_start();
//mvc_demo/backend/index.php
// - Code backend -> frontend
// - Code Website dựa trên mô hình MVC -> CRUD danh mục
// - Thứ tự code trong MVC:
// + Code index.php gốc trước -> C -> M & V
// File index gốc là file đầu tiên sẽ nhận request gửi lên,
//phân tích url -> gọi controller tương ứng

// - Set múi giờ
date_default_timezone_set('Asia/Ho_Chi_Minh');
// - Phân tích url:
// + URL chuẩn:
// Thêm mới: index.php?controller=category&action=create
// Liệt kê: index.php?controller=category&action=index
// Sửa: index.php?controller=category&action=update&id=3
// Xóa: index.php?controller=category&action=delete&id=3
// + Lấy controller:
$controller = isset($_GET['controller']) ? $_GET['controller']
    : 'home'; // category
// + Lấy action (phương thức trong class controller)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
// create
//index.php?controller=category&action=create
// - Gọi controller bằng cách nhúng file:
// category -> CategoryController.php
$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
// Lưu đường dẫn tới controller, trong MVC mọi đường dẫn đều
//phải xuất phát từ file index gốc
$controller_path = "controllers/$controller.php";
if (!file_exists($controller_path)) {
    die('Trang bạn tìm ko tồn tại 404');
}
require_once $controller_path;
//
$obj = new $controller(); // $obj = new CategoryController()
if (!method_exists($obj, $action)) {
    die("Phương thức $action ko tồn tại trong class $controller");
}
$obj->$action();
//index.php?controller=category&action=create
