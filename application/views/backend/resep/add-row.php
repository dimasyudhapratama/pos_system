<div class="row row<?php echo $no; ?>">
    <input type="hidden" name="id_bahan_baku[]" value="<?php echo $id; ?>">
    <?php 
        foreach($bahan_baku as $bb){
    ?>
    <div class="col-md-4">
            <input type="text" class="form-control" style="height:30px;" name="nama_bahan_baku" value="<?php echo $bb->nama_bahan_baku; ?>" disabled>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" style="height:30px;" name="qty[]" required>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" style="height:30px;" name="satuan" value="<?php echo $bb->satuan; ?>" disabled>
    </div>
    <?php } ?>
    <div class="col-md-2">
        <button type="button" class="btn btn-danger btn-sm remove-row" id="<?php echo $no; ?>"><i class="fa fa-close"></i></button>
    </div>
</div>
<div style="margin-bottom:10px"></div>