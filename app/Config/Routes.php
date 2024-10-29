<?php

use App\Controllers\Admin;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Freeuser
$routes->get('/', 'Home::index');
$routes->get('home/loadMoreInformasi', 'Home::loadMoreInformasi');

// Admin
$routes->group('profilweb', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Profilweb::index');
    $routes->get('listdata', 'Profilweb::ListData');
    $routes->get('tambah', 'Profilweb::Tambah');
    $routes->post('insertdata', 'Profilweb::InsertData');
    $routes->get('edit/(:segment)', 'Profilweb::Edit/$1');
    $routes->post('updatedata/(:num)', 'Profilweb::UpdateData/$1');
    $routes->get('detail/(:any)', 'Profilweb::Detail/$1');
    $routes->get('delete/(:num)', 'Profilweb::Delete/$1');
});

$routes->group('pelayanan', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Pelayanan::index');
    $routes->get('listdata', 'Pelayanan::ListData');
    $routes->get('tambah', 'Pelayanan::Tambah');
    $routes->post('insertdata', 'Pelayanan::InsertData');
    $routes->get('edit/(:segment)', 'Pelayanan::Edit/$1');
    $routes->post('updatedata/(:num)', 'Pelayanan::UpdateData/$1');
    $routes->get('detail/(:any)', 'Pelayanan::Detail/$1');
    $routes->get('delete/(:num)', 'Pelayanan::Delete/$1');
});

$routes->group('informasi', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Informasi::index');
    $routes->get('listdata', 'Informasi::ListData');
    $routes->get('tambah', 'Informasi::Tambah');
    $routes->post('insertdata', 'Informasi::InsertData');
    $routes->get('edit/(:segment)', 'Informasi::Edit/$1');
    $routes->post('updatedata/(:num)', 'Informasi::UpdateData/$1');
    $routes->get('detail/(:any)', 'Informasi::Detail/$1');
    $routes->get('delete/(:num)', 'Informasi::Delete/$1');
});

$routes->group('pengaduan', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Pengaduan::index');
    $routes->get('listdata', 'Pengaduan::ListData');
    $routes->get('tambah', 'Pengaduan::Tambah');
    $routes->post('insertdata', 'Pengaduan::InsertData');
    $routes->get('edit/(:segment)', 'Pengaduan::Edit/$1');
    $routes->post('updatedata/(:num)', 'Pengaduan::UpdateData/$1');
    $routes->get('detail/(:num)', 'Pengaduan::Detail/$1');
    $routes->get('delete/(:num)', 'Pengaduan::Delete/$1');
    $routes->get('setuju/(:num)', 'Pengaduan::Setuju/$1');
    $routes->get('export-pdf', 'Pengaduan::Exportpdf');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'Login::index');
    $routes->post('login/cekuser', 'Login::cekUser');
    $routes->get('logout', 'Login::logout');
});


// Freeuser
$routes->group('pengunjungpengaduan', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Profil::pengaduan');
    $routes->post('tambah', 'Profil::pengaduantambah');
});



$routes->get('informasipuskesmas/(:any)', 'InformasiPuskes::informasipuskesmas/$1');
$routes->get('(:any)', 'Profil::detail/$1');

// $routes->setAutoRoute(true);
