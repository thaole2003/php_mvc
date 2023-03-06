


@extends('layout.main')
@section('content')

    <table class="table">
        <h3 style="margin: 0 auto;text-align: center;">Quản lí sản phẩm</h3>

        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <p style="color: green;text-align: center">{{ $_SESSION['success'] }}</p>
        @endif
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">giá</th>
            <th scope="col">danh mục</th>
            <th scope="col">chi tiết</th>
            <th scope="col">ảnh</th>
            <th scope="col">mã giảm giá</th>
            <th scope="col">thao tác</th>



        </tr>
        </thead>
        <tbody>
        @foreach ($products as $index => $value)
            <tr>
                <th scope="row"> {{$index+1}}</th>
                <td> {{$value->name}} </td>
                <td> {{$value->price}} </td>
                <td> {{$value->cname}} </td>
                <td> {{$value->detail}} </td>
                <td> {{$value->img}} </td>
                <td> {{$value->vname}} </td>
                <td>
                    <a  style="color: black;text-decoration: none" href="editpro/{{$value->id}}">Sửa</a>
                    <a onclick="deleteProduct('deletePro/{{$value->id}}') ">Xóa</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="addcate" style="" href="addpro"><p>Thêm sản phẩm</p></a>

@endsection