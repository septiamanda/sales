<?php

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

$routes->get('sektor', 'Home::sektor');
$routes->get('sto', 'Home::sto');
$routes->get('TambahSTO', 'STOController::TambahSTO');
$routes->get('re', 'Home::re');
$routes->get('fcc', 'Home::fcc');
$routes->get('laporan', 'Home::laporan');
$routes->get('tambahDataSektor', 'Sektor::tambahDataSektor');
$routes->get('pi', 'Home::pi');
$routes->get('ps', 'Home::ps');
$routes->get('sales', 'Home::sales');


$routes->get('laporan', 'Home::laporan');
