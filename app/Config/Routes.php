<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/regis', 'Home::regis');
$routes->get('home/login', 'Home::login');
$routes->get('home/sto', 'Home::sto');
