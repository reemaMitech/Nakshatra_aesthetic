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
  
    public function getsinglerow($table, $wherecond)
    {

        $result = $this->db->table($table)->where($wherecond)->get()->getRow();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
