@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Hồ Sơ Của Tôi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Hồ Sơ của Tôi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection


@section('admin_content')
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{URL::to('public/backend/dist/img/thanh.jpg')}}"
                       alt="User profile picture">
                       
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->admin_name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                {{-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul> --}}

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Cơ Bản</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>Học Vấn</strong>

                <p class="text-muted">
                  {{Auth::user()->admin_experience}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Địa Chỉ</strong>

                <p class="text-muted">{{Auth::user()->admin_address}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Kĩ Năng</strong>

                <p class="text-muted">
                  {{Auth::user()->admin_skill}}
                </p>

                <hr>

                {{-- <strong><i class="far fa-file-alt mr-1"></i>Chú ý</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                  <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">Đổi Mật Khẩu</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Cài Đặt </a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <!-- /.tab-pane -->
                  <div class=" tab-pane" id="timeline">
                    <!-- The timeline -->
                    
                      <!-- timeline time label -->
                      <div class="time-label">
                        <form action="{{URL::to('change-password/'.Auth::user()->admin_id)}}" method="post">
                          {{ csrf_field() }}
                          <a href="{{URL::to('/forgot-password')}}" style="margin-left: 759px; margin-bottom: 30px">Quên mật khẩu?</a>
                          <div class="input-group mb-3">
                           <label for="inputName" class="col-sm-2 col-form-label">Mật Khẩu Cũ</label>
                            <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                            
                          </div>
                            <div class="input-group mb-3">
                              <label for="inputName" class="col-sm-2 col-form-label">Mật Khẩu Mới</label>
                              <input type="password" name="password" class="form-control" placeholder="Password">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                                </div>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <label for="inputName" class="col-sm-2 col-form-label">Nhập Lại Mật Khẩu</label>
                              <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-2">
                              </div>
                              <div class="col-3">
                                <button type="submit" class="btn btn-danger">Đổi Mật Khẩu</button>
                              </div>
                              <!-- /.col -->
                            </div>
                          </form>
                          <br>
                        </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      
                    
                      <!-- END timeline item -->
                      <!-- timeline item -->
                 
                      <!-- END timeline item -->
                      <!-- timeline item -->
            
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                 
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      
                      <!-- END timeline item -->
                   
                    
                  </div>
                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="settings">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                   @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                     @endif
                    <form class="form-horizontal" action="{{URL::to('update-profile/'.Auth::user()->admin_id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Họ và Tên</label>
                        <div class="col-sm-10">
                          <input type="text" name="admin_name" value="{{Auth::user()->admin_name}}" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="exampleInputFile">Ảnh Đại Diện</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input " id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="admin_email" class="form-control" value="{{Auth::user()->admin_email}}" id="inputEmail" placeholder="Email" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Địa Chỉ</label>
                        <div class="col-sm-10">
                          <label for="exampleInputPassword1">Chọn thành phố</label>
                                      <select name="city" id="city" class="form-control col-sm-5 input-sm m-bot3 choose city">
                                    
                                            <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                            <option type="text" value="{{$ci->matp}}">{{$ci->name}}</option>
                                        @endforeach
                                            
                                    </select>
                          <label for="exampleInputPassword1">Chọn quận huyện</label>
                                      <select name="province" id="province" class="form-control col-sm-5 input-sm m-bot15 province choose">
                                            <option value="">--Chọn quận huyện--</option>
                                           
                                       </select>
                            <label for="exampleInputPassword1">Chọn xã phường</label>
                                      <select name="wards" id="wards" class="form-control col-sm-5 input-sm m-bot15 wards">
                                            <option value="">--Chọn xã phường--</option>   
                                    </select>
                          <br>
                          <input type="text" name="address" class="form-control" id="inputName2" placeholder="Address">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Học Vấn</label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  name="admin_experience" id="inputExperience" placeholder="Experience">{{Auth::user()->admin_experience}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Kĩ Năng</label>
                        <div class="col-sm-10">
                          <input type="text" name="admin_skill" value="{{Auth::user()->admin_skill}}" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              {{-- <input type="checkbox"> I agree to the <a href="#">terms and conditions</a> --}}
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @endsection