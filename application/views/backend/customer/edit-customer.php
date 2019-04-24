<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/customer/update" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Edit Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    foreach($customer as $c){
                    ?>
                    <input type="hidden" name="id_customer" id="id_customer" value="<?php echo $c->id_customer; ?>">
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Nama</label>
                            <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan Nama" value="<?php echo $c->nama_customer; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">No. HP</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No. HP" value="<?php echo $c->no_hp ?>">
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