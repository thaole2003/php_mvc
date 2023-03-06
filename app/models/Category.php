<?php
namespace App\Models;
require_once 'vendor/autoload.php';

class Category extends  BaseModel {
    public $table = 'categories';

    public function getall(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getone($id){
        $sql = "SELECT * FROM $this->table WHERE id= ?";
        $this->setQuery($sql);

        return $this->loadRow([$id]);
    }
    public function edit($id,$name){
        $sql = "UPDATE $this->table SET name= ? WHERE id = ?";
        $this->setQuery($sql);

        return  $this->execute([$name,$id]);
    }
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id= ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function add($name){
        $sql = "INSERT INTO $this->table(name) VALUES (?)";
        $this->setQuery($sql);

        return  $this->execute([$name]);
    }
}