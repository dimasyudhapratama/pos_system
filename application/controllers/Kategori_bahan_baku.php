<?php
defined("BASEPATH") OR die("No Direct Access Allowed");

Class Kategori_bahan_baku extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_kategori_bahan_baku');
    }
    function index(){
        $data['title'] = "Kategori Bahan Baku";
        $data['path'] = "backend/kategori-bahan-baku/data-kategori-bahan-baku";
        $data['kbb'] = $this->M_kategori_bahan_baku->getKategoriBahanBaku();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'nama_kategori',
                'label' => 'Nama Kategori',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            $data = array(
                'nama_kategori_bahan_baku' => $this->input->post('nama_kategori')
            );
            if($this->M_kategori_bahan_baku->inputKategoriBahanBaku($data)){
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
        redirect('kategori_bahan_baku');
    }
    function edit(){
        $data['id'] = $this->input->post('id');
        $data['kbb'] = $this->M_kategori_bahan_baku->get1KategoriBahanBaku($data['id']);
        $this->load->view('backend/kategori-bahan-baku/edit-kategori-bahan-baku',$data);
    }
    function update(){
        $config = array(
            array(
                'field' => 'id',
                'label' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_kategori',
                'label' => 'Nama Kategori',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            $id = $this->input->post('id');
            $data = array(
                'nama_kategori_bahan_baku' => $this->input->post('nama_kategori')
            );
            if($this->M_kategori_bahan_baku->updateKategoriBahanBaku($id,$data)){
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
        redirect('kategori_bahan_baku');
    }
    function delete($id){
        if($this->M_kategori_bahan_baku->deleteKategoriBahanBaku($id)){
            $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
        }else{
            $this->session->set_flashdata("delete_failed","<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Dihapus!!</div>"); 
        }
        redirect('kategori_bahan_baku');
    }
}