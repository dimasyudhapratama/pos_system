<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/Staff/update" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Edit Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    foreach($staff as $c){
                    ?>
                    <input type="hidden" name="id_staff" id="id_staff" value="<?php echo $c->id_staff; ?>">
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" placeholder="Masukkan Nama Staff" value="<?php echo $c->password; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" placeholder="Masukkan Username">
                           
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Masukkan Password Anda">
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