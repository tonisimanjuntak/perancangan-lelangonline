<!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0"
    >
      <a href="<?php echo site_url() ?>" class="navbar-brand d-flex align-items-center">
        <h4 class="m-0">
          <img src="<?php echo base_url('admin/images/logo-fif.png') ?>" alt="" style="width: 50px;"> FIF GROUP
        </h4>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-3 py-lg-0">
          <a href="<?php echo site_url() ?>" class="nav-item nav-link <?php echo ($menu=='home') ? 'active' : '' ?>">Home</a>
          <a href="<?php echo site_url('paketlelang/tampil') ?>" class="nav-item nav-link <?php echo ($menu=='paketlelang') ? 'active' : '' ?>">Paket Lelang</a>
          <div class="nav-item dropdown <?php echo ($menu=='account') ? 'active' : '' ?>">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              >Akun Saya</a
            >
            <div class="dropdown-menu bg-light m-0">
              <a href="<?php echo site_url('account/datasaya') ?>" class="dropdown-item">Data Saya</a>
              <a href="<?php echo site_url('account/gantipassword') ?>" class="dropdown-item">Ganti Password</a>
              <a href="<?php echo site_url('account/riwayatbid') ?>" class="dropdown-item">Riwayat Bid</a>
              <a href="<?php echo site_url('pembayaran/riwayat') ?>" class="dropdown-item">Riwayat Pembayaran</a>
            </div>
          </div>
          <a href="<?php echo site_url('login/keluar') ?>" class="nav-item nav-link">Logout</a>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->