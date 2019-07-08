<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
Class Penjualan extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("M_penjualan");
    }
    function index_post(){
        $type = $this->input->get("type");
        if($type == 1){
            $data = array(
                'tgl_penjualan' => date("Y-m-d H:i:s"),
                'id_customer' => $this->input->post('id_customer'),
                'id_staff' => $this->input->post('id_staff'),
                'grand_total' => $this->input->post('grand_total')
            );
            if($this->M_penjualan->insertPenjualan($data) == TRUE){
                $result['success'] = 1;
                $result['id'] = $this->db->insert_id();
            }else{
                $result['success'] = 0;
            }
        }else if($type == 2){
            $data = array(
                'id_penjualan' => $this->input->post('id_penjualan'),
                'id_produk' => $this->input->post('id_produk'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga'),
                'subtotal' => $this->input->post('subtotal'),
                'takeaway_type' => $this->input->post('takeaway_type')
            );
            if($this->M_penjualan->insertDetailPenjualan($data) == TRUE){
                $result['success'] = 1;
            }else{
                $result['success'] = 0;
            }
        }
        $this->response($result);
        
        
    }
    function inputDetailPenjualan(){

    }
}