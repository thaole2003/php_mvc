<?php
namespace App\Controllers;
interface InterfaceController{
     function index();
     function add();
     function edit($id);
     function addpost();
     function editpost($id);
     function delete($id);

};
