<?php
//controllers/Controller.php
class Controller
{
    public $page_title; //tiêu đề trang
    public $error; //lỗi
    public $content; //nội dung file view (layout động)

    // Trả về nội dung từ đường dẫn $file_path
    public function render($file_path, $variables = []) {
        extract($variables);
        ob_start();
        require_once $file_path;
        $view = ob_get_clean();
        return $view;
    }
}
