<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng Kí Tài Khoản</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Quản Lý</b>Sinh Viên</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">ĐĂNG KÍ TÀI KHOẢN AUTHENTICATION</p>
      @if(session()->has('message'))
      <div class="alert alert-success">
          {!! session()->get('message') !!}
      </div>
  @elseif(session()->has('error'))
       <div class="alert alert-danger">
          {!! session()->get('error') !!}
      </div>
  @endif

      <form action="{{URL::to('register-authencation')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" name="admin_name" value="{{old('admin_name')}}" class="form-control" placeholder="Họ Và Tên">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @if($errors->has('admin_name'))
        <div class="alert alert-danger">
            {{$errors->first('admin_name')}}
         </div>
        @endif
        <div class="input-group mb-3">
          <input type="email" name="admin_email" value="{{old('admin_email')}}" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if($errors->has('admin_email'))
        <div class="alert alert-danger">
            {{$errors->first('admin_email')}}
         </div>
        @endif
        <div class="input-group mb-3">
          <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if($errors->has('password'))
        <div class="alert alert-danger">
            {{$errors->first('password')}}
         </div>
        @endif
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if($errors->has('confirm_password'))
        <div class="alert alert-danger">
            {{$errors->first('confirm_password')}}
         </div>
        @endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="authencation" class="btn btn-primary btn-block">Đăng Kí</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
{{-- 
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> --}}
      
      <p class="mb-1">
        <a href="{{URL::to('/login-authentication')}}" class="text-center">Đăng nhập tài khoản Authencation</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
