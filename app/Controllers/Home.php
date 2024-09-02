<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    public function admindashboard()
    {
        return view('Admin/dashboard');
    }
    public function add_order()
    {
        return  view('Admin/add_order');
    }
    public function add_product()
    {
        return view('Admin/add_product');
    }
  public function save_product()
  {
    // print_r($_POST);die;
    // $session = \Config\Services::session();
    // if (!$session->has('id')) {
    //     return redirect()->to('/');
    // }
   $db = \Config\Database::connect();
   $data = [
       'product_name' => $this->request->getPost('product_name'),
       'container_type' => $this->request->getPost('container_type'),
       'ingredients' => $this->request->getPost('ingredients'),
       'mrp_with_tax' => $this->request->getPost('mrp_with_tax'),
   ];

   // Insert data into the database table
   $db->table('tbl_product')->insert($data);
   return redirect()->to('add_product');
  }
}
