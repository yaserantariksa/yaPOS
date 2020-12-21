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

              <a href="<?= site_url('unit'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

              <form action="<?=site_url('unit/proses') ?> " method="post">           

                <div class="form-group">
                  <label for="unit_code" class="col-sm col-form-label">Kode Unit*</label>
                  <input type="hidden" name="unit_id" value="<?=$row->unit_id ;?>">
                  <input type="text" class="form-control <?=form_error('unit_code') ? 'is-invalid' : null; ?>" id="unit_code" name="unit_code" value="<?=$row->unit_code ; ?>" required>
                  <span id="unit_code" class="<?=form_error('unit_code') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('unit_code'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="unit_name" class="col-sm col-form-label">Nama Unit Satuan*</label>
                  <input type="text" class="form-control <?=form_error('unit_name') ? 'is-invalid' : null; ?>" id="unit_name" name="unit_name" value="<?=$row->unit_name ; ?>" required>
                  <span id="unit_name" class="<?=form_error('unit_name') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('unit_name'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="unit_desc" class="col-sm col-form-label">Keterangan</label>
                  <input type="text" class="form-control <?=form_error('unit_desc') ? 'is-invalid' : null; ?>" id="unit_desc" name="unit_desc" value="<?=$row->unit_desc ; ?>">
                  <span id="unit_desc" class="<?=form_error('unit_desc') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('unit_desc'); ?>
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