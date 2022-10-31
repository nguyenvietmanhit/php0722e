//mvc.php
// 1 - Mô hình MVC
// - Là kiến trúc phần mềm gồm 3 lớp Model - View - Controller
// - Là kiến trúc phổ biến xây dựng các website thực tế
// - Các Framework và CMS đều dựa trên MVC
// Laravel, Zend, Cacke ..
// Wordpress, Zoomla, Magento ...
// - Dựa trên OOP
// 2 - Thành phần MVC:
// + M: Model - chịu trách nhiệm truy vấn CSDL
// + V: View - chịu trách nhiệm hiển thị dữ liệu
// + C: Controller - Chịu trách nhiệm xử lý và luân chuyển dữ
//liệu giữa M và V -> trung gian
// 3 - Cấu trúc thư mục code MVC: phụ thuộc vào nền tảng của
//người code
// mvc_demo /
            /assets: chứa các tài nguyên của frontend
                   /css
                       /style.css
                   /js
                      /script.js
                   /images
                   /fonts
            /configs: chứa cấu hình hệ thống như CSDL, cache ...
                     /Database.php: class Database
            /controllers: chứa các class controller
                     /CategoryController.php
            /models: chứa các class model
                   /Category.php
            /views: chứa các file view
                  /categories:
                             /index.php: list category
                             /create.php: create category
                             /update.php: update category
                             /detail.php: detail category
                  /layouts
                          /main.php: file layout chính
            .htaccess:  cấu hình truy cập, url rewrite ...
            index.php: file index gốc của ứng dụng


