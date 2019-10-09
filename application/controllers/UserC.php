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
        // $this->load->view('private/example');
        $this->load->model('WorkM','user');
        $UserData = $this->user->getUser();
        $this->load->view('private/Dashboard',compact('UserData'));
    }

    public function ViewUsers()
    {
        $this->load->model('WorkM','user');
        $UserData = $this->user->getUsers();
        $this->load->view('private/ViewUsers',compact('UserData'));
    }

    public function loadAddUsers()
    {   
        $up=0;
        $this->load->view('private/AddUsers',compact('up'));
    }

    public function loadEditUsers($id)
    {   
        $this->load->model('WorkM','user');
        $query = $this->db->where(['id'=>$id])->get('users');
        $UserData = $query->result();
        $up=1;
        $this->load->view('private/AddUsers',compact('UserData','up'));
    }





    public function AddUser()
    {
        $un = $this->input->post('username');
        $pw = $this->input->post('password');

        // echo $un;

        $this->load->model('WorkM');

        if($this->WorkM->InsertUser($un,$pw)){
            return $this->ViewUsers();
            // echo "done";
        }else{
            $this->session->set_flashdata('error', 'Inalid DATA');
            $this->Adduser();
            // echo "not done";
        }
    }


    public function EditUsers($id)
    {
        $un = $this->input->post('username');
        $pw = $this->input->post('password');

        $this->load->model('WorkM');
        if($this->WorkM->UpdateUser($id,$un,$pw)){
            return $this->ViewUsers();
        }else{
            $this->session->set_flashdata('error', 'Inalid DATA');
            $this->Adduser();
        }
    }

    public function RemoveUsers($id)
    {
        $this->load->model('WorkM');
        // $this->WorkM->DeleteUser($id);
        if($this->WorkM->DeleteUser($id)){
            $this->ViewUsers();
        }else{
            return false;
        }
    }
    

   
    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('MainC');
        // $this->session->unset_userdata('id');
    }

    

    

    

}


?>