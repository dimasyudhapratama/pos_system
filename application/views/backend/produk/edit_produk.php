<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/Produk/update" ?>" method="post" enctype="multipart/form-data">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Edit Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    foreach($produk as $c){
                    ?>
                    <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $c->id_produk; ?>">
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk" value="<?php echo $c->nama_produk; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Kategori Produk</label>
                            <select class="form-control" name="id_kategori_produk">
                                <?php 
                                foreach ($kategori as $data2) {
                                ?>
                                    <option value="<?php echo $data2->id_kategori_produk ?>"><?php echo $data2->nama_kategori ?></option>
                                <?php 
                                }
                                 ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control" placeholder="Masukkan harga jual" value="<?php echo $c->harga_jual ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                                <label for="" class="pull-left">satuan</label>
                                <input type="number" name="satuan" class="form-control" placeholder="Masukkan satuan " value="<?php echo $c->satuan ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                        <label for="" class="pull-left">stock</label>
                        <input type="number" name="stok" class="form-control" placeholder="stock" value="<?php echo $c->stok ?>">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Tipe Stock</label>
                            <select class="form-control" name="tipe_stok">
                                <option value="Produk Jadi"<?php if ($c->tipe_stok=="Produk Jadi") {
                                    echo "selected";
                                } ?>>Produk Jadi</option>
                                <option value="Produk Olahan"<?php if ($c->tipe_stok=="Produk Olahan") {
                                    echo "selected";
                                } ?>>Produk Olahan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">Limit Stok</label>
                            <input type="number" name="limit_stok" class="form-control" placeholder="masukkan limit stok" value="<?php echo $c->limit_stok?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-inner">
                            <label for="" class="pull-left">photo</label>
                            <img src="<?php echo base_url()."upload/produk/".$c->image_produk ?>">
                            <input type="file" name="photo" class="form-control">
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