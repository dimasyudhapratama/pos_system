<?php
defined("BASEPATH") or die("NO Direct Access Allowed");
Class Kategori_produk extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_kategori_produk');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = 'Kategori Produk';
        $data['path'] = 'backend/kategori-produk/data-kategori-produk';
        $data['kategori_produk'] = $this->M_kategori_produk->getKategoriProduk();
        $this->load->view('backend/master-template',$data);
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
                'nama_kategori' => $this->input->post('nama_kategori')
            );
            if($this->M_kategori_produk->inputKategoriProduk($data)){
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
        redirect('kategori_produk');
    }
    function edit(){
        $data['id'] = $this->input->post('id_kategori_produk');
        $data['kategori_produk'] = $this->M_kategori_produk->get1KategoriProduk($data['id']);
        $this->load->view('backend/kategori-produk/edit-kategori-produk',$data);
    }
    function update(){
        $config = array(
            array(
                'field' => 'id',
                'Label' => 'ID',
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
                'nama_kategori' => $this->input->post('nama_kategori')
            );
            if($this->M_kategori_produk->updateKategoriProduk($id,$data)){
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
        redirect('kategori_produk');
    }
    function delete($id){
        if($this->M_kategori_produk->deleteKategoriProduk($id) == TRUE){
            $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
        }else{
            $this->session->set_flashdata("delete_failed","<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Dihapus!!</div>");
        }
        redirect("kategori_produk");
    }
}