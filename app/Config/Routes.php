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
$routes->post('chartSales', 'DashboardController::tampilChartSales');
$routes->post('pieSales', 'DashboardController::tampilPieSales');
$routes->get('totalSales', 'DashboardController::getTotalSales');
$routes->get('totalRE', 'DashboardController::getTotalRE');
$routes->get('totalPI', 'DashboardController::getTotalPI');
$routes->get('totalPS', 'DashboardController::getTotalPS');

$routes->get('sto', 'STOController::sto');
$routes->get('TambahSTO', 'STOController::TambahSTO');
$routes->post('save', 'STOController::save');
$routes->get('editSTO/(:num)', 'STOController::editSTO/$1');
$routes->post('deleteSTO/(:num)', 'STOController::deleteSTO/$1');
$routes->post('updateSTO', 'STOController::updateSTO');

$routes->get('sektor', 'Sektor::sektor');
$routes->get('tambahDataSektor', 'Sektor::tambahDataSektor');
$routes->get('sektor/cari', 'Sektor::cari');
$routes->post('simpan', 'Sektor::simpan');
$routes->get('editSektor/(:num)', 'Sektor::editSektor/$1');
$routes->post('updateSektor', 'Sektor::updateSektor');
$routes->post('deleteSektor/(:num)', 'Sektor::deleteSektor/$1');

$routes->get('listPI', 'PIController::listPI');
$routes->post('chartPI', 'PIController::tampilChartPI');

$routes->get('listPS', 'PSController::listPS');
$routes->post('chartPS', 'PSController::tampilChartPS');

$routes->get('listRE', 'REController::listRE');
$routes->post('chartRE', 'REController::tampilChartRE');

$routes->get('listFCC', 'FCCController::listFCC');
$routes->post('chartFCC', 'FCCController::tampilChartFCC');

$routes->get('listSales', 'SalesController::listSales');
$routes->post('simpanSales', 'SalesController::simpanSales');
$routes->post('editSales', 'SalesController::editSales');
$routes->post('deleteSales/(:num)', 'SalesController::deleteSales/$1');
$routes->post('updateStatus/(:num)', 'SalesController::updateStatus/$1');

$routes->get('laporan', 'Home::laporan');