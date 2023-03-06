<?php
namespace App\Models;
class User extends BaseModel{
public $table = 'user';

public function getall(){
    $sql ="select * from $this->table";
    $this->setQuery($sql);
    return $this->loadAllRows();
}
    public function getone($id){
        $sql ="select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
public function add($id,$name,$sdt,$email){
    $sql = "INSERT INTO $this->table values(?,?,?,?)";
    $this->setQuery($sql);
   return $this->execute([$id,$name,$sdt,$email]);
}
public function delete($id){
    $sql ="DELETE FROM `$this->table` WHERE id = ?";
    $this->setQuery($sql);
    return $this->execute([$id]);
}
    public function edit($id,$name,$sdt,$email){
        $sql = "update $this->table set name = ?,sdt =?,email = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name,$sdt,$email,$id]);
    }

}