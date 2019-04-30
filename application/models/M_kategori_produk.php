<?php
defined("BASEPATH") OR die("No Direct Access Allowed");

Class M_kategori_produk extends CI_Model{
    private $_table = "kategori_produk";
    function getKategoriProduk(){
        return $this->db->get($this->_table)->result();
    }
    function get1KategoriProduk($id){
        $where = array(
            'id_kategori_produk' => $id
        );
        return $this->db->get_where($this->_table,$where)->result();
    }
    function inputKategoriProduk($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function updateKategoriProduk($id,$data){
        $where = array(
            'id_kategori_produk' => $id
        );
        $this->db->where($where);
        if($this->db->update($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function deleteKategoriProduk($id){
        $where = array(
            'id_kategori_produk' => $id
        );
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
}