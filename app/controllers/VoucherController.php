<?php
namespace App\Controllers;
use App\Models\Voucher;

class VoucherController extends BaseController implements InterfaceController{
    public $voucher;
 public function __construct()
 {
     $this->voucher = new  Voucher();
 }
 public function index(){
     $voucher = $this->voucher->getall();
     $this->render('voucher.index',compact('voucher'));
 }
 public function delete($id){
$this->voucher->delete($id);
redirect('success','xóa thành công 1 mã giảm giá','voucher');
 }
public function add(){
     $this->render('voucher.add');
}
public function addpost(){

    $errors=[];
    if(isset($_POST['btnadd'])) {

        if (strlen(trim($_POST['namevc'])) == 0) {
            $errors['err_name']='yêu cầu nhập mã giảm giá';

        }
        if(count($errors)>0){

            redirect('errors',$errors,'addvc');

        }else{
            $this->voucher->add(null,$_POST['namevc']);

            redirect('success','thêm thành công','addvc');

        }


    }
}
    public function edit($id){
     $onevoucher = $this->voucher->getone($id);
        $this->render('voucher.edit',compact('onevoucher'));
    }
    public function editpost($id){

        if(isset($_POST['update'])){

            $errors=[];
            if(strlen(trim($_POST['namevc']))==0){
                $errors['err_name']='yêu cầu mã giảm giá';
            }
            if(count($errors)>0){
//
                redirect('errors',$errors,'editvc/'.$id);

            }else{
                $this->voucher->edit($id,$_POST['namevc']);
                redirect('success','sửa thành công','voucher');

            }

        }
    }
}