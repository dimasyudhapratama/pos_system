<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class Rekap_keuangan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_keuangan');
    }
    function index(){
        $data['title'] = 'Rekap Keuangan';
        $data['path'] = 'backend/keuangan/rekap_keuangan';
        $data['keuangan'] = $this->M_keuangan->getKeuangan();
        $this->load->view('backend/master-template',$data);
    }
}