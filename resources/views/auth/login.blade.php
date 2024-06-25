<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pajak Pemerintah Kota Ambon | Login</title>
  {{-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> --}}
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  {{-- Notif Mengembang --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="login-page">
  {{-- hold-transition bg-brown --}}
<div class="login-box" style="width:40%">
  <div class="login-logo">
    <img src="{{ asset('uploads/logo.png') }}" class="img-fluid" alt="logo" width="100px" height="100px">
    <p style="font-size:30px">
      <b> SISTEM MONITORING PENGELOLAAN PAJAK PEMERINTAH KOTA AMBON </b>
  </p>
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-10">
  <div class="login-box-body">

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @endif


    <form action="/proses" method="POST">
      @csrf
      <br>
      {{-- <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" value="{{ Session::get('email') }}" name="email" class="form-control" placeholder="Email" autofocus required>
      </div> --}}
      <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" value="{{ Session::get('username') }}" name="username" class="form-control" placeholder="Username" autofocus required>
      </div>
      <br>
      <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <br>
      <div class="row">
          <div class="col-xs-12">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-normal">Masuk</button>
          </div>
      </div>
      <br>
      {{-- <br> --}}
      {{-- <div class="row">
          <div class="col-xs-12">
            <p>Belum punya Akun? Silahkan Daftar</p>
            <a href="/register" class="btn btn-success btn-block btn-normal">Daftar</a>
          </div>
      </div> --}}
  </form>  
  </div>
  </div>
</div>
<!-- Tambahkan sebelum tag </body> -->
@if(Session::has('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Maaf...',
        text: '{{ Session::get("error") }}',
    });
</script>
@endif


<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> -->
</body>
</html>
