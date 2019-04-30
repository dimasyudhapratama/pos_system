<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/pemasukan_lain/update" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Edit Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    foreach($pemasukan_lain as $c){
                    ?>
                    <input type="hidden" name="id_supplier" id="id_supplier" value="<?php echo $c->id_pemasukan_lain; ?>">
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Judul</label>
                            <input type="text" name="" class="form-control" placeholder="Masukkan Judul" value="<?php echo $c->nama_supplier; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Keterangan</label>
                                <input type="text" name="" class="form-control" placeholder="Masukkan Keterangan" value="<?php echo $c->no_hp ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Jumlah</label>
                                <input type="text" name="" class="form-control" placeholder="Masukkan Jumlah" value="<?php echo $c->email ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat anda" value="<?php echo $c->alamat ?>">
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-sm btn-default" type="reset" value="Reset">
                <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
            </div>
        </form> 
    </div>
</div>