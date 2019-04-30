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
                redirect('kategori_produk');
            }else{

            }

        }
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
                redirect('kategori_produk');
            }else{

            }

        }
    }
    function delete($id){
        if($this->M_kategori_produk->deleteKategoriProduk($id) == TRUE){
            redirect("kategori_produk");
        }else{
            redirect();
        }
    }
}