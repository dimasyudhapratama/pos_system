
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
                            <h1>Data Penjualan</h1>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table id="primary-table" class="table">
                            <thead>
                                <tr style="background-color:#EEEEEE">
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nama Customer</th>
                                    <th>Kasir</th>
                                    <th>Grand Total</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($penjualan as $row){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->tgl_penjualan; ?></td>
                                    <td><?php echo $row->nama_customer; ?></td>
                                    <td><?php echo $row->nama_terang ?></td>
                                    <td><?php echo $row->grand_total ?></td>
                                    <td style="text-align:center">
                                        <div class="btn-group btn-sm">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Pilih 
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo base_url().'index.php/penjualan/detail/'.$row->id_penjualan; ?>">Detail</a></li>
                                                <!-- <li><a onclick="edit(<?php echo $row->id_penjualan; ?>)" data-toggle="modal" href="#">Edit</a></li> -->
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
    <div id="modaledit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    </div>
</div>