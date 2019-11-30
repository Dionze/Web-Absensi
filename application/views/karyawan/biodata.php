<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php foreach ($karyawan as $k) { ?>
  <div class="row">
    <div class="col-lg-10">
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nik">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" value="<?= $k->nik; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="nama">NAMA</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $k->nama; ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="alamat">ALAMAT</label>
    <input type="text" class="form-control" id="alamat" name="alamat"  value="<?= $k->alamat; ?>" readonly>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="jenis_kelamin">JENIS KELAMIN</label>
      <input type="select" class="form-control" id="jenis_kelamin" name="jenis_kelamin"  value="<?= $k->jenis_kelamin; ?>" readonly>
    </div>
   <div class="form-group col-md-6">
      <label for="tgl_lahirt">TANGGAL LAHIR</label>
      <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir"  value="<?= $k->tgl_lahir; ?>" readonly>
    </div>
      <div class="form-group col-md-6">
      <label for="departemen">DEPARTEMEN</label>
      <input type="select" class="form-control" id="departemen" name="departemen" value="<?= $k->departemen; ?>" readonly>
    </div>
     <div class="form-group col-md-6">
      <label for="jabatan">JABATAN</label>
      <input type="select" class="form-control" id="jabatan" name="jabatan"  value="<?= $k->jabatan; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="no_telp">NO TELEPON</label>
      <input type="text" class="form-control" id="no_telp" name="no_telp"  value="<?= $k->no_telp; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="tgl_masuk">TANGGAL MASUK</label>
      <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"  value="<?= $k->tgl_masuk; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="status">STATUS</label>
      <input type="select" class="form-control" id="status" name="status"  value="<?= $k->status; ?>" readonly>
    </div>
    </div>
    </div>
  </div>
</div>
</div>
<?php } ?>
