
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url('app') ?>"><b>Daftar </b>Pustaka</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Buat akun dan jadilah anggota <b>Pustaka</b></p>
    <?= $this->session->flashdata('pesan'); ?>
    <form action="<?= base_url('LogDaf/daftar') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" id="email" placeholder="Masukan Nama Pengguna" pattern="[a-zA-Z0-9-]+" value="<?= set_value('username') ?>" class="form-control">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('username','<span class="alert alert-danger" style="display:block; padding:3px;">', '</span>') ?>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="email" id="email" placeholder="Masukan pos-El" value="<?= set_value('email') ?>" class="form-control">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email','<span class="alert alert-danger" style="display:block; padding:3px;">', '</span>') ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" placeholder="Masukan Kata Sandi" pattern="[a-zA-Z0-9-]+" value="<?= set_value('password') ?>" class="form-control">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<span class="alert alert-danger" style="display:block; padding:3px;">', '</span>') ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="passconf" id="email" placeholder="Ulangi Kata Sandimu" pattern="[a-zA-Z0-9-]+" value="<?= set_value('passconf') ?>" class="form-control">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?= form_error('passconf','<span class="alert alert-danger" style="display:block; padding:3px;">', '</span>') ?>
      </div>
      <div class="row">
        <div class="col-xs-8" style="visibility: hidden;">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">Saya setuju dengan <a href="#">Persyaratan dan Ketentuan</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?= base_url('LogDaf') ?>" class="text-center">Saya sudah punya Akun</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
