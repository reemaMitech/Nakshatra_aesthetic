<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function getalldata($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getResult();

        if ($result) {
            return $result;
        } else {
            return false;
        }
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

}
