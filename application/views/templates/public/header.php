<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi dan Administrasi RW Online - Memudahkan warga dalam pelayanan publik.">
    <meta name="keywords" content="RW, Administrasi, Warga, Surat Pengantar, Pengaduan">
    <meta name="author" content="RW Online">
    <title><?= $title; ?> | Website Resmi RW</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .hero-section { 
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        .footer { background: #343a40; color: white; padding: 40px 0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="<?= base_url(); ?>">RW ONLINE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">Tentang Kami</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('tentang'); ?>">Profil RW</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('visi-misi'); ?>">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('struktur'); ?>">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('berita'); ?>">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('galeri'); ?>">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('faq'); ?>">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak</a></li>
                <?php if($this->session->userdata('logged_in')): ?>
                    <?php if($this->session->userdata('role') == 'warga'): ?>
                        <li class="nav-item"><a class="nav-link fw-bold text-primary" href="<?= base_url('pengajuan-surat'); ?>"><i class="fas fa-file-alt me-1"></i> Pengajuan</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold text-primary" href="<?= base_url('pengaduan'); ?>"><i class="fas fa-exclamation-circle me-1"></i> Pengaduan</a></li>
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> <?= $this->session->userdata('nama'); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="<?= base_url('warga/profil'); ?>"><i class="fas fa-user-edit me-2"></i> Profil Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-array text-danger dropdown-item" href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-outline-danger btn-sm mt-1" href="<?= base_url('logout'); ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-primary" href="<?= base_url('admin/dashboard'); ?>">Dashboard Admin</a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="<?= base_url('login'); ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
