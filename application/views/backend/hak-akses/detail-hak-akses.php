<div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."index.php/hak_akses/add" ?>" method="post">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Detail</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <?php foreach($master as $m){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Permission</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="1" <?php if(preg_match("/1/",$m->permission)){echo "checked";} ?>> <i></i> Pemasokan </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="2" <?php if(preg_match("/2/",$m->permission)){echo "checked";} ?>> <i></i> Penjualan </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="3" <?php if(preg_match("/3/",$m->permission)){echo "checked";} ?>> <i></i> Kategori Produk </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="4" <?php if(preg_match("/4/",$m->permission)){echo "checked";} ?>> <i></i> Produk </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="5" <?php if(preg_match("/5/",$m->permission)){echo "checked";} ?>> <i></i> Kategori Bahan Baku </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="6" <?php if(preg_match("/6/",$m->permission)){echo "checked";} ?>> <i></i> Bahan Baku </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="7" <?php if(preg_match("/7/",$m->permission)){echo "checked";} ?>> <i></i> Resep </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="8" <?php if(preg_match("/8/",$m->permission)){echo "checked";} ?>> <i></i> Customer </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="9" <?php if(preg_match("/9/",$m->permission)){echo "checked";} ?>> <i></i> Supplier </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="10" <?php if(preg_match("/10/",$m->permission)){echo "checked";} ?>> <i></i> Hak Akses </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="11" <?php if(preg_match("/11/",$m->permission)){echo "checked";} ?>> <i></i> List Staff </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="12" <?php if(preg_match("/12/",$m->permission)){echo "checked";} ?>> <i></i> Laba Rugi </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="13" <?php if(preg_match("/13/",$m->permission)){echo "checked";} ?>> <i></i> Rekap Pemasukan </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="14" <?php if(preg_match("/14/",$m->permission)){echo "checked";} ?>> <i></i> Rekap Pengeluaran </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="15" <?php if(preg_match("/15/",$m->permission)){echo "checked";} ?>> <i></i> Pemasukan Lain </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" disabled="" name="permission[]" value="16" <?php if(preg_match("/16/",$m->permission)){echo "checked";} ?>> <i></i> Pengeluaran Lain </label>
                                </div>
                            </div>
                        </div>
                    
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-sm btn-default" type="reset" value="Reset">
                        <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    </div>
                </form> 
            </div>
        </div>