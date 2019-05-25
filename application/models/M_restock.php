<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_restock extends CI_Model{
    function getRestockProduk($where){
        return $this->db->get_where('history_restock_produk',$where);
    }
    function getRestockBahanBaku($where){
        $this->db->select('*');
    $this->db->from('bahan_baku bb,history_restock_bahan_baku res');
    $where = "res.id_bahan_baku=bb.id_bahan_baku";
    $this->db->where($where);
        return $this->db->get_where('history_restock_bahan_baku',$where);
    }
    function inputRestockProduk($data){
        $this->db->insert('history_restock_produk',$data);
    }
    function inputRestockBahanBaku($data){
        $this->db->insert('history_restock_bahan_baku',$data);
    }
}