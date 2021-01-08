<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1> <small><?= ucfirst($page); ?> Item</small> </h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-right">
          <li>
            <a href="#"><i class="fas   fa-box
                 mr-2"></i></a>
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

    <div class="box-body">
      <div class="row justify-content-center">
        <div class="col-sm-10">

          <a href="<?= site_url('item'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

          <?php echo form_open_multipart('item/proses'); ?>

          <div class="form-group">
            <label for="item_barcode" class="col-sm col-form-label">Kode Barcode *</label>
            <input type="hidden" name="item_id" value="<?= $row->item_id; ?>">
            <input type="text" class="form-control <?= form_error('item_barcode') ? 'is-invalid' : null; ?>" id="item_barcode" name="item_barcode" value="<?= $row->item_barcode; ?>" required>
            <span id="item_barcode" class="<?= form_error('item_barcode') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('item_barcode'); ?>
            </span>
          </div>

          <div class="form-group">
            <label for="item_name" class="col-sm col-form-label">Nama Item *</label>
            <input type="text" class="form-control <?= form_error('item_name') ? 'is-invalid' : null; ?>" id="item_name" name="item_name" value="<?= $row->item_name; ?>" required>
            <span id="item_name" class="<?= form_error('item_name') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('item_name'); ?>
            </span>
          </div>

          <div class="form-group">
            <label for="product_cat_id">Kategori Produk *</label>
            <select name="product_cat_id" class="form-control <?= form_error('product_cat_id') ? 'is-invalid' : null; ?>" id="product_cat_id">
              <option value="">-Pilih-</option>
              <?php foreach ($category->result() as $key => $data) {; ?>
                <option value="<?= $data->product_cat_id; ?>" <?= $data->product_cat_id == $row->product_cat_id ? "selected" : null; ?>><?= $data->product_cat_code; ?></option>
              <?php }; ?>
            </select>
            <span id="product_cat_id" class="<?= form_error('product_cat_id') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('product_cat_id'); ?>
            </span>
          </div>

          <div class="form-group">
            <label for="unit_id">Satuan *</label>
            <?php echo form_dropdown('unit_id', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']); ?>
            <span id="unit_id" class="<?= form_error('unit_id') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('unit_id'); ?>
            </span>
          </div>

          <div class="form-group">
            <label for="item_harbel" class="col-sm col-form-label">Harga Beli *</label>
            <input type="number" class="form-control <?= form_error('item_harbel') ? 'is-invalid' : null; ?>" id="item_harbel" name="item_harbel" value="<?= $row->item_harbel; ?>" required>
            <span id="item_harbel" class="<?= form_error('item_harbel') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('item_harbel'); ?>
            </span>
          </div>

          <div class="form-group">
            <label for="item_harjual1" class="col-sm col-form-label">Harga Jual Eceran *</label>
            <input type="number" class="form-control <?= form_error('item_harjual1') ? 'is-invalid' : null; ?>" id="item_harjual1" name="item_harjual1" value="<?= $row->item_harjual1; ?>" required>
            <span id="item_harjual1" class="<?= form_error('item_harjual1') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('item_harjual1'); ?>
            </span>
          </div>

          <div class="form-group">
            <label for="item_harjual2" class="col-sm col-form-label">Harga Jual Reseller *</label>
            <input type="number" class="form-control <?= form_error('item_harjual2') ? 'is-invalid' : null; ?>" id="item_harjual2" name="item_harjual2" value="<?= $row->item_harjual2; ?>" required>
            <span id="item_harjual2" class="<?= form_error('item_harjual2') ? 'error invalid-feedback' : null; ?> ml-2">
              <?= form_error('item_harjual2'); ?>
            </span>
          </div>


          <div class="form-group">
            <div>
              <?php if ($page == 'edit') {
                if ($row->item_img != null) {; ?>
                  <label for="item_img" class="mr-4"> Ubah Gambar : </label>
                  <img src="<?= base_url('/upload/item_img/'.$row->item_img); ?>" alt="" style="width: 100px; border: 2px solid #555; padding: 10px 10px 10px 10px;" class="mb-3">
                <?php } else { ?>
                  <label for="item_img" class="mr-4"> Upload Gambar : </label>
              <?php }
              }; ?>
            </div>
            <input type="file" name="item_img" id="item_img">
          </div>



          <div class="form-group">
            <button type="submit" class="btn btn-success btn-flat mb-6" name="<?= $page; ?>"><i class="fas fa-save mr-2"> </i>Save</button>
          </div>

          <?php echo form_close(); ?>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>