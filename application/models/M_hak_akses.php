<?php
Class M_hak_akses extends CI_Model{
    private $_table = 'hak_akses';
    private $_v_table = 'v_roles';
    function getHakAkses(){
        return $this->db->get($this->_table)->result();
    }
    function inputHakAkses($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function get1HakAkses($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function updateHakAkses($where,$data){
        $this->db->where($where);
        if($this->db->update($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function deleteHakAkses($where){
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
}