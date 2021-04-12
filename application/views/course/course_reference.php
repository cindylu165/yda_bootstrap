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

          <!-- name -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formCourseName" name="courseName" required placeholder="範例-職涯探索" value="<?php echo (empty($courseReferences)) ? "" : $courseReferences->name ?>">
              <label for="formCourseName">課程名稱*</label>
            </div> 
          </div>

          <!-- duration -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="number" id="formDuration" min="0" name="duration" placeholder="1" step="0.25" value="<?php echo (empty($courseReferences)) ? "" : $courseReferences->duration ?>">
              <label for="formDuration">上課時數</label>
            </div>
          </div>
          
          <!-- expert -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="expert" required>
                <?php if(empty($courseReferences->expert)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($experts as $i) { 
                  if(!empty($courseReferences->expert)){
                    if($i['no'] == $courseReferences->expert){ ?>
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
              <label>課程講師*</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('course/expert_list/');?>" class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>
          
          <!-- category -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="category" required>
                <?php if(empty($courseReferences->category)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($categorys as $i) { 
                  if(!empty($courseReferences->category)){
                    if($i['no'] == $courseReferences->category){ ?>
                      <option selected value="<?php echo $i['no'];?>"><?php echo $i['content'];?></option>
                    <?php }
                    else{ ?>
                      <option value="<?php echo $i['no'];?>"><?php echo $i['content'];?></option>
                    <?php }
                  }else{ ?>
                    <option value="<?php echo $i['no'];?>"><?php echo $i['content'];?></option>
                  <?php } ?>
                <?php } ?>
              </select>
              <label>課程分類*</label>
            </div>
          </div>

          <!-- content -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea required id="formContent" class="materialize-textarea" placeholder="藉由戶外體驗，帶領學員探索興趣，並培養團體適應力" name="content"><?php echo (empty($courseReferences)) ? "" : $courseReferences->content ?></textarea>
              <label for="formContent">課程內容*:</label>
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