
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
      <div class="form-group col-md-2">
  <?= form_open("admin/cari"); ?>
      <input type="date" name="yangdicari" class="form-control">
      <input type="submit" name="cari" value="Tanggal" class="btn btn-outline-primary">
  <?= form_close(); ?>
  </div> 
</div>
	<div class="row">
    <div class="col-lg-8">
    <?= $this->session->flashdata('pesan'); ?>
		 <form>
          <table class="table table-hover" id="tabeldata">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">NIK</th>
              <th scope="col">NAMA</th>
              <th scope="col">TANGGAL</th>
          </thead>
          <tbody>
            <?php foreach ($absensi as $a) { ?>
              <tr>
              <td>
              <a href="<?= base_url(). 'admin/ubah/' . $a->id_absensi; ?>" class="badge badge-primary">Edit</a>
              </td>
              <td><?= $a->nik; ?></td>
              <td><?= $a->nama; ?></td>
              <td><?= $a->tanggal; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
		 </form>
		</div>
  </div>
  </div>
</div>

