<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_pemasukan_lain extends CI_Model{
    private $_table = 'pemasukan_lain';
    
    function getPemasukanLain(){
        return $this->db->get($this->_table)->result();
    }
    function addPemasukanLain($data){
    	if($this->db->insert($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
            return FALSE;
    	}
    }
    function get1PemasukanLain($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function updatePemasukanLain($where,$data){
        $this->db->where($where);
    	if($this->db->update($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function deletePemasukanLain($where){
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
}