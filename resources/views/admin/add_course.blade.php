@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm Khóa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Thêm Khóa</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm Khóa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{URL::to('/save-course')}}" method="post">
        {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Khóa</label>
          <input type="text" class="form-control" name="course_id" id="exampleInputEmail1" placeholder="Mã Khóa">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên Khóa </label>
          <input type="text" class="form-control" name="course_name" id="exampleInputPassword1" placeholder="Tên Khóa">
        </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return alert('Bạn thêm khóa thành công ^^')" name="save-course" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

  @endsection