<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/pemasokan/updatePelunasan" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Pelunasan</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id_pemasokan" value="<?php echo $id ?>">
                    <?php foreach($pemasokan as $p){ ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="pull-left">Grand Total</label>
                            <input type="text" name="grand_total" class="form-control" value="<?php echo $p->grand_total; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="pull-left">Terbayar</label>
                            <input type="text" name="terbayar" class="form-control" value="<?php echo $p->jumlah_terbayar; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="pull-left">Bayar</label>
                            <input type="text" name="bayar" class="form-control" value="<?php echo $p->grand_total - $p->jumlah_terbayar; ?>">
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