<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Favicons -->
    <link href="<?= base_url('assets') ?>/img/logopuskespanggungnobg.png" rel="icon">
    <link href="<?= base_url('assets') ?>/img/logopuskespanggungnobg.png" rel="apple-touch-icon">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
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
            <!-- <ul class="navbar-nav ml-auto"> -->
            <!-- Navbar Search -->
            <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul> -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #016A70">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url('AdminLTE') ?>/dist/img/puskes.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Puskesmas Panggung</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->leveluser; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if (session()->leveluser == 'Admin Puskesmas') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('/profilweb') ?>" class="nav-link <?= $menu == 'profilweb' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-solid fa-newspaper"></i>
                                    <p>Profil RISDA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/pelayanan') ?>" class="nav-link <?= $menu == 'pelayanan' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-solid fa-newspaper"></i>
                                    <p>Pelayanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/informasi') ?>" class="nav-link <?= $menu == 'informasi' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-solid fa-newspaper"></i>
                                    <p>Informasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/pengaduan') ?>" class="nav-link <?= $menu == 'pengaduan' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-solid fa-book"></i>
                                    <p>Pengaduan</p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (session()->leveluser == 'Kepala Puskesmas') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('/pengaduan') ?>" class="nav-link <?= $menu == 'pengaduan' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-solid fa-book"></i>
                                    <p>Pengaduan</p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a href="<?= base_url('/') ?>" class="nav-link <?= $menu == '' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-solid fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/logout') ?>" class="nav-link <?= $menu == 'logout' ? 'active' : '' ?>" onclick="confirmLogout(event)">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p class="text-danger">Keluar</p>
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
                            <h7 class="m-0" style="color: #016A70;">Dashboard > </h7>
                            <h7><?= $judul ?></h7>
                        </div><!-- /.col -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- /.content -->
                        <?php
                        if ($page) {
                            echo view($page);
                        }
                        ?>
                        <!-- /.end content -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Politeknik Negeri Tanah Laut
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023-2024 <a href="#">GANA Website</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function confirmLogout(event) {
            event.preventDefault(); // Prevent the default action (following the link)

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin keluar dari Sistem?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to logout URL or perform logout action
                    window.location.href = '<?= base_url('/logout') ?>';
                }
            });
        }
    </script>
</body>

</html>