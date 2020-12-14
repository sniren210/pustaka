

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masuk</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('app') ?>"><b>Masuk</b> <span>Pustaka</span></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai peminjaman</p>
    <?= $this->session->flashdata('pesan'); ?>
    <form action="<?= base_url('logDaf') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" id="email" placeholder="Masukan Nama Pengguna" pattern="[a-zA-Z0-9-]+" value="<?= set_value('username') ?>" class="form-control">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	<?= form_error('username','<span class="alert alert-danger" style="display:block; padding:3px;">', '</span>') ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" placeholder="Masukan Kata Sandi" pattern="[a-zA-Z0-9-]+" value="<?= set_value('password') ?>" class="form-control">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	<?= form_error('password','<span class="alert alert-danger" style="display:block; padding:3px;">', '</span>') ?>
      </div>
      <div class="row">
        <div class="col-xs-8" style="visibility: hidden;">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Ingatkan saya
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
	<div class="my" style="display: flex; justify-content: space-around;">
	    <a href="<?= base_url('app') ?>">< kembali</a>
	    <a href="<?= base_url('logDaf/daftar') ?>" class="text-center">Daftar Akun</a>
	</div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets/') ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
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
