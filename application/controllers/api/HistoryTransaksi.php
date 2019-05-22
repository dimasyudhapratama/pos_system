<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
Class HistoryTransaksi extends REST_Controller{ //API untuk Modul Penjualan
    function __construct(){
        parent::__construct();
        $this->load->model('M_penjualan');
    }
    function index_get(){
        $penjualan = $this->M_penjualan->getPenjualan();
        $result = array(
            'success' => 1,
            'message' => 'Fetch Data Success'
        );
        $result['data'] = array();
        foreach($penjualan as $p){
            $index['id_penjualan'] = "INV".$p->id_penjualan;
            $createDate = date_create($p->tgl_penjualan);
            $index['tanggal'] = date_format($createDate,"d-m-Y");
            $index['waktu'] = date_format($createDate,"H:i:s");
            $index['grand_total'] = $p->grand_total;
            array_push($result['data'],$index);
        }
        $this->response($result);
    }
}