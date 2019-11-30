<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('pesan'); ?>
      <form action="<?= base_url('admin/prosesbuatakun'); ?>" method="post">
        <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik">
         <?= form_error('nik',' <small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="form-group">
        <label for="nama">NAMA LENGKAP</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
         <?= form_error('nama',' <small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="form-group">
        <label for="password">PASSWORD</label>
        <input type="password" class="form-control" id="password" name="password">
         <?= form_error('password',' <small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">BUAT AKUN KARYAWAN</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
      