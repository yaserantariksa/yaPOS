<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small>Add User</small> </h1>
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
        <div class="row">            
          <div class="col mb-2">
            <a href="<?= site_url('user'); ?>" class="btn btn-primary btn-flat btn-sm"><i class="fas   fa-undo-alt mr-2"></i>Back</a>
          </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <form class="mb-6" action="" method="post">
                <div class="row mb-3">
                  <label for="username" class="col-sm-2 col-form-label">Username*</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Password*</label>

                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                </div>
                  <div class="row mb-3">
                    <label for="passwordconf" class="col-sm-2 col-form-label">Konfirmasi Password*</label>
                    <div class="col-sm-8 mt-3">
                      <input type="password" class="form-control" id="passwordconf" name="passwordconf">
                    </div>
                  </div>

                  <div class="row my-3">
                  <label for="name" class="col-sm-2 col-form-label">Nama Lengkap*</label>

                  <div class="col-sm-8 mt-3">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone" class="col-sm-2 col-form-label">Telephone*</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address" class="col-sm-2 col-form-label">Alamat</label>

                  <div class="col-sm-8">
                    <textarea name="address" id="address" class="form-control" name="address"></textarea>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Level*</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="gridRadios1" value="1">
                        <label class="form-check-label" for="gridRadios1">
                          Admin
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="gridRadios2" value="2">
                        <label class="form-check-label" for="gridRadios2">
                          Kasir
                        </label>
                      </div>                    
                    </div>
                  </fieldset>
                  
                  <div class="my-4">
                    <button type="submit" class="btn btn-primary mb-6"><i class="fas fa-paper-plane mr-2"> </i>Tambah User Baru</button>
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