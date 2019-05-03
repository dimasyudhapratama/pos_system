<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Bahan_baku extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_bahan_baku');
        $this->load->model('M_kategori_bahan_baku');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Data Bahan Baku";
        $data['path'] = "backend/bahan_baku/data-bahan_baku";
        $data['kategori_bahan_baku'] = $this->M_kategori_bahan_baku->getKategoriBahanBaku();
        $data['bahan_baku'] = $this->M_bahan_baku->getBahanBaku();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'id_kategori_bahan_baku',
                'label' => 'ID kategori bahan baku',
                'rules' => 'required'
            ),
            array(
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_bahan_baku',
                'label' => 'Nama Bahan Baku',
                'rules' => 'required'
            ),
            array(
                'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'integer'
            ),
            array(
                'field' => 'limit_stok',
                'label' => 'Limit Stok',
                'rules' => 'integer'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $data = array(
                'id_kategori_bahan_baku' => $this->input->post('id_kategori_bahan_baku'),
                'satuan' => $this->input->post('satuan'),
                'stok' => $this->input->post('stok'),
                'limit_stok' => $this->input->post('limit_stok'),
                'nama_bahan_baku' => $this->input->post('nama_bahan_baku')
            );
            if($this->M_bahan_baku->addBahanBaku($data)==TRUE){
                redirect('bahan_baku');
            }else{
                redirect('test');
            }
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_bahan_baku');
        $where = array(
            'id_bahan_baku' => $this->input->post('id_bahan_baku')
        );
        $data['bahan_baku'] = $this->M_bahan_baku->get1BahanBaku($where);
        $this->load->view("backend/bahan_baku/edit-bahan_baku",$data);
    }
    function update(){
        $config = array(
            array(
                'field' => 'id_kategori_bahan_baku',
                'label' => 'ID Kategori Bahan Baku',
                'rules' => 'required'
            ),
            array(
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_bahan_baku',
                'label' => 'nama bahan baku',
                'rules' => 'required'
            ),
            array(
                'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'integer'
            ),
            array(
                'field' => 'limit_stok',
                'label' => 'Limit Stok',
                'rules' => 'integer'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $where = array(
                'id_bahan_baku' => $this->input->post('id_bahan_baku')
            );
            $data = array(
                'id_kategori_bahan_baku' => $this->input->post('id_kategori_bahan_baku'),
                'satuan' => $this->input->post('satuan'),
                'stok' => $this->input->post('stok'),
                'nama_bahan_baku' => $this->input->post('nama_bahan_baku'),
                'limit_stok' => $this->input->post('limit_stok')
            );
            if($this->M_bahan_baku->updateBahanBaku($where,$data)==TRUE){
                redirect('Bahan_baku');
            }else{
                redirect('test');
            }
        }
    }
    function delete($id){
        $where = array(
            'id_bahan_baku' => $id
        );
        if($this->M_bahan_baku->deleteBahanBaku($where)==TRUE){
            redirect('bahan_baku');
        }else{
            redirect('test');
        }
    }
}