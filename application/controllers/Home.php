<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Home extends CI_controller{
  public function __construct() { 
        parent::__construct(); 
        $this->load->model('Receiver_model');
        $this->load->library('form_validation'); 
        $user=$this->session->userdata('user');

    } 
    function index (){
        $data['user']=$this->session->userdata('user');
        $this->load->model('Hospital_model');
        if(!empty($data['user'])){
            $user_id=$data['user']['login_id'];
            $data['receiver']= $this->Receiver_model->get_receiver($user_id);
        }
        $data['availables']=$this->Hospital_model->show_blood_available();
        $this->load->view('front/home',$data);

    }
    function services(){
        $data['user']=$this->session->userdata('user');
        $this->load->view('front/services',$data);
        
    }
    function request_blood ($hospital_id){
        $data['user']=$this->session->userdata('user');
        $user_id=$data['user']['login_id'];
        $this->load->model('Hospital_model');
        $receiver= $this->Receiver_model->get_receiver($user_id);
        $formArray['receiver_id']=$receiver['id'];
        $formArray['bloodgroup']=$receiver['receiver_bloodgroup'];
        $formArray['hospital_id']=$hospital_id;
        $this->Hospital_model->new_blood_request($formArray);
        $change['request_status']=1;
        $this->Receiver_model->change_request_status($receiver['id'],$change);
        $this->Hospital_model->change_units($formArray);
        $this->session->set_flashdata('success','Your Blood Request was Successful');
        redirect(base_url('home/index'));

    }

}

?>