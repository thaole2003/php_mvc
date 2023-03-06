<?php
namespace App\Controllers;
require_once 'vendor/autoload.php';
use  App\Models\Product;
use App\Models\Category;
class CategoryController extends BaseController implements InterfaceController{
    public $category;
    public $product;


    public function __construct()
    {
        $this->product= new Product();
        $this->category = new Category();
    }

    public function index() {

        $CategoryList =$this->category->getall();
        $this->render('category.index',compact('CategoryList'));

    }
    public function edit($id){

            $oneCate = $this->category->getone($id);

            $this->render('category.edit', compact('oneCate','id'));


    }
    public function editpost($id){

        if(isset($_POST['update'])){

            $errors=[];
            if(strlen(trim($_POST['nameCate']))==0){
                $errors['err_name']='yêu cầu nhập tên';
            }
            if(count($errors)>0){

                redirect('errors',$errors,'editCa/'.$id);

            }else{
                $this->category->edit($id,$_POST['nameCate']);
                redirect('success','sửa thành công','list');
//                $_SESSION['success']='sửa thành công';
//                header('location:'.BASE_URL.'list');
            }

        }
        }


    public  function delete($id){

        $this->product->deleteproductbycate_id($id);
            $this->category->delete($id);
            header('location:http://localhost/php2/assignment/list');
    }
    public function add(){
        $this->render('category.add');
    }
    public function addpost(){
        $errors=[];
        if(isset($_POST['btnadd'])) {

            if (strlen(trim($_POST['nameCate'])) == 0) {
                $errors['err_name']='yêu cầu nhập tên';

            }
            if(count($errors)>0){
//                $_SESSION['errors']=$errors;
//                header('location:'.BASE_URL.'add');
                redirect('errors',$errors,'add');

            }else{
                $this->category->add($_POST['nameCate']);

                redirect('success','thêm thành công','add');

            }


        }
    }
}
