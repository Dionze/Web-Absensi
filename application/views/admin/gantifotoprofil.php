
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 
	<div class="row">
		<div class="col-lg-8">
			<?= form_open_multipart('admin/editprofil'); ?>
			<div class="form-group row">
			    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nik" name="nik" value="<?= $akun['nik']; ?>" readonly>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nama" name="nama" value="<?= $akun['nama']; ?>">
			      <?= form_error('nama',' <div class="text-danger pl-3">','</div>'); ?>
			    </div>
			  </div>
			  <div class="form-group row">
			  	<div class="col-sm-2">Gambar Profil</div>
			  	<div class="col-sm-10">
			  		<div class="row">
			  			<div class="col-sm-3">
			  				<img src="<?= base_url('assets/img/profile/') . $akun['image']; ?>" class="img-thumbnail">
			  			</div>
			  			<div class="col-sm-9">
			  				<div class="custom-file">
							  <input type="file" class="custom-file-input" id="image" name="image">
							  <label class="custom-file-label" for="image">Pilih File</label>
							</div>
			  			</div>
			  		</div>
			  	</div>
			  </div>
			  <div class="form-group row justify-content-end">
			  	<div class="col-sm-10">
			  		<button type="submit" class="btn btn-primary">Ubah</button>
			  	</div>
			  </div>
			</form>
		</div>
	</div>
</div>

</div>