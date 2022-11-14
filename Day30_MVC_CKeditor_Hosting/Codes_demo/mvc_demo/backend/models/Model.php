<?php
// models/Model.php
class Model {
    const DB_DSN = 'mysql:host=localhost;dbname=php0722e_mvc;port=3306';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    public $connection;
    public function __construct() {
        try {
            $this->connection = new PDO(Model::DB_DSN,
                Model::DB_USERNAME,
                Model::DB_PASSWORD);
        } catch (PDOException $e) {
            die('Lỗi kết nối: ' . $e->getMessage());
        }
    }
}
