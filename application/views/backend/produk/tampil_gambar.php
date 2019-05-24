<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/Produk/tampilgambar" ?>" method="post" enctype="multipart/form-data">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Tampil Gambar</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    foreach($produk as $c){
                    ?>
                    <div class="col-md-12">
                        <div class="form-group-inner">
                            <center><label for="">Photo</label></center>
                            <img src="<?php echo base_url()."upload/produk/".$c->image_produk ?>">
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