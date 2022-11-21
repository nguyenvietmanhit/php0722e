<!--views/layouts/layout_login.php
- Dựng layout động: chứa các thành phần chung như header,
footer, chỉ có phần main thay đổi động theo từng chức năng
- Cách ghép layout từ giao diện AdminLTE có sẵn:
+ Copy css, js, images từ giao diện vào thư mục
assets của MVC
+ Copy toàn bộ nội dung file trang chủ HTML vào file layout
main.php: mockup/backend/index.html -> main.php
+ Ktra lại toàn bộ đường dẫn css, js, images... đã đúng theo
cấu trúc MVC chưa
+ Chuyển thành layout động: hiển thị ra các thuộc tính của
controller thành các giá trị động
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

<div class="container">
    <?php echo $this->content; ?>

    <div class="alert alert-danger">
        <?php echo $this->error; ?>
    </div>
</div>

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!--Tích hợp CKEditor-->
<!--<script src="assets/ckeditor/ckeditor.js"></script>-->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<!--Tích hợp vào textarea-->
<script>
    $(document).ready(function() {
        // Tích hợp CKFinder vào CKEditor
        CKEDITOR.replace('description' , {
            //đường dẫn đến file ckfinder.html của ckfinder
            filebrowserBrowseUrl: 'assets/ckfinder_php.8.x/ckfinder.html',
            //đường dẫn đến file connector.php của ckfinder
            filebrowserUploadUrl: 'assets/ckfinder_php.8.x/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    })
</script>
</body>
</html>
