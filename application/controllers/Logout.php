<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Logout extends CI_controller{
    public function __construct() { 
        parent::__construct(); 
        $user=$this->session->userdata('user');
        
        if(empty($user)){
            $this->session->set_flashdata('fail','Log in to continue');
            redirect(base_url().'login');
        }
    }
    public function index(){
       
        $this->session->unset_userdata('user');
        redirect(base_url().'login');
    }

}

?>