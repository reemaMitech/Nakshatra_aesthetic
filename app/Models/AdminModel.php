<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
   protected $table ='tbl_stock';
   protected $allowedFields = ['id', 'product_name', 'branch_name', 'quantity', 'size', 'unit','use_by_date','Expiry_date'];

    public function getalldata($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getResult();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getSingleData($table, $wherecond)
    {
        return $this->db->table($table)->where($wherecond)->get()->getRow();
    }
    public function getSingleDatas($table, $sourceCondition)
    {
        return $this->db->table($table)->where($sourceCondition)->get()->getRow();
  
    }
    public function getSingleDatass($table, $condition)
    {
        return $this->db->table($table)
                        ->where($condition)
                        ->get()
                        ->getRow();  
    }

    public function getSingleDatasss($table, $condition)
    {
        return $this->db->table($table)
                        ->where($condition)
                        ->get()
                        ->getRow(); 
    }

    public function getsingleuser($table, $wherecond)
    {
        return $this->db->table($table)->where($wherecond)->get()->getRow();
    }
    public function getsinglerow($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();

    }
    public function get_state_name_location($country_id){

        $result = $this->db->table('states')->where('country_id', $country_id)->get()->getResult();
    
        echo json_encode($result);
    
    }
    
    public function get_city_name_location($state_id){
    
        $result = $this->db->table('cities')->where('state_id', $state_id)->get()->getResult();
    
        echo json_encode($result);
    
    }

    public function get_country_name(){

        return $this->db->table('countries')
    
        ->get()
    
        ->getResult();
    
    }
    
    public function get_states_name(){
    
        return $this->db->table('states')
    
        ->get()
    
        ->getResult();
    
    }
    
    public function get_citys_name(){
    
        return $this->db->table('cities')
    
        ->get()
    
        ->getResult();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getStatesByCountry($country_id)
    {
        // Specify the table for states
        $this->table = 'states';  // Set the states table

        // Fetch states based on the country_id
        return $this->where('country_id', $country_id)->findAll();
    }


    public function jointwotables($select, $table1, $table2,  $joinCond, $wherecond, $type)
{
    $result = $this->db->table($table1)  // Use $table1 variable here
        ->select($select)
        ->join($table2, $joinCond, $type)
        ->where($wherecond)
        ->get()
        ->getResult();
    //    echo $this->db->getLastQuery();
    //   echo'<pre>'; print_r($result);die;
    return $result;
}

public function jointhreetables($select, $table1, $table2, $table3, $joinCond, $joinCond2, $wherecond, $type)
{
    $result = $this->db->table($table1)  // Use $table1 variable here
        ->select($select)
        ->join($table2, $joinCond, $type)
        ->join($table3, $joinCond2, $type)
        ->where($wherecond)
        ->get()
        ->getResult();
    //    echo $this->db->getLastQuery();die;
    return $result;
}

public function get_single_data($table, $wherecond)
{
    $result = $this->db->table($table)->where($wherecond)->get()->getRow();
    // echo'<pre>';print_r($this->db->getLastQuery());die;
    //print_r($result);die;

    if ($result) {
        return $result;
    } else {
        return false;
    }
}


    public function insertData($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }
    public function updatequantity($id, $newQuantity)
    {
        return $this->db->table($this->table)
                        ->set('quantity', $newQuantity)
                        ->where('id', $id)
                        ->update();
    }
    // public function updatequantity($Id, $quantity)
    // {
    //     return $this->db->table('tbl_stock')
    //                     ->where('id', $Id)
    //                     ->update(['quantity' => $quantity]);
    // }
    public function updatequantitys($Ids, $quantitys)
    {
        return $this->db->table('tbl_stock')
                        ->where('id', $Ids)
                        ->update(['quantity' => $quantitys]);
    }

public function getPattyCashData($whereCond){
    return $this->db->table('tbl_pattycash')->where($whereCond)->get()->getResult();
}

public function getPattyExpensesData($whereCond){
    return $this->db->table('tbl_pattyexpenses')->where($whereCond)->get()->getResult();
}


public function get_vendor_By_Id($vendor_id){
    // echo $vendor_id; exit();
    $row = $this->db->table('tbl_vendor')->where('id', $vendor_id)->get()->getRow();

    if ($row != '') {
        return $row;
    }else {
        return false;
    }

}


public function get_total_amount_with_gst($id)
{

    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();
    }else{

        $result = $this->db->table('tbl_daily_expenses')
        ->selectSum('totalAmountWithtax')
       ->where('is_deleted', 'N')
        ->Where('user_idd', $id)

        ->get()
        ->getRow();

    }

    return $result->totalAmountWithtax;
}

public function get_total_paidamount_with_gst($id)
{
    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Paid')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();

                }else{

                    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Paid')
                   ->where('is_deleted', 'N')
                    ->Where('user_idd', $id)

                    ->get()
                    ->getRow();
            
                }

    return $result->totalAmountWithtax;
}

public function get_total_dueamount_with_gst($id)
{
    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Due')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();
                }else{

                    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Due')
                   ->where('is_deleted', 'N')
                    ->Where('user_idd', $id)

                    ->get()
                    ->getRow();
            
                }

    return $result->totalAmountWithtax;
}

public function get_total_overdueamount_with_gst($id)
{
    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Overdue')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();
                }else{

                    $result = $this->db->table('tbl_daily_expenses')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Overdue')
                   ->where('is_deleted', 'N')
                    ->Where('user_idd', $id)

                    ->get()
                    ->getRow();
            
                }

    return $result->totalAmountWithtax;
}

