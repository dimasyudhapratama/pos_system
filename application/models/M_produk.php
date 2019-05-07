<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_produk extends CI_Model{
    private $_table = "produk";
    function getKategori()
    {
        return $this->db->get('kategori_produk')->result();
    }
    function getproduk(){
    // return $this->db->get($this->_table)->result();
    $this->db->select('*');
    $this->db->from('produk p,kategori_produk kp');
    $where = "kp.id_kategori_produk=p.id_kategori_produk";
    $this->db->where($where);
    return $this->db->get()->result();
      }
    function get1produk($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function addproduk($data){
    	if($this->db->insert($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function updateproduk($where,$data){
        $this->db->where($where);
    	if($this->db->update($this->_table,$data) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
    function deleteproduk($where){
        $this->db->where($where);
        if($this->db->delete($this->_table) == TRUE){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }
}