<?php
defined("BASEPATH") or exit("No Direct Access Allowed");
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
Class Login extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('M_staff');
    }
    function index_post(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username
        );
        $count_staff = $this->M_staff->countStaff($where);
        if($count_staff == 1){ //Jika Username Ditemukan
            $staff = $this->M_staff->get1Staff($where);
            foreach($staff as $s){
                $dbPass = $s->password;
                if(password_verify($password,$dbPass) == TRUE){ //Password Sama
                    $result = array(
                        'success' => '1',
                        'message' => 'Success'
                    );
                    $result['login'] = array();
                    $index['id_staff'] = $s->id_staff;
                    $index['nama_terang'] = $s->nama_terang;
                    $index['id_roles'] = 'zxzxcxcx';
                    array_push($result['login'],$index);
                }else{
                    $result = array(
                        'success' => '0',
                        'message' => 'Failed'
                    );
                }
            }
        }else{
            $result = array(
                'success' => '0',
                'message' => 'Failed'
            );
        }
        $this->response($result);

    }
}