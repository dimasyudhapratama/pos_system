<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

Class DetailTransaksi extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("M_penjualan");
    }
    function index_get(){
        if($this->get("detail") == 1){
            $id_penjualan = $this->get("id_penjualan");
            $where = array(
                'id_penjualan' => $id_penjualan
            );
            $detail_penjualan = $this->M_penjualan->get1Penjualan($where);

            $result = array(
                'success' => 1,
                'message' => 'Fetch Data Success'
            );
            $result['data'] = array();
            $jumlah = 0;
            foreach($detail_penjualan as $p){
                $index['id_penjualan'] = $p->id_penjualan;
                $index['tgl_penjualan'] = $p->tgl_penjualan;
                $index['nama_customer'] = $p->nama_customer;
                $index['nama_kasir'] = $p->nama_terang;
                $index['grand_total'] = $p->grand_total;
                $jumlah++;
                array_push($result['data'],$index);
            }
            $result['jumlah'] = $jumlah;
            return $this->response($result);
            

        }
    }
}