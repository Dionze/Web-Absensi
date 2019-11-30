 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="far fa-calendar-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ABSENSI KARYAWAN</div>
      </a>

      <hr class="sidebar-divider">
      <?php 
          $id_level = $this->session->userdata('id_level');
          $queryMenu = "SELECT `menu`.`id_menu`,`menu`
                          FROM `menu` JOIN `menu_akses`
                            ON `menu`.`id_menu` = `menu_akses`.`id_menu`
                         WHERE `menu_akses`.`id_level` = $id_level
                      ORDER BY `menu_akses`.`id_menu` ASC";
          $menu = $this->db->query($queryMenu)->result_array();
       ?>

      <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
        <?= $m['menu'];  ?>
      </div>

      <?php 
        $menuId = $m['id_menu'];
        $querySubMenu = "SELECT *
                          FROM `submenu` JOIN `menu`
                            ON `submenu`.`id_menu` = `menu`.`id_menu`
                         WHERE `submenu`.`id_menu` = $menuId
                           AND `submenu`.`aktive` = 1";
     
      $subMenu = $this->db->query($querySubMenu)->result_array();
       ?>
       <?php foreach ($subMenu as $sm) : ?>
       <?php if ($title == $sm['judul']) : ?>
       <li class="nav-item active">
        <?php else :  ?>
          <li class="nav-item">
        <?php endif ;  ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['judul']; ?></span></a>
        </li>       
        <?php endforeach;  ?>
      <hr class="sidebar-divider mt-3">
      <?php endforeach;  ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
