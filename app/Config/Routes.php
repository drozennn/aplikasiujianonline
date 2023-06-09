<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// dashboard peserta

$routes->get('/', 'Peserta::login', ['filter' => 'dashboard']);
$routes->post('/auth', 'Peserta::auth');
$routes->get('/logout', 'Peserta::logout');

// $routes->group('', ['filter' => 'login'], function($routes) {
    $routes->get('/dashboard', 'Peserta::index', ['filter' => 'login'] );
    $routes->get('/ujian', 'Peserta::ujian', ['filter' => 'login']);
    $routes->post('/soal', 'Peserta::token');
    $routes->get('/shuffle', 'Peserta::shuffle');
    $routes->get('/loadSoal/(:num)', 'Peserta::loadSoal/$1', ['filter' => 'kick']);
    $routes->post('/loadSoal/(:num)', 'Peserta::jawaban/$1', ['filter' => 'kick']);
    $routes->get('/confirm', 'Peserta::confirm', ['filter' => 'login']);
    $routes->get('/saveJawaban', 'Peserta::save', ['filter' => 'login']);
    $routes->get('/selesai', 'Peserta::selesai', ['filter' => 'login']);
    $routes->get('/hasilujian', 'Peserta::hasilUjian', ['filter' => 'login']);
// });




//dashboard admin
$routes->get('/admin', 'AdminController::login');
$routes->get('/admin/kontrol', 'AdminController::kontrol');
$routes->get('/admin/kontrol/peserta', 'AdminController::control');
$routes->get('/admin/kontrol/waktu', 'AdminController::waktu');
$routes->post('/admin/auth', 'AdminController::auth');
$routes->get('/admin/logout', 'AdminController::logout');
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/pesertaujian', 'AdminController::examuser');
$routes->get('/admin/hasilujian', 'AdminController::examresult');
$routes->get('/admin/controlbelum/(:num)', 'AdminController::controlBelum/$1');
$routes->get('/admin/controlselesai/(:num)', 'AdminController::controlSelesai/$1');
$routes->post('/admin/setWaktu', 'AdminController::setWaktu');
$routes->get('/admin/cetakSemua', 'AdminController::cetakSemua');
$routes->get('/admin/cetak/(:any)', 'AdminController::cetak/$1');
$routes->get('/admin/loggedOut/(:any)', 'AdminController::loggedOut/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
