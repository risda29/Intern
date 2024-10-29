<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>


            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php echo form_open_multipart('pelayanan/insertdata') ?>
            <?= csrf_field(); ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pelayanan</label>
                    <input name="namapelayanan" class="form-control <?= validation_show_error('namapelayanan') ? 'is-invalid' : '' ?>" id="namapelayanan" value="<?= old('namapelayanan'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('namapelayanan') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input id="preview_gambar" type="file" name="fotopelayanan" class="form-control <?= validation_show_error('fotopelayanan') ? 'is-invalid' : '' ?>" value="<?= old('fotopelayanan'); ?>" accept="image/*">
                        <div class="invalid-feedback">
                            <?= validation_show_error('fotopelayanan') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Preview Foto</label>
                    <div class="form-group">
                        <img src="<?= base_url('foto/blank.jpg') ?>" id="gambar_load" alt="" width="150px" height="130px">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('/pelayanan') ?>" class="btn btn-primary">Kembali</a>
            <?php echo form_close() ?>


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