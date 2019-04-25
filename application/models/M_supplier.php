<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_supplier extends CI_Model{
    private $_table = "supplier";
    function getSupplier(){
    return $this->db->get($this->_table)->result();
    }
    function get1Supplier($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function addSupplier($data){
    	if($this->db->insert($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function updateSupplier($where,$data){
        $this->db->where($where);
    	if($this->db->update($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function deleteSupplier($where){
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
}