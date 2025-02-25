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
$routes->get('challan/(:any)', 'Home::challan/$1');
$routes->get('edit_dispatch/(:any)', 'Home::dispatch/$1');


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
$routes->post('add_follow_up', 'Home::add_follow_up');
$routes->get('get_follow_up_data', 'Home::get_follow_up_data');
$routes->get('getStates', 'Home::getStates');


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
$routes->get('manageStocks', 'Home::manageStocks');
$routes->get('balanceStock', 'Home::balanceStock');


$routes->post('order_booking', 'Home::add_invoice');
$routes->get('order_booking', 'Home::add_invoice');

$routes->get('Packaging_Material', 'Home::Packaging_Material');
$routes->post('add_packaging_material', 'Home::add_packaging_material');
$routes->get('edit_Packaging_Material/(:any)', 'Home::Packaging_Material/$1');
$routes->get('edit_branch/(:any)', 'Home::add_branch/$1');

$routes->get('sales_reports', 'Home::sales_reports');

$routes->get('add_branch', 'Home::add_branch');
$routes->post('add_branches', 'Home::add_branches');
$routes->post('set_invoice', 'Home::set_invoice');
$routes->get('edit_invoice/(:any)', 'Home::add_invoice/$1');
$routes->get('bill/(:any)', 'Home::invoice/$1');
$routes->get('bill_label/(:any)', 'Home::bill_label/$1');

$routes->get('add_row_Materials', 'Home::add_row_Materials');

$routes->get('delete_compan/(:any)/(:any)', 'Home::delete_compan/$1/$2');
$routes->post('save_row_Materials', 'Home::save_row_Materials');
$routes->post('edit_row_Materials', 'Home::edit_row_Materials');

$routes->get('delete/(:any)/(:any)', 'Home::delete/$1/$1');

$routes->get('edit_product/(:any)', 'Home::add_product/$1');
$routes->post('getProductDetails', 'Home::getProductDetails');
$routes->get('getProductDetails', 'Home::getProductDetails');





$routes->post('transfer_branch_quantity', 'Home::transfer_branch_quantity');


$routes->get('petty_cash', 'Home::petty_cash');
$routes->post('add_cash', 'Home::addCash');
$routes->post('add_expense', 'Home::addExpense');

$routes->get('bank_transaction', 'Home::bank_transaction');
$routes->post('add_deposit', 'Home::add_deposit');
$routes->post('add_withdrawal', 'Home::add_withdrawal');

$routes->get('updatestatus', 'Home::updatestatus');
$routes->post('updatestatus', 'Home::updatestatus');


$routes->post('add_daily_expense', 'Home::add_daily_expense');
$routes->get('add_daily_expense', 'Home::add_daily_expense');
$routes->post('edit_daily_expenses/(:any)', 'Home::add_daily_expense/$1');
$routes->get('edit_daily_expenses/(:any)', 'Home::add_daily_expense/$1');

$routes->post('set_invoice_data', 'Home::set_invoice_data');

$routes->post('get_vendor_By_Id', 'Home::get_vendor_By_Id');
$routes->get('get_vendor_By_Id', 'Home::get_vendor_By_Id');


$routes->post('attendance', 'Home::generateMonthlyAttendanceReport');
$routes->get('attendance', 'Home::generateMonthlyAttendanceReport');

$routes->post('getallmonthdata', 'Home::getallmonthdata');
$routes->get('getallmonthdata', 'Home::getallmonthdata');


$routes->post('showattendance/(:any)', 'Home::showattendancei/$i');
$routes->get('showattendance/(:any)', 'Home::showattendancei/$i');

$routes->get('showattendancei/(:num)', 'Home::showattendancei/$1');
$routes->post('showattendancei/(:num)', 'Home::showattendancei/$1');

$routes->post('add_purchase_bill', 'Home::add_purchase_bill');
$routes->get('add_purchase_bill', 'Home::add_purchase_bill');
$routes->post('edit_purchase_bill/(:any)', 'Home::add_purchase_bill/$1');
$routes->get('edit_purchase_bill/(:any)', 'Home::add_purchase_bill/$1');

$routes->post('set_purchase_bill_data', 'Home::set_purchase_bill_data');

$routes->get('leave_list', 'Home::leave_form');
$routes->get('leave_form', 'Home::leave_form');

$routes->post('leave-request', 'Home::leave_request');
$routes->get('leave-request', 'Home::leave_request');

$routes->get('leave_app', 'Home::leave_app');

$routes->post('leave_result', 'Home::leave_result');

$routes->get('saveSignupTime', 'Home::saveSignupTime');

$routes->get('getPunchStatus', 'Home::getPunchStatus');

$routes->post('punchAction', 'Home::punchAction');


$routes->get('attendance_list', 'Home::get_attendance_data');

$routes->post('get_attendance_list', 'Home::get_attendance_list');
$routes->get('get_attendance_list', 'Home::get_attendance_list');

$routes->post('get_absent_list', 'Home::get_absent_list');
$routes->get('get_absent_list', 'Home::get_absent_list');

$routes->post('punch_in', 'Home::punch_in');
$routes->get('punch_in', 'Home::punch_in');

$routes->post('punch_out', 'Home::punch_out');
$routes->get('punch_out', 'Home::punch_out');

$routes->post('get_employee_list', 'Home::get_employee_list');
$routes->get('get_employee_list', 'Home::get_employee_list');

$routes->post('fetch_employees', 'Home::fetch_employees');
$routes->get('fetch_employees', 'Home::fetch_employees');








