<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small>Users Data</small> </h1>
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
                <a href="<?= site_url('user/add'); ?>" class="btn btn-primary btn-flat btn-sm"><i class="fas   fa-user-plus mr-2"></i>New User</a>
          </div>
        </div>
            <div class="box">
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($row->result() as $key => $data ) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ; ?></td>
                                <td><?= $data->username ; ?></td>
                                <td><?= $data->name ; ?></td>
                                <td class="text-center"><?= $data->phone ; ?></td>
                                <td><?= $data->address ; ?></td>
                                <td class="text-center"><?= $data->level == 1 ? "Admin" : "Kasir"; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-flat btn-sm px-3 mr-2 my-1">Edit</a>
                                    <a href="#" class="btn btn-danger btn-flat btn-sm mr-2 my-1">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
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