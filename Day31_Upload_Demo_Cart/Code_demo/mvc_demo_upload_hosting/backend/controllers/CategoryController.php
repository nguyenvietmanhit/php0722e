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
                // - Upload file nếu có file đc tải lên
                $file_name = '';
                if ($_FILES['avatar']['error'] == 0) {
                    // Tạo thư mục lưu file
                    $dir_upload = "uploads";
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    $file_name = time() . "-" . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'],
                    "$dir_upload/$file_name");
                }

                // - Controller gọi Model để insert vào csdl
                $category_model = new Category();
                $is_insert = $category_model->insertData($name, $file_name);
                if ($is_insert) {
                $_SESSION['success'] = 'Thêm thành công';
                header('Location:index.php?controller=category&action=index');
                exit();
                }
            }
        }

        // - Controller gọi View để hiển thị giao diện
        $this->page_title = 'Form thêm mới';
        $this->content =
        $this->render('views/categories/create.php');
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=category&action=index
    public function index() {
        // - Controller gọi Model
        $category_model = new Category();
        $categories = $category_model->getAll();
        echo '<pre>';
        print_r($categories);
        echo '</pre>';

        // - Controller gọi View
        $this->page_title = 'Danh sách danh mục';
        $this->content =
            $this->render('views/categories/index.php', [
                'categories' => $categories
            ]);
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=category&action=update&id=
    public function update() {
        // - Controller gọi Model lấy danh mục theo id
        $id = $_GET['id']; //check validate trước khi gọi
        $category_model = new Category();
        $category = $category_model->getOne($id);

        // - Controller xử lý submit form
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
                // - Upload file nếu có file đc tải lên
                // MẶc định tên file đc lấy từ danh mục
                $file_name = $category['avatar'];
                if ($_FILES['avatar']['error'] == 0) {
                    // Tạo thư mục lưu file
                    $dir_upload = "uploads";
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    // Xóa file cũ cho đỡ rác hệ thống:
                    unlink("$dir_upload/$file_name");
                    $file_name = time() . "-" . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'],
                        "$dir_upload/$file_name");

                }

                // - Controller gọi Model để update vào csdl
                // $category_model = new Category();
                $is_update = $category_model->updateData($id, $name, $file_name);
                var_dump($is_update);
            }
        }

        // - Controller gọi View
        $this->page_title = 'Trang update';
        $this->content =
            $this->render('views/categories/update.php', [
                'category' => $category
            ]);
        require_once 'views/layouts/main.php';
    }
}