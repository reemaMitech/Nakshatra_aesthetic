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
$routes->get('dispatch', 'Home::dispatch');
$routes->get('getCourierMobile', 'Home::getCourierMobile');
$routes->get('getCustomerData', 'Home::getCustomerData');
$routes->post('dispatch_details', 'Home::dispatch_details');


$routes->get('salary_slip', 'Home::salary_slip');
$routes->get('leave_application', 'Home::leave_application');
$routes->get('punch_in_out', 'Home::punch_in_out');


$routes->get('product_enquiry', 'Home::product_enquiry');
// $routes->post('product_enquiry', 'Home::product_enquiry');
$routes->post('product_enquiry_details', 'Home::product_enquiry_details');
$routes->get('edit_enquiry/(:any)', 'Home::product_enquiry/$1');
$routes->post('get_state_name_location','Home::get_state_name_location');
$routes->post('get_city_name_location','Home::get_city_name_location');
$routes->post('increment_follow_up_count', 'Home::increment_follow_up_count');

$routes->get('add_courierService', 'Home::add_courierService');
$routes->post('add_courierService', 'Home::add_courierService');
$routes->post('set_courierService', 'Home::set_courierService');
$routes->get('edit_courier/(:any)', 'Home::add_courierService/$1');

$routes->get('add_vendor', 'Home::add_vendor');
$routes->post('set_vendor_data', 'Home::set_vendor_data');
$routes->get('edit_vendor/(:any)', 'Home::add_vendor/$1');


$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');
$routes->get('add_employee', 'Home::add_employee');
$routes->get('edit_employee/(:any)', 'Home::add_employee/$1');

$routes->post('login', 'Home::login');
$routes->post('access_level', 'Home::access_level');
$routes->get('create_access_level', 'Home::create_access_level');
$routes->post('create_user', 'Home::create_user');
// $routes->post('delete_employee/(:num)', 'Home::delete_employee/$1');
// $routes->get('delete_employee/(:num)', 'Home::delete_employee/$1');
$routes->get('Add_stock', 'Home::Add_stock');
$routes->post('add_stocksin', 'Home::add_stocksin');

$routes->post('add_invoice', 'Home::add_invoice');
$routes->get('add_invoice', 'Home::add_invoice');

$routes->get('Packaging_Material', 'Home::Packaging_Material');
$routes->post('add_packaging_material', 'Home::add_packaging_material');
$routes->get('edit_Packaging_Material/(:any)', 'Home::Packaging_Material/$1');


$routes->get('add_branch', 'Home::add_branch');
$routes->post('add_branches', 'Home::add_branches');
$routes->post('set_invoice', 'Home::set_invoice');
$routes->get('edit_invoice/(:any)', 'Home::add_invoice/$1');
$routes->get('invoice/(:any)', 'Home::invoice/$1');
$routes->get('bill_label/(:any)', 'Home::bill_label/$1');

$routes->get('add_row_Materials', 'Home::add_row_Materials');

$routes->get('delete_compan/(:any)/(:any)', 'Home::delete_compan/$1/$2');
$routes->post('save_row_Materials', 'Home::save_row_Materials');

$routes->get('delete/(:any)/(:any)', 'Home::delete/$1/$1');

$routes->get('edit_product/(:any)', 'Home::add_product/$1');
$routes->post('getProductDetails', 'Home::getProductDetails');
$routes->get('getProductDetails', 'Home::getProductDetails');





$routes->post('transfer_branch_quantity', 'Home::transfer_branch_quantity');


$routes->get('petty_cash', 'Home::petty_cash');
$routes->post('add_cash', 'Home::addCash');
$routes->post('add_expense', 'Home::addExpense');

$routes->get('updatestatus', 'Home::updatestatus');
$routes->post('updatestatus', 'Home::updatestatus');