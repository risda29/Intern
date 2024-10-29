<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProfilweb;
use App\Models\ModelInformasi;
use App\Models\ModelPelayanan;
use App\Models\ModelPengaduan;

class Profil extends BaseController
{
    protected $ModelProfilweb;
    protected $ModelPelayanan;
    protected $ModelInformasi;
    protected $ModelPengaduan;

    public function __construct()
    {
        $this->ModelProfilweb = new ModelProfilweb();
        $this->ModelPelayanan = new ModelPelayanan();
        $this->ModelInformasi = new ModelInformasi();
        $this->ModelPengaduan = new ModelPengaduan();
    }

    public function detail($slug)
    {
        $profil = $this->ModelProfilweb->getProfilweb($slug);
        $pelayanan = $this->ModelPelayanan->getPelayanan($slug);
        $infor = $this->ModelInformasi->getInformasi($slug);
        $informasi = $this->ModelInformasi->AllData();

        // Ambil kolom ID informasi ke dalam array terpisah untuk diurutkan
        $idInformasi = array_column($informasi, 'idinformasi');

        // Urutkan array informasi berdasarkan ID secara terbalik (dari yang paling baru)
        array_multisort($idInformasi, SORT_DESC, $informasi);

        // Batasi jumlah informasi menjadi 10
        $informasi = array_slice($informasi, 0, 10);

        $data = [
            'profil' => $profil,
            'pelayanan' => $pelayanan,
            'informasi' => $informasi,
            'infor' => $infor,
        ];

        // Set the title based on data presence
        if (!empty($pelayanan)) {
            $data['title'] = 'Pelayanan Puskesmas';
        } elseif (!empty($profil)) {
            $data['title'] = 'Profil Puskesmas';
        } else {
            $data['title'] = 'Puskesmas Panggung';
        }

        return view('profil/detail', $data);
    }


    public function informasipuskesmas($slug)
    {
        $profil = $this->ModelProfilweb->getProfilweb($slug);
        $pelayanan = $this->ModelPelayanan->getPelayanan($slug);
        $informasi = $this->ModelInformasi->getInformasi($slug);

        $data = [
            'title' => 'Pelayanan Puskesmas',
            'profil' => $profil,
            'pelayanan' => $pelayanan,
            'informasi' => $informasi,
        ];

        return view('profil/informasipuskes', $data);
    }


    public function pengaduan()
    {
        $data = [
            'title' => 'Pengaduan Puskesmas',
            'poli' => $this->ModelPengaduan->AllPoli(),
        ];
        return view('profil/v_pengaduan', $data);
    }

    public function pengaduantambah()
    {
        if (!$this->validate([
            'judulpengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Pengaduan harus diisi.',
                ]
            ],
            'isipengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap Isi Pengaduan.',
                ]
            ],
            'idpoli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap Pilih Poli.',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pengunjungpengaduan')->withInput();
        } else {

            $this->ModelPengaduan->save([
                'judulpengaduan' => $this->request->getVar('judulpengaduan'),
                'isipengaduan' => $this->request->getVar('isipengaduan'),
                'idpoli' => $this->request->getVar('idpoli')
            ]);
            session()->setFlashdata('insert', 'Pengaduan Berhasil dikirim.');

            return redirect()->to('/pengunjungpengaduan');
        }
    }
}
