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
    function getFilterKeuangan($tipe,$data){
        $this->db->from($this->v_table);
        if($tipe == "date"){
            $this->db->where('DATE(tanggal)',$data['tgl']);
        }else if($tipe == "month"){
            $this->db->where('MONTH(tanggal)',$data['bulan']);
            $this->db->where('YEAR(tanggal)',$data['btahun']);
        }else if($tipe == "year"){
            $this->db->where('YEAR(tanggal)',$data['tahun']);
        }else if($tipe == "custom"){
            $this->db->where('tanggal >=', $data['tgl_awal']);
            $this->db->where('tanggal <=', $data['tgl_akhir']);
        }
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