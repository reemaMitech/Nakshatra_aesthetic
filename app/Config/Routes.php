<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admindashboard', 'Home::admindashboard');
$routes->get('add_order', 'Home::add_order');
$routes->get('add_product', 'Home::add_product');
$routes->post('save_product', 'Home::save_product');
$routes->post('take_order', 'Home::take_order');
