@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Danh Sách Điểm Theo Lớp</h1>
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
      <h3 class="card-title">Danh Sách Điểm Theo Lớp</h3>
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
        <br>
        <thead>
          <tr>
            <th>Mã SV</th>
            <th>Họ Và Tên</th>
            <th>Lớp</th>
            @foreach ($subject_list as $key => $subject)
                <th>{{$subject->subject_name}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach ($student_list as $key => $student)
          <tr>
            <td>{{$student->student_id}}</td>
            <td>{{$student->lastname}} {{$student->firstname}}</td>

            <td>
               {{$student->class_name}}-{{$student->course_id}}
            </td>
            @foreach ($score_list as $key => $subject)
                
                  @if ($subject->student_id == $student->student_id)
                  <td>
                      @if ($subject->skill_1st >= 5 )
                           @if ($subject->skill_1st == null)
                            <span class="badge bg-success" style="font-size: 12px">Điểm Skill : {{('X')}}</span>       
                            @else
                              <span class="badge bg-success" style="font-size: 12px">Điểm Skill : {{$subject->skill_1st}} </span>       
                            @endif
                      @else
                              @if ($subject->skill_2st == null)
                                <span class="badge bg-success" style="font-size: 12px">Điểm Skill : {{('X')}}</span>       
                              @else
                               <span class="badge bg-success" style="font-size: 12px">Điểm Skill : {{$subject->skill_2st}} </span><       
                               @endif
                      @endif
                      @if ($subject->final_1st >= 5 )
                       
                      @if ($subject->final_1st == null)
                             <span class="badge bg-success" style="font-size: 12px">Điểm Final : {{('X')}}</span>       
                            @else
                           <span class="badge bg-success" style="font-size: 12px"> Điểm Final : {{$subject->final_1st}}</span>       
                            @endif
                      @else
                      @if ($subject->final_2st == null)
                           <span class="badge bg-success" style="font-size: 12px"> Điểm Final : {{('X')}}</span>       
                            @else
                           <span class="badge bg-success" style="font-size: 12px"> Điểm Final : {{$subject->final_2st}}</span>       
                            @endif
                      @endif
                    </td>
                  @endif
               
            @endforeach
          </tr>
          @endforeach
        </tbody>
       
      </table>
      <p><b>Note* : X là kí hiệu điểm không thi</b></p>
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