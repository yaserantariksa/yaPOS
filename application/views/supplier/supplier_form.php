<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small><?=ucfirst($page) ;?> Supplier</small> </h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-right">
              <li>
                <a href="#"><i class="fas   fa-truck
                 mr-2"></i></a>
              </li>
              <li class="active mr-2">Supplier</li>
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

              <a href="<?= site_url('supplier'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

              <form action="<?=site_url('supplier/proses') ?> " method="post">           

                <div class="form-group">
                  <label for="sup_name" class="col-sm col-form-label">Nama Supplier*</label>
                  <input type="hidden" name="supplier_id" value="<?=$row->supplier_id ;?>">
                  <input type="text" class="form-control <?=form_error('sup_name') ? 'is-invalid' : null; ?>" id="sup_name" name="sup_name" value="<?=$row->sup_name ; ?>" required>
                  <span id="sup_name" class="<?=form_error('sup_name') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('sup_name'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="sup_phone" class="col-sm col-form-label">Telepon Supplier*</label>
                  <input type="text" class="form-control <?=form_error('sup_phone') ? 'is-invalid' : null; ?>" id="sup_phone" name="sup_phone" value="<?=$row->sup_phone ; ?>" required>
                  <span id="sup_phone" class="<?=form_error('sup_phone') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('sup_phone'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="sup_address" class="col-sm col-form-label">Alamat Supplier*</label>
                  <textarea type="text" class="form-control <?=form_error('sup_address') ? 'is-invalid' : null; ?>" id="sup_address" name="sup_address" required ><?=$row->sup_address ; ?></textarea>
                  <span id="sup_address" class="<?=form_error('sup_address') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('sup_address'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="sup_desc" class="col-sm col-form-label">Deskripsi**</label>
                  <input type="text" class="form-control <?=form_error('sup_desc') ? 'is-invalid' : null; ?>" id="sup_desc" name="sup_desc" value="<?=$row->sup_desc ; ?>">
                  <span id="sup_desc" class="<?=form_error('sup_desc') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('sup_desc'); ?>
                  </span>                  
                </div>

                <div>
                    <p><small>* wajib di isi</small></p>
                    <p><small>** deskripsi dapat di isi dengan toko tersebut menjual apa, atau keterangan lainnya</small></p>
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