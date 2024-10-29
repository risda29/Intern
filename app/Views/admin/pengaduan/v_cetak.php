<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <!-- <link rel="icon" href="https://www.dropbox.com/scl/fi/tvkz0wixclfymef0933wz/logopuskespanggungnobg.jpg?rlkey=pt31iw6s9jijhojvcxnfxgy7d&dl=0"> -->
    <link href="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents('assets/img/logopuskespanggungnobg.jpg')); ?>" rel="icon">

    <title><?= $title; ?></title>
</head>

<body>
    <div class=" img">
        <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents('assets/img/logopuskespanggungnobg.jpg')); ?>" alt="" style="position: absolute; top: 8px; width:60px; height:auto;">
        <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents('assets/img/logodinkes.jpg')); ?>" alt="" style="position: absolute; top: 8px; width:60px; height:auto; right: 0;">
    </div>
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    PUSKESMAS PANGGUNG<br>
                </span>
                <p style="line-height: 1.2; margin: 5px 0 0;">Kec. Pelaihari. Kabupaten Tanah Laut,<br> Kalimantan Selatan</p>
            </td>
        </tr>
    </table>

    <hr class="line-title">

    <p align="center">
        LAPORAN PENGADUAN PENGUNJUNG
    </p>

    <div>
        <table class="table-laporan">
            <thead>
                <tr>
                    <th class="th-laporan">No</th>
                    <th class="th-laporan">Judul Pengaduan</th>
                    <th class="th-laporan">Pengaduan Ini Untuk</th>
                    <th class="th-laporan">Isi Pengaduan</th>
                    <th class="th-laporan">Tanggal Pengaduan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pengaduan as $p) :
                    // Check if the status is 1
                    if ($p['status'] == 'Disetujui') :
                ?>
                        <tr>
                            <td class="td-laporan"><?= $no++ ?></td>
                            <td class="td-laporan"><?= esc($p['judulpengaduan']) ?></td>
                            <td class="td-laporan"><?= esc($p['namapoli']) ?></td>
                            <td class="td-laporan-isipengaduan"><?= esc($p['isipengaduan']) ?></td>
                            <td class="td-laporan"><?= esc($p['tanggal']) ?></td>
                        </tr>
                <?php
                    endif;
                endforeach;
                ?>

            </tbody>
        </table>
    </div>

    <?php
    function getIndonesianDate($date)
    {
        $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $months = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $day = date('w', strtotime($date));
        $day_in_indonesian = $days[$day];

        $month = date('n', strtotime($date));
        $month_in_indonesian = $months[$month];

        $formatted_date = $day_in_indonesian . ', ' . date('d', strtotime($date)) . ' ' . $month_in_indonesian . ' ' . date('Y', strtotime($date));

        return $formatted_date;
    }

    // Contoh penggunaan
    $today = date('Y-m-d'); // Ganti ini dengan tanggal yang ingin Anda format
    $indonesian_date = getIndonesianDate($today);
    ?>

    <div class="footer">
        <p class="footer-text">Dicetak Oleh <?= session()->leveluser; ?> Panggung, Pada <?= $indonesian_date ?>.</p>
    </div>


    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 2px solid #000;
        }

        .table-laporan {
            width: 100%;
            border-collapse: collapse;
            font-size: 12pt;
        }

        .th-laporan,
        .td-laporan {
            border: 0.5px solid #333;
            padding: 8px;
            text-align: left;
        }

        .td-laporan-isipengaduan {
            border: 1px solid #333;
            padding: 8px;
            text-align: justify;
        }

        .table-laporan th {
            background-color: #239D60;
            color: white;
            text-align: center;
        }

        tbody,
        td {
            vertical-align: top;
        }

        .footer {
            margin-top: 20px;
            text-align: left;
        }

        .footer-text {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</body>

</html>