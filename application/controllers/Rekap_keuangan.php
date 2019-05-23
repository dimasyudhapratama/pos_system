<?php
defined("BASEPATH") or die("No Direct Access Allowed");
Class Rekap_keuangan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_keuangan');
    }
    function index(){
        $data['title'] = 'Rekap Keuangan';
        $data['path'] = 'backend/keuangan/rekap_keuangan';
        $data['keuangan'] = $this->M_keuangan->getKeuangan();
        $this->load->view('backend/master-template',$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required|max_length[19]|min_length[19]'
            ),
            array(
                'field' => 'tipe',
                'label' => 'Tipe',
                'rules' => 'required'
            ),
            array(
                'field' => 'detail_info',
                'label' => 'Detail Info',
                'rules' => 'required'
            ),
            array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required|integer'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == TRUE){
            $tipe = $this->input->post('tipe');
            //Format Tanggal Dan Waktu
            $postTanggal = $this->input->post('tanggal');
            $tanggal = substr($postTanggal,0,10);
            $tanggal =  date("Y-m-d",strtotime($tanggal));
            $waktu = substr($postTanggal,11);
            $postTanggal = $tanggal." ".$waktu;
            //Input Ke Database
            $data = array(
                'tanggal' => $postTanggal,
                'detail_info' => $this->input->post('detail_info'),
                'jumlah' => $this->input->post('jumlah')
            );
            if($tipe=="debit"){ //Pemasukan
                $this->M_keuangan->inputPemasukan($data);
            }else if($tipe=="kredit"){ //Pengeluaran
                $this->M_keuangan->inputPengeluaran($data);
            }
            $this->session->set_flashdata("input_success","<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Ditambahkan!!</div>");
        }else{
            $gagal = validation_errors();
            $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
        }
        redirect('rekap_keuangan');
    }
}