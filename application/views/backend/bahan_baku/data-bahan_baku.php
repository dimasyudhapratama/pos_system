
<script type="text/javascript">
    // $(document).ready(function(){
    //     $("#form-element").hide();
    // });
    // function openForm(){
    //     $("#table-element").addClass("col-lg-8 col-md-8 col-sm-8");
    //     $("#table-element").removeClass("col-lg-12 col-md-12 col-sm-12");
    //     $("#form-element").show();
    // }
    // function closeForm(){
    //     $("#table-element").removeClass("col-lg-8 col-md-8 col-sm-8");
    //     $("#table-element").addClass("col-lg-12 col-md-12 col-sm-12");
    //     $("#form-element").hide();
    // }
    function edit(id){
        $.ajax({
            url: "<?php echo base_url().'index.php/bahan_baku/edit'; ?>",
            type: "POST",
            data : {id_bahan_baku: id},
            success: function (ajaxData){
                $("#modaledit").html(ajaxData);
                $("#modaledit").modal('show',{backdrop: 'true'});
            }
        });
    }
</script>
<div class="container-fluid">
    <div class="row">
        <div id="table-element" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-left">
                            <h1>Data Bahan Baku</h1>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-primary mg-b-10" href="#" data-toggle="modal" data-target="#modaladd">Tambah</a>
                            <!-- <button class="btn btn-default" onclick="openForm()">Test</button> -->
                        </div>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr style="background-color:#EEEEEE">
                                    <th>#</th>
                                    <th>ID Bahan Baku</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Kategori Bahan Baku</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Limit Stok</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($bahan_baku as $c){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $c->id_bahan_baku; ?></td>
                                    <td><?php echo $c->nama_bahan_baku; ?></td>
                                    <td><?php echo $c->nama_kategori_bahan_baku; ?></td>
                                    <td><?php echo $c->satuan; ?></td>
                                    <td><?php echo $c->stok; ?></td>
                                    <td><?php echo $c->limit_stok; ?></td>
                                    <td style="text-align:center">
                                        <div class="btn-group btn-sm">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Pilih 
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <!-- <li><a class="click-edit" href="#" id="<?php echo $c->id_bahan_baku; ?>">Edit</a></li> -->
                                                <li><a onclick="edit(<?php echo $c->id_bahan_baku; ?>)" data-toggle="modal" href="#">Edit</a></li>
                                                <li><a onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" href="<?php echo base_url().'index.php/bahan_baku/delete/'.$c->id_bahan_baku ?>">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="form-element" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="sparkline16-list responsive-mg-b-30">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-right">
                            <button class="btn btn-sm btn-primary" style="border-radius:50%;" onclick="closeForm();"><i class="fa fa-close"></i></button>            
                        </div>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    <form action="" method="post">
                        <div class="form-group-inner">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group-inner">
                            <label for="">No. HP</label>
                            <input type="text" class="form-control" placeholder="Masukkan No. HP">
                        </div>
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
        </div> -->
    </div>
    <div id="modaladd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."index.php/bahan_baku/add" ?>" method="post">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Data</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Kategori Bahan Baku</label>
                                    <select class="form-control" name="id_kategori_bahan_baku" >
                                    <option value="">Pilih Disini</option>
                                        <?php 
                                        foreach ($kategori_bahan_baku as $data) {
                                        ?>
                                            
                                            <option value="<?php echo $data->id_kategori_bahan_baku ?>"><?php echo $data->nama_kategori_bahan_baku ?></option>
                                        <?php 
                                        }
                                         ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Nama Bahan Baku</label>
                                    <input type="text" name="nama_bahan_baku" class="form-control" placeholder="Masukkan Nama Bahan Baku" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Satuan</label>
                                    <input type="text" name="satuan" class="form-control" placeholder="Masukkan Satuan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Stok</label>
                                        <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Limit stok</label>
                                        <input type="text" name="limit_stok" class="form-control" placeholder="Masukkan Limit Stok">
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
    </div>
</div>