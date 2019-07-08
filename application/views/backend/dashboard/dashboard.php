<script>
    $(document).on("click","#detail_produk",function(){
        window.location.href = "<?php echo base_url().'index.php/produk' ?>";

    });
    $(document).on("click","detail_pemasukan",function(){
        window.location.href = "<?php echo base_url().'index.php/rekap_keuangan' ?>";
    })
    $(document).on("click","detail_pengeluaran",function(){
        window.location.href = "<?php echo base_url().'index.php/rekap_keuangan' ?>";
    })
    $(document).on("click","detail_produk",function(){
        window.location.href = "<?php echo base_url().'index.php/rekap_keuangan' ?>";
    })
</script>
<div class="widget-program-box mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <h2 class="m-b-xs" >Jumlah Produk</h2>
                                    <p class="font-bold text-warning">&nbsp;</p>
                                    <div class="m icon-box">
                                        <i class="icofont icofont-box"></i>
                                    </div>
                                    <h4 style="margin-top:10px;">20</h4>
                                    <button class="btn btn-success widget-btn-1 btn-sm" id="detail_produk">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <h2 class="m-b-xs">Pemasukan Tahunan</h2>
                                    <p class="font-bold text-info"><?php echo date("Y"); ?></p>
                                    <div class="m icon-box">
                                        <i class="icofont icofont-shopping-cart"></i>
                                    </div>
                                    <h4 style="margin-top:10px;">20</h4>
                                    <button class="btn btn-info widget-btn-2 btn-sm" id="detail_pemasukan">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <h2 class="m-b-xs">Pengeluaran Tahunan</h2>
                                    <p class="font-bold text-info"><?php echo date("Y"); ?></p>
                                    <div class="m icon-box">
                                        <i class="icofont icofont-money-bag"></i>
                                    </div>
                                    <h4 style="margin-top:10px;">20</h4>
                                    <button class="btn btn-warning widget-btn-3 btn-sm" id="detail_pengeluaran">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <h2 class="m-b-xs">Keuntungan Tahunan</h2>
                                    <p class="font-bold text-warning">&nbsp;</p>
                                    <div class="m icon-box">
                                        <i class="icofont icofont-money-bag"></i>
                                    </div>
                                    <h4 style="margin-top:10px;">20</h4>
                                    <button class="btn btn-danger widget-btn-4 btn-sm" id="detail_keuntungan">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>