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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->group('profil', ['namespace' => 'App\Controllers\Profil'], function ($routes) {
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
