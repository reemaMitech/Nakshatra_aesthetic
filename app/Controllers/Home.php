<?php

namespace App\Controllers;
use App\Models\AdminModel;

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
        $model = new AdminModel();
        $wherecond = array('Is_active' => 'Y');
        $data['product'] = $model->getalldata('tbl_product', $wherecond);
        // print_r($data['product']);die;
        return  view('Admin/add_order',$data);
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
  public function take_order()
{
    $db = \Config\Database::connect();
    $file = $this->request->getFile('transaction_screenshot');
    if (!$file) {
        echo "No file was uploaded or file input name does not match.";
        return;
    }  
    $newName = ''; 
    
    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/paymentscreenshot', $newName);
    }
    $data = [
        'username' => $this->request->getPost('username'),
        'mobile_number' => $this->request->getPost('mobile_number'),
        'product_name' => $this->request->getPost('product_name'),
        'quantity' => $this->request->getPost('quantity'),
        'mrp' => $this->request->getPost('mrp'),
        'total_amount' => $this->request->getPost('total_amount'),
        'transaction_id' => $this->request->getPost('transaction_id'),
        'transaction_screenshot' => $newName, 
        'pincode' => $this->request->getPost('pincode'),
        'tal' => $this->request->getPost('tal'),
        'district' => $this->request->getPost('district'),
        'country' => $this->request->getPost('country'),
        'address' => $this->request->getPost('address'),
    ];
    $db->table('tbl_order')->insert($data);
    return redirect()->to('add_order');
}

}
