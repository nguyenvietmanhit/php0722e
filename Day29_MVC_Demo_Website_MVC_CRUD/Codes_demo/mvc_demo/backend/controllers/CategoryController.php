<?php
//controllers/CategoryController.php
require_once 'models/Category.php';
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
    //index.php?controller=category&action=create
    public function create() {
        // - Controller xử lý submit
        // B1:
        echo '<pre>';
        print_r($_POST);
        print_r($_FILES);
        echo '</pre>';
        // B2:
        // B3:
        if (isset($_POST['submit'])) {
            // B4:
            $name = $_POST['name'];
            $avatars = $_FILES['avatar'];
            // B5:
            if (empty($name)) {
                $this->error = 'Tên phải nhập';
            }
            // B6:
            if (empty($this->error)) {
                // - Controller gọi Model để insert vào csdl
                $category_model = new Category();
                $is_insert = $category_model->insertData($name);
                var_dump($is_insert);
            }
        }

        // - Controller gọi View để hiển thị giao diện
        $this->page_title = 'Form thêm mới';
        $this->content =
        $this->render('views/categories/create.php');
        require_once 'views/layouts/main.php';
    }
}