@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Nhập Điểm </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Nhập Điểm</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Nhập Điểm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form action="{{URL::to('/search')}}" method="POST">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputPassword1">Lớp Học</label>
          <select class="form-control select2" name="class_id" style="width: 100%;">
              <option selected="selected">--Chọn Lớp Học--</option>
              @foreach ($class_list as $key => $class)
                 @if (Session::get('class_id') == $class->class_id)
                 <option selected value="{{$class->class_id}}">{{$class->class_name}}-{{$class->course_id}}</option>
                 @endif
                 <option value="{{$class->class_id}}">{{$class->class_name}}-{{$class->course_id}}</option>
              @endforeach
              
          </select>
        </div> 
        <div class="form-group">
          <label for="exampleInputPassword1">Môn Học</label>
          <select class="form-control select2" name="subject_id" style="width: 100%;">
              <option selected="selected">--Chọn Môn Học--</option>
              @foreach ($subject_list as $key => $subject)
                 @if (Session::get('subject_id') == $subject->subject_id)
                 <option selected value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                 @endif
                 <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
              @endforeach
              
          </select>
        </div> 
     
      <!-- /.card-body -->
   
   <div class="card-footer" style="text-align: center">
    <button type="submit" class="btn btn-primary"  name="search_subject">Tìm Kiếm</button>
  </div>
</form>
</div>
@if (!empty(Session::get('subject_id')))

<form action="{{URL::to('/save-point')}}" method="POST">
  {{ csrf_field()}}
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputPassword1">Họ Và Tên</label>
      <select class="form-control select2" name="student_id" style="width: 100%;">
          <option selected="selected">--Chọn Sinh Viên--</option>
          @foreach ($class_list as $key => $class)
             <option value="{{$class->student_id}}">{{$class->lastname}} {{$class->firstname}}</option>
          @endforeach
          
      </select>
    </div> 
    @foreach ($subject_list as $key => $subject)
         @if ($subject->is_skill == 1)
         <div class="form-group">
          <label for="exampleInputPassword1">Điểm Skill</label>
          <input type="number" name="skill_1st" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Skill">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Thi Lại Skill</label>
          <input type="number" name="skill_2st" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Thi Lại Skill">
        </div>
         @endif
         @if ($subject->is_final == 1)
         <div class="form-group">
          <label for="exampleInputPassword1">Điểm Final</label>
          <input type="number" name="final_1st" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Final">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Thi Lại Final</label>
          <input type="number" name="final_2st" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Thi Lại Final">
        </div> 
         @endif
    @endforeach
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" onClick="return confirm('Bạn nhập điểm sinh viên thành công ^^')" class="btn btn-primary" name="add_point">Nhập Điểm</button>
  </div>
</form>
   @endif     
 
 
@endsection