<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Pemasukan_Lain extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_pemasukan_lain');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Pemasukan Lain";
        $data['path'] = "backend/pemasukan_lain/data_pemasukan_lain";
        $data['dd'] = $this->M_pemasukan_lain->getPemasukanLain();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' =>'tanggal',
                'label' =>'Tanggal',
                'rules' =>'required'
            ),
             array(
                'field' => 'judul_pemasukan_lain',
                'label' => 'judul Pemasukan Lain',
                'rules' => 'required'
            ),
            array(
                'field' => 'jumlah',
                'label' => 'jumlah',
                'rules' => 'required'

            ),
            array(
                'field' =>'keterangan',
                'label' =>'Keterangan',
                'rules' =>'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
             $data = array(
                'judul_pemasukan_lain' => $this->input->post('judul_pemasukan_lain'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan'),
                'tanggal' => $this->input->post("tanggal")
             );
            if($this->M_pemasukan_lain->addPemasukanLain($data)==TRUE){
                redirect('pemasukan_lain');
            }else{
                redirect('test');
            }
    }
}
    function edit(){
        $data['id'] = $this->input->post('id_pemasukan_lain');
        $where = array(
            'id_pemasukan_lain' => $this->input->post('id_pemasukan_lain')
        );
        $data['pemasukan_lain'] = $this->M_pemasukan_lain->get1PemasukanLain($where);
        $this->load->view("backend/pemasukan_lain/edit_pemasukan_lain",$data);
    }
     function update(){
        $config = array(
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'judul_pemasukan_lain',
                'label' => 'Judul Pemasukan Lain',
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
                'id_pemasukan_lain' => $this->input->post('id_pemasukan_lain')
            );
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'judul_pemasukan_lain' => $this->input->post('judul_pemasukan_lain'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            );
            if($this->M_pemasukan_lain->updatePemasukanLain($where,$data)==TRUE){
                redirect('pemasukan_lain');
            }else{
                redirect('test');
            }
        }
    }
      function delete($id){
        $where = array(
            'id_pemasukan_lain' => $id
        );
        if($this->M_pemasukan_lain->deletePemasukanLain($where)==TRUE){
            redirect('pemasukan_lain');
        }else{
            redirect('test');
        }
    }
}