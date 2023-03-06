@extends('layout.main')
@section('content')
    <form action="{{router('addvcpost')}}" method="post" style="display: grid">
        <h3>Thêm danh mục</h3>
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
        <div class="form" style="display: grid">
            <label>Tên mã giảm giá : </label>
            <input name="namevc" placeholder="">
        </div>
        <button class="btnEdit" name="btnadd">add</button>
        <a class="return" href="{{router('voucher')}}">về trang danh sách</a>
    </form>
@endsection