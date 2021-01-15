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


