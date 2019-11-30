<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-10">
      <?= form_open('admin/prosesubahkaryawan'); ?>
        <?php foreach ($karyawan as $k){ ?>
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nik">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" value="<?= $k->nik; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="nama">NAMA</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $k->nama; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="tgl_lahir">TANGGAL LAHIR</label>
      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $k->tgl_lahir; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="jenis_kelamin">JENIS KELAMIN</label>
      <select type="select" id="jenis_kelamin" class="form-control" name="jenis_kelamin">
        <option selected><?= $k->jenis_kelamin; ?></option>
        <option>Laki-laki</option>
        <option>Perempuan</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="departemen">DEPARTEMEN</label>
      <select type="select" id="departemen" class="form-control" name="departemen">
        <option selected><?= $k->departemen; ?></option>
        <option>Divisi Produksi 1</option>
        <option>Divisi Produksi 2</option>
        <option>Quality Control 1</option>
        <option>Quality Control 2</option>
        <option>Raw Materialing Production</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="jabatan">JABATAN</label>
      <select type="select" id="jabatan" class="form-control" name="jabatan">
        <option selected><?= $k->jabatan; ?></option>
        <option>Supervisor</option>
        <option>Foreman</option>
        <option>Operator</option>
        <option>Helper</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="alamat">ALAMAT</label>
      <input type="text" id="alamat" class="form-control" name="alamat" value="<?= $k->alamat ; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="no_telp">NO TELEPON</label>
      <input type="text" id="no_telp" class="form-control" name="no_telp" value="<?= $k->no_telp ; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="tgl_masuk">TANGGAL MASUK</label>
      <input type="date" id="tgl_masuk" class="form-control" name="tgl_masuk" value="<?= $k->tgl_masuk ; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="tgl_keluar">TANGGAL KELUAR</label>
      <input type="date" id="tgl_keluar" class="form-control" name="tgl_keluar" value="<?= $k->tgl_keluar ; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="status">STATUS</label>
      <select type="select" id="status" class="form-control" name="status">
        <option selected><?= $k->status; ?></option>
        <option>Karyawan Tetap</option>
        <option>Karyawan Kontrak</option>
        <option>Pensiun / Keluar</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for=""></label>
      <input type="date" id="" class="form-control" name="" hidden="">
    </div>
   <div class="form-group col-md-3">
        <button onclick="return confirm('Anda yakin ingin mengubah data dari NIK <?= $k->nik; ?> ? ')" type="submit" class="btn btn-primary">UBAH DATA KARYAWAN</button>
      </div>
    <?php } ?>
    <?= form_close(); ?>
      </form>
    </div>
    </div>
    </div>
  </div>
</div>
      