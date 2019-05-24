<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Supplier extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_supplier');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Data supplier";
        $data['path'] = "backend/supplier/data_supplier";
        $data['dd'] = $this->M_supplier->getSupplier();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'nama_supplier',
                'label' => 'Nama supplier',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_hp',
                'label' => 'No. HP',
                'rules' => 'integer'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'

            ),
            array(
                'field' =>'alamat',
                'label' =>'alamat',
                'rules' =>'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $data = array(
                'nama_supplier' => $this->input->post('nama_supplier'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat')
            );
            if($this->M_supplier->addsupplier($data)==TRUE){
                $this->session->set_flashdata("input_success","<div class='alert alert-success'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Ditambahkan!!</div>");
            }else{
                $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!</div>");
            }
        }else{
            $gagal = validation_errors();
            $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>"); 
        }
        redirect('supplier');
    }
    function edit(){
        $data['id'] = $this->input->post('id_supplier');
        $where = array(
            'id_supplier' => $this->input->post('id_supplier')
        );
        $data['supplier'] = $this->M_supplier->get1supplier($where);
        $this->load->view("backend/supplier/edit-supplier",$data);
    }
     function update(){
        $config = array(
            array(
                'field' => 'id_supplier',
                'label' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_supplier',
                'label' => 'Nama supplier',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_hp',
                'label' => 'No. HP',
                'rules' => 'integer'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ),
            array(
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $where = array(
                'id_supplier' => $this->input->post('id_supplier')
            );
            $data = array(
                'nama_supplier' => $this->input->post('nama_supplier'),
                'no_hp' => $this->input->post('no_hp')
            );
            if($this->M_supplier->updatesupplier($where,$data)==TRUE){
                $this->session->set_flashdata("update_success","<div class='alert alert-success'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>"); 
            }else{
                $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!</div>");
            }
        }else{
            $gagal = validation_errors();
            $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
        }
        redirect('supplier');
    }
    function delete($id){
        $where = array(
            'id_supplier' => $id
        );
        if($this->M_supplier->deleteSupplier($where)==TRUE){
            $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
        }else{
            $this->session->set_flashdata("delete_failed","<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Dihapus!!</div>"); 
        }
        redirect('supplier');
    }
}