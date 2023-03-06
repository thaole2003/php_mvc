<?php
namespace App\Controllers;
require_once 'vendor/autoload.php';
use App\Models\Product;
use App\Models\Category;
use App\Models\Voucher;

class ProductController extends BaseController implements InterfaceController{
    public $voucher;
    public $product;
    public $category;

    public function __construct()
    {
        $this->voucher= new Voucher();
        $this->category = new Category();
        $this->product = new Product();
    }
public function index(){
        $products = $this->product->getall();
$this->render('product.index',compact('products'));
}
public function add(){
    $voucher = $this->voucher->getall();
    $category = $this->category->getall();

        $this->render('product.add',compact('category','voucher'));
}
public function addpost(){
    var_dump($_FILES['image']);
if(isset($_POST['btn_addpro'])){
    $errors = [];
    if(strlen(trim($_POST['namepro'])) ==0){
        $errors['namepro']='yêu cầu nhập tên';
    }
    if(strlen(trim($_POST['price'])) ==0){
        $errors['price']='yêu cầu nhập giá';
    }
    if(strlen(trim($_POST['detail'])) ==0){
        $errors['detail']='yêu cầu nhập thông tin sp';
    }
    if(strlen($_FILES['image']['name'])==0){
                $errors['image']='yêu cầu chọn ảnh';

    }
//    if(strlen(trim($_POST['image'])) ==0){
//    }
    if(count($errors)>0){
//        $_SESSION['$errors'] = $errors;
//        header('location:'.BASE_URL.'addpro');
//        die();
        redirect('errors',$errors,'addpro');
    }else{
         $result =$this->product->add(null,$_POST['namepro'],$_POST['price'],$_POST['cate_id'],$_POST['detail'],$_FILES['image']['name'],$_POST['voucher_id']);
         if($result) {
//            $_SESSION['success']= 'thêm sp thành công';
//            header('location:'.BASE_URL.'addpro');
             redirect('success','thêm thành công','addpro');
         }
    }
}
    }
    public function edit($id){
        $category = $this->category->getall();
            $oneProduct = $this->product->getone($id);
        $this->render('product.edit',compact('oneProduct','category'));
    }
    public function editpost($id){

        if(isset($_POST['btn_addpro'])){
            $errors = [];
            if(strlen(trim($_POST['namepro'])) ==0){
                $errors['namepro']='yêu cầu nhập tên';
            }
            if(strlen(trim($_POST['price'])) ==0){
                $errors['price']='yêu cầu nhập giá';
            }
            if(strlen(trim($_POST['detail'])) ==0){
                $errors['detail']='yêu cầu nhập thông tin sp';
            }
            if(strlen(trim($_POST['image'])) ==0){
                $errors['image']='yêu cầu nhập ảnh';
            }
            if(count($errors)>0){
//                $_SESSION['$errors'] = $errors;
//                header('location:'.BASE_URL.'editpro/'.$id);
//                die();
                redirect('errors',$errors,'editpro/'.$id);
            }else{
                $result =$this->product->edit($id,$_POST['namepro'],$_POST['price'],$_POST['cate_id'],$_POST['detail'],$_POST['image']);
                if($result) {
//                    $_SESSION['success']= 'sửa sp thành công';
//                    header('location:'.BASE_URL.'product');
                    redirect('success','sửa thành công','product');
                }
            }
        }
    }

public function delete($id){

    $this->product->delete($id);
    header('location:'.BASE_URL.'product');
}
}
?>