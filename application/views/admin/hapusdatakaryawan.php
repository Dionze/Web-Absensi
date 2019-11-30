
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 
	<div class="row">
    <div class="col-lg-8">
    <?= $this->session->flashdata('pesan'); ?>
		 <form>
          <table class="table table-hover" id="tabeldata">
          <thead>
            <tr>
              <th scope="col">AKSI</th>
              <th scope="col">NIK</th>
              <th scope="col">NAMA</th>
          </thead>
          <tbody>
            <?php foreach ($karyawan as $k) { ?>
              <tr>
              <td>
              <a onclick="return confirm('Anda yakin ingin menghapus data karyawan dari NIK <?= $k->nik; ?> ?');" href="<?= base_url(). 'admin/hapusdata/' . $k->nik; ?>" class="badge badge-danger">HAPUS</a>
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

