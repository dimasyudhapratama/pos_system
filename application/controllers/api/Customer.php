<?php
defined("BASEPATH") or die("No Direct Access Allowed");
require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Customer extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_customer');
    }
    function index_get(){ //Untuk Get Seluruh Data & Mengambil 1 Data & Delete & Search
        $id_customer = $this->get("id_customer");
        if($this->get("delete")=="1"){ //Delete
            $result['id_customer'] = $id_customer;
            $where = array(
                'id_customer' => $id_customer
            );
            if($this->M_customer->deleteCustomer($where) == TRUE){
                $result['success'] = 1;
                $result['info'] = "Data Berhasil Dihapus";
            }else{
                $result['success'] = 0;
                $result['info'] = "Data Gagal Dihapus";
            }

        }else{ //(Get All Data / Get 1 Data) & Hasil Pencarian
            if($this->get("search")==1){
                $value = $this->get("value");
                $customer = $this->M_customer->getCustomerWithKeyword($value);
                
            }else if($id_customer!=""){ //GET 1 Data (Edit)
                $where = array(
                    'id_customer' => $id_customer
                );
                $customer = $this->M_customer->get1Customer($where);
            }else{ //GET All Data
                $customer = $this->M_customer->getCustomer();
            }

            $result = array(
                'success' => 1,
                'message' => "Fetch Data Success"
            );
            $result['data'] = array();
            $jumlah_data = 0;
            foreach($customer as $c){
                $index['id_customer'] = $c->id_customer;
                $index['nama_customer'] = $c->nama_customer;
                $index['no_hp'] = $c->no_hp;
                $jumlah_data++;
                array_push($result['data'],$index);
            }
            $result['jumlah_data'] = $jumlah_data;
        }
        $this->response($result);
    }
    function index_post(){ //Insert & Update
        $id_customer = $this->input->post('id_customer');

        $data = array(
            'nama_customer' => $this->input->post('nama_customer'),
            'no_hp' => $this->input->post('no_hp')
        );

        if($id_customer==""){//Insert
            if($this->M_customer->addCustomer($data) == TRUE){
                $result['success'] = 1;
                $result['info'] = "Berhasil Menambahkan Data";
            }else{
                $result['success'] = 0;
                $result['info'] = "Gagal Menambahkan Data";
            }
        }else{ //Update
            $where = array(
                'id_customer' => $id_customer
            );
            if($this->M_customer->updateCustomer($where,$data) == TRUE){
                $result['success'] = 1;
                $result['info'] = "Berhasil Mengupdate Data";
            }else{
                $result['success'] = 0;
                $result['info'] = "Gagal Mengupdate Data";
            }
        }
        
        $this->response($result);
        
    }
}