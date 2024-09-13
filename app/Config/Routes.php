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
// $routes->post('product_enquiry', 'Home::product_enquiry');
$routes->post('product_enquiry_details', 'Home::product_enquiry_details');
$routes->get('edit_enquiry/(:any)', 'Home::product_enquiry/$1');
$routes->post('get_state_name_location','Home::get_state_name_location');
$routes->post('get_city_name_location','Home::get_city_name_location');
$routes->post('increment_follow_up_count', 'Home::increment_follow_up_count');



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
$routes->post('add_stocksin', 'Home::add_stocksin');

$routes->post('add_invoice', 'Home::add_invoice');
$routes->get('add_invoice', 'Home::add_invoice');


$routes->get('add_branch', 'Home::add_branch');
$routes->post('add_branches', 'Home::add_branches');
$routes->post('set_invoice', 'Home::set_invoice');
$routes->get('edit_invoice/(:any)', 'Home::add_invoice/$1');
$routes->get('invoice/(:any)', 'Home::invoice/$1');

$routes->get('add_row_Materials', 'Home::add_row_Materials');

$routes->get('delete_compan/(:any)/(:any)', 'Home::delete_compan/$1/$2');
$routes->post('save_row_Materials', 'Home::save_row_Materials');

$routes->get('delete/(:any)/(:any)', 'Home::delete/$1/$1');





$routes->post('transfer_branch_quantity', 'Home::transfer_branch_quantity');

