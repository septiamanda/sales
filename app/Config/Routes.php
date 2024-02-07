<?php

use App\Controllers\STOController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Login::login');
$routes->post('login/cekUser', 'Login::cekUser');
$routes->get('logout', 'Login::logout');

$routes->get('listA', 'Admin::listA');
$routes->get('tambahA', 'Admin::tambahA');
$routes->post('simpanA', 'Admin::simpanA');
$routes->get('editA(:num)', 'Admin::editA/$1');
$routes->post('updateA', 'Admin::updateA');

$routes->get('listK', 'Karyawan::listK');
$routes->get('tambahK', 'Karyawan::tambahK');
$routes->post('simpanK', 'Karyawan::simpanK');
$routes->get('editK(:num)', 'Karyawan::editK/$1');
$routes->post('updateK', 'Karyawan::updateK');

$routes->get('dashboard', 'Home::index');

$routes->get('sto', 'STOController::sto');
$routes->get('TambahSTO', 'STOController::TambahSTO');
$routes->post('save', 'STOController::save');

$routes->get('re', 'Home::re');
$routes->get('fcc', 'Home::fcc');

$routes->get('sektor', 'Home::sektor');

$routes->get('laporan', 'Home::laporan');
$routes->get('tambahDataSektor', 'Sektor::tambahDataSektor');
$routes->post('simpanDataSektor', 'TambahSektor::simpanDataSektor');
$routes->post('sektor', 'TambahSektor::simpanDataSektor');
$routes->get('editSektor/(:num)', 'Sektor::editSektor/$1');
$routes->get('pi', 'Home::pi');
$routes->get('ps', 'Home::ps');
$routes->get('sales', 'Home::sales');


$routes->get('laporan', 'Home::laporan');
