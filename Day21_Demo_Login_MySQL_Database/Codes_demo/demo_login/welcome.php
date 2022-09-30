<?php
session_start();
// - Luôn phải kiểm tra nếu user đăng nhập rồi thì mới cho
//truy cập trang này, dựa vào session username

if (!isset($_SESSION['username'])) {
    // Chuyển hướng về trang login
    $_SESSION['error'] = 'Bạn chưa đăng nhập, ko thể truy cập
    trang welcome';
    header('Location: login.php');
    exit();
}

//welcome.php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
<h3 style="color: green">
    <?php
        // Với các message dạng flash, chỉ hiển thị 1 lần
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
</h3>
<h2>Chào bạn, <?php echo $_SESSION['username']; ?></h2>
<a href="logout.php">Đăng xuất</a>