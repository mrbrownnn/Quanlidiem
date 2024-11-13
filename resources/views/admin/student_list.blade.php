@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Danh Sách</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh Sách Sinh Viên</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped" style="text-align: center">
        <?php 
        $message = Session::get('message');
        if ($message) {
          echo '<span class="text-alert" style="color:green">' .$message. '</span>';
          Session::put('message',null);
        }
        ?>
        <thead>
          <tr>
            <th>Mã Sinh Viên</th>
            <th>Họ Đệm</th>
            <th>Tên </th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Quê Quán</th>
            <th>Lớp</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($student_list as $key => $student)
          <tr>
            <td>{{$student->student_id}}</td>
            <td>{{$student->lastname}}</td>
            <td>{{$student->firstname}}</td>
            @if ($student->gender == 1)
                <td>Nam</td>  
            @else
                <td>Nữ</td>
            @endif
            <td>{{$student->dob}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->class_name}}-{{$student->course_id}}</td>
            <td>

                <a href="{{URL::to('/edit-student/'.$student->student_id)}}" class="active styling-edit " ui-toggle-class="" style="margin-left: 5px; font-size:20px; ">
                  <i class="far fa-edit text-success" ></i>
                </a>
                &nbsp;&nbsp;&nbsp;
                <a onClick="return confirm('Bạn có chắc muốn xóa sinh viên này không?')" href="{{URL::to('/delete-student/'.$student->student_id)}}" style="margin-left: 5px; font-size:20px;" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger "></i></a>
                </a>
              </td>
          </tr>   
          @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div> --}}
  </div>
@endsection