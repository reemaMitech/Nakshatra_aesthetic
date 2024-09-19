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

    $uri = service('uri');
    $order_id = $uri->getSegment(2);   // Assuming the ID is the second segment
  
    $model = new AdminModel();
    $data['country'] = $model->get_country_name();
    $data['states'] = $model->get_states_name();
    $data['citys'] = $model->get_citys_name();
    $wherecond = array( 'Is_active' => 'Y');
    $data['product'] = $model->getalldata('tbl_product', $wherecond);
    if(!empty($order_id)){
        // echo'<pre>';print_r($localbrand_id);exit();

        $wherecond1 = array('is_deleted' => 'N', 'id' => $order_id);

        $data['single_data'] = $model->get_single_data('tbl_order', $wherecond1);
        // print_r($data['single_data']);die;

    }else{
        $wherecond = array( 'is_active' => 'Y','is_deleted' => 'N');
        $data['order_data'] = $model->getalldata('tbl_order', $wherecond);
    }
        // print_r($data['order_data']);die;
      
        return  view('Admin/add_order',$data);
    }
  
    public function add_product()
{
    $uri = service('uri');
    $localbrand_id = $uri->getSegment(2);  

    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }

    $model = new AdminModel();

    if (!empty($localbrand_id)) {
        // Get single product data
        $wherecond1 = array('is_deleted' => 'N', 'id' => $localbrand_id);
        $data['single_data'] = $model->get_single_data('tbl_product', $wherecond1);

        // Get all active tax data
        $wherecond = array('is_deleted' => 'N');
        $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);

        // Get all active product data
        $wherecond = array('is_deleted' => 'N');
        $data['Product'] = $model->getalldata('tbl_product', $wherecond);
    } else {
        // Get all active tax data
        $wherecond = array('is_deleted' => 'N');
        $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);

        // Get all active product data
        $wherecond = array('is_deleted' => 'N');
        $data['Product'] = $model->getalldata('tbl_product', $wherecond);
    }

    return view('Admin/add_product', $data);
}
  public function save_product()
  {
//    print_r($_POST);die;
  $id = $this->request->getPost('id');
   $db = \Config\Database::connect();
   $data = [
       'product_name' => $this->request->getPost('product_name'),
       'unit_type' => $this->request->getPost('unit_type'),
       'unit' => $this->request->getPost('unit'),
       'container_type' => $this->request->getPost('container_type'),
       'ingredients' => $this->request->getPost('ingredients'),
       'mrp' => $this->request->getPost('mrp'),
       'tax_id' => $this->request->getPost('tax_id'),
       'tax_ammount' => $this->request->getPost('tax_ammount'),

   ];


   if ($this->request->getVar('id') == "") {
    $add_data = $db->table('tbl_product');
    $add_data->insert($data);
    session()->setFlashdata('success', 'Product added successfully.');
} else {
    $update_data = $db->table('tbl_product')->where('id', $this->request->getVar('id'));
    $update_data->update($data);
    session()->setFlashdata('success', 'Product updated successfully.');
}

   if ($id) {
    $db->table('tbl_product')->where('id', $id)->update($data);
    session()->setFlashdata('success', 'Employee updated successfully.');
} else {
    $db->table('tbl_product')->insert($data);
    session()->setFlashdata('success', 'Employee created successfully.');
}
//    $db->table('tbl_product')->insert($data);

   return redirect()->to('add_product');
  }
  public function take_order()
{
    // print_r($_POST);die;
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
            elseif ($user->role === 'Employee') {  // Add Employee role redirection
                return redirect()->to(base_url('admindashboard'));  // Change to Employee dashboard URL
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
         //  print_r($data['menu']);die;
        $wherecond = array('active' => 'Y','is_deleted'=>'N');
        $data['employees'] = $model->getalldata('tbl_register', $wherecond);
    
        $uri = service('uri');
        $localbrand_id = $uri->getSegment(2); 
        if(!empty($localbrand_id)){
            $wherecond1 = array('is_deleted' => 'N', 'id' => $localbrand_id);
            $data['single_data'] = $model->get_single_data('tbl_register', $wherecond1);
            // print_r($data['single_data']);die;
        }
       
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

    $uri = service('uri');
        $localbrand_id = $uri->getSegment(2);   // Assuming the ID is the second segment
        // echo'<pre>';print_r($localbrand_id);exit();
        $model = new AdminModel();
        $wherecond = array('Is_active' => 'Y');
        $data['product'] = $model->getalldata('tbl_product', $wherecond);

        $data['country'] = $model->get_country_name();

        $data['states'] = $model->get_states_name();

        $data['citys'] = $model->get_citys_name();

        // $session_id = $result->get('id');

        // $id = $this->request->uri->getSegments(1);

        
        // echo'<pre>';print_r($data['enquiry_data']);die;

        if(!empty($localbrand_id)){

            $wherecond1 = array('is_deleted' => 'N', 'id' => $localbrand_id);

            $data['single_data'] = $model->get_single_data('tbl_product_enquiry', $wherecond1);
            // print_r($data['single_data']);die;

        }else{
            $select = 'tbl_product_enquiry.*, tbl_product.product_name';
            $joinCond = 'tbl_product_enquiry.prod_id  = tbl_product.id';
            $wherecond = [
                'tbl_product_enquiry.is_deleted' => 'N',
                'tbl_product.is_deleted'=>'N'
            ];
            $data['enquiry_data'] = $model->jointwotables($select, 'tbl_product_enquiry', 'tbl_product',  $joinCond,  $wherecond, 'DESC');
        }
  
    return  view('Admin/product_enquiry',$data);
}

public function get_state_name_location()
{
    $model = new AdminModel();
    $country_id = $this->request->getVar('country_id');
    $model->get_state_name_location($country_id);
}

public function get_city_name_location()
{
    $model = new AdminModel();
    $state_id = $this->request->getVar('state_id');
    $model->get_city_name_location($state_id);
}

public function product_enquiry_details()
{
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $enquiry_date = $this->request->getPost('enquiry_date');
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
  
        $data = [
            'enquiry_date' => $enquiry_date,
            'cust_name' => $custname,
            'mob_no' => $mobile_number,
            'country' => $Country,
            'state' => $State,
            'city' => $City,
            'prod_id' => $product_name,
            'prod_qty' => $quantity,
            'product_details' => $prod_desc,
            'pincode' => $pincode,
            'cust_addr' => $detailAddress,
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

public function add_follow_up()
{
    $db = \Config\Database::connect();
    $enquiry_id = $this->request->getPost('enquiry_id');
    $follow_up_date = $this->request->getPost('follow_up_date');
    $status_remark = $this->request->getPost('status_remark');

    // Validate the inputs (basic validation for demonstration)
    if (empty($enquiry_id) || empty($follow_up_date) || empty($status_remark)) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Missing required fields.'
        ]);
    }

    try {
        // Get the current follow-up count for this enquiry
        $last_follow_up = $db->table('tbl_follow_up')
            ->select('follow_up_count')
            ->where('enquiry_id', $enquiry_id)
            ->orderBy('follow_up_count', 'DESC')
            ->get()
            ->getRow();

        // Set the new follow-up count (increment by 1)
        $new_follow_up_count = $last_follow_up ? $last_follow_up->follow_up_count + 1 : 1;

        // Insert the new follow-up entry
        $data = [
            'enquiry_id' => $enquiry_id,
            'follow_up_date' => $follow_up_date,
            'status_remark' => $status_remark,
            'follow_up_count' => $new_follow_up_count,
        ];
        $db->table('tbl_follow_up')->insert($data);

        // Return success response
        return $this->response->setJSON([
            'success' => true,
            'enquiry_id' => $enquiry_id,
            'new_count' => $new_follow_up_count
        ]);
    } catch (\Exception $e) {
        // Return error response in case of an exception
        return $this->response->setJSON([
            'success' => false,
            'message' => 'An error occurred while saving follow-up: ' . $e->getMessage()
        ]);
    }
}

