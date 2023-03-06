@extends('layout.main')
@section('content')

    <table class="table">
        <h3 style="margin: 0 auto;text-align: center;">Danh sách bài viết</h3>

        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <p style="color: green;text-align: center">{{ $_SESSION['success'] }}</p>
        @endif
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Người đăng</th>


        </tr>
        </thead>
        <tbody>
        @foreach ($status as $index => $value)
            <tr>
                <th scope="row"> {{$index+1}}</th>
                <td> {{$value->intro}} </td>
                <td> {{$value->detail}} </td>
                <td> {{$value->uname}} </td>
                <td>
                    <a style="color: black;text-decoration: none" href="editst/{{$value->id}}">Sửa</a>
                    <a onclick="deleteST('deleteST/{{$value->id}}') ">Xóa</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="addcate" style="" href="addst"><p>Thêm Bài Viết</p></a>

@endsection