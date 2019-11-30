<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg">
          <?php if(validation_errors()) :  ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif;  ?>
        	<?= $this->session->flashdata('pesan'); ?>
        	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahsubmenuModal">Tambah Submenu Baru</a>
        	<table class="table table-hover" id="tabeldata">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">JUDUL</th>
				      <th scope="col">MENU</th>
              <th scope="col">URL</th>
              <th scope="col">ICON</th>
              <th scope="col">AKTIVE</th>
              <th scope="col">ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($submenu as $sm) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $sm['judul']; ?></td>
              <td><?= $sm['menu']; ?></td>
              <td><?= $sm['url']; ?></td>
              <td><?= $sm['icon']; ?></td>
              <td><?= $sm['aktive']; ?></td>
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
<div class="modal fade" id="tambahsubmenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahsubmenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahsubmenuModal">Tambah SubMenu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php base_url('menu/submenu') ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
		    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul SubMenu">
		  </div>
      <div class="form-group">
        <select name="id_menu" id="id_menu" class="form-control" >
          <option value="">Pilih Menu</option>
          <?php foreach ($menu as $m) :?>
          <option value="<?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon SubMenu">
      </div>
      <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="aktive" id="aktve" checked>
        <label class="form-check-label" for="aktive">
          Aktif ?
        </label>
      </div>
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