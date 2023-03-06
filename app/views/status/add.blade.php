@extends('layout.main')
@section('content')
    <h3>Trang thêm bài viết</h3>
    @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
        <ul style="list-style: none">
            @foreach($_SESSION['errors'] as $error)
                <li style="color: red;text-align: center">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']) )
        <p style="color: green;text-align: center">{{ $_SESSION['success'] }}</p>
    @endif

    <form method="post" style="text-align: center"  action="{{router('addstpost')}}">
        <span>Tiêu đề:</span><input name="intro" placeholder="intro"/> <br>
        <span>Nội dung:</span><input name="detail" placeholder="nội dung"/> <br>
        <button name="btn_them">thêm</button>

    </form>
    <a class="addcate" style="" href="{{router('status')}}"><p>Về Trang Danh sách bài đăng</p></a>
@endsection