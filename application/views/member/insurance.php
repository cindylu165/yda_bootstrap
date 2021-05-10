<?php $this->load->view('templates/new_header');?>

<div class="breadcrumb-div">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/user/index'); ?>" <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="#">輔導會談(措施A)</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/member/get_member_table_by_counselor'); ?>" <?php echo $url == '/member/get_member_table_by_counselor' ? 'active' : ''; ?>>開案學員清單</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/member/get_insurance_table_by_member/' . $member); ?>" <?php echo $url == '/member/get_insurance_table_by_member' ? 'active' : ''; ?>>投保紀錄清單</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
    </ol>
  </nav>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 class="text-dark text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url);?>" 
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="text-danger text-center">'.$error.'</p>' : '';?>
          <?php echo isset($success) ? '<p class="text-success text-center">'.$success.'</p>' : '';?>
            
          <h6 class="text-center">學員: <?php echo $members->name; ?></h6>
          <h6 class="text-center">案號: <?php echo $members->system_no; ?></h6>

         <!-- insuranceStartDate -->
          <div class="row">
            <div class="col-10 m-2 mx-auto">
              <label for="formStartDate">保險開始時間*</label>
              <input class="form-control datepickerTW" type="text" id="formStartDate" name="start_date"
              <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($insurances)) ? "" : $insurances->start_date ?>">
            </div>
          </div>

         <!-- insuranceEndDate -->
          <div class="row">
            <div class="col-10 m-2 mx-auto">
              <label for="formEndDate">保險結束時間*</label>
              <input class="form-control datepickerTW" type="text" id="formEndDate" name="end_date"
              <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($insurances)) ? "" : $insurances->end_date ?>">
            </div>
          </div>

          <!-- type -->
          <div class="col-10 m-2 mx-auto">
            <label>類型</label>
            <div class="input-group">
              <select class="form-select" name="type" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
              <?php if (empty($insurances->type)) { ?>
                <option disabled selected value>請選擇</option>
                <?php } foreach ($typeArray as $i) {
                  if (!empty($insurances->type)) {
                    if ($i['no'] == $insurances->type) { ?>
                      <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php } else { ?>
                      <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php }
                  } else { ?>
                    <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                  <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>

          <!-- note -->
          <!-- <div class="row">
            <div class="col-10 m-2 mx-auto">
              <label for="formNote" class="form-label">備註</label>
              <textarea class="form-control" type="text" id="formNote" name="note" placeholder="" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($insurances)) ? "" : $insurances->note ?></textarea>
            </div>
          </div> -->

          <?php if($hasDelegation != '0'): ?>

          <div class="row">
            <div class="d-grid gap-2 col-2 mx-auto">
              <button class="btn btn-primary my-5" type="submit">建立</button>
            </div>
          </div>

          <?php endif; ?>
          
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  $('.datepickerTW').datepickerTW();

  const elementRelation = new ElementBinder();

</script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/ModeSwitch.js"></script>

<?php $this->load->view('templates/new_footer');?>