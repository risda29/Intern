<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPelayanan;
use \Hermawan\DataTables\DataTable;

class Pelayanan extends BaseController
{
    protected $ModelPelayanan;
    public function __construct()
    {
        $this->ModelPelayanan = new ModelPelayanan();
    }
    public function index()
    {
        $data  = [
            'title' => 'Admin | Pelayanan',
            'judul' => 'Kelola Pelayanan',
            'page' => 'admin/pelayanan/v_pelayanan',
            'menu' => 'pelayanan',
            'pelayanan' => $this->ModelPelayanan->getPelayanan()
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function listData()
    {
        $db = db_connect();
        $builder = $db->table('tb_pelayanan')
            ->select('idpelayanan, namapelayanan, fotopelayanan, slug')
            ->orderBy('idpelayanan', 'desc');

        return DataTable::of($builder)
            ->add('foto', function ($row) {
                return '<img src="' . base_url('fotopelayanan/' . $row->fotopelayanan) . '" width="70px" height="70px">';
            })
            ->add('aksi', function ($row) {
                return '<a href="' . base_url('pelayanan/detail/' . $row->slug) . '" class="btn btn-block btn-secondary">Detail</a>';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function Detail($slug)
    {
        $pelayanan = $this->ModelPelayanan->getPelayanan($slug);

        if (empty($pelayanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pelayanan ' . $slug . ' tidak ditemukan');
        }

        $data = [
            'title' => 'Admin | Detail Pelayanan',
            'judul' => 'Detail Pelayanan',
            'page' => 'admin/pelayanan/v_detail',
            'menu' => 'pelayanan',
            'pelayanan' => $pelayanan,
        ];

        return view('admin/v_templateadmin', $data);
    }

    public function Tambah()
    {
        $validation = \Config\Services::validation();
        $data  = [
            'title' => 'Admin | Tambah Pelayanan',
            'judul' => 'Tambah Pelayanan',
            'page' => 'admin/pelayanan/v_tambah',
            'menu' => 'pelayanan',
            'submenu' => 'pelayanan',
            'validation' => $validation,
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function InsertData()
    {
        if (!$this->validate([
            'fotopelayanan' => [
                'rules' => 'uploaded[fotopelayanan]|max_size[fotopelayanan,10024]|is_image[fotopelayanan]|mime_in[fotopelayanan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu!!!',
                    'max_size' => 'Ukuran foto terlalu besar, Ukuran foto MAX 10MB.',
                    'is_image' => 'File yang anda pilih bukan gambar!!!',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan JPG/JPEG/GIF/PNG/WEBP!!!'
                ]
            ],
            'namapelayanan' => [
                'rules' => 'required|is_unique[tb_pelayanan.namapelayanan]',
                'errors' => [
                    'required' => 'Nama Pelayanan harus diisi!!!',
                    'is_unique' => 'Nama Pelayanan sudah ada!!!'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pelayanan/tambah')->withInput();
        } else {
            $fileFoto = $this->request->getFile('fotopelayanan');
            $fileFoto->move('fotopelayanan');
            $namaFoto = $fileFoto->getName();

            $slug = url_title($this->request->getVar('namapelayanan'), '-', true);
            $this->ModelPelayanan->save([
                'namapelayanan' => $this->request->getVar('namapelayanan'),
                'fotopelayanan' => $namaFoto,
                'slug' => $slug
            ]);
            session()->setFlashdata('insert', 'Data Berhasil ditambahkan.');

            return redirect()->to('/pelayanan');
        }
    }



    public function Edit($slug)
    {
        $validation = \Config\Services::validation();
        $data  = [
            'title' => 'Admin | Edit Pelayanan',
            'judul' => 'Edit Pelayanan',
            'page' => 'admin/pelayanan/v_edit',
            'menu' => 'pelayanan',
            'validation' => $validation,
            'pelayanan' => $this->ModelPelayanan->getPelayanan($slug)
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function UpdateData($idpelayanan)
    {
        // cek judul
        $ProfilLama = $this->ModelPelayanan->getPelayanan($this->request->getVar('slug'));
        if ($ProfilLama['namapelayanan'] == $this->request->getVar('namapelayanan')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[tb_pelayanan.namapelayanan]';
        }

        if (!$this->validate([
            'namapelayanan' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Nama Pelayanan harus diisi!!!',
                    'is_unique' => 'Nama Pelayanan sudah ada!!!'
                ]
            ],
            'fotopelayanan' => [
                'rules' => 'max_size[fotopelayanan,10024]|is_image[fotopelayanan]|mime_in[fotopelayanan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu!!!',
                    'max_size' => 'Ukuran foto terlalu besar, Ukuran foto MAX 10MB.',
                    'is_image' => 'File yang anda pilih bukan gambar!!!',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan JPG/JPEG/PNG!!!'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pelayanan/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('fotopelayanan');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getName();
            $fileFoto->move('fotopelayanan', $namaFoto);
            unlink('fotopelayanan/' . $this->request->getVar('fotoLama'));
        }

        $slug = url_title($this->request->getVar('namapelayanan'), '-', true);
        $this->ModelPelayanan->save([
            'idpelayanan' => $idpelayanan,
            'namapelayanan' => $this->request->getVar('namapelayanan'),
            'fotopelayanan' => $namaFoto,
            'slug' => $slug,
        ]);
        session()->setFlashdata('update', 'Data Berhasil diedit.');

        return redirect()->to('/pelayanan');
    }

    public function Delete($idpelayanan)
    {
        $pelayanan = $this->ModelPelayanan->find($idpelayanan);
        if ($pelayanan['fotopelayanan'] <> '') {
            unlink('fotopelayanan/' . $pelayanan['fotopelayanan']);
        }
        $data = [
            'idpelayanan' => $idpelayanan,
        ];
        $this->ModelPelayanan->delete($data);
        session()->setFlashdata('delete', 'Data Berhasil dihapus !!!');
        return redirect()->to(base_url('/pelayanan'));
    }
}
