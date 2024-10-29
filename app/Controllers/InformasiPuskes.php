<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelInformasi;
use Carbon\Carbon;

class InformasiPuskes extends BaseController
{
    protected $ModelInformasi;

    public function __construct()
    {
        $this->ModelInformasi = new ModelInformasi();
    }

    public function informasipuskesmas($slug)
    {
        $informasi = $this->ModelInformasi->getInformasi($slug);
        $informasialldata = $this->ModelInformasi->AllData();

        // Ambil kolom ID informasi ke dalam array terpisah untuk diurutkan
        $idInformasi = array_column($informasialldata, 'idinformasi');

        // Urutkan array informasi berdasarkan ID secara terbalik (dari yang paling baru)
        array_multisort($idInformasi, SORT_DESC, $informasialldata);

        // Batasi jumlah informasi menjadi 10
        $informasialldata = array_slice($informasialldata, 0, 10);

        // Menggunakan Carbon untuk mengonversi string tanggal ke format bahasa Indonesia
        $timestamp = strtotime($informasi['created_at']);
        $carbonDate = Carbon::parse($informasi['created_at'])->locale('id');

        $formattedDate = $carbonDate->isoFormat('dddd, D MMMM YYYY.');

        $informasi['tanggal'] = $formattedDate;


        $data = [
            'title' => 'Informasi Puskesmas',
            'informasi' => $informasi,
            'informasialldata' => $informasialldata,
        ];

        return view('profil/informasipuskes', $data);
    }
}
