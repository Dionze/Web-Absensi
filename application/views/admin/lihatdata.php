
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?= form_open("admin/cari4"); ?>
  <div class="row">
  <div class="col-md-6">
      <label>Departemen</label>
      <select type="select" name="yangdicari" class="form-control">
        <option selected>--Pilih--</option>
        <option>Divisi Produksi 1</option>
        <option>Divisi Produksi 2</option>
        <option>Quality Control 1</option>
        <option>Quality Control 2</option>
        <option>Raw Materialing Production</option>
      </select>
  </div>
  <div class="col-md-6">
      <label>Jabatan</label>
      <select type="select" name="yangdicari2" class="form-control">
        <option selected>--Pilih--</option>
        <option>Supervisor</option>
        <option>Foreman</option>
        <option>Operator</option>
        <option>Helper</option>
      </select>
      <br>
  </div>
  <div class="col-md-4 offset-md-8">
            <input type="submit" name="cari" id="cari" value="Sortir Data" class="btn btn-outline-primary form-control"/>
          </div>
    </div>
  <?= form_close(); ?> 
	<div class="row">
    <div class="col-sm-12">
    <?= $this->session->flashdata('pesan'); ?>
		 <form>
      <div class="table-responsive">
          <table class="table table-hover" id="tabeldata">
          <thead>
            <tr>
              <th scope="col">NIK</th>
              <th scope="col">NAMA</th>
              <th scope="col">JENIS KELAMIN</th>
              <th scope="col">TANGGAL LAHIL</th>
              <th scope="col">DEPARTEMEN</th>
              <th scope="col">JABATAN</th>
              <th scope="col">ALAMAT</th>
              <th scope="col">NO TELEPON</th>
              <th scope="col">TANGGAL MASUK</th>
              <th scope="col">STATUS</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($karyawan as $k) { ?>
              <tr>
              <td><?= $k->nik; ?></td> 
              <td><?= $k->nama; ?></td>
              <td><?= $k->jenis_kelamin; ?></td>
              <td><?= $k->tgl_lahir; ?></td>
              <td><?= $k->departemen; ?></td>
              <td><?= $k->jabatan; ?></td>
              <td><?= $k->alamat; ?></td>
              <td><?= $k->no_telp; ?></td>
              <td><?= $k->tgl_masuk; ?></td>
              <td><?= $k->status; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
		 </form>
		</div>
  </div>
</div>


