<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProfilweb;
use App\Models\ModelPelayanan;
use App\Models\ModelInformasi;

class Home extends BaseController
{
    protected $ModelProfilweb;
    protected $ModelPelayanan;
    protected $ModelInformasi;

    public function __construct()
    {
        $this->ModelProfilweb = new ModelProfilweb();
        $this->ModelPelayanan = new ModelPelayanan();
        $this->ModelInformasi = new ModelInformasi();
    }

    public function index()
    {
        $profilweb = $this->ModelProfilweb->getProfilweb();
        $pelayanan = $this->ModelPelayanan->getPelayanan();
        $informasi = $this->ModelInformasi->getAdditionalData(8, 0);

        $data = [
            'title' => 'Puskesmas Panggung',
            'profilweb' => $profilweb,
            'pelayanan' => $pelayanan,
            'informasi' => $informasi,
        ];

        return view('v_puskesmas', $data);
    }

    public function loadMoreInformasi()
    {
        $lastLoadedId = $this->request->getGet('lastLoadedId');
        $additionalInformasi = $this->ModelInformasi->getAdditionalData(4, $lastLoadedId);

        return $this->response->setJSON($additionalInformasi);
    }
}
