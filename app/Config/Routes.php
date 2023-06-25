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
$routes->get('/dashboard', 'Peserta::index');
$routes->get('/ujian', 'Peserta::ujian');
$routes->post('/soal', 'Peserta::token');
$routes->get('/', 'Peserta::login');
$routes->post('/auth', 'Peserta::auth');
$routes->get('/logout', 'Peserta::logout');
$routes->get('/shuffle', 'Peserta::shuffle');
$routes->get('/loadSoal/(:num)', 'Peserta::loadSoal/$1');
$routes->post('/loadSoal/(:num)', 'Peserta::jawaban/$1');
$routes->get('/confirm', 'Peserta::confirm');
$routes->get('/saveJawaban', 'Peserta::save');
$routes->get('/selesai', 'Peserta::selesai');
$routes->get('/hasilujian', 'Peserta::hasilUjian');




//dashboard admin
$routes->get('/admin', 'AdminController::login');
$routes->post('/admin/auth', 'AdminController::auth');
$routes->get('/admin/logout', 'AdminController::logout');
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/pesertaujian', 'AdminController::examuser');
$routes->get('/admin/hasilujian', 'AdminController::examresult');


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
