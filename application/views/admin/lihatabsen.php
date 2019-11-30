
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?= form_open("admin/cari2"); ?>
  <div class="row">
  <div class="col-md-6">
      <label>Dari Tanggal</label>
      <input type="date" name="yangdicari" class="form-control" id="yangdicari">
  </div>
  <div class="col-md-6">
      <label>Sampai Tanggal</label>
      <input type="date" name="yangdicari2" class="form-control">
      <br>
  </div>

  <div class="col-md-4 offset-md-8">
            <input type="submit" name="cari" id="cari" value="Cari Berdasarkan Tanggal Periode" class="btn btn-outline-primary form-control"/>
          </div>
    </div>
  <?= form_close(); ?> 
	<div class="row">
    <?= $this->session->flashdata('pesan'); ?>
		 <form>
      <div class="col-xl-12">
          <table class="table table-hover table-responsive" id="tabeldata">
          <thead>
            <tr>
              <th scope="col">NIK</th>
              <th scope="col">NAMA</th>
              <th scope="col">TANGGAL</th>
              <th scope="col">SHIFT</th>
              <th scope="col">JAM MASUK</th>
              <th scope="col">JAM KELUAR</th>
              <th scope="col">KETEPATAN</th>
              <th scope="col">PULANG AWAL</th>
              <th scope="col">LEMBUR</th>
              <th scope="col">KETERANGAN</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($absensi as $a) { ?>
              <tr>
              <td><?= $a->nik; ?></td>
              <td><?= $a->nama; ?></td>
              <td><?= $a->tanggal; ?></td>
              <td><?= $a->shift; ?></td>
              <td><?= $a->jam_masuk; ?></td>
              <td><?= $a->jam_keluar; ?></td>
              <td><?= $a->ketepatan; ?></td>
              <td><?= $a->pulang_awal; ?></td>
              <td><?= $a->lembur; ?></td>
              <td><?= $a->keterangan; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
		 </form>
		</div>
  </div>
</div>