<?php
namespace App\Controllers;
require_once 'vendor/autoload.php';
use App\Models\Status;
class StatusController extends BaseController implements InterfaceController{
    public $status;
    public function __construct()
    {
        $this->status= new Status();
    }
    public function index(){
        $status = $this->status->getall();
        $this->render('status.index',compact('status'));
    }
    public function delete($id){
        $this->status->delete($id);
        redirect('success','xóa thành công 1 bài viết!','status');
    }
    public function add(){
        $this->render('status.add');
    }
    public function addpost(){
        $errors = [];
        if(isset($_POST['btn_them'])){
            //validate
            if(strlen($_POST['intro'])==0){
                $errors['intro']='yêu cầu nhập tiêu đề';
            }
            if(strlen($_POST['detail'])==0){
                $errors['detail']='yêu cầu nhập nội dung bài viết';
            }

            if(count($errors)>0){
                redirect('errors',$errors,'addst');
            }else{
                $result=$this->status->add(null,$_POST['intro'],$_POST['detail'],3);
                if($result){

                    redirect('success','thêm thành công','addst');
                }

            }
        }
    }
    public function edit($id){

        $onestt=$this->status->getone($id);
        $this->render('status.edit',compact('onestt'));
    }
    public function editpost($id){
        $errors = [];
        if(isset($_POST['btn_them'])){
            //validate
            if(strlen($_POST['intro'])==0){
                $errors['intro']='yêu cầu nhập tiêu đề';
            }
            if(strlen($_POST['detail'])==0){
                $errors['detail']='yêu cầu nhập nội dung bài viết';
            }

            if(count($errors)>0){
                redirect('errors',$errors,'editst/'.$id);
            }else{
                $result=$this->status->edit($id,$_POST['intro'],$_POST['detail']);
                if($result){

                    redirect('success','sửa thành công','status');
                }

            }
        }

    }
}