public function get_follow_up_data()
{
    $db = \Config\Database::connect();

    // Assuming `tbl_customers` has the customer name and `tbl_product_enquiry` stores enquiry details
    $followUpData = $db->table('tbl_follow_up')
        ->select('tbl_follow_up.enquiry_id, tbl_follow_up.follow_up_date, tbl_follow_up.status_remark, tbl_follow_up.follow_up_count, tbl_product_enquiry.cust_name')  // Select required fields
        ->join('tbl_product_enquiry', 'tbl_follow_up.enquiry_id = tbl_product_enquiry.id')  // Join enquiry table
        ->get()
        ->getResult();

    // Return data as JSON
    return $this->response->setJSON([
        'success' => true,
        'data' => $followUpData
    ]);
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
        'first_name' => $this->request->getPost('first_name'),
        'middle_name' => $this->request->getPost('middle_name'),
        'last_name' => $this->request->getPost('last_name'),
        'mobile' => $this->request->getPost('mobile'),
        'email' => $this->request->getPost('email'),
        'designation' => $this->request->getPost('designation'),
        'department' => $this->request->getPost('department'),
        'role' => $this->request->getPost('user_role'),
        'salaryfor8hour' => $this->request->getPost('salaryfor8hour'),
        'applyot' => $this->request->getPost('applyot'),


        // 'role' =>'Admin',
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
    $wherecond = array('active' => 'Y');
    $data['stck'] = $model->getalldata('tbl_stock', $wherecond);
    // Create an associative array of product IDs and names for easy lookup

    // print_r( $data['stck']);die;
    $productNames = array();
    foreach ($data['product'] as $product) {
        $productNames[$product->id] = $product->product_name;
    }

    // Fetch all active branches
    $branchCondition = array('is_active' => 'Y');
    $data['branch'] = $model->getalldata('tbl_branch', $branchCondition);

    foreach ($data['branch'] as $branch) {
        $stockCondition = array('branch_name' => $branch->id);
        $stockData = $model->getalldata('tbl_stock', $stockCondition);

        // Ensure stock data is an array, even if no results are found
        $branch->stock_quantity = is_array($stockData) ? $stockData : [];

        // Pass both product ID and product name
        foreach ($branch->stock_quantity as $stock) {
            if (isset($productNames[$stock->product_name])) {
                $stock->product_id = $stock->product_name; // Store the product ID
                $stock->product_name = $productNames[$stock->product_name]; // Store the product name
            }
        }
    }
//   echo '<pre>'  ; print_r( $data);die;
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
    $data['product_data'] = $model->getalldata('tbl_product', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['branch_data'] = $model->getalldata('tbl_branch', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['invoice_data'] = $model->getalldata('tbl_invoice', $wherecond);
    // echo'<pre>';print_r($data);die;

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

public function delete()
{
    // Get URI segments
    $uri_data = $this->request->getUri()->getSegments();
    // print_r($uri_data);die;

    // Decode the ID and get the table name from the URI segments
    $id = base64_decode($uri_data[1]);  // Assuming the ID is the second segment
    $table = $uri_data[2];  // Assuming the table name is the third segment
    // print_r($id);die;

    // Update the database row with is_deleted = 'Y'
    $data = ['is_deleted' => 'Y'];
    $db = \Config\Database::connect();
    $update_data = $db->table($table)->where('id', $id);
    $update_data->update($data);

    // Set a flash message and redirect back
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->back()->with('message', 'Data deleted successfully!');;

}

public function increment_follow_up_count()
{
    $id = $this->request->getPost('id');  // Get enquiry ID from the POST request

    // Check if ID is provided
    if ($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_product_enquiry');

        try {
            // Increment the follow_up_count (use IFNULL to treat null as 0)
            $builder->set('follow_up_count', 'IFNULL(follow_up_count, 0) + 1', FALSE);
            $builder->where('id', $id);
            $builder->update();

            // Fetch the updated follow_up_count value
            $query = $builder->select('follow_up_count')->where('id', $id)->get();
            $result = $query->getRow();

            if ($result) {
                // Return success with the updated count
                return $this->response->setJSON([
                    'success' => true,
                    'follow_up_count' => $result->follow_up_count
                ]);
            } else {
                // If no result was found for the given ID
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Follow-up count not found for the given enquiry.'
                ]);
            }
        } catch (\Exception $e) {
            // Handle any database errors or exceptions
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    } else {
        // Invalid or missing ID
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid enquiry ID.'
        ]);
    }
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
        'invoiceNo' => $invoiceNo,
        'totalamounttotal' => $this->request->getVar('totalamounttotal'),
        'total_tax_amt' => $this->request->getVar('total_tax_amt'),
        'discount' => $this->request->getVar('discount'),
        'final_total' => $this->request->getVar('final_total'),
        'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),
        'courier_charges' => $this->request->getVar('courier_charges'),
    ];

    $invoiceId = $this->request->getVar('id');

    if (empty($invoiceId)) {
        // Insert invoice data
        $add_data = $db->table('tbl_invoice');
        $add_data->insert($data);

        $invoiceId = $db->insertID();
        session()->setFlashdata('success', 'Invoice added successfully.');
    } else {
        // Update invoice data
        $update_data = $db->table('tbl_invoice')->where('id', $invoiceId);
        $update_data->update($data);

        // Delete existing items for this invoice
        $db->table('tbl_iteam')->where('invoice_id', $invoiceId)->delete();
        session()->setFlashdata('success', 'Invoice updated successfully.');
    }

    // Retrieve items and update stock
    $items = $this->request->getVar('iteam');
    $quantity = $this->request->getVar('quantity');
    $price = $this->request->getVar('price');
    $gst_amount = $this->request->getVar('gst_amount');
    $total_amount = $this->request->getVar('total_amount');

    for ($k = 0; $k < count($items); $k++) {
        $product_data = array(
            'invoice_id'  => $invoiceId,
            'product_id'  => $items[$k],
            'quantity'    => $quantity[$k],
            'gst_amount'  => $gst_amount[$k],
            'price'       => $price[$k],
            'total_amount' => $total_amount[$k],
        ); 
        $add_data = $db->table('tbl_iteam');
        $add_data->insert($product_data);

        // Update stock
        $db->table('tbl_stock')
            ->where('product_name', $items[$k]) // Adjust if necessary
            ->where('branch_name', $this->request->getVar('branch_id')) // Adjust if necessary
            ->set('quantity', 'quantity - ' . $quantity[$k], false)
            ->update();
    }

    return redirect()->to('order_booking');
}


