
    @extends('layout.main')
    @section('content')
<form action="{{router('editpost/'.$id)}}" method="POST" style="display: grid">
    <h3>Sửa danh mục</h3>
    @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
        <ul>
            @foreach($_SESSION['errors'] as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']) )
        <span style="color: green">{{ $_SESSION['success'] }}</span>
    @endif

    <div class="form" style="display: grid">
        <label>Sửa tên : </label>
        <input name="nameCate" placeholder="Nhập tên danh mục"
               value="<?= $oneCate->name ?>">
    </div>

    <button class="btnEdit" name="update">Sửa</button>
    <a class="return" href="{{router('list')}}">về trang danh sách</a>
</form>
@endsection
