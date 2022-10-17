<?php
//crud_user/delete.php
session_start();
require_once 'connection.php';

// + Bắt id từ url kèm cơ chế validate
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID ko hợp lệ';
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
// + Truy vấn CSDL:
// B1: Viết truy vấn:
$sql_delete = "DELETE FROM users WHERE id = $id";
// B2: Thực thi:
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    $_SESSION['success'] = 'Xóa thành công';
} else {
    $_SESSION['error'] = 'Xóa thất bại';
}
header('Location: index.php');
exit();
// Quản lý thêm thông tin ảnh đại diện của user:
// + Bảng users tạo 1 trường để lưu lại thông tin file: trường
// avatar chỉ lưu tên file: 124343abc.png
// uploads/124343abc.png