<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class ProdukAPI extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_produk');
    }
    function index_get(){
        $produk = $this->M_produk->getProduk();
        $result = array(
            'success' => 1,
            'message' => 'Fetch Data Success'
        );
        $result['data'] = array();
        foreach($produk as $p){
            $index['id_produk'] = $p->id_produk;
            $index['nama_produk'] = $p->nama_produk;
            $index['harga_jual'] = "Rp. ".number_format($p->harga_jual,'0',',','.');
            $index['tipe_stok'] = $p->tipe_stok;
            $index['stok'] = $p->stok;
            array_push($result['data'],$index);
        }
        $this->response($result);
    }
}