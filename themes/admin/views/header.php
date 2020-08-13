<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($template['title']) ? $template['title'] . ' | ' : ' | '; ?><?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set'; ?></title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/'); ?>images/importa.png" />

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css'); ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/css/adminlte.css'); ?>">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/style/styles.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/style/custom_ddr.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/style/my.css'); ?>">
  <!-- jQuery 2.2.3 -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- Sweet Alert -->
  <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.js'); ?>"></script>
  <!-- Form Jquery -->
  <script src="<?= base_url('assets/style/scripts.js'); ?>" type="text/javascript"></script>


  <script type="text/javascript">
    var baseurl = "<?= base_url(); ?>";
    var siteurl = "<?= site_url(); ?>";
    var base_url = siteurl;
    var active_controller = '<?php echo $this->uri->segment(1); ?>' + '/';
    var active_function = '<?php echo $this->uri->segment(2); ?>' + '/';
  </script>
</head>

<body class="hold-transition sidebar-mini control-sidebar-slide-open text-sm">
  <div class="ajax_loader">
    <img src="<?php echo base_url('assets/images/default/ajax_loader.gif'); ?>">
  </div>
  <div class="wrapper">

    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark text-sm">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image"> -->
            <img src="<?= (isset($userData->photo) && file_exists('assets/images/default/' . $userData->photo)) ? base_url('assets/images/default/' . $userData->photo) : base_url('assets/images/default/male-def.png'); ?>" class="img-circle elevation-2 user-image" alt="User Image">
            <span class="d-none d-md-inline"><?php echo isset($userData->nm_lengkap) ? ucwords($userData->nm_lengkap) : $userData->username; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
              <img src="<?= (isset($userData->photo) && file_exists('assets/images/default/' . $userData->photo)) ? base_url('assets/images/default' . $userData->photo) : base_url('assets/images/default/male-def.png'); ?>" class="img-circle elevation-2 user-image" alt="User Image">

              <p>
                <?= isset($userData->nm_lengkap) ? ucwords($userData->nm_lengkap) : $userData->username; ?> - <?= isset($userData->groups) ? $userData->groups : '-'; ?>
                <small>Member since <?= isset($userData->created_on) ? date('M Y', strtotime($userData->created_on)) : '-'; ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
              <a href="<?= site_url('users/logout'); ?>" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <header class="main-header">

      <!-- Logo -->
      <!-- <a href="<?= site_url(); ?>" class="logo"> -->
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>IDF</b></span> -->
      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg"><b><?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set'; ?></b></span>
      </a> -->
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar sidebar-dark-warning elevation-4">
      <a href="#" class="brand-link">
        <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <!-- <span class=""><b>IDF</b></span> -->
        <span class="brand-text font-weight-light"><?= isset($idt->nm_perusahaan) ? strtoupper($idt->nm_perusahaan) : 'not-set'; ?></span>
      </a>
      <!-- sidebar: style can be found in sidebar.less -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <?= $this->menu_generator->build_menus(); ?>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <i class="<?= isset($template['page_icon']) ? 'fas fa-tachometer-alt' : 'fa fa-user'; ?>"></i>
          <?= isset($template['title']) ? $template['title'] : ''; ?>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">