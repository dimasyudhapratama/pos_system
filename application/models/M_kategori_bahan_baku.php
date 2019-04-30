<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class M_kategori_bahan_baku extends CI_Model{

    private $_table = 'kategori_bahan_baku';

    function getKategoriBahanBaku(){
        return $this->db->get($this->_table)->result();
    }
    function inputKategoriBahanBaku($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function get1KategoriBahanBaku($id){
        $where = array(
            'id_kategori_bahan_baku' => $id
        );
        return $this->db->get_where($this->_table,$where)->result();
    }
    function updateKategoriBahanBaku($id,$data){
        $where = array(
            'id_kategori_bahan_baku' => $id
        );
        $this->db->where($where);
        if($this->db->update($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function deleteKategoriBahanBaku($id){
        $where = array(
            'id_kategori_bahan_baku' => $id
        );
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}