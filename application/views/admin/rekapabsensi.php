<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-10">
      <?= form_open('admin/prosesrekapabsensi'); ?>
      <a href="import" class="btn btn-outline-success mb-3">Import Absen</a>
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
      <label for="tanggal">TANGGAL</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal'); ?>">
      <?= form_error('tanggal',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
      <div class="form-group col-md-6">
      <label for="shift">SHIFT</label>
      <select type="select" class="form-control" id="shift" name="shift">
        <?= form_error('shift',' <small class="text-danger pl-3">','</small>'); ?>
        <option selected>--PILIH--</option>
        <option>Non Shift</option>
        <option>Shift 1</option>
        <option>Shift 2</option>
        <option>Shift 3</option>
      </select>
    </div>
     <div class="form-group col-md-6">
      <label for="jam_masuk">JAM MASUK</label>
      <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?= set_value('jam_masuk'); ?>">
      <?= form_error('jam_masuk',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="jam_keluar">JAM KELUAR</label>
      <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?= set_value('jam_keluar'); ?>">
      <?= form_error('jam_keluar',' <small class="text-danger pl-3">','</small>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="ketepatan">KETEPATAN</label>
      <select type="select" class="form-control" id="ketepatan" name="ketepatan">
        <?= form_error('ketepatan',' <small class="text-danger pl-3">','</small>'); ?>
        <option selected>--PILIH--</option>
        <option>Tepat Waktu</option>
        <option>Terlambat</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="pulang_awal">PULANG AWAL</label>
      <input type="time" class="form-control" id="pulang_awal" name="pulang_awal" value="<?= set_value('pulang_awal'); ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="lembur">LEMBUR</label>
      <input type="time" class="form-control" id="lembur" name="lembur" value="<?= set_value('lembur'); ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="keterangan">KETERANGAN</label>
      <select type="select" class="form-control" id="keterangan" name="keterangan">
        <?= form_error('keterangan',' <small class="text-danger pl-3">','</small>'); ?>
        <option selected>--Pilih--</option>
        <option>Masuk</option>
        <option>Cuti</option>
        <option>Sakit</option>
        <option>Izin</option>
        <option>Tanpa Keterangan</option>
      </select>
    </div>
   <div class="form-group col-md-3">
      <button type="submit" class="btn btn-primary">INPUT DATA ABSENSI</button>
    </div>
    <?= form_close(); ?>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
      