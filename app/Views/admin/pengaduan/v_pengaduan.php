<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a target="_blank" href="<?= base_url('pengaduan/export-pdf') ?>" class="btn btn-danger">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-1">
            <!-- notif pesan berhasil ditambahkan -->
            <?php
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger">';
                echo session()->getFlashdata('delete');
                echo '</div>';
            }
            if (session()->getFlashdata('setuju')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('setuju');
                echo '</div>';
            }
            ?>
            <table id="listpengaduan" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengaduan</th>
                        <th>Pengaduan Ini Untuk Poli:</th>
                        <th>Tanggal Pengaduan</th>
                        <?php if (session()->leveluser == 'Admin Puskesmas') : ?>
                            <th>Status</th>
                        <?php endif; ?>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
    $(document).ready(function() {
        var hideStatusColumn = <?= (isset($_SESSION['leveluser']) && $_SESSION['leveluser'] == 'Kepala Puskesmas') ? 'true' : 'false' ?>;

        var columns = [{
                data: 'no',
                orderable: false
            },
            {
                data: 'judulpengaduan'
            },
            {
                data: 'namapoli'
            },
            {
                data: 'created_at'
            },
        ];

        // Add the Status column only if it should be visible
        if (!hideStatusColumn) {
            columns.push({
                data: 'status'
            });
        }

        columns.push({
            data: 'aksi',
            orderable: false
        });

        $('#listpengaduan').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: '<?= base_url('pengaduan/listdata') ?>',
            columns: columns
        });
    });
</script>