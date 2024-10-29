<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sistem | Puskesmas Panggung</title>

    <!-- Favicons -->
    <link href="<?= base_url('assets') ?>/img/logopuskespanggungnobg.png" rel="icon">
    <link href="<?= base_url('assets') ?>/img/logopuskespanggungnobg.png" rel="apple-touch-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
    <link href="<?= base_url('assets') ?>/css/stylelogin.css" rel="stylesheet">


    <!-- reCAPTCHA Script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body id="login" class="hold-transition login-page" style="background-image: url('<?= base_url('assets/img/puskes.png') ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-black">
            <div class="card-header text-center" style="background-color: #239D60;">
                <a href="" class="h2" style="color: white;"><b>Puskesmas</b>Panggung</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masuk ke Sistem Gunakan Akun Anda</p>

                <form action="<?= base_url('login/cekuser') ?>" method="post">
                    <?= csrf_field(); ?>

                    <?php
                    if (session()->getFlashdata('recaptcha')) {
                        echo '<div class="alert alert-danger" style="font-size: 15px">';
                        echo session()->getFlashdata('recaptcha');
                        echo '</div>';
                    }

                    $isInvalidUser = (session()->getFlashdata('errUsername')) ? 'is-invalid' : '';
                    ?>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control <?= $isInvalidUser ?>" value="<?= old('username') ? esc(old('username')) : '' ?>" placeholder="Username" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php
                        if (session()->getFlashdata('errUsername')) {
                            echo '<div class="invalid-feedback">
                ' . session()->getFlashdata('errUsername') . '
            </div>';
                        }
                        ?>
                    </div>
                    <?php
                    $isInvalidPw = (session()->getFlashdata('errPw')) ? 'is-invalid' : '';
                    ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= $isInvalidPw ?>" name="pw" value="<?= old('pw') ? esc(old('pw')) : '' ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?php
                        if (session()->getFlashdata('errPw')) {
                            echo '<div class="invalid-feedback">
                ' . session()->getFlashdata('errPw') . '
            </div>';
                        }
                        ?>
                    </div>
                    <!-- reCAPTCHA widget -->
                    <div class="g-recaptcha" data-sitekey="6LftaRcpAAAAALzU5HHWjO__kp__oVpkA7iyf9nm"></div><br>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block mb-2">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="<?= base_url('/') ?>" class="btn btn-primary btn-block" style="background-color: #239D60;">Beranda</a>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>