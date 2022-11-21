<?php
//controllers/UserController.php
require_once 'models/User.php';
require_once 'controllers/Controller.php';
class UserController extends Controller {

    //index.php?controller=user&action=register
    public function register() {
        // - Controller xử lý submit form
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($this->error)) {
                // Mã hóa mật khẩu theo thuật toán bcypt:
                $password_hash = password_hash($password,
                    PASSWORD_BCRYPT);
                var_dump($password_hash);
                // Controller gọi Model:
                $user_model = new User();
                $is_register = $user_model
                    ->register($username, $password_hash);
                var_dump($is_register);
            }
        }
        // - Controller gọi View
        $this->page_title = 'Đăng ký user';
        $this->content =
            $this->render('views/users/register.php');
        //Sử dụng layout khác
        require_once 'views/layouts/layout_login.php';
    }

    //index.php?controller=user&action=login
    public function login() {
        // - Controller xử lý submit
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($this->error)) {
                // - Controller gọi Model để truy vấn lấy bản
                //ghi với username gửi lên
                $user_model = new User();
                $user = $user_model->getByUsername($username);
                echo '<pre>';
                print_r($user);
                echo '</pre>';
                if (empty($user)) {
                    $this->error = "Ko tồn tại tài khoản $username";
                } else {
                    // - Lấy ra pass đã mã hóa của user khi tìm thấy
                    //ở bước trên
                    $password_hash = $user['password'];
                    // - Dùng hàm của PHP để so khớp pass từ form
                    //và pass mã hóa đó
                    $is_login = password_verify($password, $password_hash);
                    var_dump($is_login);
                    if ($is_login) {
                        $_SESSION['user'] = $user;
                        header('Location: index.php?controller=category');
                        exit();
                    }
                    $this->error = 'Sai tài khoản hoặc mật khẩu';

                }

            }
        }

        // - Controller gọi View
        $this->page_title = 'Form đăng nhập';
        $this->content =
            $this->render('views/users/login.php');
        require_once 'views/layouts/layout_login.php';
    }
}