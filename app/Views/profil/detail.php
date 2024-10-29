<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- main content -->
<section class="content m-3">
    <div class="container-fluid">
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-8 connectedSortable animate__animated animate__fadeIn" style="padding-top: 15px;">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header" style="display: flex; background: #005B41">
                        <h3 class="card-title" style="font-size: 20px; color: white; margin-top: 10px">
                            <?php if ($profil) : ?>
                                <?= $profil['judulprofilweb'] ?>
                            <?php else : ?>
                                <?= $pelayanan['namapelayanan'] ?>
                            <?php endif; ?>
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-12">
                                    <?php if ($profil) : ?>
                                        <img src="<?= base_url('fotoprofilweb/' . $profil['fotoprofilweb']) ?>" class="product-image" alt="Product Image">
                                    <?php elseif ($pelayanan) : ?>
                                        <img src="<?= base_url('fotopelayanan/' . $pelayanan['fotopelayanan']) ?>" class="product-image" alt="Product Image">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card-body -->
                </div><!-- /.card-body -->
                <!-- /.card -->
            </section>

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
                                <?php foreach ($informasi as $i) { ?>
                                    <div class="portfolioo-item">
                                        <div class="portfolioo-wrap">
                                            <figure>
                                                <a href="informasipuskesmas/<?= $i['slug'] ?>">
                                                    <img src="<?= base_url('fotoinformasi/' . $i['fotoinformasi']) ?>" class="img-fluid" alt="">
                                                </a>
                                            </figure>

                                            <div class="portfolioo-info">
                                                <h4><a href="informasipuskesmas/<?= $i['slug'] ?>"><?= $i['namainformasi'] ?></a></h4>
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