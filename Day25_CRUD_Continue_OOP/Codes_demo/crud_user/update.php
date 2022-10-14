<!--crud_user/update.php
- U - Update trong CRUD
+ Lấy thông tin bản ghi tương ứng với id từ url đổ ra form
+ Xử lý submit để update vào CSDL
Url:
update.php?id=2
+ Tận dùng lại chức năng thêm mới create.php
-->
<?php
session_start();
require_once 'connection.php';
// + Lấy thông tin user từ id trên URL, đổ ra form
// - Lấy id từ url: update.php?id=2
// Cần validate id này trước khi lấy
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID ko hợp lệ';
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
// Truy vấn CSDL lấy bản ghi theo id:
// B1: Viết truy vấn: SELECT 1 bản ghi
$sql_select_one = "SELECT * FROM users WHERE id = $id";
// B2: Thực thi: SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về mảng 1 chiều:
$user = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($user);
echo '</pre>';

// - XỬ LÝ FORM
// B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// B2: Tạo biến chứa lỗi và kết quả:
$error = '';
// B3: Check nếu user submit form thì mới xử lý form
if (isset($_POST['submit'])) {
    // B4: Tạo biến:
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    // B5: Validate:
    // - Ko đc để trống 2 trường: empty
    // - Tuổi phải là số: is_numeric
    if (empty($fullname) || empty($age)) {
        $error = 'Ko đc để trống 2 trường';
    } elseif (!is_numeric($age)) {
        $error = 'Tuổi phải là số';
    }
    // B6: Xử lý logic chính là UPDATE vào db chỉ khi nào ko
    //có lỗi
    if (empty($error)) {
        // + Truy vấn CSDL:
        // B1: Viết truy vấn:
        $sql_update =
"UPDATE users SET fullname = '$fullname', age = $age
WHERE id = $id";
        // B2: Thực thi
        $is_update = mysqli_query($connection, $sql_update);
//        var_dump($is_update);
        if ($is_update) {
            $_SESSION['success'] = 'Cập nhật thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
    }
}
// B7: Hiển thị error ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
    Họ tên:
    <input type="text" name="fullname"
           value="<?php echo isset($_POST['fullname']) ?
               $_POST['fullname'] : $user['fullname']; ?>" />

    <br />
    Tuổi:
    <input type="text" name="age"
           value="<?php echo isset($_POST['age']) ?
               $_POST['age'] : $user['age']; ?>" />
    <br/>
    <input type="submit" name="submit" value="Lưu user" />
    <a href="index.php">Về trang danh sách</a>
</form>
