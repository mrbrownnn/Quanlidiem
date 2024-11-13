@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cập Nhật Điểm </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Cập Nhật Điểm</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('admin_content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cập Nhật Điểm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($edit_score as $key => $score)
<form action="{{URL::to('/update-point/'.$score->student_id.'/'.$score->subject_id)}}" method="POST">
  {{ csrf_field()}}
 
   
         @if ($score->is_skill == 1 && $score->is_final == 0 && $score->subject_id == Session::get('subject_id'))
         <div class="card-body">
         <div class="form-group">
          <label for="exampleInputPassword1">Điểm Skill</label>
          <input type="number" name="skill_1st" value="{{$score->skill_1st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Skill">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Thi Lại Skill</label>
          <input type="number" name="skill_2st" value="{{$score->skill_2st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Thi Lại Skill">
        </div>
      </div>
      <!-- /.card-body -->
    
      <div class="card-footer">
        <button type="submit" onClick="return confirm('Bạn có chắc muốn cập nhật ? ^^')" class="btn btn-primary" name="update_point">Cập Nhật</button>
      </div>
    </form>
         @endif
         @if ($score->is_skill == 0 && $score->is_final == 1 && $score->subject_id == Session::get('subject_id'))
         <div class="card-body">
         <div class="form-group">
          <label for="exampleInputPassword1">Điểm Final</label>
          <input type="number" name="final_1st" value="{{$score->final_1st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Final">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Thi Lại Final</label>
          <input type="number" name="final_2st" value="{{$score->final_2st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Thi Lại Final">
        </div> 
      </div>
      <!-- /.card-body -->
    
      <div class="card-footer">
        <button type="submit" onClick="return confirm('Bạn có chắc muốn cập nhật ? ^^')" class="btn btn-primary" name="update_point">Cập Nhật</button>
      </div>
    </form>
         @endif
         @if ($score->is_skill == 1 && $score->is_final == 1 && $score->subject_id == Session::get('subject_id'))
         <div class="card-body">
         <div class="form-group">
          <label for="exampleInputPassword1">Điểm Skill</label>
          <input type="number" name="skill_1st" value="{{$score->skill_1st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Skill">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Thi Lại Skill</label>
          <input type="number" name="skill_2st" value="{{$score->skill_2st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Thi Lại Skill">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Final</label>
          <input type="number" name="final_1st" value="{{$score->final_1st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Final">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Điểm Thi Lại Final</label>
          <input type="number" name="final_2st" value="{{$score->final_2st}}" min="0" max="10" class="form-control" id="exampleInputPassword1" placeholder="Điểm Thi Lại Final">
        </div> 
      </div>
      <!-- /.card-body -->
    
      <div class="card-footer">
        <button type="submit" onClick="return confirm('Bạn có chắc muốn cập nhật ? ^^')" class="btn btn-primary" name="update_point">Cập Nhật</button>
      </div>
    </form>
         @endif
 
 
  
@endforeach
 
@endsection