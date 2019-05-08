<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class M_pemasokan extends CI_Model{
    private $_table = 'pemasokan';
    private $tbl_detail_pemasokan_bahan_baku = 'detail_pemasokan_bahan_baku';
    private $tbl_detail_pemasokan_produk_jadi = 'detail_pemasokan_produk_jadi';
    function getPemasokan(){
        $this->db->select('*');
        $this->db->from('pemasokan');
        $this->db->join('supplier','pemasokan.id_supplier = supplier.id_supplier','left');
        $this->db->order_by('tgl_pemasokan','DESC');
        return $this->db->get()->result();
        // return $this->db->get($this->_table)->result();
    }
    function inputPemasokan($data){
        if($this->db->insert($this->_table,$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function inputProdukJadi($data){
        $this->db->insert($this->tbl_detail_pemasokan_produk_jadi,$data);
    }
    function inputBahanBaku($data){
        $this->db->insert($this->tbl_detail_pemasokan_bahan_baku,$data);
    }
}