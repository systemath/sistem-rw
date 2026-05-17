<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ganti Password | Sistem RW</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Sistem</b>RW</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Anda harus mengganti password default Anda sebelum melanjutkan.</p>

      <?php if ($this->session->flashdata('info')): ?>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?= $this->session->flashdata('info'); ?>
        </div>
      <?php endif; ?>

      <?= form_open('auth/change_password'); ?>
        <div class="input-group mb-3">
          <input type="password" name="new_password" class="form-control" placeholder="Password Baru" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('new_password', '<small class="text-danger">', '</small>'); ?>

        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password Baru" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ganti Password & Login Ulang</button>
          </div>
        </div>
      <?= form_close(); ?>

      <p class="mt-3 mb-1 text-center">
        <a href="<?= base_url('auth/logout'); ?>">Batal dan Keluar</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
