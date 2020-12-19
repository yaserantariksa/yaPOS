<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small><?=ucfirst($page) ;?> Pelanggan</small> </h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-right">
              <li>
                <a href="#"><i class="fas   fa-truck
                 mr-2"></i></a>
              </li>
              <li class="active mr-2">Pelanggan</li>
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

              <a href="<?= site_url('customer'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-chevron-circle-left mr-2"></i>Back</a>

              <form action="<?=site_url('customer/proses') ?> " method="post">           

                <div class="form-group">
                  <label for="cust_name" class="col-sm col-form-label">Nama Pelanggan*</label>
                  <input type="hidden" name="cust_id" value="<?=$row->cust_id ;?>">
                  <input type="text" class="form-control <?=form_error('cust_name') ? 'is-invalid' : null; ?>" id="cust_name" name="cust_name" value="<?=$row->cust_name ; ?>" required>
                  <span id="cust_name" class="<?=form_error('cust_name') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_name'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="cust_phone" class="col-sm col-form-label">Telepon*</label>
                  <input type="text" class="form-control <?=form_error('cust_phone') ? 'is-invalid' : null; ?>" id="cust_phone" name="cust_phone" value="<?=$row->cust_phone ; ?>" required>
                  <span id="cust_phone" class="<?=form_error('cust_phone') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_phone'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="cust_email" class="col-sm col-form-label">Email</label>
                  <input type="text" class="form-control <?=form_error('cust_email') ? 'is-invalid' : null; ?>" id="cust_email" name="cust_email" value="<?=$row->cust_email ; ?>">
                  <span id="cust_email" class="<?=form_error('cust_email') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_email'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="cust_ktp" class="col-sm col-form-label">No KTP</label>
                  <input type="text" class="form-control <?=form_error('cust_ktp') ? 'is-invalid' : null; ?>" id="cust_ktp" name="cust_ktp" value="<?=$row->cust_ktp ; ?>">
                  <span id="cust_ktp" class="<?=form_error('cust_ktp') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_ktp'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="cust_birthday" class="col-sm col-form-label">Tanggal Lahir</label>
                  <input type="text" class="form-control <?=form_error('cust_birthday') ? 'is-invalid' : null; ?>" id="cust_birthday" name="cust_birthday" value="<?=$row->cust_birthday ; ?>">
                  <span id="cust_birthday" class="<?=form_error('cust_birthday') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_birthday'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="cust_address" class="col-sm col-form-label">Alamat</label>
                  <textarea type="text" class="form-control <?=form_error('cust_address') ? 'is-invalid' : null; ?>" id="cust_address" name="cust_address" ><?=$row->cust_address ; ?></textarea>
                  <span id="cust_address" class="<?=form_error('cust_address') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_address'); ?>
                  </span>                  
                </div>

                <div class="form-group">
                  <label for="cust_category">Kategori Pelanggan*</label>
                  <select name="cust_category" class="form-control <?=form_error('cust_category') ? 'is-invalid' : null; ?>" id="cust_category" required>
                    <?php $category = $this->input->post('cust_category') ?? $row->cust_category ;?>
                    <option value="">-Pilih-</option>
                    <option value="UMUM" <?=$category == "UMUM" ? "selected" : null ;?>>UMUM</option>
                    <option value="RESELLER" <?=$category == "RESELLER" ? "selected" : null ;?>>RESELLER</option>
                    <option value="MEMBER" <?=$category == "MEMBER" ? "selected" : null ;?>>MEMBER</option>
                  </select>
                  <span id="cust_category" class="<?=form_error('cust_category') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('cust_category'); ?>
                  </span>
                </div>

                <div class="form-group">
                  <label for="cust_membercard" class="col-sm col-form-label">No Kartu Member**</label>
                  <input type="text" class="form-control <?=form_error('cust_membercard') ? 'is-invalid' : null; ?>" id="cust_membercard" name="cust_membercard" value="<?=$row->cust_membercard ; ?>">
                  <span id="cust_membercard" class="<?=form_error('cust_membercard') ? 'error invalid-feedback' : null; ?> ml-2">
                  <?=form_error('cust_membercard'); ?>
                  </span>                  
                </div>

                <div>
                    <p><small>* wajib di isi</small></p>
                    <p><small>** hanya di isi apabila Kategori Pelanggan : MEMBER</small></p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat mb-6 mx-2" name="<?=$page ;?>"><i class="fas fa-save mr-2"> </i>Simpan</button>
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