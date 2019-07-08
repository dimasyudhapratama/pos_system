<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

Class RekapPenjualanHarian extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("M_penjualan");
    }
    function index_get(){
        $tanggal = date("Y-m-d");
        $penjualan = $this->M_penjualan->getRekapHarianByProcedure($tanggal);
        $result = array(
            'success' => 1,
            'message' => 'Fetch Data Success'
        );
        foreach($penjualan as $p){
            $result['jumlah_trx'] = $p->jml_trx;
            $result['jumlah_uang'] = $p->jml_uang;
        }
        return $this->response($result);
    }
}