<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Customer extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_customer');
    }
    function index_get(){
        $customer = $this->M_customer->getCustomer();
        $result = array(
            'success' => 1,
            'message' => "Fetch Data Success"
        );
        $result['data'] = array();
        foreach($customer as $c){
            $index['id_customer'] = $c->id_customer;
            $index['nama_customer'] = $c->nama_customer;
            $index['no_hp'] = $c->no_hp;
            array_push($result['data'],$index);
        }
        $this->response($result);
    }
}