public function transfer_branch_quantity()
{
    // print_r($_POST);die;
    $model = new AdminModel();

    $selectBranch = $this->request->getPost('select_branch');    
    $selectProduct = $this->request->getPost('select_product');  
    $transferQuantity = $this->request->getPost('transfer_quantity'); 
    $transferBranch = $this->request->getPost('Transfer_branch'); 


    $transferQuantity = intval(preg_replace('/[^0-9]/', '', $transferQuantity)); 

    $sourceCondition = [
        'branch_name' => $selectBranch,
        'product_name' => $selectProduct
    ];
    $sourceStock = $model->getSingleDatass('tbl_stock', $sourceCondition);
    if (!$sourceStock) {
        return redirect()->back()->with('error', 'Source branch stock not found.');
    }

    if ($sourceStock->quantity >= $transferQuantity) {
        $newSourceQuantity = $sourceStock->quantity - $transferQuantity;
        if ($newSourceQuantity < 0) {
            return redirect()->back()->with('error', 'Quantity cannot be negative.');
        }
        $model->updatequantity($sourceStock->id, $newSourceQuantity);
    } else {
        return redirect()->back()->with('error', 'Not enough stock to transfer.');
    }

    $wherecond = [
        'branch_name' => $transferBranch,
        'product_name' => $selectProduct
    ];
    $targetStock = $model->getSingleDatasss('tbl_stock',  $wherecond);
    if ($targetStock) {
        $newTargetQuantity = $targetStock->quantity + $transferQuantity;
        $model->updatequantity($targetStock->id, $newTargetQuantity);
    } else {
        $newStockData = [
            'product_name' => $selectProduct,
            'branch_name' => $transferBranch,
            'quantity' => $transferQuantity,
            'size' => $sourceStock->size, 
            'unit' => $sourceStock->unit, 
            'use_by_date' => $sourceStock->use_by_date,
            'Expiry_date' => $sourceStock->Expiry_date,
            'active' => 'Y',
            'created_at' => date('Y-m-d H:i:s')
        ];
        $model->insertData('tbl_stock', $newStockData);
    }

    return redirect()->back()->with('success', 'Stock transferred successfully.');
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

public function invoice()
{
    $session = \Config\Services::session();

    $model = new AdminModel();

    $id = request()->getUri()->getSegment(2);
    if (!empty($id)) {
        // Fetching single data using the ID
        $wherecond1 = array('is_deleted' => 'N', 'id' => $id);
        $data['invoice_data'] = $model->getsingleuser('tbl_invoice', $wherecond1);
        
      
        echo view('Admin/invoice',$data);
    } else {
        echo view('Admin/invoice');
    }
}

public function bill_label()
{
    $session = \Config\Services::session();

    $model = new AdminModel();

    $id = request()->getUri()->getSegment(2);
    if (!empty($id)) {
        // Fetching single data using the ID
        $wherecond1 = array('is_deleted' => 'N', 'id' => $id);
        $data['invoice_data'] = $model->getsingleuser('tbl_invoice', $wherecond1);
        // echo "<pre>";print_r($data['invoice_data']);exit();
        echo view('Admin/bill_label',$data);
    } else {
        echo view('Admin/bill_label');
    }
}
 
public function add_row_Materials()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();
    $wherecond = array('active' => 'Y');
    $data['row_materials'] = $model->getalldata('tbl_row_materials', $wherecond);
    // print_r($data['row_materials']);die;
    echo view('Admin/add_row_materiyals',$data);
}
public function save_row_Materials()
{
    // print_r($_POST);die;
    $db = \Config\Database::connect();
    $data = [
        'product_name' => $this->request->getPost('product_name'),
        'unit' => $this->request->getPost('unit'),
        'unit_type' => $this->request->getPost('unit_type'),
        'container_type' => $this->request->getPost('container_type'),

    ];
    $db->table('tbl_row_materials')->insert($data);
    return redirect()->to('add_row_Materials');
}   
    public function add_courierService()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();

    $uri = service('uri');
    $courier_id = $uri->getSegment(2);   // Assuming the ID is the second segment
  
    $model = new AdminModel();
    if(!empty($courier_id)){
        // echo'<pre>';print_r($localbrand_id);exit();

        $wherecond1 = array('is_deleted' => 'N', 'id' => $courier_id);

        $data['single_data'] = $model->get_single_data('tbl_courierservice', $wherecond1);
        // print_r($data['single_data']);die;

    }else{
        $wherecond = array('is_deleted' => 'N');
        $data['courier_data'] = $model->getalldata('tbl_courierservice', $wherecond);
    }

    // print_r($data);die;
    return  view('Admin/add_courierService',$data);

}

public function set_courierService()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }

    // print_r($_POST);die;
    $db = \Config\Database::connect();
  
    $provider_name = $this->request->getPost('courier_service_provider');
    $mobile_number = $this->request->getPost('mobile_number');
    $address = $this->request->getPost('address');
    $location_type = $this->request->getPost('location_type');
    
    $data = [
        'provider_name' => $provider_name,
        'mobile_number' => $mobile_number,
        'address' => $address,
        'location_type' => $location_type
    ];

    // Instantiate your model
    $model = new Adminmodel();

    $db = \Config\Database::Connect();
    if ($this->request->getVar('id') == "") {
        $add_data = $db->table('tbl_courierservice');
        $add_data->insert($data);
        session()->setFlashdata('success', 'Provider added successfully.');
    } else {
        $update_data = $db->table('tbl_courierservice')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        session()->setFlashdata('success', 'Provider updated successfully.');
    }

return redirect()->to('add_courierService');
}


public function add_vendor()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();
   

    $uri = service('uri');
    $vendor_id = $uri->getSegment(2);   // Assuming the ID is the second segment
  
    $model = new AdminModel();
    if(!empty($vendor_id)){
        // print_r($vendor_id);exit();

        $wherecond1 = array('is_deleted' => 'N', 'id' => $vendor_id);

        $data['single_data'] = $model->get_single_data('tbl_vendor', $wherecond1);
        // echo'<pre>';print_r($data['single_data']);die;

    }else{
        $wherecond = array('is_deleted' => 'N');
        $data['vendor_data'] = $model->getalldata('tbl_vendor', $wherecond);
    }

    // print_r($data);die;
    return  view('Admin/add_vendor',$data);
}

