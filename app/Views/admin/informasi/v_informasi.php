<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('informasi/tambah') ?>" class="btn btn-flat btn-primary btn-xm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-1">
            <!-- notif pesan berhasil ditambahkan -->
            <?php
            if (session()->getFlashdata('insert')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('insert');
                echo '</div>';
            }
            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary">';
                echo session()->getFlashdata('update');
                echo '</div>';
            }
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger">';
                echo session()->getFlashdata('delete');
                echo '</div>';
            }
            ?>
            <table id="listinformasi" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Informasi</th>
                        <th>Foto</th>
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
        $('#listinformasi').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: '<?= base_url('informasi/listdata') ?>',
            columns: [{
                    data: 'no',
                    orderable: false
                },
                {
                    data: 'namainformasi'
                },
                {
                    data: 'foto'
                },
                {
                    data: 'aksi',
                    orderable: false
                },
            ]
        });
    });
</script>