<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelInformasi;
use \Hermawan\DataTables\DataTable;
use Carbon\Carbon;


class Informasi extends BaseController
{
    protected $ModelInformasi;
    public function __construct()
    {
        $this->ModelInformasi = new ModelInformasi();
    }
    public function index()
    {
        $data  = [
            'title' => 'Admin | Informasi',
            'judul' => 'Kelola Informasi',
            'page' => 'admin/informasi/v_informasi',
            'menu' => 'informasi',
            'informasi' => $this->ModelInformasi->getInformasi()
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function listData()
    {
        $db = db_connect();
        $builder = $db->table('tb_informasi')
            ->select('idinformasi, namainformasi, fotoinformasi, slug')
            ->orderBy('idinformasi', 'desc');

        return DataTable::of($builder)
            ->add('foto', function ($row) {
                return '<img src="' . base_url('fotoinformasi/' . $row->fotoinformasi) . '" width="70px" height="70px">';
            })
            ->add('aksi', function ($row) {
                return '<a href="' . base_url('informasi/detail/' . $row->slug) . '" class="btn btn-block btn-secondary">Detail</a>';
            })
            ->addNumbering('no')
            ->toJson(true);
    }


    public function Tambah()
    {
        $validation = \Config\Services::validation();
        $data  = [
            'title' => 'Admin | Tambah Informasi',
            'judul' => 'Tambah Informasi',
            'page' => 'admin/informasi/v_tambah',
            'menu' => 'informasi',
            'submenu' => 'informasi',
            'validation' => $validation,
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function InsertData()
    {
        if (!$this->validate([
            'fotoinformasi' => [
                'rules' => 'uploaded[fotoinformasi]|max_size[fotoinformasi,10024]|is_image[fotoinformasi]|mime_in[fotoinformasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu!!!',
                    'max_size' => 'Ukuran foto terlalu besar, Ukuran foto MAX 10MB.',
                    'is_image' => 'File yang anda pilih bukan gambar!!!',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan JPG/JPEG/PNG!!!'
                ]
            ],
            'namainformasi' => [
                'rules' => 'required|is_unique[tb_informasi.namainformasi]',
                'errors' => [
                    'required' => 'Nama informasi harus diisi!!!',
                    'is_unique' => 'Nama informasi sudah ada!!!'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/informasi/tambah')->withInput();
        } else {
            $fileFoto = $this->request->getFile('fotoinformasi');
            $fileFoto->move('fotoinformasi');
            $namaFoto = $fileFoto->getName();

            $slug = url_title($this->request->getVar('namainformasi'), '-', true);
            $this->ModelInformasi->save([
                'namainformasi' => $this->request->getVar('namainformasi'),
                'fotoinformasi' => $namaFoto,
                'iframe' => $this->request->getVar('iframe'),
                'artikel' => $this->request->getVar('artikel'),
                'slug' => $slug
            ]);
            session()->setFlashdata('insert', 'Data Berhasil ditambahkan.');

            return redirect()->to('/informasi');
        }
    }



    public function Edit($slug)
    {
        $validation = \Config\Services::validation();
        $data  = [
            'title' => 'Admin | Edit Informasi',
            'judul' => 'Edit Informasi',
            'page' => 'admin/informasi/v_edit',
            'menu' => 'informasi',
            'validation' => $validation,
            'informasi' => $this->ModelInformasi->getInformasi($slug)
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function UpdateData($idinformasi)
    {
        $InformasiLama = $this->ModelInformasi->getInformasi($this->request->getVar('slug'));

        // Periksa apakah nama unik atau tidak
        if (isset($InformasiLama['namainformasi']) && $InformasiLama['namainformasi'] == $this->request->getVar('namainformasi')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[tb_informasi.namainformasi]';
        }

        if (!$this->validate([
            'namainformasi' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Nama informasi harus diisi!!!',
                    'is_unique' => 'Nama informasi sudah digunakan!!!',
                ]
            ],
            'fotoinformasi' => [
                'rules' => 'max_size[fotoinformasi,10024]|is_image[fotoinformasi]|mime_in[fotoinformasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Upload foto terlebih dahulu!!!',
                    'max_size' => 'Ukuran foto terlalu besar, Ukuran foto MAX 10MB.',
                    'is_image' => 'File yang anda pilih bukan gambar!!!',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan JPG/JPEG/PNG!!!'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/informasi/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('fotoinformasi');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getName();
            $fileFoto->move('fotoinformasi', $namaFoto);
            unlink('fotoinformasi/' . $this->request->getVar('fotoLama'));
        }

        $slug = url_title($this->request->getVar('namainformasi'), '-', true);
        $this->ModelInformasi->save([
            'idinformasi' => $idinformasi,
            'namainformasi' => $this->request->getVar('namainformasi'),
            'fotoinformasi' => $namaFoto,
            'iframe' => $this->request->getVar('iframe'),
            'artikel' => $this->request->getVar('artikel'),
            'slug' => $slug
        ]);
        session()->setFlashdata('update', 'Data Berhasil diedit.');

        return redirect()->to('/informasi');
    }

    public function Delete($idinformasi)
    {
        $informasi = $this->ModelInformasi->find($idinformasi);
        if ($informasi['fotoinformasi'] <> '') {
            unlink('fotoinformasi/' . $informasi['fotoinformasi']);
        }
        $data = [
            'idinformasi' => $idinformasi,
        ];
        $this->ModelInformasi->delete($data);
        session()->setFlashdata('delete', 'Informasi Berhasil dihapus !!!');
        return redirect()->to(base_url('/informasi'));
    }

    public function Detail($slug)
    {
        $informasi = $this->ModelInformasi->getInformasi($slug);

        if (empty($informasi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Informasi ' . $slug . ' tidak ditemukan');
        }

        // Menggunakan Carbon untuk mengonversi string tanggal dan waktu ke format bahasa Indonesia
        $timestamp = strtotime($informasi['created_at']);
        $carbonDate = Carbon::parse($informasi['created_at'])->locale('id');

        $formattedDate = $carbonDate->isoFormat('dddd, D MMMM YYYY.');
        $formattedTime = $carbonDate->isoFormat('HH:mm:ss'); // Menambahkan waktu

        $informasi['tanggal'] = $formattedDate;
        $informasi['waktu'] = $formattedTime;

        $data = [
            'title' => 'Admin | Detail Informasi',
            'judul' => 'Detail Informasi',
            'page' => 'admin/informasi/v_detail',
            'menu' => 'informasi',
            'informasi' => $informasi,
        ];

        return view('admin/v_templateadmin', $data);
    }
}
