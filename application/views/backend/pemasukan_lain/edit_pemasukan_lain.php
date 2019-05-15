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
                    <input type="hidden" name="id_pemasukan_lain" id="id_pemasukan_lain" value="<?php echo $c->id_pemasukan_lain; ?>">
                    <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal" required value="<?php echo $c->tanggal ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Judul</label>
                                    <input type="text" name="judul_pemasukan_lain" class="form-control" placeholder="Masukkan Judul pemasukan Lain" required value="<?php echo $c->judul_pemasukan_lain ?>">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" value="<?php echo $c->jumlah ?>">
                                </div>
                            </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">keterangan</label>
                                <textarea name="keterangan" class="form-control" placeholder="Masukkan keterangan" ><?php echo $c->keterangan ?></textarea>
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