<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form action="<?= base_url('/informasi/updatedata/') . $informasi['idinformasi']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $informasi['slug']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $informasi['fotoinformasi']; ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Informasi</label>
                            <input name="namainformasi" class="form-control <?= validation_show_error('namainformasi') ? 'is-invalid' : '' ?>" id="namainformasi" value="<?= (old('namainformasi')) ? old('namainformasi') : $informasi['namainformasi'] ?>" autofocus></input>
                            <div class="invalid-feedback">
                                <?= validation_show_error('namainformasi') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Iframe</label>
                            <textarea rows="5" name="iframe" class="form-control <?= validation_show_error('iframe') ? 'is-invalid' : '' ?>" id="iframe"><?= (old('iframe')) ? old('iframe') : $informasi['iframe'] ?></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('iframe') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Foto</label>
                            <div class="input-group  <?= validation_show_error('fotoinformasi') ? 'is-invalid' : '' ?>">
                                <div class="custom-file">
                                    <input id="preview_gambar" type="file" name="fotoinformasi" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label" for="preview_gambar"><?= set_value('fotoinformasi', $informasi['fotoinformasi']) ?></label>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                <?= validation_show_error('fotoinformasi') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label>Preview Foto</label>
                        <div class="form-group">
                            <img src="<?= base_url('fotoinformasi/' . $informasi['fotoinformasi']) ?>" id="gambar_load" alt="" width="150px" height="130px">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Artikel</label>
                            <textarea name="artikel" rows="10" class="form-control <?= validation_show_error('artikel') ? 'is-invalid' : '' ?>" id="artikel"><?= (old('artikel')) ? old('artikel') : $informasi['artikel'] ?></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('artikel') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('/informasi') ?>" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
        // Update file name in the label
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });

    ClassicEditor
        .create(document.querySelector('#artikel'))
        .catch(error => {
            console.error(error);
        });
</script>