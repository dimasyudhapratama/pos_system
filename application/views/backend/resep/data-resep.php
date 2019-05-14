<script type="text/javascript">
    $(document).ready(function(){
        $("#primary-table").DataTable();
        $("#formAdd-element").hide();
        $("#formEdit-element").hide();
        var count = -1;
        //Add Row
        $(document).on('click','#add-more',function(){
            var id = $('#bahan_baku').val();
            if(id!=''){
                count+=1;
                $.ajax({
                    url : "<?php echo base_url().'index.php/resep/addRow' ?>",
                    type : "POST",
                    data : {no : count,id : id},
                    success : function(ajaxData){
                        $("#item-details").append(ajaxData);
                    }
                });
            }else{
                return alert('Pilihan Bahan Baku Harus Diisi');
            }
        });
        //Delete Row
        $(document).on('click','.remove-row',function(){
            var row_no = $(this).attr("id");
            $('.row'+row_no).remove();
        });
    });
    
    function openAddForm(){
        $("#table-element").addClass("col-lg-6 col-md-6 col-sm-6");
        $("#table-element").removeClass("col-lg-12 col-md-12 col-sm-12");
        $("#formEdit-element").hide();
        $("#formAdd-element").show();
    }
    function closeAddForm(){
        $("#table-element").removeClass("col-lg-6 col-md-6 col-sm-6");
        $("#table-element").addClass("col-lg-12 col-md-12 col-sm-12");
        $("#formAdd-element").hide();
    }
    function edit(id){
        $.ajax({
            url : "<?php echo base_url().'index.php/resep/edit' ?>",
            type : "POST",
            data : {id : id},
            success : function(ajaxData){
                openEditForm();
                $("#ajaxParse").html(ajaxData);
            }
        });
        
    }
    function openEditForm(){
        $("#table-element").addClass("col-lg-6 col-md-6 col-sm-6");
        $("#table-element").removeClass("col-lg-12 col-md-12 col-sm-12");
        $("#formAdd-element").hide();
        $("#formEdit-element").show();
    }
    function closeEditForm(){
        $("#table-element").removeClass("col-lg-6 col-md-6 col-sm-6");
        $("#table-element").addClass("col-lg-12 col-md-12 col-sm-12");
        $("#formEdit-element").hide();
    }
    // function edit(id){
    //     $.ajax({
    //         url: "<?php echo base_url().'index.php/customer/edit'; ?>",
    //         type: "POST",
    //         data : {id_customer: id},
    //         success: function (ajaxData){
    //             $("#modaledit").html(ajaxData);
    //             $("#modaledit").modal('show',{backdrop: 'true'});
    //         }
    //     });
    // }
</script>

<div class="container-fluid">
    <div class="row">
        <div id="table-element" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-left">
                            <h1>Data Resep</h1>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm btn-primary" onclick="openAddForm()"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table id="primary-table" class="table">
                            <thead>
                                <tr style="background-color:#EEEEEE">
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Jumlah Bahan Baku</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($resep as $c){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $c->nama_produk; ?></td>
                                    <td><?php echo $c->jml_ingredients; ?></td>
                                    <td style="text-align:center">
                                        <button onclick="edit(<?php echo $c->kode_produk; ?>)" class="btn btn-primary btn-sm"><i class="fa fa-edit" ></i></button>
                                        <a href="<?php echo base_url().'index.php/resep/delete/'.$c->kode_produk; ?>" class="btn btn-danger btn-sm" onclick="return confirm("Apakah Anda Yakin Untuk Menghapus Data")"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="formAdd-element" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="sparkline16-list responsive-mg-b-30">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-left">
                            <h1>Tambah Resep</h1>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm btn-primary" style="border-radius:50%;" onclick="closeAddForm();"><i class="fa fa-close"></i></button>            
                        </div>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    <form action="<?php echo base_url().'index.php/resep/add' ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="pull-left">Pilih Produk</label>
                                    <select name="produk" id="Produk" class="select2_demo_2 form-control" placeholder="Pilih Produk" required>
                                        <option value="">--Pilih--</option>
                                        <?php foreach($produk as $p){ ?>
                                        <option value="<?php echo $p->id_produk; ?>"><?php echo $p->nama_produk; ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <select name="bahan_baku" id="bahan_baku" class="select2_demo_2 form-control" placeholder="Pilih Produk" required>
                                        <option value="">--Pilih--</option>
                                        <?php foreach($bahan_baku as $p){ ?>
                                        <option value="<?php echo $p->id_bahan_baku; ?>"><?php echo $p->nama_bahan_baku; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm" name="add-more" id="add-more"><i class="fa fa-plus"></i></button>
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
                        <span id="item-details">

                        </span>
                        <div class="login-btn-inner">
                            <div class="pull-right">
                                <input class="btn btn-sm btn-default" type="reset" value="Reset">
                                <input class="btn btn-sm btn-primary" type="submit" value="Simpan">
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="formEdit-element" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="sparkline16-list responsive-mg-b-30">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-left">
                            <h1>Edit Resep</h1>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm btn-primary" style="border-radius:50%;" onclick="closeEditForm();"><i class="fa fa-close"></i></button>            
                        </div>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    <span id="ajaxParse">
                        
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="modaladd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."index.php/resep/add" ?>" method="post">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Data</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ZZZ" class="pull-left">Pilih Produk</label>
                                    <select name="produk" id="Produk" class="form-control" placeholder="Pilih Produk" required>
                                        <option value="">--Pilih--</option>
                                        <?php foreach($produk as $p){ ?>
                                        <option value="<?php echo $p->id_produk; ?>"><?php echo $p->nama_produk; ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <label for="" class="pull-left">No. HP</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No. HP">
                                </div>
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
    </div>
    <div id="modaledit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    </div> -->
</div>