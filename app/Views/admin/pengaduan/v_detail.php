<div class="col-md-12">
    <div class="card card-outline card-primary">
        <!-- /.card-header -->
        <div class="card-body">
            <h2 class="mt-2">Detail Pengaduan</h2>
            <input type="hidden" name="idpengaduan" value="<?= $pengaduan['idpengaduan']; ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Judul Pengaduan</label>
                        <input type="text" class="form-control" value="<?= esc($pengaduan['judulpengaduan']) ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Pengaduan Ini Untuk Poli:</label>
                        <input type="text" class="form-control" value="<?= esc($pengaduan['namapoli']) ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tanggal Pengaduan</label>
                        <input type="text" class="form-control" value="<?= esc($pengaduan['tanggal'] . ' ' . $pengaduan['waktu']) ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Isi Pengaduan</label>
                        <textarea class="form-control" rows="12" readonly><?= esc($pengaduan['isipengaduan']) ?></textarea>
                    </div>
                </div>
            </div>
            <?php if (session()->leveluser == 'Admin Puskesmas') : ?>
                <?php if ($pengaduan['status'] == 'Belum Disetujui') : ?>
                    <a href="<?= base_url('pengaduan/setuju/' . $pengaduan['idpengaduan']) ?>" class="btn btn-success" onclick="confirmSetuju(event)">Setujui</a>
                <?php endif; ?>
                <a href="<?= base_url('pengaduan/delete/' . $pengaduan['idpengaduan']) ?>" class="btn btn-danger" onclick="confirmHapus(event)">Hapus</a>
            <?php endif; ?>
            <a href="<?= base_url('/pengaduan') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<script>
    function confirmHapus(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('pengaduan/delete/' . $pengaduan['idpengaduan']) ?>';
            }
        });
    }

    function confirmSetuju(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda Yakin Ingin Menyetujui Pengaduan Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Setujui!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('pengaduan/setuju/' . $pengaduan['idpengaduan']) ?>';
            }
        });
    }
</script>