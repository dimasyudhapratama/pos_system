<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_penjualan extends CI_Model{
    private $_table = 'penjualan';
    private $_v_table = 'v_penjualan' ;

    private $_detail_table = 'detail_penjualan_produk';
    private $_v_detail_table = 'v_detail_penjualan_produk';

    function getPenjualan(){
        return $this->db->get($this->_v_table)->result();     
    }
    function getRekapHarianByProcedure($tanggal){
        return $this->db->query("CALL getRekapH('$tanggal')")->result();
    }
    function get1Penjualan($where){
        $this->db->where($where);
        return $this->db->get($this->_v_table)->result();       
    }
    function getPenjualanWithKeyword($keyword){
        $this->db->select("*");
        $this->db->from($this->_v_table);
        $this->db->like("id_penjualan",$keyword);
        $this->db->or_like("tgl_penjualan",$keyword);
        $this->db->or_like("nama_customer",$keyword);
        $this->db->or_like("nama_terang",$keyword);
        return $this->db->get()->result();
               
    }
    function getDetailPenjualan($where){
        return $this->db->get_where($this->_v_detail_table,$where)->result();
    }
    function insertPenjualan($data){
        if($this->db->insert($this->_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function insertDetailPenjualan($data){
        if($this->db->insert($this->_detail_table,$data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}