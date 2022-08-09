<?php  
  $level = $this->session->userdata('level');
?>
<style>
  .fif-logo{
    width: 30% !important;
    margin-left: 20px;
    padding-right: 10px;
  }
  .fif-text{
    font-size: 14px;
    font-weight: bold;
  }
</style>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <img src="<?php echo base_url('images/logo-fif.png') ?>" class="fif-logo" alt="logo" />
          <span class="fif-text">FIF GROUP</span>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="<?php echo base_url('assets/breeze-free/template/') ?>assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo $this->session->userdata('foto'); ?>" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2"><?php echo $this->session->userdata('namapengguna'); ?></span>
                <span class="font-weight-normal"><?php echo $this->session->userdata('level'); ?></span>
              </div>
              <!-- <span class="badge badge-danger text-white ml-3 rounded">3</span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url() ?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php  if ($level=='Pimpinan')  { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('pengguna') ?>">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">Data Pengguna</span>
            </a>
          </li>
          <?php } ?>

          <?php  if ($level=='Admin')  { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('bank') ?>">
              <i class="fa fa-building menu-icon"></i>
              <span class="menu-title">Bank</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('itemlelang') ?>">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Item Lelang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('pesertalelang') ?>">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Peserta Lelang</span>
            </a>
          </li>

          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">LELANG</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('paketlelang') ?>">
              <i class="fa fa-calendar menu-icon"></i>
              <span class="menu-title">Paket dan Jadwal Lelang</span>
            </a>
          </li>
          <?php } ?>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('bid') ?>">
              <i class="fa fa-check-circle menu-icon"></i>
              <span class="menu-title">Konfirmasi Pemenang</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('konfirmasipembayaran') ?>">
              <i class="fa fa-check-circle menu-icon"></i>
              <span class="menu-title">Konfirmasi Pembayaran</span>
            </a>
          </li>

          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Laporan</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('lappesertalelang') ?>">
              <i class="fa fa-print menu-icon"></i>
              <span class="menu-title">Lap. Peserta Lelang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('lappemenanglelang') ?>">
              <i class="fa fa-print menu-icon"></i>
              <span class="menu-title">Lap. Pemenang Lelang</span>
            </a>
          </li>

          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                
                <ul class="mt-4 pl-0">
                  <li><a class="nav-link" href="<?php echo site_url('login/keluar') ?>">Sign Out</a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>