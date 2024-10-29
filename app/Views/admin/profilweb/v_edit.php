<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>


            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form action="<?= base_url('/profilweb/updatedata/') . $profilweb['idprofilweb']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $profilweb['slug']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $profilweb['fotoprofilweb']; ?>">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Profil Web</label>
                        <input name="judulprofilweb" class="form-control <?= validation_show_error('judulprofilweb') ? 'is-invalid' : '' ?>" id="judulprofilweb" value="<?= (old('judulprofilweb')) ? esc(old('judulprofilweb')) : $profilweb['judulprofilweb'] ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= validation_show_error('judulprofilweb') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ganti Foto</label>
                            <input id="preview_gambar" type="file" name="fotoprofilweb" class="form-control <?= validation_show_error('fotoprofilweb') ? 'is-invalid' : '' ?>" value="<?= old('fotoprofilweb'); ?>" accept="image/*">
                            <div class="invalid-feedback">
                                <?= validation_show_error('fotoprofilweb') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Preview Foto</label>
                        <div class="form-group">
                            <img src="<?= base_url('fotoprofilweb/' . $profilweb['fotoprofilweb']) ?>" id="gambar_load" alt="" width="150px" height="130px">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('/profilweb') ?>" class="btn btn-primary">Kembali</a>
            </from>


        </div>
    </div>
</div>


<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
        }
        reader.readAsDataURL(input.files[0]);
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
</script>