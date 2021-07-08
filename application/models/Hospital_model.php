<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Hospital_model extends CI_model{

    function add_blood ($formArray){
        $this->db->insert('hospital_bloodbank',$formArray);

    }
    function show_blood_available(){        
        $this->db->select('*');
        $this->db->from('hospital');
        $this->db->join('hospital_bloodbank', 'hospital_bloodbank.hospital_id = hospital.id');
        return $this->db->get()->result_array();
        // print_r($this->db->last_query());
        // exit();
    }
    function new_blood_request($formArray){
        $this->db->insert('blood_request',$formArray);
    }
    function change_units($formArray){
       
        $this->db->set('units', 'units-1', FALSE);
        $this->db->where('hospital_id',$formArray['hospital_id']);
        $this->db->where('bloodgroup',$formArray['bloodgroup']);
        $this->db->update('hospital_bloodbank');

        // when the blood units reaches 0 delete the entry
        $this->db->where('hospital_id',$formArray['hospital_id']);
        $this->db->where('bloodgroup',$formArray['bloodgroup']);
        $this->db->where('units',0);
        $this->db->delete('hospital_bloodbank');
        
    }
    function get_all_receivers($hospital_id){
        $this->db->select('*');
        $this->db->from('receiver');
        $this->db->join('blood_request', 'receiver.id = blood_request.receiver_id');
        $this->db->where('hospital_id',$hospital_id);
        return $this->db->get()->result_array();

    }
    function delete_request($receiver_id){
       
        $this->db->where('receiver_id',$receiver_id);
        $this->db->delete('blood_request');
        $this->db->where('id',$receiver_id);
        $this->db->set('request_status', 'request_status-1', FALSE);
        $this->db->update('receiver');
    }
    function accept_request($receiver_id){
       
        $this->db->where('receiver_id',$receiver_id);
        $this->db->delete('blood_request');
        $this->db->where('id',$receiver_id);
        $this->db->set('request_status', 'request_status-1', FALSE);
        $this->db->update('receiver');
    }
}

?>