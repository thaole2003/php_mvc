<?php
namespace App\Models;
require_once 'vendor/autoload.php';
use App\Models\BaseModel;
class Product extends BaseModel {
    protected $table = 'product';

    public function getall(){

        $sql = "SELECT p.*,c.name as cname,v.name as vname FROM $this->table as p JOIN categories as c JOIN voucher as v  WHERE p.cate_id =c.id and p.id_voucher = v.id";

        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function add($id,$name,$price,$cate_id,$detail,$img,$voucher_id){
        $sql ="INSERT INTO $this->table values(?,?,?,?,?,?,?)";

        $this->setQuery($sql);
        return $this->execute([$id,$name,$price,$cate_id,$detail,$img,$voucher_id]);
    }
    public function getone($id){
        $sql ="select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function edit($id,$name,$price,$cate_id,$detail,$img){
        $sql = "update $this->table set name = ?,price =?,cate_id = ?,detail = ?,img = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name,$price,$cate_id,$detail,$img,$id]);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id= $id";

        return $this->getData($sql);
    }
    public function deleteproductbycate_id($id_cate){
        $sql = "DELETE FROM $this->table WHERE $this->table.cate_id = ?";
$this->setQuery($sql);
return $this->execute([$id_cate]);
    }

}

//?>