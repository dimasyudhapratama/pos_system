<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Pengeluaran_lain extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_pengeluaran_lain');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Data Pengeluaran Lain";
        $data['path'] = "backend/pengeluaran_lain/data-pengeluaran_lain";
        $data['pengeluaran_lain'] = $this->M_pengeluaran_lain->getPengeluaranLain();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'judul_pengeluaran_lain',
                'label' => 'Judul Pengeluaran Lain',
                'rules' => 'required'
            ),
            array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'integer'
            ),
            array(
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'judul_pengeluaran_lain' => $this->input->post('judul_pengeluaran_lain'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            );
            if($this->M_pengeluaran_lain->addPengeluaranLain($data)==TRUE){
                redirect('pengeluaran_lain');
            }else{
                redirect('test');
            }
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_pengeluaran_lain');
        $where = array(
            'id_pengeluaran_lain' => $this->input->post('id_pengeluaran_lain')
        );
        $data['pengeluaran_lain'] = $this->M_pengeluaran_lain->get1PengeluaranLain($where);
        $this->load->view("backend/pengeluaran_lain/edit-pengeluaran_lain",$data);
    }
    function update(){
        $config = array(
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'judul_pengeluaran_lain',
                'label' => 'Judul Pengeluaran Lain',
                'rules' => 'required'
            ),
            array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'integer'
            ),
            array(
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $where = array(
                'id_pengeluaran_lain' => $this->input->post('id_pengeluaran_lain')
            );
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'judul_pengeluaran_lain' => $this->input->post('judul_pengeluaran_lain'),
                'jumlah' => $this->input->post('Jumlah'),
                'keterangan' => $this->input->post('keterangan')
            );
            if($this->M_pengeluaran_lain->updateBahanBaku($where,$data)==TRUE){
                redirect('pengeluaran_lain');
            }else{
                redirect('test');
            }
        }
    }
    function delete($id){
        $where = array(
            'id_pengeluaran_lain' => $id
        );
        if($this->M_pengeluaran_lain->deletePengeluaranLain($where)==TRUE){
            redirect('pengeluaran_lain');
        }else{
            redirect('test');
        }
    }
}