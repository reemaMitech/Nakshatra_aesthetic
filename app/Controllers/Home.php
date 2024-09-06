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
        $session = \Config\Services::session();
        if (!$session->has('id')) {
            return redirect()->to('/');
        }
        return view('Admin/dashboard');
    }
    public function add_order()
    {
        $session = \Config\Services::session();
        if (!$session->has('id')) {
            return redirect()->to('/');
        }
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

           $session = \Config\Services::session();
            if (!$session->has('id')) {
                return redirect()->to('/');
            }

        return view('Admin/add_product');
    }
  public function save_product()
  {
   
   $db = \Config\Database::connect();
   $data = [
       'product_name' => $this->request->getPost('product_name'),
       'unit_type' => $this->request->getPost('unit_type'),
       'unit' => $this->request->getPost('unit'),
       'container_type' => $this->request->getPost('container_type'),
       'ingredients' => $this->request->getPost('ingredients'),
       'mrp_with_tax' => $this->request->getPost('mrp_with_tax'),
   ];
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
        'unit' => $this->request->getPost('unit'),
        'unit_type' => $this->request->getPost('unit_type'),
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
public function login()
{
    $model = new AdminModel();
    $session = \CodeIgniter\Config\Services::session();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');  

    $wherecond = array('username' => $username ,'password'=>$password);
    $user= $model->getsingleuser('tbl_register', $wherecond);
    if ($user) {
        if ($password === $user->password) {  
            $userData = [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                 'menu_names'=>$user->menu_names,
            
            ];
            $session->set($userData);
            // echo "<pre>";print_r($_SESSION);die;
            if ($user->role === 'customer') {
                return redirect()->to(base_url('product'));
            } 
                elseif ($user->role === 'Admin') {
                    return redirect()->to(base_url('admindashboard'));
            } 
          
            else {
                session()->setFlashdata('error', 'Invalid credentials');
                return redirect()->to('/'); 
            }
        } else {
            session()->setFlashdata('error', 'Invalid password');
            return redirect()->to('/');
        }

    } else {
        session()->setFlashdata('error', 'User not found');
        return redirect()->to('/');
    }
}
public function logout()
{
    $session = session();
    $session->destroy();
    return redirect()->to('/');
    }
public function add_employee()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();
    $wherecond = array('is_active' => 'Y');
    $data['menu'] = $model->getalldata('tbl_menu', $wherecond);
    $wherecond = array('role' => 'Admin','active' => 'Y');
    $data['employees'] = $model->getalldata('tbl_register', $wherecond);
    //  print_r($data['menu']);die;
   return view('Admin/add_employee',$data);
}
public function create_access_level()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    return view('Admin/access_level');
}

public function product_enquiry()
{
    $session = \Config\Services::session();

    if (!$session->has('id')) {
        return redirect()->to('/');
    }
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


public function access_level()
{
    // print_r($_POST);die;
    $db = \Config\Database::connect();
   $data = [
       'menu_name' => $this->request->getPost('menu_name'),
       'url_location' => $this->request->getPost('url_location'),
      
   ];
   $db->table('tbl_menu')->insert($data);
   return redirect()->to('add_employee');
}
public function create_user()
{
    // print_r($_POST);die;
    $menuNames = implode(', ', $this->request->getPost('menu_names'));
    $id = $this->request->getPost('id');
    $db = \Config\Database::connect();
    $data = [
        'username' => $this->request->getPost('username'),
        'password' => $this->request->getPost('password'),
        'role' =>'Admin',
        'menu_names' => $menuNames, 
    ];
    if ($id) {
        $db->table('tbl_register')->where('id', $id)->update($data);
        session()->setFlashdata('success', 'Employee updated successfully.');
    } else {
       
        $db->table('tbl_register')->insert($data);
        session()->setFlashdata('success', 'Employee created successfully.');
    }
    return redirect()->to('add_employee');

}
public function delete_employee($id)
{
    $db = \Config\Database::connect();
    $data = ['active' => 'N'];
    $db->table('tbl_register')->where('id', $id)->update($data);
    
    session()->setFlashdata('success', 'Employee deleted successfully.');
    return redirect()->to(base_url('add_employee'));
}
public function Add_stock()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    } 

    $model = new AdminModel();

    // Fetch all active products
    $productCondition = array('Is_active' => 'Y');
    $data['product'] = $model->getalldata('tbl_product', $productCondition); 

    // Create an associative array of product IDs and names for easy lookup
    $productNames = array();
    foreach ($data['product'] as $product) {
        $productNames[$product->id] = $product->product_name;
    }

    // Fetch all active branches
    $branchCondition = array('is_active' => 'Y');
    $data['branch'] = $model->getalldata('tbl_branch', $branchCondition);

    foreach ($data['branch'] as $branch) {
        $stockCondition = array('branch_name' => $branch->id);
        $branch->stock_quantity = $model->getalldata('tbl_stock', $stockCondition);

        // Replace product IDs with product names
        foreach ($branch->stock_quantity as $stock) {
            if (isset($productNames[$stock->product_name])) {
                $stock->product_name = $productNames[$stock->product_name];
            }
        }
    }

    // Debug: Print the data structure to verify it works as expected
    // echo '<pre>'; print_r($data['branch']);die;

    return view('Admin/Add_stock', $data);
}

