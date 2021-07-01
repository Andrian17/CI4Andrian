<?php

namespace Config;

use App\Controllers\C_mahasiswa;
use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
//$routes->get('/', 'C_Mahasiswa::index');
// $routes->get('/Coba/about', 'Coba::about');
// $routes->get('/Coba/about/(:any)/(:any)', 'Coba::about/$1/$2');
// $routes->get('/Coba/(:any)/(:any)', 'Coba::about/$1/$2');
// $routes->get('/users', 'Admin\users::index');
$routes->get('/C_mahasiswa', 'C_mahasiswa::index');
$routes->get('/C_mahasiswa/FormEdit/(:num)', 'C_mahasiswa::edit/$1');
$routes->get('/C_mahasiswa/tambahData', 'C_mahasiswa::tambahData');
$routes->get('/C_mahasiswa/(:num)', 'C_mahasiswa::rincian/$1');
$routes->delete('/C_mahasiswa/(:num)', 'C_mahasiswa::delete/$1');



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
