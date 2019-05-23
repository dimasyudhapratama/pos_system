<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_staff extends CI_Model{
    private $_table = "staff";
    function getstaff(){
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->join('hak_akses','staff.id_roles = hak_akses.id_roles');
        // $where = "ha.id_roles=s.id_roles";
        return $this->db->get()->result();
      }
    function get1staff($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function get1StaffWithRoles($where){
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->join('hak_akses','staff.id_roles = hak_akses.id_roles');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    function countStaff($where){
        return $this->db->get_where($this->_table,$where)->num_rows();
    }
    function addstaff($data){
    	if($this->db->insert($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function updatestaff($where,$data){
        $this->db->where($where);
    	if($this->db->update($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function deletestaff($where){
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
}