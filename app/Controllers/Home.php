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
        'tal' => $this->request->getPost('tal'),
        'district' => $this->request->getPost('district'),
        'country' => $this->request->getPost('country'),
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
    $user = $model->getsinglerow('tbl_register', $wherecond);
    if ($user) {
        if ($password === $user->password) {  
            $userData = [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                // 'accesslevel'=>$user['accesslevel'],
            
            ];
            $session->set($userData);
            // print_r($userData);die;
            if ($user->role === 'customer') {
                return redirect()->to(base_url('product'));
            } 
                elseif ($user->role === 'Admin') {
                    return redirect()->to(base_url('admindashboard'));
            } 
            // elseif ($user->role === 'Admin') {
            //     return redirect()->to(('AdminDashboard'));
            // } 
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
    //  print_r($data['users']);die;
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

}