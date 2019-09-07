<?php 
class WorkM extends CI_Model
{
    public function CheckUserName($un)
    {
        $query =$this->db->where(['username'=>$un])->get('users');
        if($query->num_rows())
        {
            return true;
        }else{
            return false;
        }
    }
}


?>