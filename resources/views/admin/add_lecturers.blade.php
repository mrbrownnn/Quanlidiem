@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm Giảng Viên</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Thêm Giảng Viên</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm Giảng Viên</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{URL::to('/save-lecturers')}}" method="post">
        {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Giảng Viên</label>
          <input type="text" class="form-control" name="lecturers_id" id="exampleInputEmail1" placeholder="Mã Giảng Viên">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Họ Và Tên </label>
          <input type="text" class="form-control" name="lecturers_name" id="exampleInputPassword1" placeholder="Họ và Tên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giới Tính</label>
            <br>
            <input type="radio" id="radioPrimary3" value="1" name="gender" > Nam   
            <input type="radio" style="margin-left:200px;" value="0" id="radioPrimary3" name="gender" >  Nữ
            <input type="radio" style="margin-left:200px;" value="2" id="radioPrimary3" name="gender" >  Khác
            
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return alert('Bạn thêm giảng viên thành công ^^')" name="save-lecturers" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

  @endsection