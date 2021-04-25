<?php $this->load->view('templates/new_header');?>

<div class="breadcrumb-div">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/user/index'); ?>" <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="#"><?php if(strpos($title, '建立') !== false) echo '系統帳號管理'; else echo '個人帳號管理';?></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
    </ol>
  </nav>
</div>

<div class="container">
  <div class="col-md-12">
    <form class="row g-3" action="<?php echo site_url($url . '/' . $countyType); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />

      <?php echo isset($error) ? '<p class="text-danger text-center">' . $error . '</p>' : ''; ?>
      <?php echo isset($success) ? '<p class="text-success text-center">' . $success . '</p>' : ''; ?>

      <?php if($kind === 'yda') :?>

        <?php $this->load->view('user/account/yda_account'); ?>

      <?php elseif($kind === 'support') :?>

        <?php $this->load->view('user/account/yda_support_account'); ?>

      <?php elseif($kind === 'county_manager') :?>

        <?php $this->load->view('user/account/county_manager_account'); ?>

      <?php elseif($kind === 'county_contractor') :?>

        <?php $this->load->view('user/account/county_contractor_account'); ?>

      <?php elseif($kind === 'organization_manager') :?>

        <?php $this->load->view('user/account/organization_manager_account'); ?>

      <?php elseif($kind === 'organization_contractor') :?>

        <?php $this->load->view('user/account/organization_contractor_account'); ?>

      <?php elseif($kind === 'counselor') :?>

        <?php $this->load->view('user/account/counselor_account'); ?>

      <?php else:?>

      <?php endif;?>
    </form>
  </div>
</div>

<p></p>
<p></p>
<?php $this->load->view('templates/new_footer');?>