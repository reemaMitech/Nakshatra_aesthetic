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
        $model = new AdminModel();
        $data['country'] = $model->get_country_name();
        $data['states'] = $model->get_states_name();
        $data['citys'] = $model->get_citys_name();
        
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
        'tal' => $this->request->getPost('City'),
        'district' => $this->request->getPost('State'),
        'country' => $this->request->getPost('Country'),
        'address' => $this->request->getPost('address'),
    ];
    $db->table('tbl_order')->insert($data);
    return redirect()->to('add_order');
}


public function product_enquiry()
{
    $model = new AdminModel();
    $wherecond = array('Is_active' => 'Y');
    $data['product'] = $model->getalldata('tbl_product', $wherecond);

    $data['country'] = $model->get_country_name();

    $data['states'] = $model->get_states_name();

    $data['citys'] = $model->get_citys_name();

    // print_r($data['product']);die;
    return  view('Admin/product_enquiry',$data);
}
public function get_state_name_location(){

    $model = new AdminModel();

    $country_id = $this->request->getVar('country_id');

    // echo "hiii";

    // echo $country_id; exit();



    $model->get_state_name_location($country_id);

}



public function get_city_name_location(){

    $model = new AdminModel();

    $state_id = $this->request->getVar('state_id');

    $model->get_city_name_location($state_id);

}

public function product_enquiry_details(){
    print_r($_POST);die;
    $db = \Config\Database::connect();
    $enquiry_date = $this->request->getPost('enquiry_date');
    // $companyName = $this->request->getPost('companyName');
    // $GSTIN = $this->request->getPost('GSTIN');
    $custname = $this->request->getPost('custname');
    $mobile_number = $this->request->getPost('mobile_number');
    $Country = $this->request->getPost('Country');
    $State = $this->request->getPost('State');
    $City = $this->request->getPost('City');
    $product_name = $this->request->getPost('product_name');
    $quantity = $this->request->getPost('quantity');
    $prod_desc = $this->request->getPost('prod_desc');
    $pincode = $this->request->getPost('pincode');
    $detailAddress = $this->request->getPost('detailAddress');
    // $POCmobileNo = $this->request->getPost('POCmobileNo');
    // $attachmentFile = $this->request->getFile('attachment');

       
        $data = [
            'enquiry_date' => $enquiry_date,
            'cust_name' => $custname,
            // 'CompanyName' => $companyName,
            // 'GSTIN' => $GSTIN,
            'mob_no' => $mobile_number,
            'country' => $Country,
            'state' => $State,
            'city' => $City,
            'prod_id' => $product_name,
            'prod_qty' => $quantity,
            'product_details' => $prod_desc,
            'pincode' => $pincode,
            'cust_addr' => $detailAddress,
            // 'POC_email' => $POCemail,
            // 'POC_mobile_no' => $POCmobileNo
        ];

        // Instantiate your model
        $model = new Adminmodel();

        $db = \Config\Database::Connect();
        if ($this->request->getVar('id') == "") {
            $add_data = $db->table(' tbl_product_enquiry');
            $add_data->insert($data);
            session()->setFlashdata('success', 'Enquiry added successfully.');
        } else {
            $update_data = $db->table(' tbl_product_enquiry')->where('id', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'Enquiry updated successfully.');
        }
    

    return redirect()->to('product_enquiry');
}



}


