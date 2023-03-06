



@extends('layout.main')
@section('content')

    <table class="table" style="text-align: center">
        <h3 style="margin: 0 auto;text-align: center;">Quản lí người dùng</h3>
        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <p style="color: green;text-align: center;">{{ $_SESSION['success'] }}</p>
        @endif
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">số đt</th>
            <th scope="col">Email</th>
            <th scope="col">thao tác</th>



        </tr>
        </thead>
        <tbody>
        @foreach ($user as $index => $value)
            <tr>
                <th scope="row"> {{$index+1}}</th>
                <td> {{$value->name}} </td>
                <td> {{$value->sdt}} </td>
                <td> {{$value->email}} </td>
                <td>
                    <a  style="color: black;text-decoration: none" href="edituser/{{$value->id}}">Sửa</a>
                    <a onclick="deleteuser('deleteuser/{{$value->id}}') ">Xóa</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="addcate" style="" href="{{router('adduser')}}"><p>Thêm người dùng</p></a>

@endsection