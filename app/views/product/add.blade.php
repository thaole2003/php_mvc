



@extends('layout.main')
@section('content')

        <h3 style="margin: 0 auto;text-align : center;">Thêm sản phẩm</h3>

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
      <form method="post"  style="text-align: center;margin: 10px;padding: 10px" action="{{router('addpropost')}}" enctype="multipart/form-data">
          <span>Tên</span><input name="namepro" placeholder="tên sản phẩm"/><br>
          <span>Giá</span><input name="price" placeholder="giá sản phẩm"/><br>
          <span>Danh mục</span><select name="cate_id">
              @foreach($category as $index =>$value)
              <option value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
          </select><br>
          <span>Thông tin</span><input name="detail" placeholder="thông tin sản phẩm"/><br>
          <span>Ảnh</span><input type="file" name="image" placeholder="ảnh sản phẩm"/><br>
          <span>Chọn mã giảm giá</span><select name="voucher_id">
              @foreach($voucher as $index =>$value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
          </select><br>
          <button name="btn_addpro">thêm</button>
      </form>
    <a class="addcate" style="" href="{{router('product')}}"><p>Về Trang Sản Phẩm</p></a>
@endsection