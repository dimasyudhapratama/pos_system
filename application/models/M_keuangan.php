<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class M_keuangan extends CI_Model{
    private $v_table = 'v_keuangan';
    private $_table_pengeluaran = 'keuangan_pengeluaran';
    private $_table_pemasukan = 'keuangan_pemasukan';
    //Rekap
    function getKeuangan(){
        return $this->db->get($this->v_table)->result();
    }
    //Pemasukan
    function getPemasukan(){
        return $this->db->get($this->_table_pemasukan)->result();
    }
    function inputPemasukan($data){
        $this->db->insert($this->_table_pemasukan,$data);
    }
    //Pengeluaran
    function getPengeluaran(){
        return $this->db->get($this->_table_pengeluaran)->result();
    }
    function inputPengeluaran($data){
        $this->db->insert($this->_table_pengeluaran,$data);
    }
}