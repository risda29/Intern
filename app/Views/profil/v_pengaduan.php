<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #005B41;">
                        <h3 class="card-title" style="margin-top: 10px;">Pengaduan</h3><br>

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart(base_url('pengunjungpengaduan/tambah'), ['id' => 'pengaduanForm']) ?>
                    <?= csrf_field(); ?>
                    <div class=" card-body">
                        <p>Berikan Pengaduan Anda untuk Puskesmas Panggung.</p>
                        <?php
                        if (session()->getFlashdata('insert')) {
                            echo '<div class="alert alert-success">';
                            echo session()->getFlashdata('insert');
                            echo '</div>';
                        }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Pengaduan</label>
                            <input type="text" name="judulpengaduan" class="form-control <?= validation_show_error('judulpengaduan') ? 'is-invalid' : '' ?>" id="judulpengaduan" value="<?= old('judulpengaduan') ? esc(old('judulpengaduan')) : '' ?>" autofocus id="exampleInputEmail1" placeholder="Judul Pengaduan ...">
                            <div class="invalid-feedback">
                                <?= validation_show_error('judulpengaduan') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pengaduan Ini Untuk Poli:</label>
                            <select name="idpoli" class="form-control <?= validation_show_error('idpoli') ? 'is-invalid' : '' ?>" id="idpoli" value="<?= old('idpoli') ? esc(old('idpoli')) : '' ?>">
                                <option value="" selected>Pilih Poli ...</option>
                                <?php foreach ($poli as $p) { ?>
                                    <option value="<?= $p['idpoli']; ?>" <?= old('idpoli') == $p['idpoli'] ? 'selected' : '' ?>>
                                        <?= $p['namapoli']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('idpoli') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Isi Pengaduan</label>
                            <textarea name="isipengaduan" rows="10" class="form-control <?= validation_show_error('isipengaduan') ? 'is-invalid' : '' ?>" id="isipengaduan" placeholder="Isi Pengaduan ..."><?= old('isipengaduan') ? esc(old('isipengaduan')) : '' ?></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('isipengaduan') ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" style="background-color: #005B41;">Kirim</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#pengaduanForm').submit(function() {
            // Menonaktifkan animasi setelah form dikirim
            $('.card').removeClass('animate__animated animate__zoomIn');

            // Tambahkan logika lainnya di sini jika diperlukan

            return true; // Set to false if you want to prevent the form from submitting
        });
    });
</script>


<?= $this->endSection(); ?>