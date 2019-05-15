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
        $this->load->model('M_keuangan');

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
            )
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

            if($this->input->post('status_pasok') ==3){//Jika Status == 3 (Selesai)
                $where = array(
                    'id_pemasokan' => $id_pemasokan
                );
                //Insert Ke Tabel Pengeluaran
                $pemasokan = $this->M_pemasokan->get1Pemasokan($where); //Mengambil Data Untuk digunakan sebagai input
                foreach($pemasokan as $p){
                    $nama_supplier = $p->nama_supplier;
                    $jumlah_terbayar = $p->jumlah_terbayar;
                }
                $data_pengeluaran = array(
                    'tanggal' => date('Y-m-d'),
                    'detail_info' => "Pembayaran Ke Supplier ".$nama_supplier,
                    'jumlah' => $jumlah_terbayar
                );
                $this->M_pengeluaran->inputPengeluaran($data_pengeluaran);
                //Menambah Stok Bahan Baku
                $detail_pasok_bahan_baku = $this->M_pemasokan->getDetailPemasokanBahanBaku($where); //Mendapatkan Record Detail Pasok Bahan Baku
                foreach($detail_pasok_bahan_baku as $row){
                    $where_bb = array(
                        'id_bahan_baku' => $row->id_bahan_baku
                    );
                    $bahan_baku = $this->M_bahan_baku->get1BahanBaku($where_bb); //Mendapatkan Stok Bahan Baku Sekarang
                    foreach($bahan_baku as $bb){
                        $stok = $bb->stok;
                    }
                    $data_bb = array(
                        'stok' => $row->qty + $stok
                    );
                    $this->M_bahan_baku->updateBahanBaku($where_bb,$data_bb);
                        
                }
                //Menambah Stok Produk
                $detail_pasok_produk = $this->M_pemasokan->getDetailPemasokanProduk($where); //Mendapatkan Record Detail Pasok Produk
                foreach($detail_pasok_produk as $row){
                    $where_produk = array(
                        'id_produk' => $row->id_produk
                    );
                    $produk = $this->M_produk->get1Produk($where_produk);  //Mendapatkan Stok Bahan Baku Sekarang
                    foreach($produk as $p){
                        $stok = $p->stok;
                    }
                    $data_produk = array(
                        'stok' => $row->qty + $stok
                    );
                    $this->M_produk->updateProduk($where_produk,$data_produk);
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
    function updateStatus(){ //Menampung Form Ubah Status
        $id_pemasokan = $this->input->post('id_pemasokan');
        $where = array(
            'id_pemasokan' => $id_pemasokan
        );
        if($this->input->post('status_pasok') !=3){//Jika status !=3 (Belum Selesai/Cancel)
            $data = array(
                'status_pasok' => $this->input->post('status_pasok')
            );
            $this->M_pemasokan->updatePemasokan($where,$data);
        }else if($this->input->post('status_pasok') ==3){//Jika Status == 3 (Selesai)
            //Insert Ke Tabel Pengeluaran
            $pemasokan = $this->M_pemasokan->get1Pemasokan($where); //Mengambil Data Untuk digunakan sebagai input
            foreach($pemasokan as $p){
                $nama_supplier = $p->nama_supplier;
                $jumlah_terbayar = $p->jumlah_terbayar;
            }
            $data_pengeluaran = array(
                'tanggal' => date('Y-m-d'),
                'detail_info' => "Pembayaran Ke Supplier ".$nama_supplier,
                'jumlah' => $jumlah_terbayar
            );
            $this->M_pengeluaran->inputPengeluaran($data_pengeluaran);
            //Menambah Stok Bahan Baku
            $detail_pasok_bahan_baku = $this->M_pemasokan->getDetailPemasokanBahanBaku($where); //Mendapatkan Record Detail Pasok Bahan Baku
            foreach($detail_pasok_bahan_baku as $row){
                $where_bb = array(
                    'id_bahan_baku' => $row->id_bahan_baku
                );
                $bahan_baku = $this->M_bahan_baku->get1BahanBaku($where_bb); //Mendapatkan Stok Bahan Baku Sekarang
                foreach($bahan_baku as $bb){
                    $stok = $bb->stok;
                }
                $data_bb = array(
                    'stok' => $row->qty + $stok
                );
                $this->M_bahan_baku->updateBahanBaku($where_bb,$data_bb);
                    
            }
            //Menambah Stok Produk
            $detail_pasok_produk = $this->M_pemasokan->getDetailPemasokanProduk($where); //Mendapatkan Record Detail Pasok Produk
            foreach($detail_pasok_produk as $row){
                $where_produk = array(
                    'id_produk' => $row->id_produk
                );
                $produk = $this->M_produk->get1Produk($where_produk);  //Mendapatkan Stok Bahan Baku Sekarang
                foreach($produk as $p){
                    $stok = $p->stok;
                }
                $data_produk = array(
                    'stok' => $row->qty + $stok
                );
                $this->M_produk->updateProduk($where_produk,$data_produk);
            }
        }
    }
    function pelunasan(){
        $data['id'] = $this->input->post('id');
        $where = array(
            'id_pemasokan' => $data['id']
        );
        $data['pemasokan'] = $this->M_pemasokan->get1Pemasokan($where);
        
        $this->load->view('backend/pemasokan/pelunasan',$data);
    }
    function updatePelunasan(){
        $id_pemasokan = $this->input->post('id_pemasokan');
        $bayar = $this->input->post('bayar');
        $where = array(
            'id_pemasokan' => $id_pemasokan
        );
        $pemasokan = $this->M_pemasokan->get1Pemasokan($where);
        foreach($pemasokan as $p){
            $grandtotal = $p->grand_total;
            $jumlah_terbayar = $p->jumlah_terbayar;
        }
        $hasil = $grandtotal - ($jumlah_terbayar + $bayar);
        if($hasil > 0){ //Belum Lunas
            $data = array(
                'jumlah_terbayar' => $jumlah_terbayar + $bayar,
                'status_bayar' => 1
            );
        }else if($hasil == 0){ //Lunas
            $data = array(
                'jumlah_terbayar' => $jumlah_terbayar + $bayar,
                'status_bayar' => 2
            );
        }
        $this->M_pemasokan->updatePemasokan($where,$data);

        //Input Pengeluaran
        $pemasokan = $this->M_pemasokan->get1Pemasokan($where); //Mengambil Data Untuk digunakan sebagai input
            foreach($pemasokan as $p){
                $nama_supplier = $p->nama_supplier;
                $jumlah_terbayar = $p->jumlah_terbayar;
            }
            $data_pengeluaran = array(
                'tanggal' => date('Y-m-d'),
                'detail_info' => "Pelunasan Pembayaran Ke Supplier ".$nama_supplier,
                'jumlah' => $jumlah_terbayar
            );
            $this->M_pengeluaran->inputPengeluaran($data_pengeluaran);
        redirect('pemasokan');
    }
}