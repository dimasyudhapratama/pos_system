<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_penjualan extends CI_Model{
    private $_table = 'penjualan';
    private $_v_table = 'v_penjualan' ;

    private $_detail_table = 'detail_penjualan';
    private $_v_detail_table = 'v_detail_penjualan';
    function getPenjualan(){
        return $this->db->get($this->_v_table)->result();       
    }
    function getDetailPenjualan($where){
        return $this->db->get_where($this->_v_detail_table,$where)->result();
    }
}