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

public function product_enquiry_details(){
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
    $wherecond = array('is_active' => 'Y');
    $data['menu'] = $model->getalldata('tbl_menu', $wherecond);
    $wherecond = array('role' => 'Admin','active' => 'Y');
    $data['invoices_list'] = $model->getalldata('tbl_register', $wherecond);
    //  print_r($data['menu']);die;
   return view('Admin/add_invoice',$data);
}

public function delete()
{
    // Get URI segments
    $uri_data = $this->request->getUri()->getSegments();

    // Decode the ID and get the table name from the URI segments
    $id = base64_decode($uri_data[1]);  // Assuming the ID is the second segment
    $table = $uri_data[2];  // Assuming the table name is the third segment

    // Update the database row with is_deleted = 'Y'
    $data = ['is_deleted' => 'Y'];
    $db = \Config\Database::connect();
    $update_data = $db->table($table)->where('id', $id);
    $update_data->update($data);

    // Set a flash message and redirect back
    session()->setFlashdata('success', 'Data deleted successfully.');
    return redirect()->back();
}

public function increment_follow_up_count()
{
    $id = $this->request->getPost('id');  // Get enquiry ID from the POST request

    if ($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_product_enquiry');

        // Use IFNULL to treat null values as 0 before incrementing
        $builder->set('follow_up_count', 'IFNULL(follow_up_count, 0) + 1', FALSE);
        $builder->where('id', $id);
        $builder->update();

        // Fetch the updated follow_up_count value
        $query = $builder->select('follow_up_count')->where('id', $id)->get();
        $result = $query->getRow();

        if ($result) {
            return $this->response->setJSON([
                'success' => true,
                'follow_up_count' => $result->follow_up_count
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Could not retrieve updated follow-up count.'
            ]);
        }
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid ID'
        ]);
    }
}






}

