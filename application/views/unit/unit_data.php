<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1> <small>Data Unit Satuan Barang</small> </h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-right">
              <li>
                <a href="#"><i class="fas   fa-box mr-2"></i></a>
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
        <div class="row">

          <div class="col mb-2">
                <a href="<?=site_url('unit/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fas   fa-plus mr-2"></i>Tambah Unit Satuan</a>
          </div>
        </div>
            <div class="box">
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Kode Unit</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($row->result() as $key => $data ) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ; ?></td>
                                <td><?= $data->unit_code ; ?></td>
                                <td><?= $data->unit_name ; ?></td>
                                <td><?= $data->unit_desc ; ?></td>
                                <td class="text-center">
                                <form action="<?=site_url('unit/del');?>" method="POST">
                                
                                    <input type="hidden" value="<?=$data->unit_id;?>" name="unit_id">

                                    <a href="<?=site_url('unit/edit/'.$data->unit_id);?>" class="btn btn-warning btn-flat btn-sm px-3 mr-2 my-1"><i class="fas fa-pen mr-2"> </i>Edit</a>
                                      
                                    <button onclick="return confirm('Apakah yakin user akan dihapus ?')" class="btn btn-danger btn-flat btn-sm mr-2 my-1"><i class="fas fa-trash-alt mr-2"> </i>Hapus</button>
                                  </form>

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