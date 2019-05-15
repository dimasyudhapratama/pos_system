<?php
defined("BASEPATH") or die("No Direct Access Allowed");

Class Staff extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_hak_akses');
        $this->load->model('M_staff');
        $this->load->library('form_validation');
    }
    function index(){
        $data['title'] = "Data Staff";
        $data['path'] = "backend/staff/data_staff";
        $data['dd'] = $this->M_staff->getstaff();
        $data['ha'] = $this->M_hak_akses->getHakAkses();
        $this->load->view("backend/master-template",$data);
    }

    function add(){
        $config = array(
            array(
                'field' => 'nama_terang',
                'label' => 'Nama Terang',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'

            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $data = array(
                'id_roles' => $this->input->post('id_roles'),
                'nama_terang' => $this->input->post('nama_terang'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            if($this->M_staff->addstaff($data)==TRUE){
                redirect('staff');
            }else{
                redirect('test');
            }
        }
    }
    function edit(){
        $data['id'] = $this->input->post('id_staff');
        $where = array(
            'id_staff' => $this->input->post('id_staff')
        );
        $data['staff'] = $this->M_staff->get1staff($where);
        $data['hak_akses'] = $this->M_hak_akses->getHakAkses();
        $this->load->view("backend/staff/edit_staff",$data);
    }
    function gantipassword(){
        $data['id'] = $this->input->post('id_staff');
        $this->load->view("backend/staff/ganti_password",$data);
    }
    function updatepassword(){
        $config = array(
            array(
            'password' => 'password_lama',
            'label' => 'Password_Lama',
            'rules' => 'required'
            ),
            array(
            'password' => 'password_baru',
            'label' => 'password_baru',
            'rules' => 'required'
            ),
            
        );

        $where = array(
            'id_staff' => $this->input->post('id_staff')
        );
        $staff = $this->M_staff->get1staff($where);
        foreach($staff as $row){
            $password = $row->password;
        }
        if(password_verify($this->input->post('password_lama'), $password)){
            if($this->input->post('password_baru') == $this->input->post('confirm_password')){
                $data = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    
                );
                $this->M_staff->updatestaff($where,$data);
            }
        }

    }

    function update(){
        $config = array(
            array(
                'field' => 'id_staff',
                'label' => 'ID',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_terang',
                'label' => 'Nama Terang',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            $where = array(
                'id_staff' => $this->input->post('id_staff')
            );
            $data = array(
                'id_roles' => $this->input->post('id_roles'),
                'nama_terang' => $this->input->post('nama_terang'),
                'username' => $this->input->post('username')
                );
            if($this->M_staff->updatestaff($where,$data)==TRUE){
                redirect('staff');
            }else{
                redirect('test');
            }
        }
    }
      function delete($id){
        $where = array(
            'id_staff' => $id
        );
        if($this->M_staff->deletestaff($where)==TRUE){
            redirect('staff');
        }else{
            redirect('test');
        }
    }
     }