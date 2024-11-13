
@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm Môn Học</h1>
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
      <h3 class="card-title">Thêm Môn Học</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{URL::to('/save-subject')}}" method="post">
        {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Môn Học</label>
          <input type="text" class="form-control" name="subject_id" id="exampleInputEmail1" placeholder="Mã Môn Học">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên Môn Học </label>
          <input type="text" class="form-control" name="subject_name" id="exampleInputPassword1" placeholder="Tên Môn Học">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Thời Lượng Môn Học (Giờ)</label>
            <input type="text" class="form-control" name="total_subject" id="exampleInputPassword1" placeholder="Thời Lượng Môn Học">
        </div>

        <div class="form-group">
            <label>Giáo Viên Giảng Dậy</label>
            <select class="form-control select2" style="width: 100%;" name="lecturers_id">
              <option  selected="selected">--Chọn Giáo Viên--</option>
              @foreach ($lecturers_list as $item => $teacher)
                 <option value="{{$teacher->lecturers_id}}">{{$teacher->lecturers_name}}</option>
              @endforeach
             </select>
          </div>
          <div class="form-group">
            <label>Thi Skill</label>
            <br>
            <input type="radio" value="1" id="radioPrimary3" name="is_skill" > Có Thi Skill
            <input type="radio" value="0" style="margin-left:200px;" id="radioPrimary3" name="is_skill" > Không Thi Skill
          </div>
          <div class="form-group">
            <label>Thi Final</label>
            <br>
            <input type="radio" value="1" id="radioPrimary3" name="is_final" >Có Thi Final
            <input type="radio" value="0" style="margin-left:200px;" id="radioPrimary3" name="is_final" >  Không Thi Final
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" name="start_subject" id="exampleInputPassword1" placeholder="Thời Lượng Môn Học">
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return alert('Bạn thêm môn học thành công ^^')" name="save-subject" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

  @endsection