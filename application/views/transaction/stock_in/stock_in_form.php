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

    <div class="box-body">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <a href="<?= site_url('stock/in'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

          <form action="<?= site_url('stock/process'); ?>" method="post">

            <div class="form-group input-group">
              <label for="stock_date" class="col-sm-2 col-form-label">Tanggal</label>
              <input type="hidden" name="stock_id" value="">
              <input type="date" class="form-control" id="stock_date" name="stock_date" value="<?= date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group input-group">
              <label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
              <select class="custom-select" name="supplier_id" id="supplier_id">
                <option>- Pilih -</option>
                <?php foreach($supplier as $i => $data) { ?>
                  <option value="<?=$data->supplier_id ; ?> "><?=$data->sup_name; ?></option>
                <?php ;} ;?> 
                  
              </select>
            </div>

            <div class="form-group input-group">
              <label for="item_barcode" class="col-sm-2 col-form-label">Barcode</label>
              <input type="hidden" name="item_id" id="item_id" value="">
              <input type="text" class="form-control" id="item_barcode" name="item_barcode" value="" required autofocus>
              <span>
                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                  <i class="fas fa-search"></i>
                </button>
              </span>
            </div>

            <div class="form-group input-group">
              <label for="item_name" class="col-sm-2 col-form-label">Nama Barang</label>
              <input type="text" class="form-control" id="item_name" name="item_name" value="" readonly>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-6 input-group">
                  <label for="unit_code" class="col-sm-4">Satuan</label>
                  <input type="text" name="unit_code" id="unit_code" value="-" class="form-control" readonly>
                </div>
                <div class="col-sm-6 input-group">
                  <label for="item_stock" class="col-sm-4">Stock awal</label>
                  <input type="text" name="item_stock" id="item_stock" value="-" class="form-control" readonly>
                </div>
              </div>
            </div>

            <div class="form-group input-group">
              <label for="stock_harbel" class="col-sm-2 col-form-label">Harga Pembelian</label>
              <input type="text" class="form-control" id="stock_harbel" name="stock_harbel" value="">
            </div>


            <div class="form-group input-group">
              <label for="stock_qty" class="col-sm-2 col-form-label">Qty</label>
              <input type="text" class="form-control" id="stock_qty" name="stock_qty" value="">
            </div>

            <div class="form-group input-group">
              <label for="stock_detail" class="col-sm-2 col-form-label">Detail</label>
              <input type="text" class="form-control" id="stock_detail" name="stock_detail" value="">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success btn-flat mb-6 mx-2" name="in_add"><i class="fas fa-save mr-2"> </i>Save</button>
              <button type="reset" class="btn btn-flat mb-6 mx-2"><i class="fas fa-undo-alt mr-2"> </i>Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-borrdered table-sm" id="table2">
          <thead>
            <td>Barcode</td>
            <td>Home</td>
            <td>Unit</td>
            <td>Price</td>
            <td>Stock</td>
            <td>Actions</td>
          </thead>
          <tbody>
            <!-- lempar data dari controler stock-->
            <?php foreach ($item as $i => $data) {; ?>
              <tr>
                <td><?= $data->item_barcode ?> </td>
                <td><?= $data->item_name ?> </td>
                <td><?= $data->unit_code ?> </td>
                <td><?= indo_currency($data->item_harbel) ?> </td>
                <td><?= $data->item_stock ?> </td>
                <td>
                  <button class="btn btn-flat btn-info btn-sm" id="select"
                    data-id= "<?=$data->item_id;?>"
                    data-barcode= "<?=$data->item_barcode;?>"
                    data-name= "<?=$data->item_name;?>"
                    data-unit= "<?=$data->unit_code;?>"
                    data-stock= "<?=$data->item_stock;?>"
                    data-harbel= "<?=$data->item_harbel;?>"
                    >
                    Select
                  </button>

                </td>
              </tr>
            <?php }; ?>
          </tbody>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('click','#select',function() {
      var item_id = $(this).data('id')
      var item_barcode = $(this).data('barcode');
      var item_name = $(this).data('name');
      var unit_code = $(this).data('unit');
      var item_stock = $(this).data('stock');
      var item_harbel = $(this).data('harbel');
      $('#item_id').val(item_id);
      $('#item_barcode').val(item_barcode);
      $('#item_name').val(item_name);
      $('#unit_code').val(unit_code);
      $('#item_stock').val(item_stock);
      $('#stock_harbel').val(item_harbel);
      $('#modal-item').modal('hide');
    })
  })
</script>