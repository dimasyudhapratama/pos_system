
<script type="text/javascript">
    $(document).ready(function(){
        $("#primary-table").DataTable();
    });
    // function edit(id){
    //     $.ajax({
    //         url: "<?php echo base_url().'index.php/pengeluaran_lain/edit'; ?>",
    //         type: "POST",
    //         data : {id_pengeluaran_lain: id},
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
                            <h1>Data Pengeluaran Lain</h1>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-primary mg-b-10" href="#" data-toggle="modal" data-target="#modaladd">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table" id="primary-table">
                            <thead>
                                <tr style="background-color:#EEEEEE">
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($pengeluaran_lain as $c){ 
                                    $createDate = date_create($c->tanggal);
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo date_format($createDate,"d-m-Y H:i:s"); ?></td>
                                    <td><?php echo $c->judul_pengeluaran_lain; ?></td>
                                    <td><?php echo "Rp. ".number_format($c->jumlah,'2',',','.'); ?></td>
                                    <td><?php echo $c->keterangan; ?></td>
                                    <td style="text-align:center">
                                        <div class="btn-group btn-sm">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Pilih 
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a onclick="edit(<?php echo $c->id_pengeluaran_lain; ?>)" data-toggle="modal" href="#">Edit</a></li>
                                                <li><a onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" href="<?php echo base_url().'index.php/pengeluaran_lain/delete/'.$c->id_pengeluaran_lain ?>">Delete</a></li>
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
                <form action="<?php echo base_url()."index.php/pengeluaran_lain/add" ?>" method="post">
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
                                        <label for="" class="pull-left">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Judul</label>
                                    <input type="text" name="judul_pengeluaran_lain" class="form-control" placeholder="Masukkan Judul Pengeluaran Lain" required>
                                </div>
                            </div>
                            </div><div class="row">
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah">
                                </div>
                            </div>
                        
                        
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" placeholder="Masukkan keterangan"></textarea>
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