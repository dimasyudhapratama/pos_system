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
            url: "<?php echo base_url().'index.php/pemasukan_lain/edit'; ?>",
            type: "POST",
            data : {id_pemasukan_lain: id},
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
                            <h1>Data Pemasukan Lain</h1>
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
                                    <th>ID</th>
                                    <th>Judul Pemasukan Lain</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($dd as $c){ 
                                ?>
                                <tr>
                                   
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $c->judul_pemasukan_lain; ?></td>
                                    <td><?php echo $c->jumlah; ?></td>
                                    <td><?php echo $c->keterangan; ?></td>
                                    <td><?php echo $c->tanggal; ?></td>
                                    <td style="text-align:center">
                                        <div class="btn-group btn-sm">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Pilih 
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <!-- <li><a class="click-edit" href="#" id="<?php echo $c->id_pemasukan_lain; ?>">Edit</a></li> -->
                                                <li><a onclick="edit(<?php echo $c->id_pemasukan_lain; ?>)" data-toggle="modal" href="<?php echo base_url().'index.php/pemasukan_lain/update/'.$c->id_pemasukan_lain ?>">Edit</a></li>
                                                <li><a onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" href="<?php echo base_url().'index.php/pemasukan_lain/delete/'.$c->id_pemasukan_lain ?>">Delete</a></li>
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
                <form action="<?php echo base_url()."index.php/pemasukan_lain/add" ?>" method="post">
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
                                    <label for="" class="pull-left">Judul</label>
                                    <input type="text" name="judul_pemasukan_lain" class="form-control" placeholder="Masukkan Judul" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
                                        <label for="" class="pull-left">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal" required>
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














