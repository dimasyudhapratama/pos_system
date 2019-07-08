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
        if($this->get("search")==1){
            $value = $this->get("value");
            $produk = $this->M_produk->getProdukFiltered($value);
        }else if($this->get("filter")==1){
            $where = array(
                'id_kategori_produk' => $this->get("id_kategori_produk")
            );
            $produk = $this->M_produk->get1Produk($where);
        }else{
            $produk = $this->M_produk->getProduk();
        }
        $result = array(
            'success' => 1,
            'message' => 'Fetch Data Success'
        );
        $result['data'] = array();
        $jumlah = 0;
        foreach($produk as $p){
            $index['id_produk'] = $p->id_produk;
            $index['nama_produk'] = $p->nama_produk;
            $index['harga_jual'] = $p->harga_jual;
            $index['tipe_stok'] = $p->tipe_stok;
            $index['stok'] = $p->stok;
            $index['image_produk'] = $p->image_produk;
            $jumlah++;
            array_push($result['data'],$index);
        }
        $result['jumlah_data'] = $jumlah;
        $this->response($result);
    }
}