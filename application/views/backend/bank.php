<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Data Rekening</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary pull-right" >
          Tambah
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Bank</th>
                  <th>Nama Bank</th>
                  <th>NomRek</th>
                  <th>Atas Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($bank as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['kd_bank']; ?></td>
                  <td><?php echo $row['nama_bank']; ?></td>
                  <td><?php echo $row['nomrek_bank']; ?></td>
                  <td><?php echo $row['nasabah_bank']; ?></td>
                  <td align="center">
                    <a href="" data-toggle="modal" data-target="#edit<?=$row['kd_bank'] ?>" class="btn btn btn-success">Edit</a></a>
                    <a href="<?= base_url('backend/bank/hapus/').$row['kd_bank'] ?>" onclick="return confirm('Kamu akan Mengahapus Data ini?');" class="btn btn btn-danger">Hapus</a></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tujuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>backend/bank/tambah" method="post"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="" class="">Atas Nama</label>
              <input type="text" class="form-control" name="nasabah_bank" placeholder="Atas Nama">
            </div>
            <div class="form-group">
              <label for="" class="">Nama Bank</label>
              <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank">
            </div>
            <div class="form-group">
              <label for="" class="">Nomer Rekening</label>
              <input type="text" class="form-control" name="nomrek_bank" placeholder="Nomer Rekening">
            </div>
            <div class="form-group">
              <label for="" class="">Photo Bank</label>
              <input name="userfile" type="file"  class="form-control">
            </div>
            <div class="mt-4">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<?php foreach ($bank as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['kd_bank'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>backend/bank/edit" method="post"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="platbus" class="">Atas Nama</label>
              <input type="text" name="id" value="<?= $value['kd_bank']?>" hidden>
              <input type="text" class="form-control" name="nasabah_bank" value="<?= $value['nasabah_bank'] ?>">
            </div>
            <div class="form-group">
              <label for="platbus" class="">Nama Bank</label>
              <input type="text" class="form-control" name="nama_bank" value="<?= $value['nama_bank'] ?>">
            </div>
            <div class="form-group">
              <label for="platbus" class="">Nomer Rekening</label>
              <input type="text" class="form-control" name="nomrek_bank" value="<?= $value['nomrek_bank'] ?>">
            </div>
            <div class="form-group">
              <label for="platbus" class="">Photo Bank</label>
              <input name="userfile" type="file" class="form-control" value="<?= $value['photo_bank'] ?>">
              <img class="w-100" src="<?= base_url('assets/frontend/img/bank/').$value['photo_bank'] ?>" alt="img" width="70" >
            </div>
            <div class="mt-4">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>