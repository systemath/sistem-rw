<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> | Portal Warga</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>" role="button">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link bg-primary">
      <i class="fas fa-arrow-left ms-2 me-2"></i>
      <span class="brand-text font-weight-light">Kembali ke Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if ($this->session->userdata('foto')): ?>
            <img src="<?= base_url('uploads/warga/' . $this->session->userdata('foto')); ?>" class="img-circle elevation-2" style="width: 35px; height: 35px; object-fit: cover;" alt="User Image">
          <?php else: ?>
            <i class="fas fa-user-circle fa-2x text-primary"></i>
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="<?= base_url('warga/profil'); ?>" class="d-block"><?= $this->session->userdata('nama'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url(); ?>" class="nav-link <?= ($this->uri->uri_string() == '') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Halaman Utama</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pengajuan-surat'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'pengajuan-surat') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>Pengajuan Surat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pengaduan'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'pengaduan') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>Pengaduan Saya</p>
            </a>
          </li>
          <li class="nav-header">AKUN</li>
          <li class="nav-item">
            <a href="<?= base_url('warga/profil'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>Edit Profil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('warga/password'); ?>" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Ganti Password</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