public function set_vendor_data()
{
    // print_r($_POST);die;
    $data = [
                'vendor_name' => $this->request->getVar('name'),
                'contact_person' => $this->request->getVar('contact_person_name'),
                'vendor_mobile_no' => $this->request->getVar('vendor_mobile_no'),
                'contperson_mobile_no' => $this->request->getVar('cp_mobile_no'),
                'email' => $this->request->getVar('email'),
                'address' => $this->request->getVar('address'),
                'country' => $this->request->getVar('country'),
                'state' => $this->request->getVar('state'),
                'district' => $this->request->getVar('district'),
                'vendor_type_id' => $this->request->getVar('vendor_type_id'),
                'vendor_type' => $this->request->getVar('vendor_type'),
                'GST_no' => $this->request->getVar('gst_no'),
                'PAN_no' => $this->request->getVar('pan_no'),
                'bank_name' => $this->request->getVar('bank_name'),
                'acc_no' => $this->request->getVar('acc_no'),
                'bank_holder_name' => $this->request->getVar('bank_holder_name'),
                'ifsc_code' => $this->request->getVar('ifsc_code'),
                'branch_name' => $this->request->getVar('branch_name'),
                'upi_id' => $this->request->getVar('upi_id'),
                'mobile_no' => $this->request->getVar('bank_linked_mobile_no'),
                'days' => $this->request->getVar('days'),
                'months' => $this->request->getVar('months'),
                'dates' => $this->request->getVar('dates'),
                'recurring' => $this->request->getVar('recurring'),
                // 'created_on' => date('Y:m:d H:i:s'),
];
// echo "<pre>";
// print_r($data);exit();
 $db = \Config\Database::Connect();
 if($this->request->getVar('id') == ""){
    // echo "<pre>";
    // print_r($data);exit();
    $add_data = $db->table('tbl_vendor');
    $add_data->insert($data);
    session()->setFlashdata('success', 'Data added successfully.');
}else{
    $update_data = $db->table('tbl_vendor')->where('id',$this->request->getVar('id'));
    $update_data->update($data);



    session()->setFlashdata('success', 'Data updated successfully.');
}


    return redirect()->to('add_vendor'); 

}


public function dispatch() {
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $db = \Config\Database::connect();
    
    $courierBuilder = $db->table('tbl_courierservice');
    $data['courier_services'] = $courierBuilder->get()->getResultArray();

    $invoiceBuilder = $db->table('tbl_invoice');
    $data['invoice_data'] = $invoiceBuilder->get()->getResultArray();

    $model = new AdminModel();

    $uri = service('uri');
    $dispatch_id = $uri->getSegment(2);   // Assuming the ID is the second segment
  
    $model = new AdminModel();
    if(!empty($dispatch_id)){
        // echo'<pre>';print_r($dispatch_id);exit();

        $wherecond1 = array('is_deleted' => 'N', 'id' => $dispatch_id);

        $data['single_data'] = $model->get_single_data('tbl_dispatch', $wherecond1);
        // print_r($data['single_data']);die;

    }else{
        $wherecond = array('is_deleted' => 'N');
        $data['dispatch_data'] = $model->getalldata('tbl_dispatch', $wherecond);
    }
    // echo'<pre>';print_r($data);die;
    
    return view('Admin/dispatch', $data);
}

public function challan()
{
    $session = \Config\Services::session();

    $model = new AdminModel();

    $id = request()->getUri()->getSegment(2);
    // print_r($id);die;
    if (!empty($id)) {
        // Fetching single data using the ID
        $wherecond1 = array('is_deleted' => 'N', 'id' => $id);
        $data['invoice_data'] = $model->getsingleuser('tbl_invoice', $wherecond1);

        $select = 'tbl_invoice.*, tbl_dispatch.*';
        $joinCond = 'tbl_invoice.invoiceNo  = tbl_dispatch.bill_number';
        $wherecond = [
            'tbl_invoice.is_deleted' => 'N',
            'tbl_dispatch.is_deleted'=>'N',
             'tbl_dispatch.id' => $id
        ];
            $data['challan_data'] = $model->jointwotables($select, 'tbl_invoice', 'tbl_dispatch',  $joinCond,  $wherecond, 'DESC');
        // echo '<pre>';print_r($data['challan_data']);die;
      
        echo view('Admin/challan',$data);
    } else {
        // echo view('Admin/challan');
    }
}

public function getCustomerData()
{
    $invoiceNo = $this->request->getGet('invoice_no'); // Make sure the query parameter matches

    $db = \Config\Database::connect();
    $builder = $db->table('tbl_invoice');
    
    // Use the correct column name
    $builder->where('invoiceNo', $invoiceNo);
    $query = $builder->get();
    
    if ($query->getNumRows() > 0) {
        $data = $query->getRowArray();
        // Return the data or format it as needed
        return $this->response->setJSON($data);
    } else {
        return $this->response->setJSON(['error' => 'No data found']);
    }
}

