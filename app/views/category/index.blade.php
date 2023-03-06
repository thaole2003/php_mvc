@extends('layout.main')
@section('content')

<table class="table">
    <h3 style="margin: 0 auto;text-align: center;">Danh sách danh mục</h3>

    @if(isset($_SESSION['success']) && isset($_GET['msg']) )
        <p style="color: green;text-align: center">{{ $_SESSION['success'] }}</p>
    @endif
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Thao tác</th>


    </tr>
    </thead>
    <tbody>
    @foreach ($CategoryList as $index => $value)
    <tr>
        <th scope="row"> {{$index+1}}</th>
        <td> {{$value->name}} </td>
        <td>
            <a style="color: black;text-decoration: none" href="editCa/{{$value->id}}">Sửa</a>
            <a onclick="deleteCate('delete/{{$value->id}}') ">Xóa</a>
        </td>

    </tr>
    @endforeach
    </tbody>
</table>
<a class="addcate" style="" href="add"><p>Thêm danh mục</p></a>

@endsection