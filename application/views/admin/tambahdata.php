<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-10">
      <?= form_open('admin/prosestambahdata'); ?>
       
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nik">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>">
      <?= form_error('nik',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="nama">NAMA</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
      <?= form_error('nama',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="jenis_kelamin">JENIS KELAMIN</label>
      <select type="select" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
        <option selected>--PILIH--</option>
        <option>Laki-laki</option>
        <option>Perempuan</option>
      </select>
    </div>
   <div class="form-group col-md-6">
      <label for="tgl_lahirt">TANGGAL LAHIR</label>
      <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
      <?= form_error('tgl_lahir',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
      <div class="form-group col-md-6">
      <label for="departemen">DEPARTEMEN</label>
      <select type="select" class="form-control" id="departemen" name="departemen">
        <option selected>--PILIH--</option>
        <option>Divisi Produksi 1</option>
        <option>Divisi Produksi 2</option>
        <option>Quality Control 1</option>
        <option>Quality Control 2</option>
        <option>Raw Materialing Production</option>
      </select>
    </div>
     <div class="form-group col-md-6">
      <label for="jabatan">JABATAN</label>
      <select type="select" class="form-control" id="jabatan" name="jabatan">
        <option selected>--PILIH--</option>
        <option>Supervisor</option>
        <option>Foreman</option>
        <option>Operator</option>
        <option>Helper</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="alamat">ALAMAT</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
      <?= form_error('alamat',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="no_telp">NO TELEPON</label>
      <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp'); ?>">
      <?= form_error('no_telp',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="tgl_masuk">TANGGAL MASUK</label>
      <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= set_value('tgl_masuk'); ?>">
      <?= form_error('tgl_masuk',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="status">STATUS</label>
      <select type="select" class="form-control" id="status" name="status">
        <option selected>--PILIH--</option>
        <option>Karyawan Tetap</option>
        <option>Karyawan Kontrak</option>
        <option>Pensiun / Keluar</option>
      </select>
    </div>
   <div class="form-group col-md-3">
      <button type="submit" class="btn btn-primary">TAMBAH DATA</button>
    </div>
    <?= form_close(); ?>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
      