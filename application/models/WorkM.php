<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkM extends CI_Model
{

    public function getRow($id,$tablename=null){
        $query = $this->db->where('id',$id)->get($tablename);
        $result = $query->result();
        return $result;
    }

    public function CheckUserName($un, $pw)
    {
        $query = $this->db->where(['username' => $un])->get('users');
        $d = $query->result();
        if ($query->num_rows()) {
            //echo $query;
            // echo "<pre>";
            // print_r ($d);
            // echo "</pre>";
            // echo "stage1 clear";
            if ($pw == $d[0]->password) {

                // $this->session->set_userdata('id',$d[0]->id);
                $this->session->set_userdata('username', $d[0]->username, 'id', $d[0]->id);

                return true;
            } else {

                return false;
            }
        } else {
            return false;
        }
    }

    public function getMain()
    {
        $query = $this->db->get('homepage');
        $result = $query->result();
        return $result;
    }

    public function getUsers()
    {
        $query = $this->db->get('users');
        $result = $query->result();
        return $result;
    }

    public function InsertUser($un, $pw)
    {
        $data = array(
            'username' => $un,
            'password' => $pw
        );
        if ($this->db->insert('users', $data)) {
            return true;
        } else {
            return false;
        }
    }


    public function UpdateUser($id, $un, $pw)
    {
        $data = array(
            'username' => $un,
            'password' => $pw
        );
        
        $this->db->where('id', $id);
       
        if ( $this->db->update('users', $data)) {
            // echo "done";
            return true;
        } else {
            // echo "not done";
            return false;
        }
    }

    public function DeleteUser($id)
    {

        if ($this->db->where('id', $id)->delete('users')) {
            // echo "done";
            return true;
        } else {
            // echo "not done";
            return false;
        }
    }

    public function InsertHomePage($data)
    {
        if ($this->db->insert('HomePage', $data)) {
            return true;
        } else {
            return false;
        }
    }


    public function UpdateHomePage($data,$id)
    {
       
        
        $this->db->where('id', $id);
       
        if ( $this->db->update('HomePage', $data)) {
            // echo "done";
            return true;
        } else {
            // echo "not done";
            return false;
        }
    }

    public function DeleteHomePage($id)
    {

        if ($this->db->where('id', $id)->delete('Homepage')) {
            // echo "done";
            return true;
        } else {
            // echo "not done";
            return false;
        }
    }
}
