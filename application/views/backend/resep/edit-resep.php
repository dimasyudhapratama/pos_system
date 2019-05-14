
<form action="<?php echo base_url().'index.php/resep/update' ?>" method="post">
    <div class="row">
        <input type="hidden" name="id_produk" value="<?php echo $id; ?>">
        <div class="col-md-12">
            <div class="form-group">
                <label for="" class="pull-left">Produk</label>
                <?php foreach($produk as $p){ ?>
                <input type="text" class="form-control" name="" id="" value="<?php echo $p->nama_produk; ?>" readonly />
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="pull-left">Pilih Bahan Baku</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <select name="bahan_baku_" id="bahan_baku_" class="select2_demo_2 form-control" placeholder="Pilih Produk" required>
                    <option value="">--Pilih--</option>
                    <?php foreach($bahan_baku as $p){ ?>
                    <option value="<?php echo $p->id_bahan_baku; ?>"><?php echo $p->nama_bahan_baku; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button type="button" class="btn btn-success btn-sm" name="addMore" id="addMore"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">Item</label>
        </div>
        <div class="col-md-3">
            <label for="">Qty</label>
        </div>
        <div class="col-md-3">
            <label for="">Satuan</label>
        </div>
    </div>
    <span id="itemDetails">
        <?php
        $no =-1;
        foreach($resep as $bb){
        $no++;
        ?>
        <div class="row row<?php echo $no; ?>">
            <input type="hidden" name="id_bahan_baku[]" value="<?php echo $id; ?>">
            <div class="col-md-4">
                    <input type="text" class="form-control" style="height:30px;" name="nama_bahan_baku" value="<?php echo $bb->nama_bahan_baku; ?>" disabled>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" style="height:30px;" name="qty[]" value="<?php echo $bb->jumlah_bb ?>" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" style="height:30px;" name="satuan" value="<?php echo $bb->satuan; ?>" disabled>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-row" id="<?php echo $no; ?>"><i class="fa fa-close"></i></button>
            </div>
        </div>
        <div style="margin-bottom:10px"></div>
        <?php } ?>
        
    </span>
    <div class="login-btn-inner">
        <div class="pull-right">
            <input class="btn btn-sm btn-default" type="reset" value="Reset">
            <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
        </div>
        <br>
    </div>
</form>
<script>
$(document).ready(function(){
        var count = <?php echo $no; ?>;
        //Add Row
        $(document).on('click','#addMore',function(){
            var id = $('#bahan_baku_').val();
            if(id!=''){
                count+=1;
                $.ajax({
                    url : "<?php echo base_url().'index.php/resep/addRow' ?>",
                    type : "POST",
                    data : {no : count,id : id},
                    success : function(ajaxData){
                        $("#itemDetails").append(ajaxData);
                    }
                });
            }else{
                return alert('Pilihan Bahan Baku Harus Diisi');
            }
        });
        //Delete Row
        $(document).on('click','.removeRow',function(){
            var row_no = $(this).attr("id");
            $('.row'+row_no).remove();
        });
    });
</script>