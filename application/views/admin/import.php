<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="col-sm-3">
  <?= $this->session->flashdata('pesan'); ?>
  </div>
  <div class="row">
    <form action="prosesimport" method="post" enctype="multipart/form-data">
    <div class="col-sm-12">
      <div class="custom-file">
      <input type="file" class="custom-file-input" id="file" name="file" required accept=".xls, .xlsx">
      <label class="custom-file-label" for="file">File Excel</label>
    </div>
    </div>
    <p>
    <div class="col-sm-12">
    <div class="form-group">
      <button type="submit" name="import" class="btn btn-success">Import Absen</button>
      </div>
    </div>
    </form>
    </div>
  </div>
</div>

      