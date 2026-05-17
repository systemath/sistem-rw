<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> | Sistem RW</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
      <span class="brand-text font-weight-light">Sistem Administrasi RW</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user-circle fa-2x text-light"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">DATA MASTER</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/warga'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'warga') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Warga</p>
            </a>
          </li>
          <li class="nav-header">LAYANAN</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/surat'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'surat') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>Surat Pengantar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pengaduan'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'pengaduan') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>Pengaduan Warga</p>
            </a>
          </li>
          <li class="nav-header">KONTEN WEBSITE</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/berita'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'berita') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Berita / Kegiatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kategori/berita'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'kategori' && $this->uri->segment(3) == 'berita') ? 'active' : ''; ?>">
              <i class="nav-icon far fa-circle text-sm"></i>
              <p>Kategori Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pengumuman'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'pengumuman') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/galeri'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'galeri') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-images"></i>
              <p>Galeri</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kategori/galeri'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'kategori' && $this->uri->segment(3) == 'galeri') ? 'active' : ''; ?>">
              <i class="nav-icon far fa-circle text-sm"></i>
              <p>Kategori Galeri</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/faq'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'faq') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>FAQ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kontak'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'kontak') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Pesan Masuk</p>
            </a>
          </li>
          <li class="nav-header">SISTEM</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/users'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'users') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>Manajemen User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/activity_log'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'activity_log') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-history"></i>
              <p>Activity Log</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/backup'); ?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>Backup Database</p>
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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
