<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

// Dashboard Routes
$routes->get('/dashboard', 'Dashboard::index');

// Petugas Routes
$routes->get('/petugas/ubah', 'Petugas::ubah');
$routes->get('/petugas/detail/(:num)', 'Petugas::detail/$1');
$routes->get('/petugas/ubah-password', 'user::ubahPassword');
$routes->get('/petugas/resetpass/(:num)', 'Petugas::resetPassword/$1');
$routes->post('/petugas/tambah', 'Petugas::tambah');
$routes->post('/petugas/ubah', 'Petugas::ubah');
$routes->post('/petugas/hapus/(:num)', 'Petugas::hapus/$1');
$routes->post('/petugas/simpan-password', 'user::simpanPassword');

// Pembayaran Routes
$routes->get('/pembayaran/spp', 'Pembayaran::index');

$routes->get('/pembayaran/bayar', 'Pembayaran::index');


$routes->post('/spp/bayar', 'Pembayaran::bayar');


// Laporan Routes
$routes->get('/laporan/histori-pembayaran', 'Laporan::index');
$routes->get('/laporan/histori/pembayaran', 'Laporan::hsitoryByNis');
$routes->get('/laporan/download/(:any)', 'Laporan::downloadLaporan/$1');

// User Routes
$routes->get('/user/reset/(:num)', 'User::resetPassword/$1');
$routes->get('/user/ubah-password', 'User::ubahPassword');
$routes->get('/first', 'User::ubahPassword');
$routes->get('/user/resetpass/(:num)', 'User::resetPassword/$1');
$routes->post('/user/simpan-password', 'User::simpanPassword');

// Auth Routes
$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->get('/petugas', 'Auth::loginPetugas');
$routes->post('/login', 'Auth::loginSiswa');
$routes->post('/petugas', 'Auth::loginPetugas');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
