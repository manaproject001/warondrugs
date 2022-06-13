
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>War on Drugs</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css')?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/jvectormap/jquery-jvectormap.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/owl-carousel-2/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/owl-carousel-2/owl.theme.default.min.css')?>">
    <!-- End plugin css for this page -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?=base_url('assets/vendors/select2/select2.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png')?>" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <?= $this->include('layout/header') ?>
        <?= $this->include('layout/sidebar') ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        
        <?= $this->include('layout/headerbody') ?>
        <!-- partial -->
        <div class="main-panel">
          
          <?= $this->renderSection('content') ?>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?= $this->include('layout/footer') ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/progressbar.js/progressbar.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/jvectormap/jquery-jvectormap.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
    <script src="<?= base_url('assets/vendors/owl-carousel-2/owl.carousel.min.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.cookie.js')?>" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/js/off-canvas.js')?>"></script>
    <script src="<?= base_url('assets/js/hoverable-collapse.js')?>"></script>
    <script src="<?= base_url('assets/js/misc.js')?>"></script>
    <script src="<?= base_url('assets/js/settings.js')?>"></script>
    <script src="<?= base_url('assets/js/todolist.js')?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url('assets/js/dashboard.js')?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url('assets/js/off-canvas.js')?>"></script>
    <script src="<?=base_url('assets/js/hoverable-collapse.js')?>"></script>
    <script src="<?=base_url('assets/js/misc.js')?>"></script>
    <script src="<?=base_url('assets/js/settings.js')?>"></script>
    <script src="<?=base_url('assets/js/todolist.js')?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?=base_url('assets/js/chart.js')?>"></script>

    <!-- Plugin js for this page -->
    <script src="<?=base_url('assets/vendors/select2/select2.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/typeahead.js/typeahead.bundle.min.js')?>"></script>
    <!-- End plugin js for this page -->
    <!-- Form -->
    <script src="<?=base_url('assets/js/file-upload.js')?>"></script>
    <script src="<?=base_url('assets/js/typeahead.js')?>"></script>
    <script src="<?=base_url('assets/js/select2.js')?>"></script>
    <!-- End Form -->
  </body>
</html>