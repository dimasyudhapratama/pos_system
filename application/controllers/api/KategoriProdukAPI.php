<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
Class KategoriProdukAPI extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("M_kategori_produk");
    }
    function index_get(){
        $kp = $this->M_kategori_produk->getKategoriProduk();
        $result = array(
            'success' => 1,
            'message' => 'Fetch Data Success'
        );
        $result['data'] = array();
        $jumlah = 0;
        foreach($kp as $k){
            $index['id_kategori_produk'] = $k->id_kategori_produk;
            $index['nama_kategori'] = $k->nama_kategori;
            $jumlah++;
            array_push($result['data'],$index);
        }
        $result['jumlah_data'] = $jumlah;
        $this->response($result);


    }
}