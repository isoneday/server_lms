<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Tables</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/vendor_admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/vendor_admin/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css_admin/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Herror</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
       
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
      
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
       
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/c_materi');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_materi');?>">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Data Materi</span></a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_favoritmateri');?>">
          <i class="fas fa-fw fa-star"></i>
          <span>Data Materi Favorit</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_iklanmateri');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Iklan Materi</span></a>
      </li>
	  
	    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_event');?>">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Event</span></a>
      </li>
	  
	    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_iklanevent');?>">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Iklan Event</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_user');?>">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_belajar');?>">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Belajar</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_kelas');?>">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kelas</span></a>
      </li>
	  
	    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_content');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Content</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_mitra');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Mitra</span></a>
      </li>
	  
	    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_modul');?>">
          <i class="fas fa-fw fa-trophy"></i>
          <span>Modul</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_progressmodul');?>">
          <i class="fas fa-fw fa-trophy"></i>
          <span>Progress Modul</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_project');?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Project</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_rating');?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Rating</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_pembayaran');?>">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Pembayaran</span></a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/c_sertifikat');?>">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Sertifikat</span></a>
      </li>
    
    
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <?php echo $contents; ?>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  
  <script src="<?php echo base_url();?>assets/vendor_admin/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor_admin/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor_admin/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor_admin/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>assets/vendor_admin/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js_admin/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url();?>assets/js_admin/demo/datatables-demo.js"></script>

</body>

</html>
