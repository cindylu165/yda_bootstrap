<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo site_url(); ?>/assets/img/yda_logo.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo $title; ?></title>

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- Bootstrap CSS timepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <!-- Our Custom CSS -->
  <link href="<?php echo site_url(); ?>/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/assets/css/jquery-ui-1.10.3.custom.css">
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="<?php echo site_url(); ?>/assets/js/jquery-1.9.1.js"></script>
  <script src="<?php echo site_url(); ?>/assets/js/jquery-ui-1.10.3.custom.js"></script>
  <script src="<?php echo site_url(); ?>/assets/js/JQueryDatePickerTW.js"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3></h3>
      </div>

      <ul class="list-unstyled components">
        
        <li>
          <a href="<?php echo site_url('/user/index'); ?>" <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
        </li>

        <?php if(!empty($role)) :?>
          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">個人帳號管理</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
              <li>
                <a href="<?php echo site_url('/user/user_info'); ?>" <?php echo $url == '/user/user_info' ? 'active' : ''; ?>>修改個人資訊</a>
              </li>
              <li>
                <a href="<?php echo site_url('/user/user_password'); ?>" <?php echo $url == '/user/user_password' ? 'active' : ''; ?>>修改個人密碼</a>
              </li>
            </ul>
          </li>

          <?php if($role === 1) :?>
            <?php $this->load->view('templates/sidebar/yda_sidebar');?>
          <?php elseif($role === 2) :?>
            <?php $this->load->view('templates/sidebar/county_manager_sidebar');?>
          <?php elseif($role === 3) :?>
            <?php $this->load->view('templates/sidebar/county_contractor_sidebar');?>
          <?php elseif($role === 4) :?>
            <?php $this->load->view('templates/sidebar/organization_manager_sidebar');?>
          <?php elseif($role === 5) :?>
            <?php $this->load->view('templates/sidebar/organization_contractor_sidebar');?>
          <?php elseif($role === 6) :?>
            <?php $this->load->view('templates/sidebar/counselor_sidebar');?>
          <?php elseif($role === 8) :?>
            <?php $this->load->view('templates/sidebar/yda_assistant_sidebar');?>
          <?php endif;?>

        <?php endif;?>
   
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light header-bg header_bar">
        <div class="container-fluid ">
          <button type="button" id="sidebarCollapse" class="btn">
            <i class="fas fa-align-justify text-white fa-2x"></i>
            <img class="yda_logo" src="<?php echo site_url(); ?>/images/yda_logo.png" />
            <span class="h2 text-white">教育部青年發展署</span>
          </button>
          <button class="btn btn-light d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            
            <ul class="nav navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link text-white" href="#"><?php echo $userTitle; ?></a>
              </li>
              <?php if (empty($role)): ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="<?php echo site_url('/user/login'); ?>">登入</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="<?php echo site_url('/user/logout'); ?>">登出</a>
                </li>
              <?php endif;?>
              
                    
            </ul>
          </div>
        </div>
      </nav>

            
