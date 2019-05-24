<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_keuangan extends CI_Model{
    private $v_table = 'v_keuangan';
    private $_table_pengeluaran = 'keuangan_pengeluaran';
    private $_table_pemasukan = 'keuangan_pemasukan';
    //Rekap
    function getKeuangan(){
        $this->db->from($this->v_table);
        $this->db->order_by('tanggal',"DESC");
        return $this->db->get()->result();
    }
    //Pemasukan
    function getPemasukan(){
        return $this->db->get($this->_table_pemasukan)->result();
    }
    function inputPemasukan($data){
        if($this->db->insert($this->_table_pemasukan,$data)){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    //Pengeluaran
    function getPengeluaran(){
        return $this->db->get($this->_table_pengeluaran)->result();
    }
    function inputPengeluaran($data){
        if($this->db->insert($this->_table_pengeluaran,$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}