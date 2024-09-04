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

$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');
$routes->get('add_employee', 'Home::add_employee');
$routes->post('login', 'Home::login');
$routes->post('access_level', 'Home::access_level');
$routes->get('create_access_level', 'Home::create_access_level');
$routes->post('create_user', 'Home::create_user');
$routes->post('delete_employee/(:num)', 'Home::delete_employee/$1');
$routes->get('delete_employee/(:num)', 'Home::delete_employee/$1');
$routes->get('Add_stock', 'Home::Add_stock');

