<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class Penjualan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_penjualan');
    }
    function index(){
        $data['title'] = 'Penjualan';
        $data['path'] = 'backend/penjualan/data-penjualan';
        $data['penjualan'] = $this->M_penjualan->getPenjualan();
        $this->load->view('backend/master-template',$data);
    }
    function detail($id){
        $data['title'] = 'Detail Penjualan';
        $data['path'] = 'backend/penjualan/detail-penjualan';
        $where = array(
            'id_penjualan' => $id
        );
        $data['detail_penjualan'] = $this->M_penjualan->getDetailPenjualan($where);
        $this->load->view('backend/master-template',$data);
    }
}