<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProfilweb;
use \Hermawan\DataTables\DataTable;

class Profilweb extends BaseController
{
    protected $ModelProfilweb;
    public function __construct()
    {
        $this->ModelProfilweb = new ModelProfilweb();
    }


    public function index()
    {
        $data  = [
            'title' => 'Admin | Profil Puskesmas',
            'judul' => 'Kelola Profil Puskesmas',
            'page' => 'admin/profilweb/v_profilweb',
            'menu' => 'profilweb',
            'profilweb' => $this->ModelProfilweb->getProfilweb()
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function listData()
    {
        $db = db_connect();
        $builder = $db->table('tb_profilweb')
            ->select('idprofilweb, judulprofilweb, fotoprofilweb, slug')
            ->orderBy('idprofilweb', 'desc');

        return DataTable::of($builder)
            ->add('foto', function ($row) {
                return '<img src="' . base_url('fotoprofilweb/' . $row->fotoprofilweb) . '" width="70px" height="70px">';
            })
            ->add('aksi', function ($row) {
                return '<a href="' . base_url('profilweb/detail/' . $row->slug) . '" class="btn btn-block btn-secondary">Detail</a>';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function Detail($slug)
    {
        $profilweb = $this->ModelProfilweb->getProfilweb($slug);

        if (empty($profilweb)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Profil ' . $slug . ' tidak ditemukan');
        }

        $data = [
            'title' => 'Admin | Detail Profil Puskesmas',
            'judul' => 'Detail Profil Puskesmas',
            'page' => 'admin/profilweb/v_detail',
            'menu' => 'profilweb',
            'profilweb' => $profilweb,
        ];

        return view('admin/v_templateadmin', $data);
    }

    public function Tambah()
    {
        $validation = \Config\Services::validation();
        $data  = [
            'title' => 'Admin | Tambah Profil Puskesmas',
            'judul' => 'Tambah Profil Puskesmas',
            'page' => 'admin/profilweb/v_tambah',
            'menu' => 'profilweb',
            'submenu' => 'profilweb',
            'validation' => $validation,
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function InsertData()
    {
        if (!$this->validate([
            'fotoprofilweb' => [
                'rules' => 'uploaded[fotoprofilweb]|max_size[fotoprofilweb,10024]|is_image[fotoprofilweb]|mime_in[fotoprofilweb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu!!!',
                    'max_size' => 'Ukuran foto terlalu besar, Ukuran foto MAX 10MB.',
                    'is_image' => 'File yang anda pilih bukan gambar!!!',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan JPG/JPEG/GIF/PNG/WEBP!!!'
                ]
            ],
            'judulprofilweb' => [
                'rules' => 'required|is_unique[tb_profilweb.judulprofilweb]',
                'errors' => [
                    'required' => 'Nama Profilweb harus diisi!!!',
                    'is_unique' => 'Nama Profilweb sudah ada!!!'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/profilweb/tambah')->withInput();
        } else {
            $fileFoto = $this->request->getFile('fotoprofilweb');
            $fileFoto->move('fotoprofilweb');
            $namaFoto = $fileFoto->getName();

            $slug = url_title($this->request->getVar('judulprofilweb'), '-', true);
            $this->ModelProfilweb->save([
                'judulprofilweb' => $this->request->getVar('judulprofilweb'),
                'fotoprofilweb' => $namaFoto,
                'slug' => $slug
            ]);
            session()->setFlashdata('insert', 'Data Berhasil ditambahkan.');

            return redirect()->to('/profilweb');
        }
    }

    public function Edit($slug)
    {
        $validation = \Config\Services::validation();
        $data  = [
            'title' => 'Admin | Edit Profil Puskesmas',
            'judul' => 'Edit Profil Puskesmas',
            'page' => 'admin/profilweb/v_edit',
            'menu' => 'profilweb',
            'validation' => $validation,
            'profilweb' => $this->ModelProfilweb->getProfilweb($slug)
        ];
        return view('admin/v_templateadmin', $data);
    }

    public function UpdateData($idprofilweb)
    {
        // cek judul
        $ProfilLama = $this->ModelProfilweb->getProfilweb($this->request->getVar('slug'));
        if ($ProfilLama['judulprofilweb'] == $this->request->getVar('judulprofilweb')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[tb_profilweb.judulprofilweb]';
        }

        if (!$this->validate([
            'judulprofilweb' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Nama Profilweb harus diisi!!!',
                    'is_unique' => 'Nama Profilweb sudah ada!!!'
                ]
            ],
            'fotoprofilweb' => [
                'rules' => 'max_size[fotoprofilweb,10024]|is_image[fotoprofilweb]|mime_in[fotoprofilweb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu!!!',
                    'max_size' => 'Ukuran foto terlalu besar, Ukuran foto MAX 10MB.',
                    'is_image' => 'File yang anda pilih bukan gambar!!!',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan JPG/JPEG/PNG!!!'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/profilweb/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('fotoprofilweb');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getName();
            $fileFoto->move('fotoprofilweb', $namaFoto);
            unlink('fotoprofilweb/' . $this->request->getVar('fotoLama'));
        }

        $slug = url_title($this->request->getVar('judulprofilweb'), '-', true);
        $this->ModelProfilweb->save([
            'idprofilweb' => $idprofilweb,
            'judulprofilweb' => $this->request->getVar('judulprofilweb'),
            'fotoprofilweb' => $namaFoto,
            'slug' => $slug,
        ]);
        session()->setFlashdata('update', 'Data Berhasil diedit.');

        return redirect()->to('/profilweb');
    }

    public function Delete($idprofilweb)
    {
        $profilweb = $this->ModelProfilweb->find($idprofilweb);
        if ($profilweb['fotoprofilweb'] <> '') {
            unlink('fotoprofilweb/' . $profilweb['fotoprofilweb']);
        }
        $data = [
            'idprofilweb' => $idprofilweb,
        ];
        $this->ModelProfilweb->delete($data);
        session()->setFlashdata('delete', 'Data Berhasil dihapus !!!');
        return redirect()->to(base_url('/profilweb'));
    }
}
