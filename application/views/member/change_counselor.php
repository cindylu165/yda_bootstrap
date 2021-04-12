<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url);?>" 
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-3 text-center">'.$error.'</p>' : '';?>
          <?php echo isset($success) ? '<p class="green-text text-darken-3 text-center">'.$success.'</p>' : '';?>
        
           <!-- counselor -->
           <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="counselor">
                <?php if (empty($caseAssessments->counselor)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($counselors as $i) {
    if (!empty($caseAssessments->counselor)) {
        if ($i['no'] == $caseAssessments->counselor) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }
    } else {?>
                <option disabled value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>現任輔導員</label>
            </div>
          </div>

         <?php if($role != 6) :?>
         <!-- counselor -->
         <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="newCounselor" required> 
                <option disabled selected value>請選擇</option>
                <?php 
foreach ($counselors as $i) {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }?>
              
              </select>
              <label>欲更換輔導員*</label>
            </div>
          </div>

          <?php endif;?>

           <!-- reason -->
           <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formReason" name="reason" required>
              <label for="formReason">更換原因*</label>
            </div>
          </div>

          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">建立</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();

</script>

<?php $this->load->view('templates/footer');?>bn 