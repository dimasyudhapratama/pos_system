<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Produk extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_kategori_produk');
        $this->load->model('M_produk');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Data Produk";
        $data['path'] = "backend/Produk/data_produk";
        $data['dd'] = $this->M_produk->getProduk();
        $data['kategori'] = $this->M_produk->getKategori();
        $this->load->view("backend/master-template",$data);
    }
    function add(){
        $config = array(
            array(
                'field' => 'nama_produk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ),
            array(
                'field' => 'harga_jual',
                'label' => 'Harga Jual',
                'rules' => 'integer'
            ),
            array(
                'field' => 'satuan',
                'label' => 'satuan',
                'rules' => 'integer'

            ),
            array(
                'field' =>'tipe_stok',
                'label' =>'tipe stok',
                'rules' =>'required'
            ),
            array(
                'field' =>'stok',
                'label' =>'stok',
                'rules' =>'integer'
            ),
            array(
                'field' =>'metode_tracking',
                'label' =>'Metode Tracking',
                'rules' =>'required'
            ),
            array(
                'field' =>'limit_stok',
                'label' =>'Limit Stok',
                'rules' =>'integer'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $data = array(
                'id_kategori_produk' => $this->input->post('id_kategori_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga_jual' => $this->input->post('harga_jual'),
                'satuan' => $this->input->post('satuan'),
                'tipe_stok' => $this->input->post('tipe_stok'),
                'stok' => $this->input->post('stok'),
                'metode_tracking' => $this->input->post('metode_tracking'),
                'limit_stok' => $this->input->post('limit_stok')
            );
            if($this->M_produk->addproduk($data)==TRUE){
                redirect('produk');
            }else{
                redirect('test');
            }
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_produk');
        $where = array(
            'id_produk' => $this->input->post('id_produk')
        );
        $data['produk'] = $this->M_produk->get1produk($where);
        $data['kategori'] = $this->M_produk->getKategori();
        $this->load->view("backend/produk/edit_produk",$data);
    }
     function update(){

        
            
        $config = array(
            array(
                'field' => 'id_produk',
                'label' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_produk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ),
            array(
                'field' => 'harga_jual',
                'label' => 'Harga Jual',
                'rules' => 'required'
            ),
            array(
                'field' => 'satuan',
                'label' => 'satuan',
                'rules' => 'required'

            ),
            array(
                'field' =>'tipe_stok',
                'label' =>'tipe stok',
                'rules' =>'required'
            ),
            array(
                'field' =>'stok',
                'label' =>'stok',
                'rules' =>'required'
            ),
            array(
                'field' =>'metode_tracking',
                'label' =>'Metode Tracking',
                'rules' =>'required'
            ),
            array(
                'field' =>'limit_stok',
                'label' =>'Limit Stok',
                'rules' =>'integer'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $where = array(
                'id_produk' => $this->input->post('id_produk')
            );
            $data = array(
                'id_kategori_produk' => $this->input->post('id_kategori_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga_jual' => $this->input->post('harga_jual'),
                'satuan' => $this->input->post('satuan'),
                'tipe_stok' => $this->input->post('tipe_stok'),
                'stok' => $this->input->post('stok'),
                'metode_tracking' => $this->input->post('metode_tracking'),
                'limit_stok' => $this->input->post('limit_stok')
            );
            if($this->M_produk->updateproduk($where,$data)==TRUE){
                redirect('produk');
            }else{
                redirect('test');
            }
        }
    }
      function delete($id){
        $where = array(
            'id_produk' => $id
        );
        if($this->M_produk->deleteproduk($where)==TRUE){
            redirect('produk');
        }else{
            redirect('test');
        }
    }
    }