<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_restock extends CI_Model{
    function getRestockProduk($where){
        return $this->db->get_where('history_restock_produk',$where);
    }
    function getRestockBahanBaku($where){
        return $this->db->get_where('history_restock_bahan_baku',$where);
    }
    function inputRestockProduk($data){
        $this->db->insert('history_restock_produk',$data);
    }
    function inputRestockBahanBaku($data){
        $this->db->insert('history_restock_bahan_baku',$data);
    }
}