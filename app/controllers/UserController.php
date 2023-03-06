<?php
namespace App\Controllers;
require_once 'vendor/autoload.php';
use App\Models\User;
use App\Models\Status;
class UserController extends  BaseController implements InterfaceController{
    public $user;
public $status;
    public function __construct()
    {
        $this->user= new User();
        $this->status= new Status();
    }


    public function index(){
        $user = $this->user->getall();
        $this->render('user.index',compact('user'));
    }

    public function add(){
        $this->render('user.add');
    }
    public function addpost(){

    $errors = [];
    if(isset($_POST['btn_them'])){
        //validate
        if(strlen($_POST['hoten'])==0){
            $errors['hoten']='yêu cầu nhập họ tên';
        }
        if(strlen($_POST['sdt'])==0){
            $errors['sdt']='yêu cầu nhập số điện thoại';
        }
        if(strlen($_POST['email'])==0){
            $errors['email']='yêu cầu nhập email';
        }
        if(count($errors)>0){
//            $_SESSION['errors'] = $errors;
//            header('location:'.BASE_URL.'adduser');
//            die();
            redirect('errors',$errors,'adduser');
        }else{
        $result=    $this->user->add(null,$_POST['hoten'],$_POST['sdt'],$_POST['email']);
        if($result){
//            $_SESSION['success']='Thêm thành công!';
//            header('location:'.BASE_URL.'adduser');
            redirect('success','thêm thành công','adduser');
        }

        }
    }
    }
    public function edit($id){
        $oneuser = $this->user->getone($id);
        $this->render('user.edit',compact('oneuser'));
    }
    public function editpost($id){
        $errors = [];
        if(isset($_POST['btn_them'])){
//            //validate
            if(strlen($_POST['hoten'])==0){
                $errors['hoten']='yêu cầu nhập họ tên';
            }
            if(strlen($_POST['sdt'])==0){
                $errors['sdt']='yêu cầu nhập số điện thoại';
            }
            if(strlen($_POST['email'])==0){
                $errors['email']='yêu cầu nhập email';
            }
            if(count($errors)>0){
//                $_SESSION['errors'] = $errors;
//                header('location:'.BASE_URL.'edituser/'.$id);
//                die();
                redirect('errors',$errors,'edituser/'.$id);
            }else{
                $result=$this->user->edit($id,$_POST['hoten'],$_POST['sdt'],$_POST['email']);
                if($result){
//                    $_SESSION['success']='sửa thành công!';
//                    header('location:'.BASE_URL.'customer');
                    redirect('success','sửa thành công','customer');
                }
            }
        }
    }
    public function delete($id){
$this->status->deletesttbyidu($id);
        $this->user->delete($id);
        header('location:'.router('customer'));
    }
}