public function getCourierMobile() {
    $providerName = $this->request->getGet('provider_name');
    
    $db = \Config\Database::connect();
    $builder = $db->table('tbl_courierservice');
    $builder->where('provider_name', $providerName);
    $result = $builder->get()->getRowArray();

    if ($result) {
        return $this->response->setJSON(['mobile_number' => $result['mobile_number'] ?? '']);
    } else {
        return $this->response->setJSON(['mobile_number' => '']);
    }
} 
public function dispatch_details()
{
    // Get the database connection
    $db = \Config\Database::connect();
    $builder = $db->table('tbl_dispatch'); // Ensure this is your table name

    // Load validation service
    $validation = \Config\Services::validation();
    $validation->setRules([
        'courier_provider' => 'required',
        'courier_mobile' => 'required',
        'courier_date' => 'required|valid_date',
        'bill_number' => 'required',
        'tracking_id' => 'required',
        'customer_name' => 'required',
        'customer_mobile' => 'required',
        'delivery_address' => 'required',
        'courier_price' => 'required|numeric'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        // Redirect back with validation errors
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Get form data
    $data = [
        'courier_provider' => $this->request->getPost('courier_provider'),
        'courier_mobile' => $this->request->getPost('courier_mobile'),
        'courier_date' => $this->request->getPost('courier_date'),
        'bill_number' => $this->request->getPost('bill_number'),
        'tracking_id' => $this->request->getPost('tracking_id'),
        'customer_name' => $this->request->getPost('customer_name'),
        'customer_mobile' => $this->request->getPost('customer_mobile'),
        'delivery_address' => $this->request->getPost('delivery_address'),
        'courier_price' => $this->request->getPost('courier_price'),
    ];

    // Insert data into the database
    // if ($builder->insert($data)) {
    //     // Redirect back with a success message
    //     return redirect()->back()->with('message', 'Dispatch details saved successfully!');
    // } else {
    //     // Redirect back with an error message
    //     return redirect()->back()->with('error', 'Failed to save dispatch details.');
    // }

    $db = \Config\Database::Connect();
    if ($this->request->getVar('id') == "") {
        $add_data = $db->table(' tbl_dispatch');
        $add_data->insert($data);
        return redirect()->to('dispatch')->with('message', 'Dispatch details saved successfully!');
    } else {
        print_r($this->request->getVar('id'));
        $update_data = $db->table(' tbl_dispatch')->where('id', $this->request->getVar('id'));
        $update_data->update($data);
        return redirect()->to('dispatch')->with('message', 'Dispatch details updated successfully!');
    }

return redirect()->to('dispatch');
}

public function salary_slip(){
    return view('Admin/salary_slip');
} 

public function punch_in_out(){
    return view('Admin/punch_in_out');
} 


public function leave_application(){
    $session = \CodeIgniter\Config\Services::session();

    if (!$session->has('id')) {
        return redirect()->to('/login'); // Redirect to login if not logged in
    }
    return view('Admin/leave_application');
}



public function petty_cash(){

    $db = \Config\Database::connect();

    $builderCash = $db->table('tbl_pattyCash')->select('date, cash_by as `by`, reason as `for`, amount')->orderBy('date', 'desc');

    $builderExpenses = $db->table('tbl_pattyExpenses')
        ->select('date, expense_by as `by`, reason as `for`, amount, biller_or_shop, bill_number') 
        ->orderBy('date', 'desc');

    $cashData = $builderCash->get()->getResultArray();
    $expenseData = $builderExpenses->get()->getResultArray();

 
    $data = [
        'cashData' => $cashData,
        'expenseData' => $expenseData,
    ];

    return view('Admin/petty_cash', $data);
}


public function Packaging_Material()
{
    $session = \CodeIgniter\Config\Services::session();

    $model = new AdminModel();
    if (!$session->has('id')) {
        return redirect()->to('/'); 
    }
    $wherecond = array('is_deleted' => 'N');
    $data['packaging_material'] = $model->getalldata('tbl_packaging_material', $wherecond);
    $uri = service('uri');
    $localbrand_id = $uri->getSegment(2); 
    if(!empty($localbrand_id)){
        $wherecond1 = array('is_deleted' => 'N', 'id' => $localbrand_id);
        $data['single_data'] = $model->get_single_data('tbl_packaging_material', $wherecond1);
        // print_r($data['single_data']);die;
    }
    return view('Admin/Add_Packaging_Material',$data);
}
public function add_packaging_material()
{
    // print_r($_POST);die;
    $id = $this->request->getPost('id');
    $db = \Config\Database::connect();
    $data = [
        'Material_Name' => $this->request->getPost('Material_Name'),
        'Material_Quantity' => $this->request->getPost('Material_Quantity'),
    ];
    if ($id) {
        $db->table('tbl_packaging_material')->where('id', $id)->update($data);
        session()->setFlashdata('success', 'Employee updated successfully.');
    } else {
        $db->table('tbl_packaging_material')->insert($data);
        session()->setFlashdata('success', 'Employee created successfully.');
    }
    return redirect()->to('Packaging_Material');

}



public function addCash()
{
    
    $db = \Config\Database::connect();
    $builder = $db->table('tbl_pattyCash'); 

    $validation = \Config\Services::validation();
    $validation->setRules([
        'date' => 'required|valid_date',
        'cash_by' => 'required|min_length[3]',
        'amount' => 'required|decimal',
        'for' => 'required'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
       
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $data = [
        'date' => $this->request->getPost('date'),
        'cash_by' => $this->request->getPost('cash_by'),
        'amount' => $this->request->getPost('amount'),
        'reason' => $this->request->getPost('for'),
       
    ];
  //  echo '<pre>'; print_r($_POST);die;

    if ($builder->insert($data)) {
        return redirect()->to('petty_cash')->with('message', 'Cash added successfully!');

    } else {
      
        return redirect()->back()->with('error', 'Failed to add cash.');
    }
}

public function addExpense()
{
    $db = \Config\Database::connect();
    $builder = $db->table('tbl_pattyExpenses'); 

    // Load validation service
    $validation = \Config\Services::validation();
    $validation->setRules([
        'date' => 'required|valid_date',
        'bill_number' => 'required',
        'expense_by' => 'required|min_length[3]',
        'for' => 'required',
        'biller_or_shop' => 'required',
        'amount' => 'required|decimal'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $data = [
        'date' => $this->request->getPost('date'),
        'bill_number' => $this->request->getPost('bill_number'),
        'expense_by' => $this->request->getPost('expense_by'),
        'reason' => $this->request->getPost('for'),
        'biller_or_shop' => $this->request->getPost('biller_or_shop'),
        'amount' => $this->request->getPost('amount')
    ];

   // echo '<pre>'; print_r($_POST);die;
    if ($builder->insert($data)) {
       
        return redirect()->to('petty_cash')->with('message', 'Expense added successfully!');
    } else {
        
        return redirect()->back()->with('error', 'Failed to add expense.');
    }
}


public function getProductDetails() {
    $model = new AdminModel();

    $productId = $this->request->getPost('product_id');
    
    if ($productId) {


        $wherecond1 = array('is_deleted' => 'N', 'id' => $productId);

        $productData = $model->get_single_data('tbl_product', $wherecond1);


        
        if (!empty($productData)) {
            // Return product details as a JSON response
            echo json_encode([
                'success' => true,
                'price' => $productData->mrp,
                'gst_amount' => $productData->tax_ammount,

            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Product not found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid product ID']);
    }
}

public function bank_transaction()
{
    $db = \Config\Database::connect();
    $builderDeposits = $db->table('tbl_bank_deposits')
        ->select('transaction_date, description, deposit_amount, cheque_number, cheque_date')
        ->orderBy('transaction_date', 'desc');

    $builderWithdrawals = $db->table('tbl_bank_withdrawals')
        ->select('transaction_date, description, withdrawal_amount')
        ->orderBy('transaction_date', 'desc');

    $depositData = $builderDeposits->get()->getResultArray();
    $withdrawalData = $builderWithdrawals->get()->getResultArray();

    $balance = 0;
    foreach ($depositData as $deposit) {
        $balance += $deposit['deposit_amount'];
    }

    foreach ($withdrawalData as $withdrawal) {
        $balance -= $withdrawal['withdrawal_amount'];
    }


    $data = [
        'depositData' => $depositData,
        'withdrawalData' => $withdrawalData,
        'balance' => $balance,
    ];

    return view('Admin/bank_transaction', $data);
}




public function add_deposit()
{
    $db = \Config\Database::connect();

    // Get form data
    $transactionDate = $this->request->getPost('transaction_date');
    $description = $this->request->getPost('description');
    $cheque = $this->request->getPost('cheque');
    $chequeNumber = $this->request->getPost('cheque_number');
    $chequeDate = $this->request->getPost('cheque_date');
    $depositAmount = $this->request->getPost('deposit_amount');

    $data = [
        'transaction_date' => $transactionDate,
        'description' => $description,
        'cheque' => $cheque,
        'cheque_number' => $chequeNumber,
        'cheque_date' => $chequeDate,
        'deposit_amount' => $depositAmount
    ];
   // echo '<pre>'; print_r($_POST);die;
 
    $result = $db->table('tbl_bank_deposits')->insert($data);

    if ($result) {
        return redirect()->to('bank_transaction')->with('message', 'Deposit added successfully!');
       
    } else {
        return redirect()->back()->with('error', 'Failed to add deposit');
    }
}

public function add_withdrawal()
{
    $db = \Config\Database::connect();

    $transactionDate = $this->request->getPost('transaction_date');
    $description = $this->request->getPost('description');
    $withdrawalAmount = $this->request->getPost('withdrawal_amount');

    $data = [
        'transaction_date' => $transactionDate,
        'description' => $description,
        'withdrawal_amount' => $withdrawalAmount
    ];
   // echo '<pre>'; print_r($_POST);die;
 
    $result = $db->table('tbl_bank_withdrawals')->insert($data);

  
    if ($result) {
        return redirect()->to('bank_transaction')->with('message', 'Withdrawal added successfully!');
     
    } else {
        return redirect()->back()->with('error', 'Failed to add withdrawal');
    }
}

    
    
    public function sales_reports() 
    { 
         $db = \Config\Database::connect();
        $session = \Config\Services::session();
        if (!$session->has('id')) {
            return redirect()->to('/');
        }
    
        $model = new AdminModel();
        $wherecond = ['is_deleted' => 'N','payment_status' => 'Received'];
        $orders = $model->getalldata('tbl_invoice', $wherecond);
    
        if (!$orders) {
            $data['orders'] = [];
            return view('Admin/sales_reports', $data);
        }
    
        $branches = $model->getalldata('tbl_branch', ['is_deleted' => 'N']);
        $branch_name = [];
        foreach ($branches as $branch) {
            if (isset($branch->id) && isset($branch->branch_name)) {
                $branch_name[$branch->id] = $branch->branch_name;
            }
        }
    
        $invoice_ids = array_column($orders, 'id');
        $invoice_ids = array_map('intval', $invoice_ids); // Ensure invoice IDs are integers
    
        $builder = $db->table('tbl_iteam');
        $builder->whereIn('invoice_id', $invoice_ids);
        $items = $builder->get()->getResult();
    
        if (!$items) {
            $data['orders'] = $orders;
            return view('Admin/sales_reports', $data);
        }
    
        $product_ids = array_column($items, 'product_id');
        $product_ids = array_map('intval', $product_ids); // Ensure product IDs are integers
    
        $builder = $db->table('tbl_product');
        $builder->whereIn('id', $product_ids);
        $products = $builder->get()->getResult();
    
        $product_name_map = [];
        foreach ($products as $product) {
            if (isset($product->id) && isset($product->product_name)) {
                $product_name_map[$product->id] = $product->product_name;
            }
        }
        foreach ($items as &$item) {
            if (isset($product_name_map[$item->product_id])) {
                $item->product_name = $product_name_map[$item->product_id];
            } else {
                $item->product_name = 'Unknown'; // Default if no match found
            }
        }
        foreach ($orders as &$order) {
            $order->items = array_filter($items, function($item) use ($order) {
                return $item->invoice_id === $order->id; // Ensure proper comparison
            });
        }
    
        foreach ($orders as &$order) {
            if (!empty($order->branch_id) && isset($branch_name[$order->branch_id])) {
                $order->branch_name = $branch_name[$order->branch_id];
            } else {
                $order->branch_name = 'Unknown'; // Default if no match found
            }
        }
        $data['orders'] = $orders;
        return view('Admin/sales_reports', $data);
    }
    
    
    
    
    

public function updatestatus() {
    $id = $this->request->getPost('id');
    $payment_status = $this->request->getPost('payment_status');

    // Initialize database
    $db = \Config\Database::connect();
    $table = 'tbl_invoice';  // your table name

    // Data to update
    $data = [
        'payment_status' => $payment_status,
    ];

    // Update the status
    $update_data = $db->table($table)->where('id', $id);
    $update_data->update($data);

    // Set flashdata for success, though not needed in AJAX
    session()->setFlashdata('success', 'Payment status updated successfully.');

    // Return JSON response for AJAX
    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Payment status updated successfully.',
    ]);

}

public function edit_row_Materials()
{
    $used_materials = $this->request->getVar('used_materials');
    $materialunits = $this->request->getVar('materialunits');
    $materialid = $this->request->getVar('materialid');
    $remaining_units = $materialunits - $used_materials;
    $data = [
        'unit' => $remaining_units
    ];
    $db = \Config\Database::connect();
    $update_data = $db->table('tbl_row_materials')->where('id', $materialid);
    if ($update_data->update($data)) {
        return redirect()->back()->with('success', 'Material updated successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to update material');
    }
}


public function add_daily_expense()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $model = new AdminModel();


    
    // echo'<pre>';print_r($data);die;

    $id = request()->getUri()->getSegment(2); // Adjust the segment number based on your route
    $data['single_data'] = [];


    if (!empty($id)) {
        // Fetching single data using the ID
        $wherecond1 = array('is_deleted' => 'N', 'id' => $id);
        $data['single_data'] = $model->getsingleuser('tbl_daily_expenses', $wherecond1);


        $wherecond1 = array('is_deleted' => 'N', 'invoice_id' => $id);

        $data['iteam'] = $model->getalldata('tbl_daily_expenses_iteam', $wherecond1);

            // echo'<pre>';print_r($data['iteam']);die;

    }

    $wherecond = array('is_deleted' => 'N');
    $data['tax_data'] = $model->getalldata('tbl_tax', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['vendor_data'] = $model->getalldata('tbl_vendor', $wherecond);

    $wherecond = array('is_deleted' => 'N');
    $data['branch_data'] = $model->getalldata('tbl_branch', $wherecond);


    $wherecond = array('is_deleted' => 'N', 'user_idd'=>$session->has('id'));
    $data['getData'] = $model->getalldata('tbl_daily_expenses', $wherecond);

    $wherecond = array('is_deleted' => 'N', 'user_idd'=>$session->has('id'));
    $data['all_daily_expenses_count'] = $model->getalldata('tbl_daily_expenses', $wherecond);

    $wherecond = array('is_deleted' => 'N', 'user_idd'=>$session->has('id'), 'bill_status' => 'Paid');
    $data['paid_bill_count'] = $model->getalldata('tbl_daily_expenses', $wherecond);

    $wherecond = array('is_deleted' => 'N', 'user_idd'=>$session->has('id'), 'bill_status' => 'Due');
    $data['due_bill_count'] = $model->getalldata('tbl_daily_expenses', $wherecond);

    $wherecond = array('is_deleted' => 'N', 'user_idd'=>$session->has('id'), 'bill_status' => 'Overdue');
    $data['overdue_bill_count'] = $model->getalldata('tbl_daily_expenses', $wherecond);



    $data['$totalAmountWithtax'] = $model->get_total_amount_with_gst(session()->get('user_id'));

    $data['$totalAmountWithtaxpaid'] =$model->get_total_paidamount_with_gst(session()->get('user_id'));

    $data['$totalAmountWithtaxdue'] =$model->get_total_dueamount_with_gst(session()->get('user_id'));

    $data['$totalAmountWithtaxoverdue'] =$model->get_total_overdueamount_with_gst(session()->get('user_id'));
    $getData = $data['getData'];

    foreach ($getData as $key => $invoice) {
        // Fetch vendor details
        $vendorData = $model->getvendorById($invoice->vendor_id);
    
        // Ensure $invoice is either an array or object and handle accordingly
        if (is_array($invoice)) {
            // Treat it as an array
            $getData[$key]['vendorname'] = isset($vendorData['vendor_name']) ? $vendorData['vendor_name'] : '';
        } elseif (is_object($invoice)) {
            // Treat it as an object
            $getData[$key]->vendorname = isset($vendorData->vendor_name) ? $vendorData->vendor_name : '';
        }
    }
    
    

    
    
    $wherecond = array('is_deleted' => 'N');
    $data['getDatas'] = $model->getalldata('tbl_daily_expenses', $wherecond);



    $getDatas = $data['getDatas'];

    if (!empty($getDatas)) {
        foreach ($getDatas as $key => $invoice) {
            // Check if $invoice is an object
            if (is_object($invoice)) {
                // Fetch vendor and branch data
                $vendorData = $model->getvendorById($invoice->vendor_id);
                $branchData = $model->getUserModelById($invoice->branch_id);
    
                
                $invoice->vendorname = isset($vendorData['vendor_name']) ? $vendorData['vendor_name'] : ''; // Use array key for accessing vendor_name
                $invoice->branchname = isset($branchData['branch_name']) ? $branchData['branch_name'] : ''; // Use array key for accessing branch_name
    
   
    
                // Update back to the array
                $getDatas[$key] = $invoice;
            }
        }
    
    
    
    
        // Assign the updated array back to $data['getDatas']
        $data['getDatas'] = $getDatas;
    }
    

    
    

    // echo "<pre>";print_r($data['getDatas']);exit();

   return view('Admin/add_daily_expense',$data);
}

public function set_invoice_data()
	{
        $session = \Config\Services::session();
   

		$billPhoto = $this->request->getFile('bill_photo');

		// Check if a file was uploaded
		if ($billPhoto->isValid() && !$billPhoto->hasMoved()) {
			// Generate a unique name for the file
			$newName = $billPhoto->getRandomName();
		
			// Move the file to the desired directory
			$billPhoto->move(ROOTPATH . 'assets/images/bill_photo', $newName);
		
			// Get the file path
			$billPhotoPath = 'assets/images/bill_photo/' . $newName;
		} else {
			// Handle the case when no file was uploaded
			$billPhotoPath = $this->request->getVar('hidden_bill_photo'); // or any default value you want to use
		}
		$data = [
					'vendor_id' => $this->request->getVar('vendor_id'),
					'address' => $this->request->getVar('address'),
					
					'bill_date' => $this->request->getVar('bill_date'),
					'bill_due_date' => $this->request->getVar('bill_due_date'),

					'bill_no' => $this->request->getVar('bill_no'),
					'account_number' => $this->request->getVar('account_number'),
					'gst_no' => $this->request->getVar('gst_no'),
					'bill' => $this->request->getVar('bill'),
					'totalQuantity' => $this->request->getVar('totalQuantity'),
					'total_price' => $this->request->getVar('total_price'),
					'totalamount' => $this->request->getVar('totalamount'),
					'total_discount' => $this->request->getVar('total_discount'),
					'totalamounttotal' => $this->request->getVar('totalamounttotal'),
					'totalamount_in_words' => $this->request->getVar('totalamount_in_words'),

					'name_of_person' => $this->request->getVar('name_of_person'),
					'total_tax' => $this->request->getVar('total_tax'),
					'total_cgst' => $this->request->getVar('total_cgst'),
					'total_sgst' => $this->request->getVar('total_sgst'),
					'total_tax_value' => $this->request->getVar('tax2'),

					'total_cgst_value' => $this->request->getVar('cgst2'),
					'total_sgst_value' => $this->request->getVar('sgst2'),
		
					'totalAmountWithtax' => $this->request->getVar('totalAmountWithtax'),

					'bank_name' => $this->request->getVar('bank_name'),
					'tax_id' => $this->request->getVar('tax_id'),
					'bank_holder_name' => $this->request->getVar('bank_holder_name'),
					'ifsc_code' => $this->request->getVar('ifsc_code'),
					'branch_name' => $this->request->getVar('branch_name'),
					'upi_id' => $this->request->getVar('upi_id'),
					'mobile_no' => $this->request->getVar('mobile_no'),
					'branch_id' => $this->request->getVar('branch_id'),
					'created_by' => $this->request->getVar('created_by'),
					'user_idd' => $session->has('id'),

					
					 'bill_photo' => $billPhotoPath, // Insert the file path
					 'bill_status' => $this->request->getVar('billstatus')
	];
	// echo "<pre>";
	// print_r($data);
	 $this->request->getVar('id'); 


	 $db = \Config\Database::Connect();
	 $id = $this->request->getVar('id');

	 if(empty($id)){


		$add_data = $db->table('tbl_daily_expenses');
		$add_data->insert($data);

		// echo "<pre>";print_r($data);


		$last_id =  $db->insertID();

	  $iteam = $this->request->getVar('iteam');
	  $quantity = $this->request->getVar('quantity');
	  $price = $this->request->getVar('price');
	  $amount_p = $this->request->getVar('amount_p');
	  $tax = $this->request->getVar('tax');
	  $cgst = $this->request->getVar('cgst');
	  $sgst = $this->request->getVar('sgst');
	  $total_tax = $this->request->getVar('total_tax');
	  $total_cgst = $this->request->getVar('total_cgst');
	  $total_sgst = $this->request->getVar('total_sgst');
	  $tax_value = $this->request->getVar('tax_value');
	  $cgst_value = $this->request->getVar('cgst_value');
	  $sgst_value = $this->request->getVar('sgst_value');
	  $discount = $this->request->getVar('discount');
	  $total_amount = $this->request->getVar('total_amount');


	//   echo "<pre>";print_r($amount_p); print_r($total_amount);exit();
  

        for($k=0;$k<count($iteam);$k++){
            $product_data = array(
                'invoice_id' 	=> $last_id,
                'iteam' 		=> $iteam[$k],
                'quantity' 		=> $quantity[$k],
                'price' 		=> $price[$k],
                'amount' 	    => $amount_p[$k],
                'discount' 		=> $discount[$k],
				'tax' 			=> $tax[$k],
				'cgst' 			=> $cgst[$k],
				'sgst' 			=> $sgst[$k],
				'total_tax' 	=> $total_tax[$k],
				'total_cgst' 	=> $total_cgst[$k],
				'total_sgst' 	=> $total_sgst[$k],
				'tax_value' 	=> $tax_value[$k],
				'cgst_value' 	=> $cgst_value[$k],
				'sgst_value' 	=> $sgst_value[$k],
                'total_amount'  => $total_amount[$k],
				'created_on' => date('Y:m:d H:i:s'),
                
            ); 
			// echo "<pre>";print_r($product_data);exit();
			$add_data = $db->table('tbl_daily_expenses_iteam');
			$add_data->insert($product_data);
	
		}
	
		session()->setFlashdata('success', 'Data added successfully.');
	}else{
		$update_data = $db->table('tbl_daily_expenses')->where('id',$this->request->getVar('id'));
		$update_data->update($data);

		// echo $this->request->getVar('id');
		// exit();

		$delete = $db->table('tbl_daily_expenses_iteam')->where('invoice_id', $this->request->getVar('id'))->delete();


		$last_id = $this->request->getVar('id');

		$iteam = $this->request->getVar('iteam');
		$quantity = $this->request->getVar('quantity');
		$price = $this->request->getVar('price');
		$amount_p = $this->request->getVar('amount_p');
		$tax = $this->request->getVar('tax');
		$cgst = $this->request->getVar('cgst');
		$sgst = $this->request->getVar('sgst');
		$total_tax = $this->request->getVar('total_tax');
		$total_cgst = $this->request->getVar('total_cgst');
		$total_sgst = $this->request->getVar('total_sgst');
		$tax_value = $this->request->getVar('tax_value');
		$cgst_value = $this->request->getVar('cgst_value');
		$sgst_value = $this->request->getVar('sgst_value');
		$discount = $this->request->getVar('discount');
		$total_amount = $this->request->getVar('total_amount');
  
  
	  //   echo "<pre>";print_r($amount_p); print_r($total_amount);exit();
	
  
		  for($k=0;$k<count($iteam);$k++){
			  $product_data = array(
				  'invoice_id' 	=> $last_id,
				  'iteam' 		=> $iteam[$k],
				  'quantity' 		=> $quantity[$k],
				  'price' 		=> $price[$k],
				  'amount' 	    => $amount_p[$k],
				  'discount' 		=> $discount[$k],
				  'tax' 			=> $tax[$k],
				  'cgst' 			=> $cgst[$k],
				  'sgst' 			=> $sgst[$k],
				  'total_tax' 	=> $total_tax[$k],
				  'total_cgst' 	=> $total_cgst[$k],
				  'total_sgst' 	=> $total_sgst[$k],
				  'tax_value' 	=> $tax_value[$k],
				  'cgst_value' 	=> $cgst_value[$k],
				  'sgst_value' 	=> $sgst_value[$k],
				  'total_amount'  => $total_amount[$k],
				  'created_on' => date('Y:m:d H:i:s'),
				  
			  ); 
			  $add_data1 = $db->table('tbl_daily_expenses_iteam');
			  $add_data1->insert($product_data);
	  
		  }
	  

		session()->setFlashdata('success', 'Data updated successfully.');
	}

	
		return redirect()->to('add_daily_expense'); 

	}

    public function get_vendor_By_Id()
    {

        $model = new AdminModel();

        $vendor_id = $this->request->getPost('vendor_id');

        // echo $vendor_id; exit();

        if ($vendor_id) {
            $vendor_data = $model->get_vendor_By_Id($vendor_id);
            // echo "<pre>";print_r($vendor_data);exit();
            return json_encode($vendor_data);
        } else {
            return json_encode([]);
        }
    }


    public function generateMonthlyAttendanceReport()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    // Load your model
    $adminModel = new AdminModel();

    // Get the first and last day of the current month
    $firstDayOfMonth = date('Y-m-01');
    $lastDayOfMonth = date('Y-m-t');

    // Fetch all employees
    $wherecond = array('is_deleted' => 'N', 'role' => 'Employee');
    $allEmployees = $adminModel->getalldata('tbl_register', $wherecond);

    // Fetch employees with attendance for the current month
    $attendanceEmployees = $adminModel->getMonthlyAttendanceData('tbl_employeetiming', $firstDayOfMonth, $lastDayOfMonth);

    // Convert the attendance list to a structured array
    $attendanceData = [];
    foreach ($attendanceEmployees as $record) {
        $date = date('Y-m-d', strtotime($record->start_time));
        if (!isset($attendanceData[$date])) {
            $attendanceData[$date] = [];
        }
        $attendanceData[$date][] = $record->emp_id;
    }

    // Prepare the report data
    $report = [
        'allEmployees' => $allEmployees,
        'attendanceData' => $attendanceData,
        'firstDayOfMonth' => $firstDayOfMonth,
        'lastDayOfMonth' => $lastDayOfMonth
    ];

    // Pass the report data to the view (assuming you have a view file for the report)
    return view('Admin/monthly_attendance_report', ['report' => $report]);

}

public function getallmonthdata()
{
    // Fetch selected month and year from POST data
    $selectedMonth = $_POST['month'] ?? date('n'); // Default to current month if not set
    $selectedYear = $_POST['year'] ?? date('Y'); // Default to current year if not set

    // Load your model
    $adminModel = new AdminModel();

    // Get the first and last day of the selected month and year
    $firstDayOfMonth = date('Y-m-01', strtotime("$selectedYear-$selectedMonth-01"));
    $lastDayOfMonth = date('Y-m-t', strtotime("$selectedYear-$selectedMonth-01"));

    // Fetch all employees
    $wherecond = array('is_deleted' => 'N', 'role' => 'Employee');
    $allEmployees = $adminModel->getalldata('tbl_register', $wherecond);

    // Fetch employees with attendance for the selected month and year
    $attendanceEmployees = $adminModel->getMonthlyAttendanceData('tbl_employeetiming', $firstDayOfMonth, $lastDayOfMonth);

    $wherecond = ['is_deleted' => 'N'];
    $holidaysData = $adminModel->getalldata('tbl_holidays', $wherecond);

    // Prepare holidays array
    $holidays = [];
    foreach ($holidaysData as $holiday) {
        $holidays[] = date('Y-m-d', strtotime($holiday->holiday_date));
    }

    // Convert the attendance list to a structured array
    $attendanceData = [];
    foreach ($attendanceEmployees as $record) {
        $date = date('Y-m-d', strtotime($record->start_time));
        if (!isset($attendanceData[$date])) {
            $attendanceData[$date] = [];
        }
        $attendanceData[$date][] = $record->emp_id;
    }

    // Prepare the report data
    $report = [
        'allEmployees' => $allEmployees,
        'attendanceData' => $attendanceData,
        'holidays' => $holidays,
        'firstDayOfMonth' => $firstDayOfMonth,
        'lastDayOfMonth' => $lastDayOfMonth
    ];

    // Pass the selected month, year, and report data to the view
    return view('Admin/monthly_attendance_report', [
        'selectedMonth' => $selectedMonth,
        'selectedYear' => $selectedYear,
        'report' => $report
    ]);
}


public function showattendancei()
{
    $session = \Config\Services::session();
    if (!$session->has('id')) {
        return redirect()->to('/');
    }
    $adminModel = new AdminModel();
    
   
        $uri = service('uri');
        $id = $uri->getSegment(2); // Employee ID from URL segment

        if (isset($id)) {
            // Fetch selected month and year from POST data or default to current
            $selectedMonth = $this->request->getPost('month') ?? date('n');
            $selectedYear = $this->request->getPost('year') ?? date('Y');
    
            // Get the first and last day of the selected month and year
            $firstDayOfMonth = date('Y-m-01', strtotime("$selectedYear-$selectedMonth-01"));
            $lastDayOfMonth = date('Y-m-t', strtotime("$selectedYear-$selectedMonth-01"));
    
            // Fetch all employees
            $wherecond = ['is_deleted' => 'N', 'role' => 'Employee'];
            $allEmployees = $adminModel->getalldata('tbl_register', $wherecond);

            $wherecond = ['is_deleted' => 'N', 'id' => $id];
            $empdata = $adminModel->get_single_data('tbl_register', $wherecond);
    
            // Fetch employees with attendance for the selected month and year
            $attendanceEmployees = $adminModel->getMonthlyAttendanceDatai('tbl_employeetiming', $firstDayOfMonth, $lastDayOfMonth, $id);
    
            // Convert the attendance list to a structured array
            $attendanceData = [];
            foreach ($attendanceEmployees as $record) {
                $date = date('Y-m-d', strtotime($record->start_time));
                if (!isset($attendanceData[$date])) {
                    $attendanceData[$date] = [];
                }
                $attendanceData[$date][] = [
                    'start_time' => $record->start_time,
                    'end_time' => $record->end_time,
                    'created_on' => $record->created_on
                ];
            }
    
            // Prepare the report data
            $report = [
                'allEmployees' => $allEmployees,
                'attendace_data' => $attendanceData,
                'firstDayOfMonth' => $firstDayOfMonth,
                'lastDayOfMonth' => $lastDayOfMonth,
                'emp_id' => $id
            ];
    
            // Pass the selected month, year, and report data to the view
            return view('Admin/showattendance', [
                'selectedMonth' => $selectedMonth,
                'selectedYear' => $selectedYear,
                'report' => $report,
                'empdata' => $empdata
            ]);
        }
   
}


    



}

