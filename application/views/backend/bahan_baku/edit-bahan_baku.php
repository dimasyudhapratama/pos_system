<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/bahan_baku/update" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Edit Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    foreach($bahan_baku as $c){
                    ?>
                    <input type="hidden" name="id_bahan_baku" id="id_bahan_baku" value="<?php echo $c->id_bahan_baku; ?>">
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Kategori Bahan Baku</label>
                            <select class="form-control" name="id_kategori_bahan_baku" >
                                <option value="">Pilih Disini</option>
                                    <?php 
                                    foreach ($kategori_bahan_baku as $data2) {
                                        $sel = $data2->id_kategori_bahan_baku==$c->id_kategori_bahan_baku ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $data2->id_kategori_bahan_baku ?>" <?php echo $sel ?>> <?php echo $data2->nama_kategori_bahan_baku   ?></option>        
                                    <?php 
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Nama Bahan Baku</label>
                                    <input type="text" name="nama_bahan_baku" class="form-control" placeholder="Masukkan Nama Bahan Baku" required value="<?php echo $c->nama_bahan_baku ?>">
                                </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Satuan</label>
                                <input type="text" name="satuan" class="form-control" placeholder="Masukkan Satuan" value="<?php echo $c->satuan ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Stok</label>
                                <input type="number" name="stok" class="form-control" placeholder="Masukkan Stok" value="<?php echo $c->stok ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Limit Stok</label>
                                <input type="number" name="limit_stok" class="form-control" placeholder="Masukkan Limit Stok" value="<?php echo $c->limit_stok ?>">
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