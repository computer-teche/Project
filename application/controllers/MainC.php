<?php 


class MainC extends CI_Controller{

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

    

}


?>