<?php
namespace App\Models;
require_once 'vendor/autoload.php';
class Status extends BaseModel{
    public $table = 'status';
    public function getall(){
        $sql = "SELECT t.*,u.name as uname FROM $this->table as t join user as u where t.id_user = u.id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function delete($id){
        $sql = "DELETE  FROM $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);

    }
    public function add($id,$intro,$detail,$id_user){
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$intro,$detail,$id_user]);
    }
    public function deletesttbyidu($idu){
        $sql ="DELETE FROM $this->table WHERE id_user= ?";
        $this->setQuery($sql);
        return $this->execute([$idu]);
    }
    public function getone($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function edit($id,$intro,$detail){
        $sql = "UPDATE $this->table SET intro = ?,detail =? WHERE id =?";
        $this->setQuery($sql);
        return $this->execute([$intro,$detail,$id]);
    }
}