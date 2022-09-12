<?php
//php_basic_3.php
// 1- Toán tử: là ký tự tính toán các toán hạng
// - Toán tử số học: + - * / % ++ --
$number = 5;
$sum = $number++ + ++$number; //11
 //      5       +    7
echo $sum;
// - Toán tử so sánh: == > >= < <= !=
// - Toán tử logic: && || !
// - Toán tử gán: =, +=, -=, *=, /=, %=
// 2 - Câu lệnh điều kiện: if, else, elseif, switch case
// If:
// If else
// If elseif else
// Switch case
// - Cú pháp viết tắt của câu lệnh điều kiện khi hiển thị 1 khối
//HTML phức tạp
// VD: Dùng PHP hiển thị 1 cấu trúc bảng 2 hàng, mỗi hàng 3 cột
//dựa theo 1 điều kiện nào đó
$is_check = true;
// + Hiển thị hoàn toàn bằng PHP
if ($is_check) {
    echo '<table border="1" cellpadding="8" cellspacing="0">';
        echo '<tr>';
            echo '<td>A</td>';
            echo '<td>B</td>';
            echo '<td>C</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>D</td>';
            echo '<td>E</td>';
            echo '<td>F</td>';
        echo '</tr>';
    echo '</table>';
}
// + Viết tách biệt code PHP và HTML (recommend)
?>

<?php if ($is_check): ?>
    <table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td>A</td>
        <td>B</td>
        <td>C</td>
    </tr>
    <tr>
        <td>D</td>
        <td>E</td>
        <td>F</td>
    </tr>
</table>
<?php endif; ?>

<!--Cấu trúc viết tắt của if else -->
<?php if ($is_check): ?>
<?php else: ?>
<?php endif; ?>
<!--Cấu trúc viết tắt if elseif else-->
<?php if (2 > 3): ?>
    <h1>H1</h1>
<?php elseif(5 > 2): ?>
    <h2>H2</h2>
<?php elseif(3 > 2): ?>
    <h3>H3</h3>
<?php else: ?>
    <h4>H4</h4>
<?php endif; ?>

<?php
// 3 - Toán tử điều kiện: ? :, thay thế cho if else khi logic
//là đơn giản
$number = 5;
if ($number > 0) {
    echo 'Number > 0';
} else {
    echo 'Number <= 0';
}
echo $number > 0 ? 'Number > 0' : 'Number <= 0';
// 4 - Vòng lặp: for, while, do...while
// 5 - Từ khóa break - continue
// + break: thoát hẳn vòng lặp
// + continue: bỏ qua lần lặp hiện tại, nhảy tới kế tiếp
?>
