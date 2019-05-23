<script type="text/javascript">
    $(document).ready(function(){
        $("#primary-table").DataTable();
    });
    $(function () {
        $('#dtpickerdemo').datetimepicker({
            format: 'DD-MM-YYYY hh:mm:ss',
            locale: 'en'
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div id="table-element" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd" style="margin-bottom:50px;">
                    <div class="main-sparkline8-hd">
                        <div class="pull-left">
                            <h1>Rekap Keuangan</h1>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#modaladd"><i class="fa fa-filter"></i> Filter</button>
                            <button type="button" class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#modaladd"><i class="fa fa-plus"></i> Tambah</button>
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
                                    <th>Tanggal</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Detail Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($keuangan as $row){ 
                                    $createDate = date_create($row->tanggal);
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo date_format($createDate,"d-m-Y H:i:s"); ?></td>
                                    <td><?php if($row->debit != ''){ echo "Rp.".number_format($row->debit,'2',',','.'); }?></td>
                                    <td><?php if($row->kredit != ''){echo "Rp.".number_format($row->kredit,'2',',','.'); }?></td>
                                    <td><?php echo $row->detail_info; ?></td>
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
                <form action="<?php echo base_url()."index.php/rekap_keuangan/add" ?>" method="post">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Data Pemasukan/Pengeluaran Lain</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group data-custon-pick">
                                    <label style="font-weight:bold;">Pilih Tanggal</label>
                                    <div class='input-group date' id='dtpickerdemo'>
                                        <input type="text" name="tanggal" class="form-control" value="<?php echo date("dd/mm/YYYY H:i:s") ?>" required />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="pull-left">Tipe</label>
                                    <select class="form-control" name="tipe" required>
                                        <option value="debit">Debit</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="pull-left">Detail Penggunaan</label>
                                    <textarea class="form-control" name="detail_info" style="width: 100%;min-width:100%;max-width:100%" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="pull-left">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" required>
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
</div>