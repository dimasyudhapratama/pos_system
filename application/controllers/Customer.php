<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Customer extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_customer');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Data Customer";
        $data['path'] = "backend/customer/data-customer";
        $data['customer'] = $this->M_customer->getCustomer();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'nama_customer',
                'label' => 'Nama Customer',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_hp',
                'label' => 'No. HP',
                'rules' => 'integer'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $data = array(
                'nama_customer' => $this->input->post('nama_customer'),
                'no_hp' => $this->input->post('no_hp')
            );
            if($this->M_customer->addCustomer($data)==TRUE){
                redirect('customer');
            }else{
                redirect('test');
            }
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_customer');
        $where = array(
            'id_customer' => $this->input->post('id_customer')
        );
        $data['customer'] = $this->M_customer->get1Customer($where);
        $this->load->view("backend/customer/edit-customer",$data);
    }
    function update(){
        $config = array(
            array(
                'field' => 'id_customer',
                'label' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_customer',
                'label' => 'Nama Customer',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_hp',
                'label' => 'No. HP',
                'rules' => 'integer'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $where = array(
                'id_customer' => $this->input->post('id_customer')
            );
            $data = array(
                'nama_customer' => $this->input->post('nama_customer'),
                'no_hp' => $this->input->post('no_hp')
            );
            if($this->M_customer->updateCustomer($where,$data)==TRUE){
                redirect('customer');
            }else{
                redirect('test');
            }
        }
    }
    function delete($id){
        $where = array(
            'id_customer' => $id
        );
        if($this->M_customer->deleteCustomer($where)==TRUE){
            redirect('customer');
        }else{
            redirect('test');
        }
    }
}