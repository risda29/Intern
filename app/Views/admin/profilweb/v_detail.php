<div class="col-md-12">
    <div class="card card-outline card-primary">
        <!-- /.card-header -->
        <div class="card-body">
            <h2 class="mt-2">Detail Profilweb</h2>
            <input type="hidden" name="idprofilweb" value="<?= $profilweb['idprofilweb']; ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Profilweb</label>
                        <input name="judulprofilweb" class="form-control" id="judulprofilweb" value="<?= esc($profilweb['judulprofilweb']) ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Foto Profilweb</label>
                        <div class="input-group">
                            <input id="preview_gambar" type="text" name="fotoprofilweb" class="form-control" value="<?= esc($profilweb['fotoprofilweb']) ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label>Preview Foto</label>
                    <div class="form-group">
                        <img src="<?= base_url('fotoprofilweb/' . $profilweb['fotoprofilweb']) ?>" id="gambar_load" alt="" width="150px" height="130px">
                    </div>
                </div>
            </div>
            <a href="<?= base_url('profilweb/edit/' . $profilweb['slug']) ?>" class="btn btn-warning">Edit</a>
            <a href="<?= base_url('profilweb/delete/' . $profilweb['idprofilweb']) ?>" class="btn btn-danger" onclick="confirmHapus(event)">Hapus</a>
            <a href="<?= base_url('/profilweb') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<script>
    function confirmHapus(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda Yakin Ingin Menghapus Profil Puskesmas Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('profilweb/delete/' . $profilweb['idprofilweb']) ?>';
            }
        });
    }
</script>