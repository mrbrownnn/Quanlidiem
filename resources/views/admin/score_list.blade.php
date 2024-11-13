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
      <h3 class="card-title">Danh Sách Điểm Của Sinh Viên</h3>
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
            <th width='100'>Mã SV</th>
            <th width='250'>Họ Tên Đệm</th>
            <th>Tên</th>
            <th>Mã Lớp</th>
            <th>Môn Học</th>
            <th width='50'>Điểm Skill</th>
            <th width='50'>Điểm Final</th>
            <th width='50'>Điểm Thi Lại Skill</th>
            <th width='50'>Điểm Thi Lại Final</th>
            <th  width='100'></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($score_list as $key => $score)
          <tr>
            <td>{{$score->student_id}}</td>
            <td>{{$score->lastname}}</td>
            <td>{{$score->firstname}} </td>
            <td>{{$score->class_id}}</td>
            <td>{{$score->subject_name}}</td>
            @if ($score->skill_1st != null)
            <td>{{$score->skill_1st}}</td>
            @else
               <td><span class="badge bg-danger">X</span></td> 
            @endif


            @if ($score->final_1st != null)
              <td>{{$score->final_1st}}</td>
            @else
              <td><span class="badge bg-danger">X</span></td> 
            @endif
            
            @if ($score->skill_2st != null)
              <td>{{$score->skill_2st}}</td>
            @else
              <td><span class="badge bg-danger">X</span></td> 
            @endif
            
            @if ($score->final_2st != null)
              <td>{{$score->final_2st}}</td>
            @else
            <td><span class="badge bg-danger">X</span></td> 
            @endif
            <td>
              <a href="{{URL::to('/edit-score/'.$score->student_id.'/'.$score->subject_id)}}" class="active styling-edit " ui-toggle-class="" style="margin-left: 5px; font-size:20px; ">
                <i class="far fa-edit text-success" ></i>
              </a>
              &nbsp;&nbsp;&nbsp;
              <a onClick="return confirm('Bạn có chắc muốn xóa giảng viên này không?')" href="{{URL::to('/delete-score/'.$score->student_id.'/'.$score->subject_id)}}" style="margin-left: 5px; font-size:20px;" class="active styling-edit" ui-toggle-class="">
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