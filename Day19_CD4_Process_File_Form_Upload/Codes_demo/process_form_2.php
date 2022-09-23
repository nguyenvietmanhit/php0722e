<!--process_form_2.php-->
<?php
// + B1: Debug
echo '<pre>';
print_r($_GET);
echo '</pre>';
// + B2: Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B3: Check nếu submit form thì mới xử lý:
if (isset($_GET['submit'])) {
    // + B4: Lấy giá trị form:
    $email = $_GET['email'];
    $age = $_GET['age'];
    // - Báo lỗi ở radio và checkbox nếu như ko tích chọn
    //, cần chú ý với 2 input này
    // $gender = $_GET['gender'];
    // $jobs = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];
    // + B5: Validate:
    // - Email phải đúng định dạng
    // - Tuổi phải là số
    // - Gender và Jobs bắt buộc phải chọn
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email phải đúng định dạng';
    } else if (!is_numeric($age)) {
        $error = 'Tuổi phải là số';
    } else if (!isset($_GET['gender'])) {
        $error = 'Phải chọn giới tính';
    } else if (!isset($_GET['jobs'])) {
        $error = 'Phải chọn ít nhất 1 job';
    }
    // + B6: Xử lý logic bài toán chỉ khi hệ thống ko có lỗi
    if (empty($error)) {
        $result = "Email: $email <br>";
        $result .= "Age: $age <br>";
        // Xử lý gender
        $gender = $_GET['gender'];
        $gender_text = '';
        switch ($gender) {
            case 0: $gender_text = 'Nữ';break;
            case 1: $gender_text = 'Nam';break;
            case 2: $gender_text = 'Khác';break;
        }
        $result .= "Gender: $gender_text <br>";
        // Xử lý jobs
        $jobs = $_GET['jobs']; //
        $job_text = '';
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $job_text .= 'Dev ';break;
                case 1: $job_text .= 'Tester ';break;
                case 2: $job_text .= 'BA ';break;
            }
        }
        $result .= "Nghề nghiệp: $job_text <br>";
        // Select xử lý giống hệt radio, Textarea giống hệt input
        //thường
    }
}
// + B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="GET">
    Nhập email:
    <input type="text" name="email" value="" >
    <br>
    Nhập tuổi:
    <input type="text" name="age" value="" >
    <br>
    Chọn giới tính:
<!--  PHP dựa vào value của radio để biết đc chọn radio nào  -->
    <input type="radio" name="gender" value="0"> Nữ
    <input type="radio" name="gender" value="1"> Nam
    <input type="radio" name="gender" value="2"> Khác
    <br>
    Chọn nghề nghiệp:
<!--  Với các input có thể chọn nhiều giá trị tại 1 thời điểm
  , name bắt buộc phải ở dạng mảng: checkbox, select multiple,
  file multiple-->
    <input type="checkbox" name="jobs[]" value="0">Dev
    <input type="checkbox" name="jobs[]" value="1">Tester
    <input type="checkbox" name="jobs[]" value="2">BA
    <br>
    Chọn quốc gia:
    <select name="country">
        <option value="0">Viet Nam</option>
        <option value="1">Korea</option>
        <option value="2">Japan</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note" cols="10"></textarea>
    <br>
    <input type="submit" name="submit" value="Show">
</form>