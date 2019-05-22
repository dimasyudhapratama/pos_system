<?php
Class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        // $this->load->model('M_dashboard');
    }
    function index(){
        $data['title'] = 'Dashboard';
        $data['path'] = "backend/dashboard/dashboard";
        $this->load->view('backend/master-template',$data);
    }
}