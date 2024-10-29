<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, string>
     * @phpstan-var array<string, class-string>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'admin' => \App\Filters\FilterAdmin::class,
        'kepalapuskesmas' => \App\Filters\FilterKepala::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'admin' => [
                'except' => [
                    'login', 'login/*', 'pengunjungpengaduan', 'pengunjungpengaduan/*', 'informasipuskesmas/*', '/', '/struktur-organisasi-upt',
                    '/visi-misi', '/jam-pelayanan', '/hak-dan-kewajiban-pasien', '/antrian-prioritas', '/denah-ruangan', '/alur-pelayanan',
                    '/alur-pendaftaran', '/alur-pelayanan-ruang-kesehatan-gigi-mulut', '/persyaratan-pelayanan', '/jenis-pelayanan',
                    '/jenis-pelayanan-kia-kb-imunisasi', '/jenis-pelayanan-pemeriksaan-lansia', '/jenis-pelayanan-mbts-gizi',
                    '/jenis-pelayanan-pemeriksaan-umum', '/maklumat-pelayanan', '/tarif-pelayanan', 'home/loadMoreInformasi'
                ]
            ],
            'kepalapuskesmas' => [
                'except' => [
                    'login', 'login/*', 'pengunjungpengaduan', 'pengunjungpengaduan/*', '/', '/struktur-organisasi-upt',
                    '/visi-misi', '/jam-pelayanan', '/hak-dan-kewajiban-pasien', '/antrian-prioritas', '/denah-ruangan', '/alur-pelayanan',
                    '/alur-pendaftaran', '/alur-pelayanan-ruang-kesehatan-gigi-mulut', '/persyaratan-pelayanan', '/jenis-pelayanan',
                    '/jenis-pelayanan-kia-kb-imunisasi', '/jenis-pelayanan-pemeriksaan-lansia', '/jenis-pelayanan-mbts-gizi',
                    '/jenis-pelayanan-pemeriksaan-umum', '/maklumat-pelayanan', '/tarif-pelayanan', 'informasipuskesmas/*', 'home/loadMoreInformasi'
                ]
            ]
        ],
        'after' => [
            'admin' => [
                'except' => [
                    'profilweb', 'profilweb/*', 'pelayanan', 'pelayanan/*', 'informasi', 'informasi/*', 'pengaduan', 'pengaduan/*', 'profil/*',
                    'pelayanan/*', 'pengunjungpengaduan', 'pengunjungpengaduan/*', '/', '/struktur-organisasi-upt', '/visi-misi',
                    '/jam-pelayanan', '/hak-dan-kewajiban-pasien', '/antrian-prioritas', '/denah-ruangan', '/alur-pelayanan',
                    '/alur-pendaftaran', '/alur-pelayanan-ruang-kesehatan-gigi-mulut', '/persyaratan-pelayanan', '/jenis-pelayanan',
                    '/jenis-pelayanan-kia-kb-imunisasi', '/jenis-pelayanan-pemeriksaan-lansia', '/jenis-pelayanan-mbts-gizi',
                    '/jenis-pelayanan-pemeriksaan-umum', '/maklumat-pelayanan', '/tarif-pelayanan', 'cetak', 'cetak/*', 'informasipuskesmas/*', 'home/loadMoreInformasi'
                ]
            ],
            'kepalapuskesmas' => [
                'except' => [
                    'pengaduan', 'pengaduan/*', 'pengunjungpengaduan', 'pengunjungpengaduan/*', '/', '/struktur-organisasi-upt', '/visi-misi',
                    '/jam-pelayanan', '/hak-dan-kewajiban-pasien', '/antrian-prioritas', '/denah-ruangan', '/alur-pelayanan',
                    '/alur-pendaftaran', '/alur-pelayanan-ruang-kesehatan-gigi-mulut', '/persyaratan-pelayanan', '/jenis-pelayanan',
                    '/jenis-pelayanan-kia-kb-imunisasi', '/jenis-pelayanan-pemeriksaan-lansia', '/jenis-pelayanan-mbts-gizi',
                    '/jenis-pelayanan-pemeriksaan-umum', '/maklumat-pelayanan', '/tarif-pelayanan', 'informasipuskesmas/*', 'home/loadMoreInformasi'
                ]
            ],
            'toolbar',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
