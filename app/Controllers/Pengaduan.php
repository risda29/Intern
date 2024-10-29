<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengaduan;
use \Hermawan\DataTables\DataTable;
use Dompdf\Dompdf;
use Carbon\Carbon;

class Pengaduan extends BaseController
{
    protected $ModelPengaduan;
    public function __construct()
    {
        $this->ModelPengaduan = new ModelPengaduan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kelola Pengaduan',
            'page' => 'admin/pengaduan/v_pengaduan',
            'menu' => 'pengaduan',
        ];

        if (isset($_SESSION['leveluser']) && $_SESSION['leveluser'] == 'Kepala Puskesmas') {
            $data['title'] = 'Kepala Puskesmas | Pengaduan';
        } else {
            $data['title'] = 'Admin | Pengaduan';
        }

        return view('admin/v_templateadmin', $data);
    }

    public function listData()
    {
        $db = db_connect();
        $builder = $db->table('tb_pengaduan')
            ->select('idpengaduan, judulpengaduan, tb_poli.namapoli, created_at, status')
            ->join('tb_poli', 'tb_poli.idpoli=tb_pengaduan.idpoli')
            ->orderBy('idpengaduan', 'desc');

        // Check if the user's session level is "Kepala Puskesmas"
        if (isset($_SESSION['leveluser']) && $_SESSION['leveluser'] == 'Kepala Puskesmas') {
            $builder->where('status', 'disetujui');
        }

        return DataTable::of($builder)
            ->add('aksi', function ($row) {
                return '<a href="' . base_url('pengaduan/detail/' . $row->idpengaduan) . '" class="btn btn-block btn-secondary">Detail</a>';
            })
            ->addNumbering('no')
            ->toJson(true);
    }


    public function Detail($idpengaduan)
    {
        $pengaduan = $this->ModelPengaduan->getPengaduan($idpengaduan);

        if (empty($pengaduan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengaduan ' . $idpengaduan . ' tidak ditemukan');
        }

        // Menggunakan Carbon untuk mengonversi string tanggal dan waktu ke format bahasa Indonesia
        $timestamp = strtotime($pengaduan['created_at']);
        $carbonDate = Carbon::parse($pengaduan['created_at'])->locale('id');

        $formattedDate = $carbonDate->isoFormat('dddd, D MMMM YYYY.');
        $formattedTime = $carbonDate->isoFormat('HH:mm:ss'); // Menambahkan waktu

        $pengaduan['tanggal'] = $formattedDate;
        $pengaduan['waktu'] = $formattedTime;

        $data = [
            'title' => 'Admin | Detail Pengaduan',
            'judul' => 'Detail Pengaduan',
            'page' => 'admin/pengaduan/v_detail',
            'menu' => 'pengaduan',
            'pengaduan' => $pengaduan
        ];

        return view('admin/v_templateadmin', $data);
    }


    public function Delete($idpengaduan)
    {
        $data = [
            'idpengaduan' => $idpengaduan,
        ];
        $this->ModelPengaduan->delete($data);
        session()->setFlashdata('delete', 'Pengaduan Berhasil dihapus !!!');
        return redirect()->to(base_url('pengaduan'));
    }

    public function Setuju($idpengaduan)
    {
        $data = [
            'status' => "Disetujui",
        ];

        $this->ModelPengaduan->save([
            'idpengaduan' => $idpengaduan,
            'status' => $data,
        ]);
        session()->setFlashdata('setuju', 'Pengaduan Disetujui !!!');
        return redirect()->to(base_url('pengaduan'));
    }

    public function Exportpdf()
    {
        $dompdf = new Dompdf();
        $data = [
            'title' => 'Laporan Pengaduan Pengunjung',
            'pengaduan' => $this->ModelPengaduan->AllData(),
        ];

        foreach ($data['pengaduan'] as &$p) {
            // Menggunakan Carbon untuk mengonversi string tanggal ke format bahasa Indonesia
            $timestamp = strtotime($p['created_at']);
            $carbonDate = Carbon::parse($p['created_at'])->locale('id');

            $formattedDate = $carbonDate->isoFormat('dddd, D MMMM YYYY.');
            $p['tanggal'] = $formattedDate;
        }

        $html = view('admin/pengaduan/v_cetak', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Perbaikan: Gunakan 'portrait' bukan 'potrait'
        $dompdf->render();

        $dompdf->stream('Laporan Pengaduan Pengunjung.pdf', array(
            'Attachment' => false
        ));
    }
}
