<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/kategori_produk/update" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Edit Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php foreach($kategori_produk as $k){ ?>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control"  value="<?php echo $k->nama_kategori; ?>" placeholder="Masukkan Nama Kategori" required>
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