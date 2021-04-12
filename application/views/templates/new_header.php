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
  <!-- Our Custom CSS -->
  <link href="<?php echo site_url(); ?>/assets/css/style.css" rel="stylesheet">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3></h3>
      </div>

      <ul class="list-unstyled components">
        
        <li class="active">
          <a href="#">首頁</a>
        </li>
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="#">Page 1</a>
            </li>
            <li>
              <a href="#">Page 2</a>
            </li>
            <li>
              <a href="#">Page 3</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Portfolio</a>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>

      <ul class="list-unstyled CTAs">
        <li>
          <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
          <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light header-bg header_bar">
        <div class="container-fluid ">
          <button type="button" id="sidebarCollapse" class="btn">
            <i class="fas fa-align-justify text-white fa-2x"></i>
            <img class="yda_logo"
            src="<?php echo site_url(); ?>/images/yda_logo.png" />
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

            
