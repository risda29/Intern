<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- main content -->
<section class="content m-3">
    <div class="container-fluid">
        <div class="row">
            <!-- Left col -->
            <div class="col-lg-8 connectedSortable animate__animated animate__fadeIn" style="padding-top: 15px; font-size: small;">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="embed-responsive">
                    <h1 class="text-break fw-bold" style="color: black;"><?= $informasi['namainformasi'] ?></h1>
                    <p class="text-break">
                        <i class="fas fa-user"></i> Puskesmas Panggung |
                        <i class="fa fa-calendar-alt"></i> <?= $informasi['tanggal'] ?>
                    </p>
                </div>

                <?php if (!empty($informasi['artikel'])) : ?>
                    <!-- Jika artikel memiliki data -->
                    <div class="embed-responsive">
                        <img class="embed-responsive" src="<?= base_url('fotoinformasi/' . $informasi['fotoinformasi']) ?>" alt="">
                    </div>
                <?php else : ?>
                    <!-- Jika artikel null atau kosong -->
                    <div class=" embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= $informasi['iframe'] ?>" frameborder="0"></iframe>
                    </div>
                <?php endif; ?><br>

                <div class="embed-responsive">
                    <?= $informasi['artikel'] ?>
                </div>
            </div>



            <!-- Right col (informasi) -->
            <section id="informasi" class="col-lg-4 connectedSortable" style="padding-top: 15px;">
                <!-- Map card -->
                <div class="card animate__animated animate__zoomIn">
                    <div class="card-header" style="display: flex; justify-content: center; align-items: center; background: #005B41">
                        <h3 class="card-title" style="font-size: 20px; color: white; margin-top: 10px">
                            Informasi
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body" style="padding-top: 4px;">
                        <div class="portfolioo">
                            <!-- Morris chart - Sales -->
                            <div class="row portfolioo-container" style="display: flex; justify-content: center; align-items: center;">
                                <?php foreach ($informasialldata as $i) { ?>
                                    <div class="portfolioo-item animate__animated animate__fadeIn">
                                        <div class="portfolioo-wrap">
                                            <figure>
                                                <a href="<?= $i['slug'] ?>">
                                                    <img src="<?= base_url('fotoinformasi/' . $i['fotoinformasi']) ?>" class="img-fluid" alt="">
                                                </a>
                                            </figure>

                                            <div class="portfolioo-info">
                                                <h4><a href="<?= $i['slug'] ?>"><?= $i['namainformasi'] ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>