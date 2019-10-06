<?php 


class MainC extends CI_Controller{
    public function __construct()  
    {
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view('public/Home');
    }

    public function Cul()
    {
        $this->load->view('public/Culture');
    }

    public function Dest()
    {
        $this->load->view('public/Destination');
    }

    public function AboutUs()
    {
        $this->load->view('public/AboutUs');
    }

    
}


?>