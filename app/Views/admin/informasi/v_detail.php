<div class="col-md-12">
    <div class="card card-outline card-primary">
        <!-- /.card-header -->
        <div class="card-body">
            <h2 class="mt-2">Detail Informasi</h2>
            <input type="hidden" name="idinformasi" value="<?= $informasi['idinformasi']; ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Informasi</label>
                        <input name="namainformasi" class="form-control" id="namainformasi" value="<?= esc($informasi['namainformasi']) ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Iframe</label>
                        <textarea rows="5" name="iframe" class="form-control" id="iframe" readonly><?= esc($informasi['iframe']) ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Foto Informasi</label>
                        <div class="input-group">
                            <input id="preview_gambar" type="text" name="fotoinformasi" class="form-control" value="<?= esc($informasi['fotoinformasi']) ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label>Preview Foto</label>
                    <div class="form-group">
                        <img src="<?= base_url('fotoinformasi/' . $informasi['fotoinformasi']) ?>" id="gambar_load" alt="" width="150px" height="130px">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tanggal Upload</label>
                        <input name="created_at" class="form-control" id="created_at" value="<?= esc($informasi['tanggal'] . ' ' . $informasi['waktu']) ?>" readonly>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group text-justify">
                        <label for="exampleInputEmail1">Artikel:</label>
                        <p class="mb-0"><?= $informasi['artikel'] ?></p>
                    </div>
                </div>
            </div>

            <a href="<?= base_url('informasi/edit/' . $informasi['slug']) ?>" class="btn btn-warning">Edit</a>
            <a href="<?= base_url('informasi/delete/' . $informasi['idinformasi']) ?>" class="btn btn-danger" onclick="confirmHapus(event)">Hapus</a>
            <a href="<?= base_url('/informasi') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<script>
    function confirmHapus(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda Yakin Ingin Menghapus Informasi Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('informasi/delete/' . $informasi['idinformasi']) ?>';
            }
        });
    }
</script>