<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-6">
        	<?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>');  ?>
        	<?= $this->session->flashdata('pesan'); ?>
        	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahMenuModal">Tambah Menu Baru</a>
        	<table class="table table-hover" id="tabeldata">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">MENU</th>
				      <th scope="col">ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($menu as $m) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $m['menu']; ?></td>
				      <td>
				      	<a href="" class="badge badge-primary">Edit</a>
				      	<a href="" class="badge badge-danger">Hapus</a>
				      </td>				      
				    </tr>
				    <?php $i++; ?>
				    <?php endforeach; ?>
				  </tbody>
				</table>
        	</div>
        </div>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahMenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahMenuModal">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php base_url('menu') ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
		    <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

