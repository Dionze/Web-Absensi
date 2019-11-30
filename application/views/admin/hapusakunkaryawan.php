
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
            <?php foreach ($akunkaryawan as $ak) { ?>
              <tr>
              <td>
              <a onclick="return confirm('Anda yakin ingin menghapus data karyawan dari NIK <?= $ak->nik; ?> ?');" href="<?= base_url(). 'admin/hapusakun/' . $ak->nik; ?>" class="badge badge-danger">HAPUS</a>
              </td>
              <td><?= $ak->nik; ?></td>
              <td><?= $ak->nama; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
		 </form>
		</div>
  </div>
  </div>
</div>

