



@extends('layout.main')
@section('content')

    <h3 style="margin: 0 auto;text-align : center;">sửa sản phẩm</h3>

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
    <form method="post"  style="text-align: center;margin: 10px;padding: 10px" action="{{router('editpropost/'.$oneProduct->id)}}">
        <span>Tên</span><input name="namepro" placeholder="tên sản phẩm" value="{{$oneProduct->name}}"/><br>
        <span>Giá</span><input name="price" placeholder="giá sản phẩm" value="{{$oneProduct->price}}"/><br>
        <span>Danh mục</span><select name="cate_id">
            @foreach($category as $index =>$value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
        </select><br>
        <span>Thông tin</span><input name="detail" value="{{$oneProduct->detail}}" placeholder="thông tin sản phẩm"/><br>
        <span>Ảnh</span><input name="image" value="{{$oneProduct->img}}" placeholder="ảnh sản phẩm"/><br>
        <button name="btn_addpro">sửa</button>
    </form>

    <a class="addcate" style="" href="{{router('product')}}"><p>Về Trang Sản Phẩm</p></a>
@endsection