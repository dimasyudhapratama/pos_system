<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_resep extends CI_Model{
    private $_table = 'resep';
    private $_v_table = 'v_tbl_resep';
    private $_produk_not_in_resep = 'v_produk_not_in_resep';
    function getResep(){
        return $this->db->get($this->_v_table)->result();
    }
    
    function getProdukNotInResep(){
        return $this->db->get($this->_produk_not_in_resep)->result();
    }
    function get1Resep($where){
        return $this->db->get_where($this->_table,$where)->result();
    }
    function get1ResepBahanBaku($id_produk){
        return $this->db->query("SELECT id_resep,bahan_baku.id_bahan_baku,bahan_baku.nama_bahan_baku,satuan,jumlah_bb FROM resep JOIN bahan_baku ON resep.id_bahan_baku=bahan_baku.id_bahan_baku WHERE id_produk='".$id_produk."'")->result();

    }
    function addResep($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function deleteResep($where){
        $this->db->where($where);
        $this->db->delete($this->_table);
    }
}