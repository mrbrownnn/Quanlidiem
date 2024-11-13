@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm Ngành Học</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Thêm Ngành Học</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm Ngành Học</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{URL::to('/save-major')}}" method="post">
        {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Ngành Học</label>
          <input type="text" class="form-control" name="major_id" id="exampleInputEmail1" placeholder="Mã Ngành Học">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên Ngành Học </label>
          <input type="text" class="form-control" name="major_name" id="exampleInputPassword1" placeholder="Tên Ngành Học">
        </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return alert('Bạn thêm ngành học thành công ^^')" name="save-major" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

  @endsection