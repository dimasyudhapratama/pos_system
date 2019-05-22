
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
     function re_stock(id){
        $.ajax({
            url: "<?php echo base_url().'index.php/bahan_baku/re_stock'; ?>",
            type: "POST",
            data : {id_bahan_baku: id},
            success: function (ajaxData){
                $("#modal_re_stock").html(ajaxData);
                $("#modal_re_stock").modal('show',{backdrop: 'true'});
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
                            <h1>Riwayat Re-Stock</h1>
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
                                    <th>Nama Bahan Baku</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>keterangan</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($history_restock_bahan_baku as $c){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
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
        </div>
        </div>