
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- Icon -->
  <link rel="icon" type="Gambar/akuntansii.png" href="{{asset('Gambar/akuntansii.png')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo mt-0">
    <a href="#"><b>Registrasi</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrasi Sebagai Anggota Baru</p>

      <form action="{{ route('register') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" name="name" id="inputName" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Masukkan Nama Anda" value="{{old('name')}}" required>
          @if ($errors->has('name'))
              <div class="invalid-feedback">
                {{ $errors->first('name')}}
              </div>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="level" id="inputLevel" class="form-control {{ $errors->has('Level') ? 'is-invalid' : '' }}" placeholder="Masukkan Level" value="{{old('level')}}" required>
          @if ($errors->has('level'))
              <div class="invalid-feedback">
                {{ $errors->first('level')}}
              </div>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" name="email" id="inputEmail" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email address" value="{{old('name')}}" required>
                  @if ($errors->has('email'))
                  <div class="invalid-feedback">
                    {{ $errors->first('email')}}
                  </div>
                  @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" id="inputPassword" class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required>
          @if ($errors->has('password'))
          <div class="invalid-feedback">
            {{ $errors->first('password')}}
          </div>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" id="inputPassword" class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Password Confirmation" required>
                  @if ($errors->has('password_confirmation'))
                  <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation')}}
                  </div>
                  @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
            <a href="{{ route('login') }}">Login Disini</a>
          </div>
          <!-- /.col -->
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

