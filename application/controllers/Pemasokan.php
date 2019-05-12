<?php
Class Pemasokan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_pemasokan');
        $this->load->model('M_supplier');
        $this->load->model('M_kategori_produk');
        $this->load->model('M_produk');
        $this->load->model('M_kategori_bahan_baku');
        $this->load->model('M_bahan_baku');

    }
    function index(){
        $data['title'] = 'Data Pemasokan';
        $data['path'] = 'backend/pemasokan/data-pemasokan';
        $data['pemasokan'] = $this->M_pemasokan->getPemasokan();
        $data['supplier'] = $this->M_supplier->getSupplier();
        $data['kategori_produk'] = $this->M_kategori_produk->getKategoriProduk();
        $data['produk'] = $this->M_produk->getProduk();
        $data['kategori_bahan_baku'] = $this->M_kategori_bahan_baku->getKategoriBahanBaku();
        $data['bahan_baku'] = $this->M_bahan_baku->getBahanBaku();
        $this->load->view('backend/master-template',$data);
    }
    function getAjaxProduk(){
        $id = $this->input->post('id');
        $where = array(
            'id_kategori_produk' => $id
        );
        $produk = $this->M_produk->get1Produk($where);
        echo "<option value=''>--Pilih--</option>";
        foreach($produk as $p){
            echo "<option value='".$p->id_produk."'>".$p->nama_produk."</option>";
        }
    }
    function getAjaxBahanBaku(){
        $id = $this->input->post('id');
        $where = array(
            'id_kategori_bahan_baku' => $id
        );
        $bahan_baku = $this->M_bahan_baku->get1BahanBaku($where);
        echo "<option value=''>--Pilih--</option>";
        foreach($bahan_baku as $bb){
            echo "<option value='".$bb->id_bahan_baku."'>".$bb->nama_bahan_baku."</option>";
        }
    }
    function add(){
        $config = array(
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'supplier',
                'label' => 'Supplier',
                'rules' => 'required'
            ),
            array(
                'field' => 'status_pasok',
                'label' => 'Status Pemasokan',
                'rules' => 'required'
            ),
            // array(
            //     'field' => 'pilihan',
            //     'label' => 'Pilihan',
            //     'rules' => 'required'
            // ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==TRUE){
            //Insert Ke Table Pemasokan
            if($this->input->post('sisa')>=0){
                $status_bayar = 2;
            }else if($this->input->post('sisa')<0){
                $status_bayar = 1;
            }
            $data_pemasokan = array(
                'tgl_pemasokan' => $this->input->post('tanggal'),
                'id_supplier' => $this->input->post('supplier'),
                'status_pasok' => $this->input->post('status_pasok'),
                'grand_total' => $this->input->post('grand_total'),
                'status_bayar' => $status_bayar,
                'jumlah_terbayar' => $this->input->post('terbayar')
            );
            if($this->M_pemasokan->inputPemasokan($data_pemasokan)==TRUE){
                $id_pemasokan = $this->db->insert_id();
                //Insert Ke Table Detail Pemasokan Produk Jadi & Update Jumlah Stok
                if(isset($_POST['id_kategori_produk'])){
                    for($i=0;$i<count($this->input->post('id_kategori_produk'));$i++){ //Mengulang Jumlah Row yang ada dalam element HTML
                        // Proses Menyimpan Record Ke Tabel Detail Pemasokan Produk Jadi
                        $data_pp = array(
                            'id_pemasokan' => $id_pemasokan,
                            'id_produk' => $this->input->post('id_produk')[$i],
                            'qty' => $this->input->post('qty_produk')[$i],
                            'harga' => $this->input->post('harga_produk')[$i],
                            'subtotal' => $this->input->post('qty_produk')[$i] * $this->input->post('harga_produk')[$i]
                        );
                        $this->M_pemasokan->inputProdukJadi($data_pp);
                        //Update Stok
                    }
                }
                //Insert Ke Tabel Detail Pemasokan Bahan baku & Update Jumlah Stok
                if(isset($_POST['id_kategori_bahan_baku'])){
                    for($i=0;$i<count($this->input->post('id_kategori_bahan_baku'));$i++){
                        // Proses Menyimpan Record Ke Tabel Detail Pemasokan Bahan Baku
                        $data_bb = array(
                            'id_pemasokan' => $id_pemasokan,
                            'id_bahan_baku' => $this->input->post('id_bahan_baku')[$i],
                            'qty' => $this->input->post('qty_bahan_baku')[$i],
                            'harga' => $this->input->post('harga_bahan_baku')[$i],
                            'subtotal' => $this->input->post('qty_bahan_baku')[$i] * $this->input->post('harga_bahan_baku')[$i]
                        );
                        $this->M_pemasokan->inputBahanBaku($data_bb);
                        //Update Stok
                    }
                }
            }
            redirect('pemasokan');
            
        }else{
            echo "Gagal Validasi";
        }
    }
    function detail(){
        $data['title'] = "Detail Pemasokan";
        $data['path'] = "backend/pemasokan/detail-pemasokan";
        $where = array(
            'id_pemasokan' => $this->uri->segment('3'),
        );
        $data['pemasokan'] = $this->M_pemasokan->get1Pemasokan($where);
        $data['detail_pemasokan'] = $this->M_pemasokan->getDetailPemasokan($where);
        $this->load->view('backend/master-template',$data);
    }
    function ubahStatus(){
        $data['id'] = $this->input->post('id');
        $where = array(
            'id_pemasokan' => $data['id']
        );
        $data['pemasokan'] = $this->M_pemasokan->get1Pemasokan($where);
        
        $this->load->view('backend/pemasokan/ubah-status',$data);
    }
}