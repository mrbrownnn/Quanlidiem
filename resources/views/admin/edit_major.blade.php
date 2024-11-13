@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cập Nhật Ngành Học</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Cập Nhật Ngành Học</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập Nhật Ngành Học</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($major_list as $key => $major)
    <form action="{{URL::to('/update-major/'.$major->major_id)}}" method="post">
        {{ csrf_field() }}
            
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mã Ngành Học</label>
          <input type="text" class="form-control" value="{{$major->major_id}}" name="major_id" id="exampleInputEmail1" placeholder="Mã Ngành Học">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tên Ngành Học</label>
          <input type="text" class="form-control" value="{{$major->major_name}}" name="major_name" id="exampleInputPassword1" placeholder="Tên Ngành Học">
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" onClick="return confirm('Bạn có chắc muốn cập nhật ?')" name="update-major" class="btn btn-primary">Cập Nhật</button>
      </div>
    </form>
    @endforeach
  </div>

  @endsection