<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('pesan'); ?>
          <h5>Level : <?= $level['level']; ?></h5>
          <table class="table table-hover" id="tabeldata">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">MENU</th>
              <th scope="col">AKSES</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($menu as $m) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $m['menu']; ?></td>
              <td><div class="form-check">
                <input class="form-check-input" type="checkbox" <?= cek_akses($level['id_level'], $m['id_menu']); ?> data-level="<?= $level['id_level']; ?>" data-menu="<?= $m['id_menu']; ?>">
              </div>
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