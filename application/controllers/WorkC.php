<?php 


class WorkC extends CI_Controller{

    public function index()
    {
        $this->load->view('public/Login');
    }
    
    public function AuthUser() 
    {
        $un = $this->input->post('username');
        $pw = $this->input->post('password');

        $this->load->model('WorkM');

        if($this->WorkM->CheckUserName($un)){
            
            echo "work";
        }else {
            
            echo "not work";
        }

    }
    
    



}


?>