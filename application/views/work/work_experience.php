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

          <!-- company -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="company" required>
                <?php if(empty($workExperiences->company)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($companys as $i) { 
                  if(!empty($workExperiences->company)){
                    if($i['no'] == $workExperiences->company){ ?>
                      <option selected value="<?php echo $i['no'];?>"><?php echo $i['name'];?></option>
                    <?php }
                    else{ ?>
                      <option value="<?php echo $i['no'];?>"><?php echo $i['name'];?></option>
                    <?php }
                  }else{ ?>
                    <option value="<?php echo $i['no'];?>"><?php echo $i['name'];?></option>
                  <?php } ?>
                <?php } ?>
              </select>
              <label>店家名稱*</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('work/company/');?>" class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>
          
          <!-- startTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formStartTime" name="startTime" class="datetimepicker" value="<?php echo (empty($workExperiences)) ? "" : $workExperiences->start_time ?>">
              <label for="formStartTime">開始時間*</label>
            </div>
          </div>

          <!-- endTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formEndTime" name="endTime" class="datetimepicker" value="<?php echo (empty($workExperiences)) ? "" : $workExperiences->end_time ?>">
              <label for="formEndTime">結束時間*</label>
            </div>
          </div>
         
          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">送出</button>
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

<?php $this->load->view('templates/footer');?>