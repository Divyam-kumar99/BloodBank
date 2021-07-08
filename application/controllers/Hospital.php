<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Hospital extends CI_controller{

    public function __construct() { 
        parent::__construct(); 
        $this->load->library('form_validation'); 
        $this->load->model('Hospital_model');
        $user=$this->session->userdata('user');
        
        if(empty($user) || $user['role']!='Hospital'){
            $this->session->set_flashdata('fail','You can not access this page. Login as hospital to continue');
            redirect(base_url().'logout/index');
        }
    } 
    function add_blood($user_id){

        $data['user']=$this->session->userdata('user');
        $data['user_id']=$user_id;
        $this->form_validation->set_rules('bloodgroup','Blood Group Type is required','trim|required');
        $this->form_validation->set_rules('units','No of available units','numeric|required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

        
      
        if($this->form_validation->run()){
                                
            $formarray=array();
            $formarray['hospital_id']=$user_id;
            $formarray['bloodgroup']=$this->input->post('bloodgroup');
            $formarray['units']=$this->input->post('units');

            $this->Hospital_model->add_blood($formarray);
               
            $this->session->set_flashdata('success','Blood Group Added Successfully');
            redirect(base_url('home/index'));

             
        }else{
            // showerror in form 
            $this->load->view('front/add_blood_info',$data);
          
        }

    }
    function view_request($hospital_id){

        $data['user']=$this->session->userdata('user');
        $data['receivers']= $this->Hospital_model->get_all_receivers($hospital_id);
       
        $this->load->view('front/view_request',$data);

    }  function accept_request($receiver_id){
        $this->Hospital_model->accept_request($receiver_id);
        $this->session->set_flashdata('success',"Blood Request Accepted");
        redirect(base_url('home/index'));
    }
    function reject_request($receiver_id){
        $this->Hospital_model->delete_request($receiver_id);
        $this->session->set_flashdata('success',"Request Deleted Successfully");
        redirect(base_url('home/index'));
    }

}

?>