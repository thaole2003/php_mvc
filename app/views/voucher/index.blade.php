@extends('layout.main')
@section('content')

    <table class="table">
        <h3 style="margin: 0 auto;text-align: center;">Danh sách phiếu giảm giá</h3>

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
        @foreach ($voucher as $index => $value)
            <tr>
                <th scope="row"> {{$index+1}}</th>
                <td> {{$value->name}} </td>
                <td>
                    <a style="color: black;text-decoration: none" href="editvc/{{$value->id}}">Sửa</a>
                    <a onclick="deleteVC('deletevc/{{$value->id}}') ">Xóa</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="addcate" style="" href="addvc"><p>Thêm phiếu giảm giá</p></a>

@endsection