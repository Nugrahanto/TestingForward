<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
    <link href="<?php echo base_url(); ?>assets/css/styleTemplate.css" rel="stylesheet">

    <title><?= $title; ?> | Web Admin</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <!-- offcanvas trigger -->
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        <!-- offcanvas trigger -->
        <a class="navbar-brand fw-bold text-uppercase" href="<?php echo base_url(); ?>admin">Web Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar -->

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-light" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-body p-0">
        <nav class="navbar-light">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 py-2">Main</div>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin" class="nav-link px-3 <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == ""){echo "active";} ?>">
                <span class="me-2"><i class="bi bi-house-door-fill"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/product" class="nav-link px-3 <?php if($this->uri->segment(2) == "product"){echo "active";} ?>">
                <span class="me-2"><i class="bi bi-box"></i></span>
                <span>Product</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/category" class="nav-link px-3 <?php if($this->uri->segment(2) == "category"){echo "active";} ?>">
                <span class="me-2"><i class="bi bi-columns-gap"></i></span>
                <span>Category</span>
              </a>
            </li>
            <!-- <li>
              <div class="text-muted small fw-bold text-uppercase px-3">Feature</div>
            </li> -->
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->

    <main class="mt-5 pt-3">
      <div class="container">
        <?php 
          $this->load->view($main_view);
        ?>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script type="text/javascript">
      $('#datatable').DataTable({});
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','#editCategory',function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#id').val(id);
        $('#name').val(name);
      });
    });
  </script>
  </body>
</html>
