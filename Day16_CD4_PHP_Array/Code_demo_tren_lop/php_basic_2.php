<?php
//echo 'Hello';
// 1 - Hàm
// + Là tập các dòng code xử lý logic
// + Tính chất quan trọng nhất của hàm là : sử dụng lại
// - Cú pháp khai báo: giống hệt JS, tham khảo lại phần hàm
//của JS
function showName($name) {
    echo "Hello: $name";
}
showName('Kim Anh'); //Hello: Kim Anh
// 2 - Truyền biến vào hàm theo kiểu tham trị và tham chiếu
// + Viết hàm để đổi giá trị của biến bên ngoài hàm
$number = 5;
echo "<br> Ban đầu biến number = $number";
function changeNumber($num) {
    $num = 1;
    echo "<br> Biến bên trong hàm = $num";
}
changeNumber($number);
echo "<br> Sau khi gọi hàm, biến number = $number"; //5
// -> biến ban đầu ko thay đổi giá trị sau khi gọi hàm -> truyền
//tham trị
$number = 6;
echo "<br> Ban đầu biến number = $number";
function changeNumber2(&$num) {
    $num = 2;
    echo "<br> Biến bên trong hàm = $num";
}
changeNumber2($number);
echo "<br> Sau khi gọi hàm, biến number = $number"; //2
//-> truyền tham chiếu
// -> sự khác nhau giữa truyền tham trị và tham chiếu: tham trị
//chỉ truyền bản sao của biến gốc, tham chiếu là truyền chính
//biến gốc vào
// 3 - Một số hàm nhúng file: include, include_once, require,
//require_once
// Tạo 1 file cùng cấp file hiện tại: test_embed.php
// + include_once và require_once kiểm tra trc đó đã nhúng file
//hay chưa, nếu chưa nhúng thì nó mới nhúng
// + Khi nhúng 1 file ko tồn tại, include/include_once báo lỗi
//nhưng code phía sau đoạn bị lỗi vẫn chạy đc, ngược lại cho
//require/require_once
require 'dsadasadsdas.txt';
echo '<br>Code test nhúng file';
//include_once 'test_embed.php';
//include_once 'test_embed.php';
// -> nên sử dụng hàm require_once để nhúng file


?>

