<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $UserData = $this->user->getUsers();
        $this->load->view('private/dashboard',compact('UserData'));
    }

    public function ViewUsers()
    {
        $this->load->model('WorkM','user');
        $UserData = $this->user->getUsers();
        $this->load->view('private/ViewUsers',compact('UserData'));
    }

    public function ViewHomePage()
    {
        $this->load->model('WorkM','homepage');
        $UserData = $this->homepage->getMain();
        $this->load->view('private/ViewHomePage',compact('UserData'));
    }

    public function ViewCulturePage()
    {
        $this->load->model('WorkM','culturepage');
        $UserData = $this->culturepage->getculturepage();
        $this->load->view('private/ViewCulturePage',compact('UserData'));
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


    public function loadAddHomePage()
    {   
        $up=0;
        $this->load->view('private/AddHomePage',compact('up'));
    }

    public function loadAddCulturePage()
    {   
        $up=0;
        $this->load->view('private/AddCulturePage',compact('up'));
    }

    public function loadEditHomePage($id)
    {   
        $this->load->model('WorkM');
        $query = $this->db->where(['id'=>$id])->get('homepage');
        $UserData = $query->result();
        $up=1;
        $this->load->view('private/AddHomePage',compact('UserData','up'));
    }
    
    public function loadEditCulturePage($id)
    {   
        $this->load->model('WorkM');
        $query = $this->db->where(['id'=>$id])->get('CulturePage');
        $UserData = $query->result();
        $up=2;
        $this->load->view('private/AddCulturePage',compact('UserData','up'));
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
    

    public function AddHomePage()
    {
        $na = $this->input->post('Name');
        $de = $this->input->post('Descripition');
       
        $config['upload_path']          = './assets/images/homepage';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 10000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $this->session->set_flashdata('error', 'Inalid DATA');
            $this->AddHomePage();      // $this->load->view('upload_form', $error);
        }
        else
        {
              $im = $this->upload->data('file_name');
                $data = array(
                                'img ' => $im,
                                'name' => $na,
                                'des'  => $de);
                // $this->load->view('upload_success', $data);

                $this->load->model('WorkM');

                if($this->WorkM->InsertHomePage($data)){
                    return $this->ViewHomePage();
                    // echo "done";
                }else{
                    $this->session->set_flashdata('error', 'Inalid DATA');
                    $this->AddHomePage();
                }
        }
    }

    public function AddCulturePage()
    {
        $na = $this->input->post('Name');
        
       
        $config['upload_path']          = './assets/images/culturepage';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 10000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $this->session->set_flashdata('error', 'Inalid DATA');
            $this->AddCulturePage();      // $this->load->view('upload_form', $error);
        }
        else
        {
              $im = $this->upload->data('file_name');
                $data = array(
                                'img ' => $im,
                                'name' => $na );
                // $this->load->view('upload_success', $data);

                $this->load->model('WorkM');

                if($this->WorkM->InsertCulturePage($data)){
                    return $this->ViewCulturePage();
                    // echo "done";
                }else{
                    $this->session->set_flashdata('error', 'Inalid DATA');
                    $this->AddCulturePage();
                }
        }
    }


    public function EditHomePage($id)
    {
        $this->load->model('WorkM');
        
        $i = $this->WorkM->getRow($id,'homepage');
        $tempImg = $i[0]->img;

        $na = $this->input->post('Name');
        $de = $this->input->post('Descripition');
       
        $config['upload_path']          = './assets/images/homepage';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 10000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $this->session->set_flashdata('error', 'Inalid DATA');
            $this->AddHomePage();      // $this->load->view('upload_form', $error);
        }
        else
        {
              $im = $this->upload->data('file_name');
                $data = array('img ' => $im,
                                'name' => $na,
                                'des'  => $de );
                // $this->load->view('upload_success', $data);

               
                if($this->WorkM->UpdateHomePage($data,$id)){
                    return $this->ViewHomePage();
                }else{
                    $this->session->set_flashdata('error', 'Inalid DATA');
                    $this->AddHomePage();
                }

                if( file_exists('./assets/images/homepage/'.$tempImg) )
                { 
                    // Remove file 
                    unlink('./assets/images/homepage/'.$tempImg); 
                } 

    }}

    public function EditCulturePage($id)
    {
        $this->load->model('WorkM');
        
        $i = $this->WorkM->getRow($id,'culturepage');
        $tempImg = $i[0]->img;

        $na = $this->input->post('Name');
       
        $config['upload_path']          = './assets/images/culturepage';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 10000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $this->session->set_flashdata('error', 'Inalid DATA');
            $this->AddCulturePage();      // $this->load->view('upload_form', $error);
        }
        else
        {
              $im = $this->upload->data('file_name');
                $data = array('img ' => $im,
                                'name' => $na );
                // $this->load->view('upload_success', $data);

               
                if($this->WorkM->UpdateCulturePage($data,$id)){
                    return $this->ViewCulturePage();
                }else{
                    $this->session->set_flashdata('error', 'Inalid DATA');
                    $this->AddCulturePage();
                }

                if( file_exists('./assets/images/culturepage/'.$tempImg) )
                { 
                    // Remove file 
                    unlink('./assets/images/culturepage/'.$tempImg); 
                } 

    }}

    public function RemoveHomePage($id)
    {
        

            $this->load->model('WorkM');
            $i = $this->WorkM->getRow($id,'homepage');
            $tempImg = $i[0]->img;
           
            if($this->WorkM->DeleteHomePage($id)){
                 // Delete image data 
                 if( file_exists('./assets/images/homepage/'.$tempImg) )
                 { 
                     // Remove file 
                     unlink('./assets/images/homepage/'.$tempImg); 
                 } 
                $this->ViewHomePage();
            }else{
                return false;
            }
           

            
        
    }

    public function RemoveCulturePage($id)
    {
        

            $this->load->model('WorkM');
            $i = $this->WorkM->getRow($id,'culturepage');
            $tempImg = $i[0]->img;
           
            if($this->WorkM->DeleteCulturePage($id)){
                 // Delete image data 
                 if( file_exists('./assets/images/culturepage/'.$tempImg) )
                 { 
                     // Remove file 
                     unlink('./assets/images/culturepage/'.$tempImg); 
                 } 
                $this->ViewCulturePage();
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