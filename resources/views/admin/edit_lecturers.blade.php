@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cập Nhật Giảng Viên</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Cập Nhật Giảng Viên</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập Nhật Giảng Viên</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($lecturers as $key => $teacher)
    <form action="{{URL::to('/update-lecturers/'.$teacher->lecturers_id)}}" method="post">
        {{ csrf_field() }}
        
            
     
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Giảng Viên</label>
          <input type="text" class="form-control" value="{{$teacher->lecturers_id}}" name="lecturers_id" id="exampleInputEmail1" placeholder="Mã Giảng Viên">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Họ Và Tên </label>
          <input type="text" class="form-control" value="{{$teacher->lecturers_name}}" name="lecturers_name" id="exampleInputPassword1" placeholder="Họ và Tên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giới Tính</label>
            <br>
            <input type="radio" id="radioPrimary3"  value="1"
               @if ($teacher->gender == 1)
                  checked
               @endif 
               name="gender" > Nam 
                 
            <input type="radio" style="margin-left:200px;" value="0"
               @if ($teacher->gender == 0)
                   checked
               @endif

                id="radioPrimary3" name="gender" >  Nữ
            <input type="radio" style="margin-left:200px;" value="2" id="radioPrimary3" name="gender" >  Khác
            
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return confirm('Bạn có chắc muốn cập nhật ?')" name="update-lecturers" class="btn btn-primary">Cập Nhật</button>
      </div>
    </form>
    @endforeach
  </div>

  @endsection