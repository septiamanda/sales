<?php

use App\Controllers\STOController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('regis', 'Home::regis');
$routes->get('login', 'Login::login');
$routes->post('login/cekUser', 'Login::cekUser');
$routes->get('logout', 'Login::logout');
$routes->get('listA', 'Admin::listA');
$routes->get('listK', 'Karyawan::listK');

$routes->get('dashboard', 'Home::index');

$routes->get('sektor', 'Home::sektor');

$routes->get('sto', 'STOController::sto');
$routes->get('TambahSTO', 'STOController::TambahSTO');
$routes->post('save', 'STOController::save');

$routes->get('re', 'Home::re');
$routes->get('fcc', 'Home::fcc');
$routes->get('laporan', 'Home::laporan');
$routes->get('tambahDataSektor', 'Sektor::tambahDataSektor');
$routes->get('pi', 'Home::pi');
$routes->get('ps', 'Home::ps');

$routes->get('laporan', 'Home::laporan');
