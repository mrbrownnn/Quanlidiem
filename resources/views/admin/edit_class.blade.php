@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cập Nhật Lớp Học</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Cập Nhật Lớp Học</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập Nhật Lớp Học</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($edit_class as $key => $manager)
    <form action="{{URL::to('/update-class/'.$manager->class_id)}}" method="post">
        {{ csrf_field() }}
      <div class="card-body">         
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Lớp Học</label>
          <input type="text" class="form-control" value="{{$manager->class_id}}" name="class_id" id="exampleInputEmail1" placeholder="Mã Ngành Học">
        </div>
        <div class="form-group">
            <label>Ngành Học</label>
            <select class="form-control select2" style="width: 100%;" name="major_id">
              <option selected="selected">--Chọn Ngành Học--</option>
              @foreach ($major_list as $item => $major)
                 @if ($manager->major_id == $major->major_id)
                    <option selected value="{{$major->major_id}}">{{$major->major_name}}</option>
                 @endif
                    <option  value="{{$major->major_id}}">{{$major->major_name}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên Lớp Học</label>
          <input type="text" class="form-control" value="{{$manager->class_name}}" name="class_name" id="exampleInputPassword1" placeholder="Tên Lớp Học">
        </div>
        <div class="form-group">
            <label>Giáo Viên Chủ Nhiệm</label>
            <select class="form-control select2" style="width: 100%;" name="lecturers_id">
              <option  selected="selected">--Chọn Giáo Viên--</option>
              @foreach ($lecturers_list as $item => $teacher)
                 @if ($manager->lecturers_id == $teacher->lecturers_id)
                    <option selected value="{{$teacher->lecturers_id}}">{{$teacher->lecturers_name}}</option>
                 @endif
                    <option  value="{{$teacher->lecturers_id}}">{{$teacher->lecturers_name}}</option>
              @endforeach
             </select>
          </div>
         <div class="form-group">
            <label>Khóa</label>
            <select class="form-control select2" style="width: 100%;" name="course_id">
              <option selected="selected">--Chọn Khóa--</option>
              @foreach ($course_list as $item => $course)
                 @if ($manager->course_id == $course->course_id)
                    <option selected value="{{$course->course_id}}">{{$course->course_id}}</option>
                 @endif
                    <option  value="{{$course->course_id}}">{{$course->course_id}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Số Lượng Sinh Viên</label>
            <input type="text" class="form-control" value="{{$manager->student_qty}}" name="student_qty" id="exampleInputPassword1" placeholder="Số Lượng Sinh Viên">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Thời Gian Bắt Đầu</label>
            <input type="date" class="form-control" value="{{$manager->start_time}}" name="start_time" id="exampleInputPassword1" placeholder="Thời Gian Bắt Đầu">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Thời Gian Kết Thúc</label>
            <input type="date" class="form-control" value="{{$manager->end_time}}" name="end_time" id="exampleInputPassword1" placeholder="Thời Gian Kết Thúc">
          </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return confirm('Bạn có chắc muốn cập nhật lớp học ?')" name="update-class" class="btn btn-primary">Cập Nhật</button>
      </div>
    </form>
    @endforeach
  </div>

  @endsection