public function getvendorById($id)
{
    // echo "$id";exit();
    $row = $this->db->table('tbl_vendor')->where('id', $id)->get()->getRowArray();
        //  echo '<pre>';print_r($row);exit();

    if ($row != '') {
        return $row;
    }else {
        return false;
    }
    // print_r($row);die;
}


public function getUserModelById($id)
{
    return $this->db->table('tbl_branch')->where('id', $id)->get()->getRowArray();
}



public function getBalanceStock()
{
    return $this->db->table('stock_table')
                    ->select('product_name, quantity, branch_name')
                    ->get()
                    ->getResultArray(); // or getResult() based on your requirement
}

public function getMonthlyAttendanceData($table, $startDate, $endDate, $emp_id = null)
{
   
     $builder = $this->db->table($table)
     ->where('is_deleted', 'N')
     ->where('DATE(start_time) >=', $startDate)  // Compare only the date part
     ->where('DATE(start_time) <=', $endDate);

 if (!empty($emp_id)) {
     $builder->where('emp_id', $emp_id);
 }

    // Execute the query and get the results
    $query = $builder->get();
    $res = $query->getResult();

    return $res; // Use getResult() to get the results as an array of objects
}

public function getMonthlyAttendanceDatai($table, $startDate, $endDate, $id)
{
    return $this->db->table($table)
        ->where('is_deleted', 'N')
        ->where('emp_id', $id)

        ->where('start_time >=', $startDate)
        ->where('start_time <=', $endDate)
        ->get()
        ->getResult(); // Use getResult() to get the results as an array of objects
}


public function get_total_amount_with_gstp($id)
{

    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();
    }else{

        $result = $this->db->table('tbl_purchase_bill')
        ->selectSum('totalAmountWithtax')
       ->where('is_deleted', 'N')
        ->Where('user_idd', $id)

        ->get()
        ->getRow();

    }

    return $result->totalAmountWithtax;
}

public function get_total_paidamount_with_gstp($id)
{
    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Paid')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();

                }else{

                    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Paid')
                   ->where('is_deleted', 'N')
                    ->Where('user_idd', $id)

                    ->get()
                    ->getRow();
            
                }

    return $result->totalAmountWithtax;
}

public function get_total_dueamount_with_gstp($id)
{
    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Due')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();
                }else{

                    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Due')
                   ->where('is_deleted', 'N')
                    ->Where('user_idd', $id)

                    ->get()
                    ->getRow();
            
                }

    return $result->totalAmountWithtax;
}

public function get_total_overdueamount_with_gstp($id)
{
    $roll_type = session()->get('role');
    if($roll_type == 'Admin'){
    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Overdue')
                   ->where('is_deleted', 'N')
                    ->get()
                    ->getRow();
                }else{

                    $result = $this->db->table('tbl_purchase_bill')
                    ->selectSum('totalAmountWithtax')
                    ->where('bill_status', 'Overdue')
                   ->where('is_deleted', 'N')
                    ->Where('user_idd', $id)

                    ->get()
                    ->getRow();
            
                }

    return $result->totalAmountWithtax;
}

public function jointwotablesforleave($select, $table, $joins, $joinConds, $wherecond, $order)
{
    $builder = $this->db->table($table);
    $builder->select($select);
    
    if (is_array($joins) && is_array($joinConds)) {
        foreach ($joins as $index => $join) {
            $builder->join($join, $joinConds[$index]);
        }
    } else {
        $builder->join($joins, $joinConds);
    }
    
    $builder->where($wherecond);
    $builder->orderBy('tbl_leave_requests.id', $order);
    
    $query = $builder->get();
    return $query->getResult();
}
public function getCount($table, $conditions = [])
{
    return $this->db->table($table)->where($conditions)->countAllResults();
}

public function getEmployeeTiming($emp_Id) {
    // Get today's date
    $todayDate = date('Y-m-d');

    // Fetch data from empdata table for the specified employee and today's date
    $todaysData = $this->db->table('tbl_employeetiming')
                         ->where('emp_id', $emp_Id)
                         ->where('created_on >=', $todayDate . ' 00:00:00')
                         ->where('created_on <=', $todayDate . ' 23:59:59')
                         ->get()
                         ->getResultArray();
    // print_r($todaysData);die;                     

    return $todaysData;
}



public function get_punch_in_time($emp_id, $date) {
    // Use the Query Builder to build your query
    $builder = $this->db->table('tbl_employeetiming'); // Replace with your punch-in table name
    $builder->select('start_time');
    $builder->where('emp_id', $emp_id);
    $builder->where('DATE(start_time)', $date); // Match today's date
    
    // Execute the query
    $query = $builder->get();
    
    // Check if there are any results and return the punch-in time
    if ($query->getNumRows() > 0) {
        return $query->getRow()->start_time;
    }

    return null; // Return null if no punch-in time is found
}

public function get_punch_out_time($emp_id, $date) {
    // Use the Query Builder to build your query
    $builder = $this->db->table('tbl_employeetiming'); // Replace with your punch-in table name
    $builder->select('end_time');
    $builder->where('emp_id', $emp_id);
    $builder->where('DATE(start_time)', $date); // Match today's date
    
    // Execute the query
    $query = $builder->get();
    
    // Check if there are any results and return the punch-in time
    if ($query->getNumRows() > 0) {
        return $query->getRow()->end_time;
    }

    return null; // Return null if no punch-in time is found
}







}