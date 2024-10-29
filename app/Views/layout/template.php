<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets') ?>/img/logopuskespanggungnobg.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/summernote/summernote-bs4.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center" style="background-color: #239D60;">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <a href="#" class="d-flex align-items-center">
                    <img src="<?= base_url('assets') ?>/img/logogroup.png" class="icon-box" alt="">
                    <h1 style="color: #ffff; margin-left: 20px; font-size: 23px;">Puskesmas Panggung</h1>
                </a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= base_url('/') ?>#" style="color: #ffff;">Beranda</a></li>
                    <li class="dropdown"><a href="<?= base_url('/') ?>#profil"><span style="color: #ffff;">Profil</span> <i class="bi bi-chevron-down" style="color: #ffff;"></i></a>
                        <ul>
                            <li><a href="<?= base_url('struktur-organisasi-upt') ?>">Sturuktur Organisasi UPT</a></li>
                            <li><a href="<?= base_url('visi-misi') ?>">Visi & Misi</a></li>
                            <li><a href="<?= base_url('jam-pelayanan') ?>">Jam Pelayanan</a></li>
                            <li><a href="<?= base_url('hak-dan-kewajiban-pasien') ?>">Hak dan Kewajiban Pasien</a></li>
                            <li><a href="<?= base_url('antrian-prioritas') ?>">Antrian Prioritas</a></li>
                            <li><a href="<?= base_url('denah-ruangan') ?>">Denah Ruangan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="<?= base_url('/') ?>#pelayanan"><span style="color: #ffff;">Pelayanan</span> <i class="bi bi-chevron-down" style="color: #ffff;"></i></a>
                        <ul>
                            <li><a href="<?= base_url('alur-pelayanan') ?>">Alur Pelayanan</a></li>
                            <li><a href="<?= base_url('alur-pendaftaran') ?>">Alur Pendaftaran</a></li>
                            <li><a href="<?= base_url('alur-pelayanan-ruang-kesehatan-gigi-mulut') ?>">Alur Pelayanan Ruang Kesehatan Gigi & Mulut</a></li>
                            <li><a href="<?= base_url('persyaratan-pelayanan') ?>">Persyaratan Pelayanan</a></li>
                            <li><a href="<?= base_url('jenis-pelayanan') ?>">Jenis Pelayanan</a></li>
                            <li><a href="<?= base_url('jenis-pelayanan-kia-kb-imunisasi') ?>">Jenis Pelayanan KIA, KB & IMUNISASI</a></li>
                            <li><a href="<?= base_url('jenis-pelayanan-pemeriksaan-lansia') ?>">Jenis Pelayanan Pemeriksaan Lansia</a></li>
                            <li><a href="<?= base_url('jenis-pelayanan-mbts-gizi') ?>">Jenis Pelayanan MTBS, Gizi</a></li>
                            <li><a href="<?= base_url('jenis-pelayanan-pemeriksaan-umum') ?>">Jenis Pelayanan Pemeriksaan Umum</a></li>
                            <li><a href="<?= base_url('maklumat-pelayanan') ?>">Maklumat Pelayanan</a></li>
                            <li><a href="<?= base_url('tarif-pelayanan') ?>">Tarif Pelayanan</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="<?= base_url('/') ?>#informasi" style="color: #ffff;">Informasi</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('/pengunjungpengaduan') ?>" style="color: #ffff;">Pengaduan</a></li>
                    <li><a class="nav-link scrollto" href="#footer" style="color: #ffff;">Hubungi Kami</a></li>
                    <?php if (session()->leveluser == 'Kepala Puskesmas') :  ?>
                        <li id="button"><a class="nav-link scrollto button-navbar" href="<?= base_url('pengaduan') ?>" style="color: #ffff;">Dashboard</a></li>
                    <?php elseif (session()->leveluser == 'Admin Puskesmas') : ?>
                        <li id="button"><a class="nav-link scrollto button-navbar" href="<?= base_url('profilweb') ?>" style="color: #ffff;">Dashboard</a></li>
                    <?php else : ?>
                        <li id="button"><a class="nav-link scrollto button-navbar" href="<?= base_url('login') ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top" style="background-color: #005B41; color: white;">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="row">
                    <div class="section-title" style="margin-bottom: 50px;">
                        <h2>Hubungi Kami</h2>
                    </div>
                    <div class="col-lg-4 col-md-2 footer-contact">
                        <a href="https://maps.app.goo.gl/6DzhLYuRpeswYWUQ8" class="whatsapp" style="display: flex; align-items: center;">
                            <i class="bx bi-geo-alt-fill" style="font-size: 34px; color: white;"></i>
                            <span style="margin-left: 10px; font-size: 14px; color: white;">Panggung, Kec. Pelaihari,
                                <br>Kabupaten Tanah Laut, Kalimantan Selatan</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6  footer-links">
                        <a href="https://wa.me/6281349233445" class="whatsapp" style="display: flex; align-items: center;">
                            <i class="bx bxl-whatsapp" style="font-size: 34px; color: white;"></i>
                            <span style="margin-left: 10px; font-size: 14px; text-align: center; color: white;">081349233445</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <a href="https://instagram.com/puskesmaspanggung?igshid=MWZjMTM2ODFkZg==" class="instagram" style="display: flex; align-items: center;">
                            <i class="bx bxl-instagram" style="font-size: 34px; color: white;"></i>
                            <span style="margin-left: 10px; font-size: 14px; text-align: center; color: white;">@puskesmaspanggung</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <a href="https://www.youtube.com/@PuskesmasPanggung" class="youtube" style="display: flex; align-items: center;">
                            <i class="bx bxl-youtube" style="font-size: 34px; color: white;"></i>
                            <span style="margin-left: 10px; font-size: 13px; text-align: center; color: white;">Puskesmas Panggung</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <a href="mailto:puskespanggung@gmail.com" class="gmail" style="display: flex; align-items: center;">
                            <i class="bx bx-envelope" style="font-size: 34px; color: white;"></i>
                            <span style="margin-left: 10px; font-size: 14px; text-align: center; color: white;">puskespanggung@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Gana Website</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <span>Politeknik Negeri Tanah Laut</span>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets') ?>/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets') ?>/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>


</body>

</html>