<?php 


class UserC extends CI_Controller{

    public function __construct()  
    {
        parent::__construct();
        if(!$this->session->userdata('username'))
        {
            redirect('MainC');
        }
    }

    public function index()
    {
        $this->load->view('private/Dashboard');
    }

    public function logout()
    {

        $this->session->unset_userdata('username');
        redirect('MainC');
        // $this->session->unset_userdata('id');
    }

    

    

}


?>