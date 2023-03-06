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
        <span style="color: green;text-align: center">{{ $_SESSION['success'] }}</span>
    @endif

    <form method="post" style="text-align: center" action="{{router('editstpost/'.$onestt->id)}}">
        <span>Tiêu đề:</span><input name="intro" placeholder="intro" value="{{$onestt->intro}}"/> <br>
        <span>Nội dung:</span><input name="detail" placeholder="nội dung" value="{{$onestt->detail}}"/> <br>
        <button name="btn_them">sửa</button>

    </form>
    <a class="addcate" style="" href="{{router('status')}}"><p>Về Trang Danh sách bài đăng</p></a>

@endsection