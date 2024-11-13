@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm Sinh Viên</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Thêm Sinh Viên</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm Sinh Viên</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{URL::to('/save-student')}}" method="POST">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Sinh Viên</label>
          <input type="text" name="student_id" class="form-control" id="exampleInputEmail1" placeholder="Mã Sinh Viên">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Họ Đệm</label>
          <input type="text" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Họ Đệm">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên</label>
          <input type="text" name="firstname" class="form-control" id="exampleInputPassword1" placeholder="Tên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giới Tính</label>
            <br>
            <input type="radio" value="1" id="radioPrimary3" name="gender" > Nam   
            <input type="radio" value="0" style="margin-left:200px;" id="radioPrimary3" name="gender" >  Nữ
            <input type="radio" value="2" style="margin-left:200px;" id="radioPrimary3" name="gender" >  Khác
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ngày Sinh</label>
            <input type="date" class="form-control" name="dob" id="exampleInputPassword1" placeholder="Ngày Sinh">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Quê Quán</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ">
        </div> 
        <div class="form-group">
            <label for="exampleInputPassword1">Lớp</label>
            <select class="form-control select2" name="class_id" style="width: 100%;">
                <option selected="selected">--Chọn Lớp--</option>
                @foreach ($class_list as $key => $class)
                   <option value="{{$class->class_id}}">{{$class->class_name}}-{{$class->course_id}}</option>
                @endforeach
                
              </select>
        </div> 
        
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="save_student">Thêm</button>
      </div>
    </form>
  </div>
@endsection