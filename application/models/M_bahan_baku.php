<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class M_bahan_baku extends CI_Model{
    private $_table = 'bahan_baku';
    function getBahanBaku(){
        return $this->db->get($this->_table)->result();
    }
    function addBahanBaku($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function get1BahanBaku($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function updateBahanBaku($where,$data){
        $this->db->where($where);
        if($this->db->update($this->_table,$data)==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function deleteBahanBaku($where){
        $this->db->where($where);
        if($this->db->delete($this->_table)==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}