<!--crud_user/sql_injection.php
Lỗi bảo mật SQL Injection: tấn công can thiệp vào
câu truy vấn ban đầu, qua form
-->
<?php
require_once 'connection.php';
if (isset($_GET['submit'])) {
    $fullname = $_GET['fullname'];
    // - Cách chống SQL Injection:
    // lọc dữ liệu lấy từ form bằng hàm sau:
    $fullname = mysqli_real_escape_string($connection, $fullname);

    // Truy vấn CSDL
    // + Viết truy vấn: SELECT
    $sql_select_all =
    "SELECT * FROM users WHERE fullname LIKE '%$fullname%'";
    //  123456' OR fullname != '
    // SELECT * FROM users
    // WHERE fullname LIKE '%123456' OR fullname != '%'
    var_dump($sql_select_all);
    // + Thực thi
    $result_all = mysqli_query($connection, $sql_select_all);
    // + Trả về mảng kết hợp 2 chiều:
    $users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    echo '<pre>';
    print_r($users);
    echo '</pre>';

}
?>
<h2>Tìm kiếm</h2>
<form action="" method="get">
    Nhập tên:
    <input type="text" name="fullname" value="" />
    <input type="submit" name="submit" value="Tìm kiếm" />
</form>
