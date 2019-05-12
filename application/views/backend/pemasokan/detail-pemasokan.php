<div class="container-fluid">
    <div class="row">
        <div id="table-element" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-left">
                            <h1>Detail Pemasokan</h1>
                        </div>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <?php foreach($pemasokan as $p){ ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" value="<?php echo date('d-m-Y',strtotime($p->tgl_pemasokan)); ?>" class="form-control-plaintext" readonly />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <input type="text" class="form-control-plaintext" value="<?php echo $p->nama_supplier ?>" readonly />
                                                    
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Status Pemasokan</label>
                                            <input type="text" class="form-control-plaintext" 
                                                value="<?php
                                                    if($p->status_pasok==1){
                                                        echo "Open";
                                                    }else if($p->status_pasok == 2){
                                                        echo "Diproses";
                                                    }else if($p->status_pasok == 3){
                                                        echo "Selesai";
                                                    }else if($p->status_pasok == 0){
                                                        echo "Dibatalkan";
                                                    }
                                                ?>"
                                             readonly />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Status Pembayaran</label>
                                            <input type="text" class="form-control-plaintext" value="<?php if($p->status_bayar==1){echo "Belum Lunas";}else if($p->status_bayar==2){echo "Lunas";} ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="primary-table" class="table">
                                        <thead>
                                            <tr style="background-color:#EEEEEE">
                                                <td>#</td>
                                                <td>Item</td>
                                                <td>Qty</td>
                                                <td>Harga</td>
                                                <td>Subtotal</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($detail_pemasokan as $dp){ 
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $dp->item; ?></td>
                                                <td><?php echo $dp->qty; ?></td>
                                                <td><?php echo "Rp. ".number_format($dp->harga,'2',',','.'); ?></td>
                                                <td><?php echo "Rp. ".number_format($dp->subtotal,'2',',','.'); ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="4" style="text-align:right;padding-right:20px"><b>Grand Total</b></td>
                                                <td><?php echo "Rp. ".number_format($p->grand_total,2,',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="text-align:right;padding-right:20px"><b>Terbayar</b></td>
                                                <td><?php echo "Rp. ".number_format($p->jumlah_terbayar,'2',',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="text-align:right;padding-right:20px"><b>Sisa</b></td>
                                                <td><?php echo "Rp. ".number_format($p->grand_total - $p->jumlah_terbayar,'2',',','.'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="form-element" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="sparkline16-list responsive-mg-b-30">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-right">
                            <button class="btn btn-sm btn-primary" style="border-radius:50%;" onclick="closeForm();"><i class="fa fa-close"></i></button>            
                        </div>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    <form action="" method="post">
                        <div class="form-group-inner">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group-inner">
                            <label for="">No. HP</label>
                            <input type="text" class="form-control" placeholder="Masukkan No. HP">
                        </div>
                        <div class="login-btn-inner">
                                <div class="pull-right">
                                    <input class="btn btn-sm btn-default" type="reset" value="Reset">
                                    <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
                                </div>
                                <br>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
    <!-- <div id="modaladd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."index.php/customer/add" ?>" method="post">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Data</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Nama</label>
                                    <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan Nama" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">No. HP</label>
                                        <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No. HP">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-sm btn-default" type="reset" value="Reset">
                        <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    </div>
                </form> 
            </div>
        </div>
    </div>
    <div id="modaledit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    </div> -->
</div>