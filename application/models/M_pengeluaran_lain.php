<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_pengeluaran_lain extends CI_Model{
    private $_table = 'pengeluaran_lain';
 
    function getPengeluaranLain(){
        return $this->db->get($this->_table)->result();
    }
    function addPengeluaranLain($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function get1PengeluaranLain($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function updatePengeluaranLain($where,$data){
        $this->db->where($where);
        if($this->db->update($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function deletePengeluaranLain($where){
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}