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
             array(
                 'field' => 'judul_pemasukan_lain',
                 'label' => 'judul_pemasukan_lain',
                'rules' => 'required'
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
            array(
                'field' =>'tanggal',
                'label' =>'tanggal',
                'rules' =>'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
             $data = array(
                'judul_pemasukan_lain' => $this->input->post('judul_pemasukan_lain'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
             );
            if($this->M_Pemasukan_Lain->addPemasukanLain($data)==TRUE){
                redirect('Pemasukan_Lain');
            }else{
                redirect('customer');
            }
        }
        else{
            echo "gagal";
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_Pemasukan_Lain');
        $where = array(
            'id_Pemasukan_Lain' => $this->input->post('id_Pemasukan_Lain')
        );
        $data['Pemasukan_Lain'] = $this->M_Pemasukan_Lain->get1Pemasukan_Lain($where);
        $this->load->view("backend/pemasukan_lain/edit_pemasukan_lain",$data);
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
            'id_Pemasukan_Lain' => $id
        );
        if($this->M_Pemasukan_Lain->deletePemasukanLain($where)==TRUE){
            redirect('Pemasukan_Lain');
        }else{
            redirect('test');
        }
    }
    }