public function add_stocksin()
{
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $data = [
        'product_name' => $this->request->getPost('product_name'),
        'quantity' => $this->request->getPost('quantity'),
        'branch_name' => $this->request->getPost('branch_name'),
        'size' => $this->request->getPost('size'),
        'unit' => $this->request->getPost('unit'),
        'use_by_date' => $this->request->getPost('use_by_date'),
        'Expiry_date' => $this->request->getPost('Expiry_date'),

       
    ];
    $db->table('tbl_stock')->insert($data);
    return redirect()->to('Add_stock');
}
public function add_branch()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();
  
   return view('Admin/add_branch');
}
public function add_branches()
{
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $data = [
        'branch_name' => $this->request->getPost('branch_name'),
        'branch_location' => $this->request->getPost('branch_location'),
    ];
    $db->table('tbl_branch')->insert($data);
    return redirect()->to('add_branch');
}

public function add_invoice()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();
    $wherecond = array('is_deleted' => 'N');
    $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['product_data'] = $model->getalldata('tbl_product', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['invoice_data'] = $model->getalldata('tbl_invoice', $wherecond);

    $id = request()->getUri()->getSegment(2); // Adjust the segment number based on your route
    $data['single_data'] = [];

    if (!empty($id)) {
        // Fetching single data using the ID
        $wherecond1 = array('is_deleted' => 'N', 'id' => $id);
        $data['single_data'] = $model->getsingleuser('tbl_invoice', $wherecond1);


        $wherecond1 = array('is_deleted' => 'N', 'invoice_id' => $id);

        $data['iteam'] = $model->getalldata('tbl_iteam', $wherecond1);
    }
    // echo "hiii";
    // echo "<pre>";print_r($data['product_data']);exit();
   return view('Admin/add_invoice',$data);

}
public function set_invoice()
{
    // Get the current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    // Determine the financial year based on the current month
    if ($currentMonth > 3) {
        $financialYear = substr($currentYear, 2) . substr($currentYear + 1, 2);
    } else {
        $financialYear = substr($currentYear - 1, 2) . substr($currentYear, 2);
    }

    // Determine the tax type
    $taxType = $this->request->getVar('tax_id');
    $taxCondition = '';
    if ($taxType == 1 || $taxType == 2) {
        $taxCondition = "WHERE tax_id IN (1, 2) AND is_deleted = 'N'";
        $financialYear = 'G' . $financialYear;
    } elseif ($taxType == 3) {
        $taxCondition = "WHERE tax_id = 3 AND is_deleted = 'N'";
    }

    // Initialize database connection
    $db = \Config\Database::connect();

    // Count invoices based on the tax type
    $query = $db->query("SELECT COUNT(*) as count FROM tbl_invoice $taxCondition");
    $result = $query->getRow();
    $invoiceCount = $result->count + 1; // Add 1 to the count
    $invoiceNumber = str_pad($invoiceCount, 4, '0', STR_PAD_LEFT); // Pad the number with zeros to ensure it's 4 digits

    // Generate the invoice number
    $invoiceNo = "NABP-" . $financialYear . "-" . $invoiceNumber;

    $data = [       
        'branch_id' => $this->request->getVar('branch_id'),
        'invoice_date' => $this->request->getVar('invoice_date'),
        'customer_name' => $this->request->getVar('customer_name'),
        'contact_no' => $this->request->getVar('contact_no'),
        'delivery_address' => $this->request->getVar('delivery_address'),

        'tax_id' => $this->request->getVar('tax_id'),
        'invoiceNo' => $invoiceNo,
      
        'totalamounttotal' => $this->request->getVar('totalamounttotal'),
        'cgst' => $this->request->getVar('cgst'),
        'sgst' => $this->request->getVar('sgst'),
        'igst' => $this->request->getVar('igst'),
        'final_total' => $this->request->getVar('final_total'),
        'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),
        
    ];
    $db = \Config\Database::connect();

    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_invoice');
        $add_data->insert($data);

        $last_id =  $db->insertID();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');

        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'invoice_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],
                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
                
            ); 
            // echo "<pre>";print_r($product_data);exit();
            $add_data = $db->table('tbl_iteam');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice added successfully.');
    } else {


        $data1 = [
            'branch_id' => $this->request->getVar('branch_id'),
            'invoice_date' => $this->request->getVar('invoice_date'),
            'customer_name' => $this->request->getVar('customer_name'),
            'contact_no' => $this->request->getVar('contact_no'),
            'delivery_address' => $this->request->getVar('delivery_address'),
            'tax_id' => $this->request->getVar('tax_id'),
          
            'totalamounttotal' => $this->request->getVar('totalamounttotal'),
            'cgst' => $this->request->getVar('cgst'),
            'sgst' => $this->request->getVar('sgst'),
            'igst' => $this->request->getVar('igst'),
            'final_total' => $this->request->getVar('final_total'),
            'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),
            
        ];

        $update_data = $db->table('tbl_invoice')->where('id', $this->request->getVar('id'));
        $update_data->update($data1);

        $last_id =  $this->request->getVar('id');

        $delete = $db->table('tbl_iteam')->where('invoice_id', $this->request->getVar('id'))->delete();

        $iteam = $this->request->getVar('iteam');
        $description = $this->request->getVar('description');


        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
    
        $total_amount = $this->request->getVar('total_amount');

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'invoice_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'description' 		=> $description[$k],
                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'total_amount'  => $total_amount[$k],
            ); 
            $add_data = $db->table('tbl_iteam');
            $add_data->insert($product_data);
    
        }
        session()->setFlashdata('success', 'Invoice updated successfully.');
            
    }

    return redirect()->to('add_invoice');
}

public function delete_compan()
{
    $session = \Config\Services::session();

    $id = request()->getUri()->getSegment(2);
    $table = request()->getUri()->getSegment(3);

    $data = ['is_deleted' => 'Y'];
    $db = \Config\Database::connect();

    $update_data = $db->table($table)->where('id', $id);
    $update_data->update($data);
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->back();

}



}

