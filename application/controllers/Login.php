<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_staff');
    }
    function index(){
        $this->load->view('backend/login');
    }
    function login_act(){
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username
            );
            if($this->M_staff->countStaff($where) == 1){
                $staff = $this->M_staff->get1Staff($where);
                foreach($staff as $s){
                    $nama_terang = $s->nama_terang;
                    $dbpassword = $s->password;
                }
                if(password_verify($password,$dbpassword)){
                    redirect('dashboard');
                    $login_data = array(
                        'username' => $username,
                        'nama_terang' => $nama_terang,
                        '_login' => TRUE
                    );
                    $this->session->set_userdata($login_data);
                }else{
                    redirect('login');
                }
            }
            
        }else{
            redirect('login');
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}