<?php 
class WorkM extends CI_Model
{
    public function CheckUserName($un,$pw)
    {
        $query =$this->db->where(['username'=>$un])->get('users');
        $d = $query->result();
        if($query->num_rows())
        {
            //echo $query;
            // echo "<pre>";
            // print_r ($d);
            // echo "</pre>";
            // echo "stage1 clear";
            if($pw== $d[0]->password){
                
                // $this->session->set_userdata('id',$d[0]->id);
                $this->session->set_userdata('username',$d[0]->username);

                return true;
            }
            else{
                
                return false;
            }

        }else{
            return false;
        }
    }
}


?>