<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Receiver_model extends CI_model{

    public function get_receiver($login_id){
        $this->db->where('receiver_phone',$login_id);
        $this->db->or_where('receiver_email',$login_id);
       return $this->db->get('receiver')->row_array();
    }
    public function change_request_status($receiver_id,$formArray){
        $this->db->where('id',$receiver_id);
        $this->db->update('receiver',$formArray);
    }
}

?>