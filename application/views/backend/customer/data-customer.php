
<script type="text/javascript">
    $(document).ready(function(){
        $("#primary-table").DataTable();
    });
    function edit(id){
        $.ajax({
            url: "<?php echo base_url().'index.php/customer/edit'; ?>",
            type: "POST",
            data : {id_customer: id},
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
                            <h1>Data Customer</h1>
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
                        <table id="primary-table" class="table">
                            <thead>
                                <tr style="background-color:#EEEEEE">
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>No.HP</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($customer as $c){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $c->nama_customer; ?></td>
                                    <td><?php echo $c->no_hp; ?></td>
                                    <td style="text-align:center">
                                        <div class="btn-group btn-sm">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Pilih 
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a onclick="edit(<?php echo $c->id_customer; ?>)" data-toggle="modal" href="#">Edit</a></li>
                                                <li><a onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" href="<?php echo base_url().'index.php/customer/delete/'.$c->id_customer ?>">Delete</a></li>
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
                <form action="<?php echo base_url()."index.php/customer/add" ?>" method="post">
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
                                    <label for="" class="pull-left">Nama</label>
                                    <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan Nama" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-inner">
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
    </div>
</div>