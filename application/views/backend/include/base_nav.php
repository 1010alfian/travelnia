  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('backend/home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bus"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> WB TRANS TRAVEL</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $title == "Home" ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard </span>
          </a>
        </li>
        <li class="nav-item <?= $title == "List Order" ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/order">
            <i class="fas fa-list-alt"></i>
            <span>Pemesanan</span>
          </a>
        </li>  
        <li class="nav-item <?= $title == "Jadwal & Harga" ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/jadwal">
            <i class="fas fa fa-clipboard-list"></i>
            <span>Jadwal & Harga</span>
          </a>
        </li>
        <li class="nav-item <?= $this->uri->segment(2) == "rute"
         ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/rute">
            <i class="fas fa fa-compass"></i>
            <span>Tujuan</span>
          </a>
        </li>
        <li class="nav-item <?= $title == "List Bus" ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/bus">
            <i class="fas fa fa-bus"></i>
            <span>Bus</span>
          </a>
        </li>

        <!-- Navbar Owner -->
        <?php if ($this->session->userdata('level') == '1') { ?>
        <li class="nav-item <?= $title == "Data Rekening" ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/bank">
            <i class="fas fa fa-link"></i>
            <span>Data Rekening</span>
          </a>
        </li>
        <li class="nav-item <?= $title == "Laporan" ? "active" : ""?>">
          <a class="nav-link" href="<?php echo base_url() ?>backend/laporan">
            <i class="fa fa fa-file"></i>
            <span>Laporan</span>
          </a>
        </li>
             <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item <?= $title == "List Pelanggan" ? "active" : ""?>">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-users"></i>
              <span>Manajemen User</span>
            </a>
            <div id="collapseTwo" class="collapse <?= $title == "List Pelanggan"||$title == "List Admin" ? "show" : ""?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $title == "List Pelanggan" ? "active" : ""?>" href="<?php echo base_url('backend/pelanggan') ?>">List Pelanggan</a>
                <a class="collapse-item <?= $title == "List Admin" ? "active" : ""?>" href="<?php echo base_url() ?>backend/admin">List Admin</a>
              </div>
            </div>
          </li>
        <?php }else{ } ?>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama_admin'); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url($this->session->userdata('img_admin')) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  About Apps
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
