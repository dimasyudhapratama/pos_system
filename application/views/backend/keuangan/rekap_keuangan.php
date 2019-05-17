<script type="text/javascript">
    $(document).ready(function(){
        $("#primary-table").DataTable();
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
                        
                    </div>
                </div>
                <div class="sparkline8-graph">
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
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->tanggal; ?></td>
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
</div>