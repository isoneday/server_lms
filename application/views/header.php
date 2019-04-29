
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Herror</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/css/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/css/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url();?>assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="<?php echo base_url();?>assets/css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
  
  

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="<?php echo base_url();?>index.php/c_home">
                  <h1>Herror</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="<?php echo base_url();?>assets/img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">

                  <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/c_home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/c_academy">Academy</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/c_event">Event</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/c_home">Contact</a>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <?php $user_gambar = $this->session->userdata('user_image'); 
                          $username = $this->session->userdata('user_name'); 
                          if($user_gambar == NULL){?>
                              <img style="border-radius: 50%; height: 30px" src="<?php echo base_url();?>assets/img/user/<?php echo $user_gambar;?>" alt="<?php echo $username;?>"/><span class="caret"></span></a>
                          <?php } else {?>
                               <img style="height: 30px" src="<?php echo base_url();?>assets/img/icon/user.png"/><span class="caret"></span></a> 
                          <?php } ?>
                          
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo base_url();?>index.php/c_profile">Profile Saya</a></li>
                      <li><a href=# >Edit Profile</a></li>
                      <?php $user_id = $this->session->userdata('user_id');?>
                      <li><a href="<?php echo base_url('index.php/c_academy/pembelian/'. $user_id);?>" >Pembelian Kelas</a></li>
                      <li><a href="<?php echo base_url('index.php/c_modul/progressBelajar/'. $user_id);?>" >Progress Belajar</a></li>
                      <li><a href="<?php echo base_url('index.php/c_login/logout');?>"  >Logout</a></li>
                    </ul> 
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->
  
  <!--Main Content-->
  <?php echo $contents; ?>
  <!--end main-->
  
</body>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/knob/jquery.knob.js"></script>
  <script src="<?php echo base_url();?>assets/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/parallax/parallax.js"></script>
  <script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/lib/appear/jquery.appear.js"></script>
  <script src="<?php echo base_url();?>assets/lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url();?>assets/contactform/contactform.js"></script>

  <script src="<?php echo base_url();?>assets/js/main.js"></script>
</html>