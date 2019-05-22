<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class Re_stock extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('M_bahan_baku');
        $this->load->model('M_restock');
    }
    function index(){
        $data['title'] = "riwayat restock";
        $data['path'] = "backend/bahan_baku/riwayat_restock";
        $data['bahan_baku'] = $this->M_bahan_baku->getBahanBaku();
        $data['restock'] = $this->M_restock->getRestockBahanBaku($where);
        $this->load->view("backend/master-template",$data);
    }
    
}