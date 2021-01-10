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
        <div class="col-sm-8">

          <a href="<?= site_url('stock/in'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

          <form action="<?= site_url('stock/process'); ?>" method="post">

            <div class="form-group input-group">
              <label for="stock_date" class="col-sm-3 col-form-label">Tanggal</label>
              <input type="hidden" name="stock_id" value="">
              <input type="date" class="form-control" id="stock_date" name="stock_date" value="<?= date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group input-group">
              <label for="item_barcode" class="col-sm-3 col-form-label">Barcode</label>
              <input type="hidden" name="item_id" id="item_id" value="">
              <input type="text" class="form-control" id="item_barcode" name="item_barcode" value="" required autofocus>
              <span>
                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                  <i class="fas fa-search"></i>
                </button>
              </span>
            </div>

            <div class="form-group input-group">
              <label for="item_name" class="col-sm-3 col-form-label">Nama Barang</label>
              <input type="text" class="form-control" id="item_name" name="item_name" value="" readonly>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-6 input-group">
                  <label for="unit_code" class="col-sm-3">Satuan</label>
                  <input type="text"  name="unit_code" id="unit_code" value="-" class="form-control" readonly>
                </div>
                <div class="col-sm-6 input-group">
                  <label for="item_stock" class="col-sm-3">Stock awal</label>
                  <input type="text"  name="item_stock" id="item_stock" value="-" class="form-control" readonly>
                </div>
              </div>
            </div>

            <div class="form-group input-group">
              <label for="stock_detail" class="col-sm-3 col-form-label">Detail</label>
              <input type="text" class="form-control" id="stock_detail" name="stock_detail" value="" >
            </div>

            <div class="form-group input-group">
              <label for="supplier_id" class="col-sm-3 col-form-label">Supplier</label>              
              <select class="custom-select" name="supplier_id" id="supplier_id">
                          <option>- Pilih -</option>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                        </select>
                        
            </div>

            <div class="form-group input-group">
              <label for="stock_qty" class="col-sm-3 col-form-label">Qty</label>
              <input type="text" class="form-control" id="stock_qty" name="stock_qty" value="" >
            </div>

            <div>
              <p><small>* wajib di isi</small></p>
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
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>