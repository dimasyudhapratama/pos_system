<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class Hak_akses extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_hak_akses');
    }
    function index(){
        $data['title'] = 'Hak Akses';
        $data['path'] = 'backend/hak-akses/data-hak-akses';
        $data['hak_akses'] = $this->M_hak_akses->getHakAkses();
        $this->load->view('backend/master-template',$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'nama_hak_akses',
                'label' => 'Nama Hak Akses',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            //Input Ke tabel Hak Akses
            $val = implode(',',$this->input->post('permission'));
            $val = rtrim($val,',');
            $data = array(
                'nama_roles' => $this->input->post('nama_hak_akses'),
                'permission' => $val
            );
            if($this->M_hak_akses->inputHakAkses($data) == TRUE){
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
        
    }
    function edit(){
        $where = array(
            'id_roles' => $this->input->post('id')
        );
        $data['master'] = $this->M_hak_akses->get1HakAkses($where);
        $this->load->view('backend/hak-akses/edit-hak-akses',$data);

    }
    function update(){
        $config = array(
            array(
                'field' => 'id_hak_akses',
                'field' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_hak_akses',
                'label' => 'Nama Hak Akses',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
                
            //Input Ke tabel Hak Akses
            $val = implode(',',$this->input->post('permission'));
            $val = rtrim($val,',');
            $where = array(
                'id_roles' => $this->input->post('id_hak_akses')
            );
            $data = array(
                'nama_roles' => $this->input->post('nama_hak_akses'),
                'permission' => $val
            );
            if($this->M_hak_akses->updateHakAkses($where,$data)){
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
    }
    function detail(){
        $where = array(
            'id_roles' => $this->input->post('id')
        );
        $data['master'] = $this->M_hak_akses->get1HakAkses($where);
        $this->load->view('backend/hak-akses/detail-hak-akses',$data);
    }
    function delete($id){
        $where = array(
            'id_roles' => $id
        );
        if($this->M_hak_akses->deleteHakAkses($where)){
            $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
        }else{
            $this->session->set_flashdata("delete_failed","<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Dihapus!!</div>"); 
        }
        redirect('hak_akses');
    }
}