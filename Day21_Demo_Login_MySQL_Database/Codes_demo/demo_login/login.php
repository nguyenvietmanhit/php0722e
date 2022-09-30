<!--demo_login /-->
<!--           /login.php: form đăng nhập user-->
<!--           /logout.php: đăng xuất user-->
<!--           /welcome.php: hiển thị tên user khi
                             login thành công-->
<!--login.php-->
<?php
session_start();
// - Nếu tồn tại cookie username thì chuyển hướng
// tới trang welcome
if (isset($_COOKIE['username'])) {
    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    // Khởi tạo session username:
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: welcome.php');
    exit();
}

// - Nếu đăng nhập rồi thì chuyển hướng tới trang welcome
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
    header('Location: welcome.php');
    exit();
}

// - B1:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// - B2:
$error = '';
$result = '';
// - B3:
if (isset($_POST['login'])) {
    // - B4:
    $username = $_POST['username'];
    $password = $_POST['password'];
    // - B5:
    // + Username password ko đc để trống: empty
    // + Username phải có dạng email: filter_var
    if (empty($username) || empty($password)) {
        $error = 'Username password ko đc để trống';
    } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = 'Username phải có dạng email';
    }
    // - B6:
    if (empty($error)) {
        // + Xử lý đăng nhập: sử dụng session để lưu phiên
        // đăng nhập, chỉ xảy ra khi đăng nhập thành công
        // Giả sử đăng nhập thành công là khi mật khẩu = 123
        if ($password == 123) {
            // Đăng nhập thành công
            // + Lưu cookie cho Ghi nhớ đăng nhập và chỉ lưu khi
            // tích vào checkbox
            if (isset($_POST['remember'])) {
                //
                setcookie('username', $username, time() + 3600);
            }
            // + Username sẽ đc hiển thị ở file welcome.php
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Đăng nhập thành công';
            // Chuyển hướng sang trang Welcome welcome.php
            header('Location: welcome.php');
            // Kết thúc header luôn là exit để chuyển hướng
            //thành công trong mọi trường hợp
            exit();
//            echo '<pre>';
//            print_r($_SESSION);
//            echo '</pre>';
        } else {
            $error = 'Sai username hoặc password';
        }
    }
}
// - B7:
?>
<h3 style="color: red">
    <?php
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
</h3>
<h3 style="color: blue">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>

<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<h1>Form đăng nhập</h1>
<form action="" method="post">
    Username:
    <input type="text" name="username" >
    <br>
    Password:
    <input type="password" name="password">
    <br>
<!--  Nếu chỉ có 1 checkbox thì name ko cần ở dạng mảng  -->
    <input type="checkbox" name="remember"> Remember me
    <br>
    <input type="submit" name="login" value="Login">
</form>