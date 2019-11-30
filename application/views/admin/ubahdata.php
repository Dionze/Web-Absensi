<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
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
          </thead>
          <tbody>
            <?php foreach ($karyawan as $k) { ?>
              <tr>
              <td>
              <a href="<?= base_url(). 'admin/ubahkaryawan/' . $k->nik; ?>" class="badge badge-primary">Edit</a>
              </td>
              <td><?= $k->nik; ?></td>
              <td><?= $k->nama; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
		 </form>
		</div>
  </div>
  </div>
</div>

