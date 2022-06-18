<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('admin', 'Admin::index',['filter' => 'auth']);
$routes->group('admin',['filter' => 'auth'], function($routes){
	$routes->get('dashboard', 'Admin::index');
    //kasus
    $routes->add('kasus/tambah', 'Admin::createKasus');
    $routes->add('kasus', 'Kasus::kasus');
    $routes->add('kasus/create', 'Kasus::createKasus');
	$routes->add('kasus/(:segment)/edit', 'Kasus::editKasus/$1');
	$routes->get('kasus/(:segment)/delete', 'Kasus::deleteKasus/$1');
    //jaringan kasus
    $routes->get('jaringan_kasus/(:segment)', 'Kasus::jaringanKasus/$1');
    //user
    $routes->add('user/(:segment)', 'User::readUser/$1');
    $routes->add('user/(:segment)/editProses', 'User::editUser/$1');
    //Pelaku
    $routes->add('pelaku/tambah', 'Pelaku::createPelaku');
    $routes->add('pelaku/tambahProses', 'Pelaku::addPelaku');
    $routes->add('pelaku', 'Pelaku::index');
	$routes->add('pelaku/(:segment)/edit', 'Pelaku::readPelakuEdit/$1');
    $routes->add('pelaku/(:segment)/editProses', 'Pelaku::updatePelaku/$1');
	$routes->get('pelaku/(:segment)/delete', 'Pelaku::deletePelaku/$1');
    $routes->add('pelaku/get_atasan', 'Pelaku::get_atasan');
});

$routes->group('admin/data',['filter' => 'auth'], function($routes){
	$routes->add('jenis_narkoba', 'Data::jenis_narkoba');
    $routes->add('jenis_narkoba/create', 'Data::createJenisNarkoba');
    $routes->get('jenis_narkoba/(:segment)/delete', 'Data::deleteJenisNarkoba/$1');
    $routes->add('jenis_narkoba/(:segment)/edit', 'Data::editJenisNarkoba/$1');
});

//Auth
$routes->get('/register', 'Register::index');
$routes->add('/register/save', 'Register::save');
$routes->get('/login', 'Login::index');
$routes->add('/login/auth', 'Login::auth');
$routes->add('/logout', 'Login::logout');

$routes->get('/upload', 'Upload::index');
$routes->add('/upload/proses', 'Upload::proses');
$routes->get('/kategori', 'Kategori::index');
$routes->add('/kategori/get_kasus', 'Kategori::get_kasus');


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
