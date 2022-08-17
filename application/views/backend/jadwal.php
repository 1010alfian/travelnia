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
      <h1 class="h3 mb-2 text-gray-800">Jadwal & Harga</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="<?php echo base_url('backend/jadwal/tambahjadwal') ?>" class="btn btn-primary pull-right" >
          Tambah Jadwal
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jadwal</th>
                  <th>Kota Asal</th>
                  <th>Kota Tujuan</th>
                  <th>Jam Berangkat</th>
                  <th>Jam Sampai</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($jadwal as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['kd_jadwal']; ?></td>
                  <td><?php echo strtoupper($row['kota_tujuan_asal']); ?></td>
                  <td><?php echo strtoupper($row['kota_tujuan_tujuan']); ?></td>
                  <td><?php echo date('H:i',strtotime($row['jam_berangkat_jadwal'])); ?></td>
                  <td><?php echo date('H:i',strtotime($row['jam_tiba_jadwal'])); ?></td>
                  <td>Rp <?php echo number_format((float)($row['harga_jadwal']),0,",","."); ?>,-</td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#edit<?=$row['kd_jadwal'] ?>" class="btn btn btn-success">Edit</a></a>
                    <a href="<?= base_url('backend/jadwal/hapus/').$row['kd_jadwal'] ?>" onclick="return confirm('Kamu akan Mengahapus Data ini?');" class="btn btn btn-danger">Hapus</a></a>
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
<!-- End of Footer -->
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>


<?php foreach ($jadwal as $key => $row) { ?>
  <div class="modal fade" id="edit<?=$row['kd_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('backend/jadwal/edit') ?>" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label class="">Asal</label>
                <select class="form-control" name="asal" required>
                  <option selected value="<?php echo $row['kd_tujuan_asal'] ?>"><?php echo strtoupper($row['kota_tujuan_asal'])." - ".$row['terminal_asal']; ?></option>
                  <?php foreach ($tujuan as $value ) {?>
                    <option value="<?php echo $value['kd_tujuan'] ?>" ><?php echo strtoupper($value['kota_tujuan'])." - ".$value['terminal_tujuan']; ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
              <label class="">Tujuan</label>
              <select class="form-control" name="tujuan" required>
                  <option selected value="<?php echo $row['kd_tujuan'] ?>"><?php echo strtoupper($row['kota_tujuan_tujuan'])." - ".$row['terminal_tujuan']; ?></option>
                <?php foreach ($tujuan as $value ) {?>
                  <option value="<?php echo $value['kd_tujuan'] ?>" ><?php echo strtoupper($value['kota_tujuan'])." - ".$value['terminal_tujuan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Jam Berangkat</label>
              <input type="time" class="form-control"  id="time" name="berangkat" required="" value="<?= $row['jam_berangkat_jadwal'] ?>">
            </div>
            <div class="form-group">
              <label  class="">Jam Tiba</label>
              <input type="time" class="form-control"  id="time" name="tiba" required="" value="<?= $row['jam_tiba_jadwal'] ?>">
            </div>
            <div class="form-group">
              <label  class="">Harga</label>
              <input type="number" class="form-control" name="harga" required="" value="<?= $row['harga_jadwal'] ?>">
              <input hidden name="kd_jadwal" value="<?= $row['kd_jadwal'] ?>">
              <?php echo form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>