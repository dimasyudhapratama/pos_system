<script>
function pelunasan(id){
    $.ajax({
        url : "<?php echo base_url().'index.php/pemasokan/pelunasan' ?>",
        type : "POST",
        data : {id : id},
        success : function(ajaxData){
            $("#modal-popup").html(ajaxData);
            $("#modal-popup").modal('show',{backdrop : 'true'});
        }
    });
}
function ubahStatus(id){
    $.ajax({
        url : "<?php echo base_url().'index.php/pemasokan/ubahStatus' ?>",
        type : "POST",
        data : {id : id},
        success : function(ajaxData){
            $("#modal-popup").html(ajaxData);
            $("#modal-popup").modal('show',{backdrop : 'true'});
        }
    });
}
</script>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#add-tab">Tambah Data</a></li>
                        <li><a href="#table-tab">Daftar</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="add-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form name="form_pemasokan" method="POST" action="<?php echo base_url('index.php/pemasokan/add'); ?>">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Supplier</label>
                                                    <select name="supplier" id="supplier" class="select2_demo_2 form-control" placeholder="Pilih Supplier" required>
                                                        <option value="">--Pilih--</option>
                                                        <?php foreach($supplier as $s){ ?>
                                                        <option value="<?php echo $s->id_supplier; ?>"><?php echo $s->nama_supplier; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                            
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status_pasok" class="form-control" required>
                                                        <option value="">--Pilih--</option>
                                                        <option value="1">Open</option>
                                                        <option value="2">Progress</option>
                                                        <option value="3">Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Pilih Jenis</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name="pilihan" id="pilihan" class="form-control">
                                                        <option>---pilih---</option>
                                                        <option value="pj">Produk Jadi</option>
                                                        <option value="bb">Bahan Baku</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-success btn-sm" name="add_more" id="add_more"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">   
                                            <div class="col-md-2">
                                                <label>Kategori</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Item</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Qty</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Harga</label>
                                            </div>  
                                            <div class="col-md-2">
                                                <label for="">Subtotal</label>
                                            </div>
                                        </div>
                                        <span id="item-details">
                                        </span>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Jumlah</label>
                                                    <input type="number" name="grand_total" id="grand_total" value="" class="form-control" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Terbayar</label>
                                                    <input type="number" name="terbayar" id="terbayar" value="" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Sisa</label>
                                                    <input type="number" name="sisa" id="sisa" value="" class="form-control" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-9">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="table-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="static-table-list">
                                        <table id="primary-table" class="table">
                                            <thead>
                                                <tr style="background-color:#EEEEEE">
                                                    <th>#</th>
                                                    <th>Tanggal</th>
                                                    <th>Supplier</th>
                                                    <th>Grand Total</th>
                                                    <th>Terbayar</th>
                                                    <th style="text-align:center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach($pemasokan as $c){ 
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $c->tgl_pemasokan; ?></td>
                                                    <td><?php echo $c->nama_supplier; ?></td>
                                                    <td><?php echo $c->grand_total; ?></td>
                                                    <td><?php echo $c->jumlah_terbayar; ?></td>
                                                    <td style="text-align:center">
                                                        <div class="btn-group btn-sm">
                                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                Pilih 
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a data-toggle="modal" href="<?php echo base_url().'index.php/pemasokan/detail/'.$c->id_pemasokan; ?>">Detail</a></li>
                                                                <?php if($c->status_pasok == 1 || $c->status_pasok ==2){ ?>
                                                                <li><a onclick="ubahStatus(<?php echo $c->id_pemasokan; ?>)" data-toggle="modal" href="#">Ubah Status</a></li>
                                                                <?php } ?>
                                                                <?php if($c->status_bayar == 1){ ?><li><a onclick="pelunasan(<?php echo $c->id_pemasokan; ?>)" data-toggle="modal" href="#">Pelunasan</a></li> <?php } ?>
                                                                <!-- <li><a onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" href="<?php echo base_url().'index.php/kategori_produk/delete/'.$c->id_pemasokan; ?>">Delete</a></li> -->
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
            </div>
        </div>
    </div>
</div>
<div id="modal-popup" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
</div>
<script>
    // function detail(id){
    //     $.ajax({
    //         url : "<?php echo base_url().'index.php/pemasokan/detail' ?>",
    //         type : "POST",
    //         data : {id : id},
    //         success : function(ajaxData){
    //             $("#modal-popup").html(ajaxData);
    //             $("#modal-popup").modal('show',{backdrop : 'true'});
    //         })
    //     })
    // }
    //Add Row Baru untuk membuat keranjang belanja
    $(document).ready(function(){
        $("#primary-table").DataTable();
        var count = -1;
        function addRowProdukJadi(count = ''){ 
            var html = '';
            html += '<div class="row row'+count+'" style="margin-bottom:10px;">';
            html += '<div class="col-md-2">';
            html += '<select name="id_kategori_produk[]" id="'+count+'" class="form-control get_produk select2_demo_2">';
            html += '<option value="">--Pilih--</option>';
            html += '<?php foreach($kategori_produk as $kp){?><option value="<?php echo $kp->id_kategori_produk; ?>"><?php echo $kp->nama_kategori ?></option><?php } ?>';
            html += '</select>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<select name="id_produk[]" id="id_produk'+count+'" class="form-control select2_demo_2">';
            html += '<option value="">--Pilih--</option>';
            html += '<?php foreach($produk as $p){?> <option value="<?php echo $p->id_produk ?>"><?php echo $p->nama_produk ?></option> <?php } ?>';
            html += '</select>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<input type="text" name="qty_produk[]" id="'+count+'" class="form-control qty_pj'+count+' harga_total subtotal_pj">';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<input type="text" name="harga_produk[]" id="'+count+'" class="form-control harga_pj'+count+' harga_total subtotal_pj">';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<input type="text" name="subtotal_produk[]" id="subtotal_produk'+count+'" class="form-control hasil_subtotal" readonly>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<button class="btn btn-danger remove-row" name="remove" id="'+count+'" ><i class="fa fa-trash-o"></i></button>'
            html += '</div>';
            html += '</div>';
            $("#item-details").append(html);
            $('.select2_demo_2').select2();
        }
        function addRowBahanBaku(){
            var html = '';
            html += '<div class="row row'+count+'" style="margin-bottom:10px;">';
            html += '<div class="col-md-2">';
            html += '<select name="id_kategori_bahan_baku[]" id="'+count+'" class="select2_demo_2 get_bahan_baku form-control">';
            html += '<option value="">Pilih</option>';
            html += '<?php foreach($kategori_bahan_baku as $kbb){?><option value="<?php echo $kbb->id_kategori_bahan_baku; ?>"><?php echo $kbb->nama_kategori_bahan_baku ?></option><?php } ?>';
            html += '</select>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<select name="id_bahan_baku[]" id="id_bahan_baku'+count+'" class="select2_demo_2 form-control">';
            html += '<option value="">--Pilih--</option>';
            html += '<?php foreach($bahan_baku as $p){?> <option value="<?php echo $p->id_bahan_baku ?>"><?php echo $p->nama_bahan_baku ?></option> <?php } ?>';
            html += '</select>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<input type="text" name="qty_bahan_baku[]" id="'+count+'" class="form-control qty_bb'+count+' harga_total subtotal_bb">';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<input type="text" name="harga_bahan_baku[]" id="'+count+'" class="form-control harga_bb'+count+' harga_total subtotal_bb">';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<input type="text" name="subtotal_bahan_baku[]" id="subtotal_bahan_baku'+count+'" class="form-control hasil_subtotal" readonly>';
            html += '</div>';
            html += '<div class="col-md-2">';
            html += '<button class="btn btn-danger remove-row" name="remove" id="'+count+'" ><i class="fa fa-trash-o"></i></button>';
            html += '</div>';
            html += '</div>';
            $("#item-details").append(html);
            $('.select2_demo_2').select2();
        }
        //Add Row
        $(document).on('click','#add_more',function(){
            count+=1;
            var p = document.getElementById("pilihan");
            var pilihan = p.options[p.selectedIndex].value;
            if(pilihan == "pj"){
                addRowProdukJadi(count);
            }else if(pilihan == "bb"){
                addRowBahanBaku(count);
            }
        });
        //Delete Row
        $(document).on('click','.remove-row',function(){
            var row_no = $(this).attr("id");
            $('.row'+row_no).remove();
        });
        //Ajax Bahan Baku
        $(document).on('change','.get_bahan_baku',function(){
            var n_count = $(this).attr("id");
            var data = $(this).val();
            $.ajax({
                url : "<?php echo base_url("index.php/pemasokan/getAjaxBahanBaku") ?>",
                type : "POST",
                data : {id : data},
                success : function(ajaxData){
                    $("#id_bahan_baku"+count).html(ajaxData);
                }
            });
        });
        //Ajax Produk
        $(document).on('change','.get_produk',function(){
            var n_count = $(this).attr("id");
            var data = $(this).val();
            $.ajax({
                url : "<?php echo base_url("index.php/pemasokan/getAjaxProduk") ?>",
                type : "POST",
                data : {id : data},
                success : function(ajaxData){
                    $("#id_produk"+count).html(ajaxData);
                }
            });
        });
        //Subtotal Produk Jadi
        $(document).on('keyup','.subtotal_pj',function(){
            var a = $(this).attr("id"); //No Row
            var b = $('.qty_pj'+a).val(); //Nilai QTY
            var c = $('.harga_pj'+a).val() //Nilai Subtotal
            var hasil = b*c;
            document.getElementById('subtotal_produk'+a).value = hasil;
        });
        // Subtotal Bahan Baku
        $(document).on('keyup','.subtotal_bb',function(){
            var a = $(this).attr("id"); //No Row
            var b = $('.qty_bb'+a).val(); //Nilai QTY
            var c = $('.harga_bb'+a).val() //Nilai Subtotal
            var hasil = b*c;
            document.getElementById('subtotal_bahan_baku'+a).value = hasil;
        });
        $(document).on('keyup','.harga_total',function(){
            var a = document.getElementsByClassName("hasil_subtotal");
            var total = parseInt(0);
            for(i=0;i<a.length;i++){
                nilai = parseInt(a[i].value);
                total += nilai
            }
            document.getElementById("grand_total").value = total;
        });
        //Kembalian
        $(document).on('keyup','#terbayar',function(){
            var a = parseInt(document.getElementById("grand_total").value);
            var b = parseInt(document.getElementById("terbayar").value);
            var kembalian = b-a;
            document.getElementById("sisa").value=kembalian;
        });
    });

</script>