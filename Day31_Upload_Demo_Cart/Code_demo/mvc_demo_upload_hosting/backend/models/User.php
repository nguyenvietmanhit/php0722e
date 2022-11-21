<?php
//User.php
require_once 'models/Model.php';
class User extends Model {
    public function register($username, $password_hash) {
        $sql_insert = "INSERT INTO users(username, password)
VALUES(:username, :password)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':username' => $username,
            ':password' => $password_hash
        ];
        return $obj_insert->execute($inserts);
    }

    public function getByUsername($username) {
        $sql_select_one = "SELECT * FROM users 
        WHERE username=:username";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects = [
            ':username' => $username
        ];
        $obj_select_one->execute($selects);
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }
}
?>