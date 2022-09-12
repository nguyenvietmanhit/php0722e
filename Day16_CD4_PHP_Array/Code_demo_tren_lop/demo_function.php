<?php
//demo_function.php
// 1 - Hàm thao tác với chuỗi:
// + Lấy độ dài chuỗi:
$count = strlen('manhnv');
var_dump($count); //6
// + Đếm số từ trong 1 chuỗi
$str = 'Kim Anh';
echo str_word_count($str); //2
// + Chuyển chuỗi ký tự hoa
echo strtoupper('kim anh'); //KIM ANH
// + Chuỗi chuỗi ký tự thường
echo strtolower('KIM ANH'); //kim anh
// + Chuyển ký tự đầu tiên thành ký tự hoa
echo ucfirst('kim anh'); //Kim anh
// + Cắt chuỗi:
echo substr('manhnv', 0, 2); //ma
// 2 - Hàm thao tác với số
// + Ktra phải số hay ko
 $check = is_numeric('abc'); //false
// + ktra kiểu dữ liệu: is_int, is_float, is_string
// + Làm tròn theo phần thập phân: nếu phần thập phân  >= 5 thì làm
//tròn lên 1 đơn vị, ngược lại
echo '<br>';
echo round(14.7); //15
echo '<br>';
echo round(14.786545, 2); //14.79
// + Làm tròn lên số nguyên gần nhất
echo ceil(14.1);  //15
// + Làm tròn xuống số nguyên gần nhất, ngược với ceil
echo floor(14.1); //14
// + Lấy giá trị max, min:
echo max(2, 3, 5); //5
echo min(2, 3, 5); //2
// + Định dạng số theo hàng ngìn:
echo 1000000000;
echo number_format(1000000000); //1,000,000,000
echo number_format
(1000000000, 0, '.', '.');
//1.000.000.000
// 3 - Hàm thao tác thời gian:
//  + Set múi giờ hiện tại:
date_default_timezone_set('Asia/Ho_Chi_Minh');
//  + Định dạng ngày giờ:
echo date('d-m-Y H:i:s');
// + Lấy thời gian tính bằng giây, tính từ thời điểm hiện tại
//so với mốc 01-01-1970
echo '<br>';
echo time();
// + Lấy thời gian tính bằng giây của 1 ngày giờ bất kỳ:
echo '<br>';
echo strtotime('1990-12-05 12:20:10');