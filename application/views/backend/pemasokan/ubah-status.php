<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?php echo base_url()."index.php/pemasokan/updateStatus" ?>" method="post">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Ubah Status</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id_pemasokan" value="<?php echo $id ?>">
                    <div class="col-md-6">
                        <?php foreach($pemasokan as $p){ ?>
                        <div class="form-group">
                            <label for="" class="pull-left">Status</label>
                            <select name="status_pasok" id="status_pasok" class="form-control">
                                <option value="0" <?php if($p->status_pasok==0){echo "Selected";} ?>>Batal</option>
                                <option value="1" <?php if($p->status_pasok==1){echo "Selected";} ?>>Open</option>
                                <option value="2" <?php if($p->status_pasok==2){echo "Selected";} ?>>Proses</option>
                                <option value="3" <?php if($p->status_pasok==3){echo "Selected";} ?>>Selesai</option>
                            </select>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-sm btn-default" type="reset" value="Reset">
                <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
            </div>
        </form> 
    </div>
</div>