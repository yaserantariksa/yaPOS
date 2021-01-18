<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1> <small>Barang masuk / Pembelian</small> </h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-right">
          <li>
            <a href="#"><i class="fas   fa-box
                 mr-2"></i></a>
          </li>
          <li class="active mr-2">Transaction</li>
        </ol>
      </div>
    </div>
  </div> <!-- /.container-fluid -->
</section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
        <div class="row">


          <div class="col mb-2">
                <a href="<?=site_url('stock/in/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fas   fa-user-plus mr-2"></i>Tambah Pembelian/ Stock In</a>
          </div>
        </div>
            <div class="box">
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-striped table-sm" id="table2">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Kode Barcode</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga Pembelian</th>
                                <th>Detail</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ; 
                        foreach($row as $key => $data) { ;?>
                        <tr>
                        <td><?= $no++ ; ?> </td>
                        <td><?= indo_date($data->stock_date) ; ?> </td>
                        <td><?= $data->sup_name ; ?> </td>
                        <td><?= $data->item_barcode ;?> </td>
                        <td><?= $data->item_name ; ?> </td>
                        <td><?= $data->stock_qty ; ?> </td>
                        <td><?= indo_currency($data->item_harbel) ; ?> </td>
                        <td><?= $data->stock_detail ; ?> </td>
                        <td> 
                        <a href="<?=site_url('stock/in/detail/'.$data->item_id)?>" class="btn btn-primary btn-xs btn-flat"><i class="fas fa-eye mr-2"></i>Detail</a>

                        <a href="<?=site_url('stock/in/del/'.$data->stock_id)?>" class="btn btn-danger btn-xs btn-flat"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                        </td>
                        </tr>

                        <?php };?>
                            
                        </tbody>


                    </table>
                
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<script>
   $(function () {
    $("#table3").DataTable({
      "processing": true,
      "serverSide": true,
      "order" : [],
      "ajax": {
        "url" : "<?= site_url('item/get_ajax') ?>" ,
        "type" : "POST" }
      })
    $('#table4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


