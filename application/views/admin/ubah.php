<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-10">
      <?= form_open('admin/prosesubah'); ?>
        <?php foreach ($absensi as $a){ ?>
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nik">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" value="<?= $a->nik; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="nama">NAMA</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $a->nama; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="tanggal">TANGGAL</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $a->tanggal; ?>">
    </div>
   <div class="form-group col-md-6">
      <label for="shift">SHIFT</label>
      <select type="select" id="shift" class="form-control" name="shift">
        <option selected><?= $a->shift; ?></option>
        <option>Non Shift</option>
        <option>Shift 1</option>
        <option>Shift 2</option>
        <option>Shift 3</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="jam_masuk">JAM MASUK</label>
      <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?= $a->jam_masuk; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="jam_keluar">JAM KELUAR</label>
      <input type="time" class="form-control" id="jam_keluar" value="<?= $a->jam_keluar; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="ketepatan">KETEPATAN</label>
      <select type="select" id="ketepatan" class="form-control" name="ketepatan">
        <option selected><?= $a->ketepatan; ?></option>
        <option>Tepat Waktu</option>
        <option>Terlambat</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="pulang_awal">PULANG AWAL</label>
      <input type="time" class="form-control" id="pulang_awal" name="pulang_awal" value="<?= $a->pulang_awal; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="lembur">LEMBUR</label>
      <input type="time" class="form-control" id="lembur" name="lembur" value="<?= $a->lembur; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="keterangan">KETERANGAN</label>
      <select type="text" id="keterangan" class="form-control" name="keterangan">
        <option selected><?= $a->keterangan; ?></option>
        <option>Masuk</option>
        <option>Cuti</option>
        <option>Sakit</option>
        <option>Izin</option>
        <option>Tanpa Keterangan</option>
      </select>
    </div>
    <div class="form-group col-md-3">
        <button onclick="return confirm('Anda yakin ingin mengubah data absensi dari NIK <?= $a->nik; ?> ? ')" type="submit" class="btn btn-primary">UBAH</button>
      </div>
    <?php } ?>
    <?= form_close(); ?>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
      