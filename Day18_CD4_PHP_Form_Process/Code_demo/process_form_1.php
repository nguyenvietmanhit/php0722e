<!--form_process_1.php-->

<!--
Demo form HTML
1 - Các thuộc tính của thẻ form:
+ action: đường dẫn (url/file) nhận dữ liệu gửi lên từ form,
chuỗi rỗng = đường dẫn hiện tại
+ method: có 2 giá trị
POST: url giữ nguyên sau khi submit vì dữ liệu gửi đi
theo kiểu truyền ngầm, bảo mật hơn GET (đăng nhập)
PHP tạo sẵn 1 mảng $_POST lưu tất cả dữ liệu từ form gửi lên
GET: url thay đổi gắn thêm ?name=value&name1=value1, chức năg
tìm kiếm, $_GET
2 - Thuộc tính name của input: bắt buộc phải khai báo vì PHP
dựa vào name để biết đc dữ liệu là của input nào gửi lên
3 - Quy trình xử lý form
-->
<?php
// + B1: Debug: dựa vào method của form để debug biến PHP tương
//ứng
echo '<pre>';
print_r($_POST);
echo '</pre>';
// + B2: Khai báo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// + B3: Check nếu submit form rồi thì mới xử lý form
if (isset($_POST['info'])) {
    // + B4: Lấy giá trị từ form
    $fullname = $_POST['fullname'];
    // + B5: Validate form: nếu có lỗi gán cho biến error
    // - Tên phải nhập: empty
    // - Tên ít nhất 3 ký tự: strlen
    if (empty($fullname)) {
        $error = 'Tên phải nhập';
    } else if (strlen($fullname) < 3) {
        $error = 'Tên ít nhất 3 ký tự';
    }
    // + B6: Xử lý logic chính chỉ khi ko có lỗi nào xảy ra
    if (empty($error)) {
        $result = "Họ tên của bạn: $fullname";
    }
}
// + B7: Hiển thị error và result ra form
// + B8: Hiển thị dữ liệu đã nhập ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="POST">
    Nhập tên:
    <input type="text" name="fullname"
   value="<?php
echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>">
    <br>
    <input type="submit" name="info" value="Hiển thị tên">
</form>
<!--Thực hành lại bài này với method = GET -->