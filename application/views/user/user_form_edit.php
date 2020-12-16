<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small>Edit User</small> </h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-right">
              <li>
                <a href="#"><i class="fas   fa-users mr-2"></i></a>
              </li>
              <li class="active mr-2">Users</li>
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

              <a href="<?= site_url('user'); ?>" class="btn btn-primary btn-flat btn-px-2 mb-4 float-right"><i class="fas   fa-undo-alt mr-2"></i>Back</a>

              <form action="" method="post">              

              <div class="form-group">
                  <label for="name" class="col-sm col-form-label">Nama Lengkap*</label>
                  <input type="text" class="form-control <?=form_error('name') ? 'is-invalid' : null; ?>" id="name" name="name" value="<?=$this->input->post('name') ?? $row->name ;?>">
                  <span id="name" class="<?=form_error('name') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('name'); ?>
                  </span>
                </div>
                
                
                <div class="form-group">
                  <label for="phone" class="col-sm col-form-label">Telephone*</label>
                  <input type="text" class="form-control <?=form_error('phone') ? 'is-invalid' : null; ?>" id="phone" name="phone" value="<?=$this->input->post('phone') ?? $row->phone ;?>">
                  <span id="phone" class="<?=form_error('phone') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('phone'); ?>
                  </span>
                </div>

                <div class="form-group">
                  <label for="address" class="col-sm col-form-label">Alamat</label>
                  <textarea name="address" id="address" class="form-control" name="address"><?=$this->input->post('address') ?? $row->address ;?></textarea>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm col-form-label">Username*</label>
                  <input type="hidden" value="<?=$row->user_id;?>" name="user_id">
                  <input type="text" class="form-control <?=form_error('username') ? 'is-invalid' : null; ?>" id="username" name="username" value="<?=$this->input->post('username') ?? $row->username ;?>" >
                  <span id="username" class="<?=form_error('username') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('username'); ?>
                  </span>
                  
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm col-form-label">Password</label> <small>( biarkan kosong apabila tidak merubah password</small>
                  <input type="password" class="form-control <?=form_error('password') ? 'is-invalid' : null; ?>" id="password" name="password" value="<?=$this->input->post('password');?>">             
                  <span id="password" class="<?=form_error('password') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('password'); ?>
                  </span>     
                </div>

                <div class="form-group">
                  <label for="passconf" class="col-sm col-form-label">Konfirmasi Password</label> <small>( biarkan kosong apabila tidak merubah password</small>
                  <input type="password" class="form-control <?=form_error('passconf') ? 'is-invalid' : null; ?>" id="passconf" name="passconf" value="<?=$this->input->post('passconf');?>">
                  <span id="passconf" class="<?=form_error('passconf') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('passconf'); ?>
                  </span> 
                </div>


                <div class="form-group">
                  <label for="level">Level</label>
                  <select name="level" class="form-control <?=form_error('level') ? 'is-invalid' : null; ?>" id="level">
                    <?php $level = $this->input->post('level') ?? $row->level ;?>
                    <option value="1" <?=$level == 1 ? "selected" : null ;?>>Admin</option>
                    <option value="2" <?=$level == 2 ? "selected" : null ;?>>Kasir</option>
                  </select>
                  <span id="level" class="<?=form_error('level') ? 'error invalid-feedback' : null; ?> ml-2">
                    <?=form_error('level'); ?>
                  </span>
                </div>

                <div>
                  <p><small>* wajib untuk diisi</small></p>
                </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat mb-6 mx-2"><i class="fas fa-paper-plane mr-2"> </i>Edit User</button>
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