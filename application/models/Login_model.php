<?php
class Login_model extends CI_model{

    public function getuser($login_id){
        $this->db->where('phone',$login_id);
        $this->db->or_where('email',$login_id);
       return $this->db->get('login')->row_array();
    }

    //to add receiver 
    public function register_receiver($formarray){
        $this->db->insert('receiver',$formarray);

    }
    //to add hospital 
    public function register_hospital($formarray){
        $this->db->insert('hospital',$formarray);

    }
    //add new users to login table
    public function newlogin($loginArray){
        $this->db->insert('login',$loginArray);

    }
    public function get_hospital($login_id){
        $this->db->where('hospital_email',$login_id);
        $this->db->or_where('hospital_phone',$login_id);
        return $this->db->get('hospital')->row_array();
    }
    public function check_exist($loginArray){
        $this->db->where('phone',$loginArray['phone']);
        $this->db->or_where('email',$loginArray['email']);
        return $this->db->get('login')->row_array();
    }   
    
}
?>
