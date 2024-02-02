<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('dashboard', 'Home::index');
$routes->get('home/regis', 'Home::regis');
$routes->get('login', 'Home::login');
$routes->get('sektor', 'Home::sektor');
$routes->get('sto', 'Home::sto');
$routes->get('re', 'Home::re');
$routes->get('fcc', 'Home::fcc');
$routes->get('laporan', 'Home::laporan');
$routes->get('pi', 'Home::pi');
$routes->get('ps', 'Home::ps');
$routes->get('listA', 'Home::listA');
$routes->get('listK', 'Home::listK');
