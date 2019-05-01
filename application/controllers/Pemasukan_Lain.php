<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Pemasukan_Lain extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Pemasukan_Lain');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Pemasukan Lain";
        $data['path'] = "backend/pemasukan_lain/data_pemasukan_lain";
        $data['dd'] = $this->M_Pemasukan_Lain->getPemasukanLain();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            // array(
            //     'field' => 'id_pemasukan_lain',
            //     'label' => 'id_pemasukan_lain',
            //     'rules' => 'required'
            // ),
            array(
                'field' => 'judul_pemasukan_lain',
                'label' => 'judul_pemasukan_lain',
                'rules' => 'integer'
            ),
            array(
                'field' => 'jumlah',
                'label' => 'jumlah',
                'rules' => 'required'

            ),
            array(
                'field' =>'keterangan',
                'label' =>'keterangan',
                'rules' =>'required'
            ),
            // array(
            //     'field' =>'tanggal',
            //     'label' =>'tanggal',
            //     'rules' =>'required'
            // ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            // $data = array(
            //     'nama_Pemasukan_Lain' => $this->input->post('nama_Pemasukan_Lain'),
            //     'no_hp' => $this->input->post('no_hp'),
            //     'email' => $this->input->post('email'),
            //     'alamat' => $this->input->post('alamat')
            // );
            if($this->M_Pemasukan_Lain->addPemasukan_Lain($this->input->post())==TRUE){
                redirect('Pemasukan_Lain');
            }else{
                redirect('test');
            }
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_Pemasukan_Lain');
        $where = array(
            'id_Pemasukan_Lain' => $this->input->post('id_Pemasukan_Lain')
        );
        $data['Pemasukan_Lain'] = $this->M_Pemasukan_Lain->get1Pemasukan_Lain($where);
        $this->load->view("backend/Pemasukan_Lain/edit-Pemasukan_Lain",$data);
    }
     function update(){
        $config = array(
            array(
                'field' => 'id_Pemasukan_Lain',
                'label' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_Pemasukan_Lain',
                'label' => 'Nama Pemasukan_Lain',
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
                'id_Pemasukan_Lain' => $this->input->post('id_Pemasukan_Lain')
            );
            $data = array(
                'nama_Pemasukan_Lain' => $this->input->post('nama_Pemasukan_Lain'),
                'no_hp' => $this->input->post('no_hp')
            );
            if($this->M_Pemasukan_Lain->updatePemasukan_Lain($where,$data)==TRUE){
                redirect('Pemasukan_Lain');
            }else{
                redirect('test');
            }
        }
    }
      function delete($id){
        $where = array(
            'id_sPemasukan_Lain' => $id
        );
        if($this->M_Pemasukan_Lain->deletePemasukan_Lain($where)==TRUE){
            redirect('Pemasukan_Lain');
        }else{
            redirect('test');
        }
    }
    }