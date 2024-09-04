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

$routes->get('product_enquiry', 'Home::product_enquiry');
$routes->post('product_enquiry_details', 'Home::product_enquiry_details');
$routes->post('get_state_name_location','Home::get_state_name_location');

$routes->post('get_city_name_location','Home::get_city_name_location');
