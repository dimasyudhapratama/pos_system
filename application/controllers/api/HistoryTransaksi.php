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
        if($this->get("search")==1){//Pencarian Menggunakan Keyword
            $keyword = $this->get("keyword");
            $penjualan = $this->M_penjualan->getPenjualanWithKeyword($keyword);
            
        }else{ //Get All Data
            $penjualan = $this->M_penjualan->getPenjualan();
        }
        $result = array(
            'success' => 1,
            'message' => 'Fetch Data Success'
        );
        $result['data'] = array();
        $jumlah_data = 0;
        foreach($penjualan as $p){
            $index['id_penjualan'] = $p->id_penjualan;
            $createDate = date_create($p->tgl_penjualan);
            $index['tanggal'] = date_format($createDate,"d-m-Y");
            $index['waktu'] = date_format($createDate,"H:i:s");
            $index['grand_total'] = $p->grand_total;
            $jumlah_data++;
            array_push($result['data'],$index);
        }
        $result['jumlah_data'] = $jumlah_data;
        $this->response($result);
    }
}