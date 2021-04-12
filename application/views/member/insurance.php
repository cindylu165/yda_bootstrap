<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url);?>" 
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">'.$error.'</p>' : '';?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">'.$success.'</p>' : '';?>
            
          <h6 class="text-center">學員: <?php echo $members->name; ?></h6>
          <h6 class="text-center">案號: <?php echo $members->system_no; ?></h6>

         <!-- insuranceStartDate -->
         <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formStartDate" name="start_date" class="datepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($insurances)) ? "" : $insurances->start_date ?>">
              <label for="formStartDate">保險開始時間*</label>
            </div>
          </div>

         <!-- insuranceEndDate -->
         <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formEndDate" name="end_date" class="datepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($insurances)) ? "" : $insurances->end_date ?>">
              <label for="formEndDate">保險結束時間*</label>
            </div>
          </div>

           <!-- type -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="type" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($insurances->type)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($types as $i) {
    if (!empty($insurances->type)) {
        if ($i['no'] == $insurances->type) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>類型</label>
            </div>
          </div>

          <!-- note -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formNote" name="note" placeholder="" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> class="materialize-textarea"><?php echo (empty($insurances)) ? "" : $insurances->note ?></textarea>
              <label for="formNote">備註</label>
            </div>
          </div>

          <?php if($hasDelegation != '0'): ?>
          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">建立</button>
          </div>
          <?php endif;?>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();

</script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/ModeSwitch.js"></script>

<?php $this->load->view('templates/footer');?>