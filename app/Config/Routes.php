<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('dashboard', 'Home::index');
$routes->get('home/regis', 'Home::regis');
$routes->get('login', 'Home::login');
$routes->get('sto', 'Home::sto');
$routes->get('sektor', 'Home::sektor');
