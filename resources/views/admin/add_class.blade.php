@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm Lớp Học</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Thêm Lớp Học</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm Lớp Học</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{URL::to('/save-class')}}" method="post">
        {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Lớp Học</label>
          <input type="text" class="form-control" name="class_id" id="exampleInputEmail1" placeholder="Mã Ngành Học">
        </div>
        <div class="form-group">
            <label>Ngành Học</label>
            <select class="form-control select2" style="width: 100%;" name="major_id">
              <option selected="selected">--Chọn Ngành Học--</option>
              @foreach ($major_list as $item => $major)
                 <option value="{{$major->major_id}}">{{$major->major_name}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên Lớp Học</label>
          <input type="text" class="form-control" name="class_name" id="exampleInputPassword1" placeholder="Tên Lớp Học">
        </div>
        <div class="form-group">
            <label>Giáo Viên Chủ Nhiệm</label>
            <select class="form-control select2" style="width: 100%;" name="lecturers_id">
              <option  selected="selected">--Chọn Giáo Viên--</option>
              @foreach ($lecturers_list as $item => $teacher)
                 <option value="{{$teacher->lecturers_id}}">{{$teacher->lecturers_name}}</option>
              @endforeach
             </select>
          </div>
          <div class="form-group">
            <label>Khóa </label>
            <select class="form-control select2" style="width: 100%;" name="course_id">
              <option  selected="selected">--Chọn Khóa--</option>
              @foreach ($course_list as $item => $course)
                 <option value="{{$course->course_id}}">{{$course->course_id}}</option>
              @endforeach
             </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Số Lượng Sinh Viên</label>
            <input type="text" class="form-control" name="student_qty" id="exampleInputPassword1" placeholder="Số Lượng Sinh Viên">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Thời Gian Bắt Đầu</label>
            <input type="date" class="form-control" name="start_time" id="exampleInputPassword1" placeholder="Thời Gian Bắt Đầu">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Thời Gian Kết Thúc</label>
            <input type="date" class="form-control" name="end_time" id="exampleInputPassword1" placeholder="Thời Gian Kết Thúc">
          </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return alert('Bạn thêm lớp học thành công ^^')" name="save-class" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

  @endsection