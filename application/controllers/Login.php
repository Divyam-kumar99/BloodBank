<?php 
class Login extends CI_Controller{
    
    public function __construct() { 
        parent::__construct(); 
        $this->load->library('form_validation'); 
        $user=$this->session->userdata('user');
        
        if(!empty($user)){
            $this->session->set_flashdata('Success','Already Logged in');
            redirect(base_url().'home/index');
        }
    } 

    // this function show the login page 
    public function index(){
        $data['user']=$this->session->userdata('user');
        $this->load->view('login/login',$data);
    }

    //allow users to login after entering the email and password 
    public function authenticate(){
        $this->load->model('Login_model');

        $this->form_validation->set_rules('loginid', 'Login ID' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');


        if($this->form_validation->run()){
            $login_id=$this->input->post('loginid');
            $user=$this->Login_model->getuser($login_id);
           
            if(!empty($user)){
                $password=$this->input->post('password');

                if($login_id==$user['email'] || $login_id==$user['phone']){
                    if (password_verify($password,$user['password'])) {
                        // username and password both are correct
                        if($user['role']=="Hospital"){
                            $hospital=$this->Login_model->get_hospital($login_id);
                            $session_array['user_id']=$hospital['id'];
                        }else{
                            $session_array['user_id']=$user['id']; //this is the id from the login table
                        }
                        $session_array['login_id']=$login_id;//this is the email or phone no that user uses to login
                        $session_array['role']=$user['role'];
                        $this->session->set_userdata('user', $session_array);
                        redirect(base_url().'home/index'); 
                    }else{

                        $this->session->set_flashdata('fail','Username or Password is incorrect');
                        redirect(base_url().'login/index');
                    }
                }
                else{
                    $this->session->set_flashdata('fail','Username or Password is incorrect');
                    redirect(base_url().'login/index');
                }

            }
            else{
                $this->session->set_flashdata('fail','Username or Password is incorrect');
                redirect(base_url().'login/index');
            }
        }
        else{
            $this->load->view('login/login');
        }
    }
    // this is the register page for new user
    function register_receiver(){
        $this->load->model('Login_model');
        $this->form_validation->set_rules('name', 'name' ,'required');
        $this->form_validation->set_rules('email', 'E-mail' ,'required');
        $this->form_validation->set_rules('phone', 'Contact No.' ,'numeric|required|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('aadhar', 'Aadhar Card No.' ,'numeric|required|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('password', 'password' ,'required');
        $this->form_validation->set_rules('bloodgroup', 'Blood Group' ,'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');


        if($this->form_validation->run()){
            if($this->input->post('password')==$this->input->post('cpassword')){
            
                $formarray=array();
                $formarray['receiver_name']=$this->input->post('name');
                $formarray['receiver_email']=$this->input->post('email');
                $formarray['receiver_phone']=$this->input->post('phone');
                $formarray['receiver_aadhar']=$this->input->post('aadhar');
                $formarray['receiver_bloodgroup']=$this->input->post('bloodgroup');
                $loginArray['email']=$this->input->post('email');
                $loginArray['phone']=$this->input->post('phone');
                $loginArray['role']="Receiver";
                //check here for duplicate
                $exists=$this->Login_model->check_exist($loginArray);
                if(empty($exists)){
                    $loginArray['password']=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                    $this->Login_model->register_receiver($formarray);
                    $this->Login_model->newlogin($loginArray);
                    
                    $this->session->set_flashdata('success','Registered successfully. Login to continue');
                    redirect(base_url('login/index'));
                }else{
                    $this->session->set_flashdata('fail','User Already Exists. Please Login to continue');
                    redirect(base_url('login/index'));
                }
            }
            else{
                $this->session->set_flashdata('fail','Passwords do not match. Try again');
                redirect(base_url('login/register_receiver'));
                
            }

        }else{
            $this->load->view('login/receiver_registration');
        }
    }
    // this is the register page for new user
    function register_hospital(){
        $this->load->model('Login_model');
        $this->form_validation->set_rules('name', 'name' ,'required');
        $this->form_validation->set_rules('email', 'E-mail' ,'required');
        $this->form_validation->set_rules('address', 'Hospital Address' ,'required');
        $this->form_validation->set_rules('city', 'City' ,'required');
        $this->form_validation->set_rules('phone', 'Contact No.' ,'numeric|required|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('password', 'password' ,'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');


        if($this->form_validation->run()){
            if($this->input->post('password')==$this->input->post('cpassword')){
            
                $formarray=array();
                $formarray['hospital_name']=$this->input->post('name');
                $formarray['hospital_address']=$this->input->post('address');
                $formarray['hospital_city']=$this->input->post('city');
                $formarray['hospital_email']=$this->input->post('email');
                $formarray['hospital_phone']=$this->input->post('phone');
                $loginArray['email']=$this->input->post('email');
                $loginArray['phone']=$this->input->post('phone');
                $loginArray['role']="Hospital";
                $exists=$this->Login_model->check_exist($loginArray);
                if(empty($exists)){
                $loginArray['password']=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $this->Login_model->register_hospital($formarray);
                $this->Login_model->newlogin($loginArray);

                $this->session->set_flashdata('success','Registered successfully. Login to continue');
                redirect(base_url('login/index'));
                }else{
                    $this->session->set_flashdata('fail','User Already Exists. Please Login to continue');
                    redirect(base_url('login/index'));
                }
            }
            else{
                $this->session->set_flashdata('fail','Passwords do not match. Try again');
                redirect(base_url('login/register_hospital'));
                
            }

        }else{
            $this->load->view('login/hospital_registration');
        }
    }

}


?>
