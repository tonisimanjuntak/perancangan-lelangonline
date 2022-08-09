<!doctype html>
<html lang="en">
  <head>
    <title>FIF GROUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/logo-fif.png') ?>" />

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/login-form-14/') ?>css/style.css">

  </head>
  <body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10" style="margin-top: -50px;">
          <div class="wrap d-md-flex">
            <div class="img" style="background-image: url(images/fif-group.jpg);">
            </div>
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">Selamat Datang</h3>
                </div>
              </div>
              <form action="<?php echo site_url('login/ceklogin') ?>" class="signin-form" method="post">
                <div class="form-group mb-3">
                  <label class="label" for="name">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded bg-primary">Masuk</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50 text-left">
                    <label class="checkbox-wrap checkbox-primary mb-0">Ingat Saya
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                    </label>
                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="<?php echo base_url('assets/login-form-14/') ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/login-form-14/') ?>js/popper.js"></script>
  <script src="<?php echo base_url('assets/login-form-14/') ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/login-form-14/') ?>js/main.js"></script>

  <!-- CK Editor -->
  <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert.js"></script>

  <?php 
      $pesan = $this->session->flashdata("pesan");
      if (!empty($pesan)) {
        echo $pesan;
      }
    ?>

  </body>
</html>

