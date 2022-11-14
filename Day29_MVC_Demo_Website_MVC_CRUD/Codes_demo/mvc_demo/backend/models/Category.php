<?php
//models/Category.php
require_once 'models/Model.php';
class Category extends Model {
    public function updateData($id, $name, $file_name) {
        //B1:
        $sql_update = "UPDATE categories 
        SET name=:name,avatar=:avatar WHERE id=:id";
        //B2:
        $obj_update = $this->connection->prepare($sql_update);
        //B3:
        $updates = [
            ':name' => $name,
            ':avatar' => $file_name,
            ':id' => $id
        ];
        //B4:
        return $obj_update->execute($updates);
    }

    public function getOne($id) {
        //B1:
        $sql_select_one = "SELECT * FROM categories WHERE id=:id";
        //B2:
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        //B3:
        $selects = [
            ':id' => $id
        ];
        //B4:
        $obj_select_one->execute($selects);
        //B5:
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }

    public function insertData($name, $file_name) {
        // B1:
        $sql_insert = "INSERT INTO categories(name,avatar) 
        VALUES(:name,:avatar)";
        // B2:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3:
        $inserts = [
            ':name' => $name,
            ':avatar' => $file_name
        ];
        // B4:
        return $obj_insert->execute($inserts);
    }

    public function getAll() {
        //B1:
        $sql_select_all = "SELECT * FROM categories";
        //B2:
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);
        //B3:
        //B4:
        $obj_select_all->execute();
        //B5:
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }


}
