@extends('layout.main')
@section('content')
    <h3>Trang thêm người dùng</h3>
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

    <form method="post" style="text-align: center" action="{{router('adduserpost')}}">
    <span>Tên người dùng:</span><input name="hoten" placeholder="họ và tên"/> <br>
    <span>Số đt:</span><input name="sdt" placeholder="số điện thoại"/> <br>
    <span>Email:</span><input name="email" placeholder="Email"/> <br>
    <button name="btn_them">thêm</button>

</form>
    <a class="addcate" style="" href="{{router('customer')}}"><p>Về Trang Danh sách người dùng</p></a>

@endsection