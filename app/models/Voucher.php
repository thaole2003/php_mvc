<?php
namespace App\Models;
class Voucher extends BaseModel{
    public $table = 'voucher';
    public function getall(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function edit($id,$name){
$sql = "UPDATE $this->table SET name =? WHERE id = ?";
$this->setQuery($sql);
return $this->execute([$name,$id]);
    }
    public function add($id,$name){
        $sql = "INSERT INTO $this->table values(?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name]);
    }
    public function delete($id){
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getone($id){
        $sql = "select * from $this->table where id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }


}