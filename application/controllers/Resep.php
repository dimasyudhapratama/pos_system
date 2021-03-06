<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class Resep extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_resep');
        $this->load->model('M_produk');
        $this->load->model('M_bahan_baku');
    }
    function index(){
        $data['title'] = 'Resep';
        $data['path'] = 'backend/resep/data-resep';
        $data['resep'] = $this->M_resep->getResep();
        $data['produk'] = $this->M_resep->getProdukNotInResep();
        $data['bahan_baku'] = $this->M_bahan_baku->getBahanBaku();
        $this->load->view('backend/master-template',$data);
    }
    function addRow(){
        $data['no'] = $this->input->post('no');
        $data['id'] = $this->input->post('id');
        $where = array(
            'id_bahan_baku' => $data['id']
        );
        $data['bahan_baku'] = $this->M_bahan_baku->get1BahanBaku($where);
        $this->load->view('backend/resep/add-row',$data);
        
    }
    function add(){
        $config = array(
            array(
                'field' => 'produk',
                'label' => 'Produk',
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            if(isset($_POST['id_bahan_baku'])){
                //Looping Bahan Baku
                for($i=0;$i<count($this->input->post('id_bahan_baku'));$i++){
                    //Insert Ke Tabel Resep
                    $data = array(
                        'id_produk' => $this->input->post('produk'),
                        'id_bahan_baku' => $this->input->post('id_bahan_baku')[$i],
                        'jumlah_bb' => $this->input->post('qty')[$i]
                    );
                    if($this->M_resep->addResep($data) == TRUE){
                        $this->session->set_flashdata("input_success","<div class='alert alert-success'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Ditambahkan!!</div>");
                    }else{
                        $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!</div>");
                    }
                }
            }
        }else{
            $gagal = validation_errors();
            $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
        }
        redirect('resep');
    }
    function edit(){
        $data['id'] = $this->input->post('id');
        $where_p = array(
            'id_produk' => $data['id']
        );
        $data['produk'] = $this->M_produk->get1Produk($where_p);
        $data['bahan_baku'] = $this->M_bahan_baku->getBahanBaku(); //Untuk Select 
        $data['resep'] = $this->M_resep->get1ResepBahanBaku($data['id']);
        $this->load->view('backend/resep/edit-resep',$data);
    }
    function update(){
        $config = array(
            array(
                'field' => 'id_produk',
                'label' => 'ID Produk',
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            if(isset($_POST['id_bahan_baku'])){
                //Looping Bahan Baku
                for($i=0;$i<count($this->input->post('id_bahan_baku'));$i++){
                    //Delete data di tabel Resep
                    $where = array(
                        'id_produk' => $this->input->post('id_produk'),
                    );
                    $this->M_resep->deleteResep($where);
                    //Insert Ke Tabel Resep
                    $data = array(
                        'id_produk' => $this->input->post('id_produk'),
                        'id_bahan_baku' => $this->input->post('id_bahan_baku')[$i],
                        'jumlah_bb' => $this->input->post('qty')[$i]
                    );
                    $this->M_resep->addResep($data);
                }
                $this->session->set_flashdata("update_success","<div class='alert alert-success'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");
            }
        }else{
            $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
        }
        redirect('resep');
    }
    function delete($id_produk){
        $where = array(
            'id_produk' => $id_produk
        );
        $this->M_resep->deleteResep($where);
        $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
        redirect("resep");
    }
}