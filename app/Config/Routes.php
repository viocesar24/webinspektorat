<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::view/home');
$routes->group('home', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Home::view/home');
    $routes->get('view/tentang', 'Profil\Tentang::view/tentang');
    $routes->get('view/struktur', 'Profil\Struktur::view/struktur');
    $routes->get('view/pejabat', 'Profil\Pejabat::view/pejabat');
    $routes->get('view/kebijakan', 'Profil\Kebijakan::view/kebijakan');
    $routes->get('view/penghargaan', 'Profil\Penghargaan::view/penghargaan');
    $routes->get('view/layanan', 'Layanan::view/layanan');
    $routes->get('view/berita', 'Informasi\Berita::view/berita');
    $routes->get('view/berkas', 'Informasi\Dokumen::view/berkas');
    $routes->get('view/kegiatan', 'Informasi\Kegiatan::view/kegiatan');
    $routes->get('view/detail/(:any)', 'Informasi\Berita::view/detail/$1');
    $routes->get('view/kontak', 'Kontak::view/kontak');
});
$routes->group('admin', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'AdminAuth::login');
    $routes->post('auth', 'AdminAuth::auth');
    $routes->get('logout', 'AdminAuth::logout');
});
$routes->group('admin-profil', ['namespace' => 'App\Controllers\Profil', 'filter' => 'admin'], function ($routes) {
    $routes->get('struktur', 'Struktur::index');
    $routes->post('struktur/create', 'Struktur::create');
    $routes->post('struktur/edit/(:num)', 'Struktur::edit/$1');
    $routes->post('struktur/delete/(:num)', 'Struktur::delete/$1');
    $routes->get('struktur/getImage/(:num)', 'Struktur::getImage/$1');
    $routes->get('tentang', 'Tentang::index');
    $routes->post('tentang/store', 'Tentang::store');
    $routes->post('tentang/update', 'Tentang::update');
    $routes->get('pejabat', 'Pejabat::index');
    $routes->post('pejabat/create', 'Pejabat::create');
    $routes->post('pejabat/update/(:num)', 'Pejabat::update/$1');
    $routes->post('pejabat/delete/(:num)', 'Pejabat::delete/$1');
    $routes->get('kebijakan', 'Kebijakan::index');
    $routes->post('kebijakan/create', 'Kebijakan::create');
    $routes->post('kebijakan/update', 'Kebijakan::update');
    $routes->get('penghargaan', 'Penghargaan::index');
    $routes->post('penghargaan/create', 'Penghargaan::create');
    $routes->post('penghargaan/edit/(:num)', 'Penghargaan::edit/$1');
    $routes->post('penghargaan/delete/(:num)', 'Penghargaan::delete/$1');
    $routes->get('penghargaan/getImage/(:num)', 'Penghargaan::getImage/$1');
});
$routes->group('admin-informasi', ['namespace' => 'App\Controllers\Informasi', 'filter' => 'admin'], function ($routes) {
    $routes->get('dokumen', 'Dokumen::index');
    $routes->post('dokumen/create', 'Dokumen::create');
    $routes->post('dokumen/update/(:num)', 'Dokumen::update/$1');
    $routes->post('dokumen/delete/(:num)', 'Dokumen::delete/$1');
    $routes->post('dokumen/createKategori', 'Dokumen::createKategori');
    $routes->post('dokumen/updateKategori/(:num)', 'Dokumen::updateKategori/$1');
    $routes->post('dokumen/deleteKategori/(:num)', 'Dokumen::deleteKategori/$1');
    $routes->get('berita', 'Berita::index');
    $routes->post('berita/create', 'Berita::create');
    $routes->post('berita/update/(:num)', 'Berita::update/$1');
    $routes->post('berita/delete/(:num)', 'Berita::delete/$1');
    $routes->get('kegiatan', 'Kegiatan::index');
    $routes->post('kegiatan/create', 'Kegiatan::create');
    $routes->post('kegiatan/update/(:num)', 'Kegiatan::update/$1');
    $routes->post('kegiatan/delete/(:num)', 'Kegiatan::delete/$1');
});
$routes->group('admin-lainnya', ['namespace' => 'App\Controllers', 'filter' => 'admin'], function ($routes) {
    $routes->get('layanan', 'Layanan::index');
    $routes->post('layanan/create', 'Layanan::create');
    $routes->post('layanan/update/(:num)', 'Layanan::update/$1');
    $routes->post('layanan/delete/(:num)', 'Layanan::delete/$1');
    $routes->get('kontak', 'Kontak::index');
    $routes->post('kontak/create', 'Kontak::create');
    $routes->post('kontak/update/(:num)', 'Kontak::update/$1');
    $routes->post('kontak/delete/(:num)', 'Kontak::delete/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
