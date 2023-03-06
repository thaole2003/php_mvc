<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', [App\Controllers\CategoryController::class, 'index']);

$router->get('list', [App\Controllers\CategoryController::class, 'index']);
$router->get('add', [App\Controllers\CategoryController::class, 'add']);
$router->post('addpost', [App\Controllers\CategoryController::class, 'addpost']);
$router->get('editCa/{id}', [App\Controllers\CategoryController::class, 'edit']);
$router->post('editpost/{id}', [App\Controllers\CategoryController::class, 'editpost']);
$router->get('delete/{id}', [App\Controllers\CategoryController::class, 'delete']);
//router của sản phẩm
$router->get('product', [App\Controllers\ProductController::class, 'index']);
$router->get('addpro', [App\Controllers\ProductController::class, 'add']);
$router->post('addpropost', [App\Controllers\ProductController::class, 'addpost']);
$router->get('deletePro/{id}', [App\Controllers\ProductController::class, 'delete']);
$router->get('editpro/{id}', [App\Controllers\ProductController::class, 'edit']);
$router->post('editpropost/{id}', [App\Controllers\ProductController::class, 'editpost']);

//tạo router đến trang danh sách người dùng
$router->get('customer',[App\Controllers\UserController::class,'index']);
//tạo router dẫn đến trang thêm người dùng
$router->get('adduser',[App\Controllers\UserController::class,'add']);
//tạo router đến hàm thực hiện thêm người dùng
$router->post('adduserpost',[App\Controllers\UserController::class,'addpost']);
//tạo router sửa người dùng
$router->get('edituser/{id}',[App\Controllers\UserController::class,'edit']);
//tạo router xử lí sửa ng dùng
$router->post('edituserpost/{id}',[App\Controllers\UserController::class,'editpost']);
//tạo router xóa người dùng
$router->get('deleteuser/{id}',[App\Controllers\UserController::class,'delete']);
//router đến bài viết
$router->get('status',[App\Controllers\StatusController::class,'index']);
$router->get('deleteST/{id}',[App\Controllers\StatusController::class,'delete']);
$router->get('addst',[App\Controllers\StatusController::class,'add']);
$router->post('addstpost',[App\Controllers\StatusController::class,'addpost']);
$router->get('editst/{id}',[App\Controllers\StatusController::class,'edit']);
$router->post('editstpost/{id}',[App\Controllers\StatusController::class,'editpost']);
//voucher
$router->get('voucher',[App\Controllers\VoucherController::class,'index']);
$router->get('deletevc/{id}',[App\Controllers\VoucherController::class,'delete']);
$router->get('addvc',[App\Controllers\VoucherController::class,'add']);
$router->post('addvcpost',[App\Controllers\VoucherController::class,'addpost']);
$router->get('editvc/{id}',[App\Controllers\VoucherController::class,'edit']);
$router->post('editvcpost/{id}',[App\Controllers\VoucherController::class,'editpost']);















# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>