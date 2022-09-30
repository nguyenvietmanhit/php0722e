<?php
session_start();
//logout.php
// - Xóa session tạo ra lúc đăng nhập
unset($_SESSION['username']);
// Xóa cookie đã tạo
setcookie('username', '', time() - 1);
// - Chuyển hướng về trang login
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();
