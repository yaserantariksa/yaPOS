<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small>Data Item</small> </h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-right">
              <li>
                <a href="#"><i class="fas   fa-box mr-2"></i></a>
              </li>
              <li class="active mr-2">Product</li>
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
                <a href="<?=site_url('item/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fas   fa-user-plus mr-2"></i>Tambah Item Baru</a>
          </div>
        </div>
            <div class="box">
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-striped table-sm" id="table3">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Kode Barcode</th>
                                <th>Gambar Produk</th>
                                <th>Nama Item</th>
                                <th>Kategori Produk</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Eceran</th>
                                <th>Harga Reseller</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $i = 1; ?>
                            <?php foreach($row->result() as $key => $data ) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ; ?></td>
                                <td><?= $data->item_barcode ; ?></td>
                                <td>
                                  <?php if($data->item_img != null ) { ?>
                                  <img src="<?= base_url('upload/item_img/'.$data->item_img) ; ?>" alt="" style="width: 50px;" class="rounded mx-auto d-block">
                                  <?php } ; ?>                                  
                                </td>
                                <td><?= $data->item_name ; ?></td>
                                <td><?= $data->product_cat_code ; ?></td>
                                <td><?= $data->unit_code ; ?></td>
                                <td><?= indo_currency($data->item_harbel) ; ?></td>
                                <td><?= indo_currency($data->item_harjual1) ; ?></td>
                                <td><?= indo_currency($data->item_harjual2) ; ?></td>
                                <td><?= $data->item_stock ; ?></td>
                                <td class="text-center">
                                <form action="<?=site_url('item/del');?>" method="POST">
                                
                                    <input type="hidden" value="<?=$data->item_id;?>" name="item_id">

                                    <a href="<?=site_url('item/edit/'.$data->item_id);?>" class="btn btn-warning btn-flat btn-sm px-3 mr-2 my-1"><i class="fas fa-pen mr-2"> </i>Edit</a>
                                      
                                    <button onclick="return confirm('Apakah yakin user akan dihapus ?')" class="btn btn-danger btn-flat btn-sm mr-2 my-1"><i class="fas fa-trash-alt mr-2"> </i>Hapus</button>
                                  </form>

                                </td>
                            </tr>
                            <?php } ?> -->
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
    $('#table2').DataTable({
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


