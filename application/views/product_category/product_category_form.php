<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small><?=ucfirst($page) ;?> Unit Satuan</small> </h1>
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

              <a href="<?= site_url('product_category'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

              <form action="<?=site_url('product_category/proses') ?> " method="post">           

                <div class="form-group">
                  <label for="product_cat_code" class="col-sm col-form-label">Kode Kategori*</label>
                  <input type="hidden" name="product_cat_id" value="<?=$row->product_cat_id ;?>">
                  <input type="text" class="form-control <?=form_error('product_cat_code') ? 'is-invalid' : null; ?>" id="product_cat_code" name="product_cat_code" value="<?=$row->product_cat_code ; ?>" required>
                  <span id="product_cat_code" class="<?=form_error('product_cat_code') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('product_cat_code'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="product_cat_name" class="col-sm col-form-label">Nama Kategori Barang*</label>
                  <input type="text" class="form-control <?=form_error('product_cat_name') ? 'is-invalid' : null; ?>" id="product_cat_name" name="product_cat_name" value="<?=$row->product_cat_name ; ?>" required>
                  <span id="product_cat_name" class="<?=form_error('product_cat_name') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('product_cat_name'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="product_cat_desc" class="col-sm col-form-label">Keterangan</label>
                  <input type="text" class="form-control <?=form_error('product_cat_desc') ? 'is-invalid' : null; ?>" id="product_cat_desc" name="product_cat_desc" value="<?=$row->product_cat_desc ; ?>">
                  <span id="product_cat_desc" class="<?=form_error('product_cat_desc') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('product_cat_desc'); ?>
                  </span>                  
                </div>

                <div>
                    <p><small>* wajib di isi</small></p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat mb-6 mx-2" name="<?=$page ;?>"><i class="fas fa-save mr-2"> </i>Save</button>
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