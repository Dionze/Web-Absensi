

 
  <div class="container-fluid">

  
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
      <div class="col-lg-6">
        <?= $this->session->flashdata('pesan'); ?>
      </div>
    </div>
    <div class="card mb-3 col-lg-6">
      <div class="row no-gutters">
      <div class="col-md-4">
      <img src="<?= base_url('assets/img/profile/') . $akun['image']; ?>" class="card-img">
    </div>
    <div class="col-md-8">
    <div class="card-body">
    <h5 class="card-title"><?= $akun['nama']; ?></h5>
    <p class="card-text"><?= $akun['nik']; ?></p>
    <p class="card-text"><small class="text-muted">Aktif Sejak <?= date('d F Y', $akun['tanggal_buat']); ?></small></p>
    </div>
  </div>
</div>
</div>
  </div>
 

</div>
      

     