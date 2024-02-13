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
$routes->post('deleteAdmin(:num)', 'Admin::deleteAdmin/$1');
$routes->post('updateA', 'Admin::updateA');

$routes->get('listK', 'Karyawan::listK');
$routes->get('tambahK', 'Karyawan::tambahK');
$routes->post('simpanK', 'Karyawan::simpanK');
$routes->get('editK(:num)', 'Karyawan::editK/$1');
$routes->post('deleteKaryawan(:num)', 'Karyawan::deleteKaryawan/$1');
$routes->post('updateK', 'Karyawan::updateK');

$routes->get('dashboard', 'Home::index');

$routes->get('sto', 'STOController::sto');
$routes->get('TambahSTO', 'STOController::TambahSTO');
$routes->post('save', 'STOController::save');
$routes->get('editSTO/(:num)', 'STOController::editSTO/$1');
$routes->post('deleteSTO/(:num)', 'STOController::deleteSTO/$1');
$routes->post('updateSTO', 'STOController::updateSTO');

$routes->get('re', 'Home::re');
$routes->get('fcc', 'Home::fcc');

$routes->get('sektor', 'Home::sektor');
$routes->get('tambahDataSektor', 'Sektor::tambahDataSektor');
$routes->post('simpanDataSektor', 'Sektor::simpanDataSektor');
$routes->post('sektor', 'Sektor::simpanDataSektor');
$routes->get('editSektor/(:num)', 'Sektor::editSektor/$1');
$routes->post('deleteSektor/(:num)', 'Sektor::deleteSektor/$1');

$routes->get('listPI', 'PIController::listPI');
$routes->get('ps', 'Home::ps');
$routes->get('listSales', 'SalesController::listSales');


$routes->get('laporan', 'Home::laporan');