<div class="col-md-12">
    <div class="card card-outline card-primary">
        <!-- /.card-header -->
        <div class="card-body">
            <h2 class="mt-2">Detail Pelayanan</h2>
            <input type="hidden" name="idpelayanan" value="<?= $pelayanan['idpelayanan']; ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Pelayanan</label>
                        <input name="namapelayanan" class="form-control" id="namapelayanan" value="<?= esc($pelayanan['namapelayanan']) ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Foto pelayanan</label>
                        <div class="input-group">
                            <input id="preview_gambar" type="text" name="fotopelayanan" class="form-control" value="<?= esc($pelayanan['fotopelayanan']) ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label>Preview Foto</label>
                    <div class="form-group">
                        <img src="<?= base_url('fotopelayanan/' . $pelayanan['fotopelayanan']) ?>" id="gambar_load" alt="" width="150px" height="130px">
                    </div>
                </div>
            </div>
            <a href="<?= base_url('pelayanan/edit/' . $pelayanan['slug']) ?>" class="btn btn-warning">Edit</a>
            <a href="<?= base_url('pelayanan/delete/' . $pelayanan['idpelayanan']) ?>" class="btn btn-danger" onclick="confirmHapus(event)">Hapus</a>
            <a href="<?= base_url('/pelayanan') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<script>
    function confirmHapus(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda Yakin Ingin Menghapus Data Pelayanan Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('pelayanan/delete/' . $pelayanan['idpelayanan']) ?>';
            }
        });
    }
</script>