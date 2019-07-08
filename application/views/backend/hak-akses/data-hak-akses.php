<script type="text/javascript">
    $(document).ready(function(){
        $("#primary-table").DataTable();
    });
    function edit(id){
        $.ajax({
            url : "<?php echo base_url().'index.php/hak_akses/edit'; ?>",
            type : "POST",
            data : {id : id},
            success : function(ajaxData){
                $("#modalajax").html(ajaxData);
                $("#modalajax").modal('show',{backdrop : 'true'});
            }
        });
    }
    function detail(id){
        $.ajax({
            url : "<?php echo base_url().'index.php/hak_akses/detail'; ?>",
            type : "POST",
            data : {id : id},
            success : function(ajaxData){
                $("#modalajax").html(ajaxData);
                $("#modalajax").modal('show',{backdrop : 'true'});
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
                            <h1>Data <?php echo $title; ?></h1>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-primary mg-b-10" href="#" data-toggle="modal" data-target="#modaladd">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <?php
                        echo $this->session->flashdata("input_success");
                        echo $this->session->flashdata("input_failed");
                        echo $this->session->flashdata("update_success");
                        echo $this->session->flashdata("update_failed");
                        echo $this->session->flashdata("delete_success");
                        echo $this->session->flashdata("delete_failed");
                    ?>
                    <div class="static-table-list">
                        <table class="table" id="primary-table">
                            <thead>
                                <tr style="background-color:#EEEEEE">
                                    <th>#</th>
                                    <th>Nama Hak Akses</th>
                                    <th>Jumlah Permission</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($hak_akses as $c){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $c->nama_roles; ?></td>
                                    <td><?php  
                                            echo sizeof(explode(',',$c->permission)); //Count Imploded
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <div class="btn-group btn-sm">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Pilih 
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a onclick="detail(<?php echo $c->id_roles; ?>)" data-toggle="modal" href="#">Detail</a></li>
                                                <li><a onclick="edit(<?php echo $c->id_roles; ?>)" data-toggle="modal" href="#">Edit</a></li>
                                                <li><a onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" href="<?php echo base_url().'index.php/hak_akses/delete/'.$c->id_roles; ?>">Delete</a></li>
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
    </div>
    <div id="modaladd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url()."index.php/hak_akses/add" ?>" method="post">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Data</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-12">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Nama Hak Akses</label>
                                    <input type="text" name="nama_hak_akses" class="form-control" placeholder="Masukkan Nama Hak Akses" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group-inner">
                                    <label for="" class="pull-left">Permission</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="1"> <i></i> Pemasokan </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                 <label><input type="checkbox" name="permission[]" value="2"> <i></i> Penjualan </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                 <label><input type="checkbox" name="permission[]" value="3"> <i></i> Kategori Produk </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="4"> <i></i> Produk </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="5"> <i></i> Kategori Bahan Baku </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="6"> <i></i> Bahan Baku </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="7"> <i></i> Resep </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="8"> <i></i> Customer </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="9"> <i></i> Supplier </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="10"> <i></i> Hak Akses </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="11"> <i></i> List Staff </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="i-checks pull-left">
                                    <label><input type="checkbox" name="permission[]" value="12"> <i></i> Rekap Keuangan </label>
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
    <div id="modalajax" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    </div>
</div>