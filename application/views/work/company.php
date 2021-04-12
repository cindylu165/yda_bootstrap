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
              <input required type="text" id="name" name="name" placeholder="範例-汽車維修廠" value="<?php echo (empty($companys)) ? "" : $companys->name ?>">
              <label for="name">店家名稱*</label>
            </div> 
          </div>

          <!-- boss_name -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="boss_name" name="boss_name" placeholder="OOO" value="<?php echo (empty($companys)) ? "" : $companys->boss_name ?>">
              <label for="boss_name">老闆名稱*</label>
            </div> 
          </div>

          <!-- phone -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="phone" name="phone" placeholder="OOOO-OOO-OOO" value="<?php echo (empty($companys)) ? "" : $companys->phone ?>">
              <label for="phone">連絡電話</label>
            </div> 
          </div>

           <!-- category -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="category" required>
                <?php if(empty($companys->category)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($categorys as $i) { 
                  if(!empty($companys->category)){
                    if($i['no'] == $companys->category){ ?>
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
              <label>工作類別*</label>
            </div>
          </div>

          <!-- content -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="content" class="materialize-textarea" placeholder="協助汽修廠業務" name="content"><?php echo (empty($companys)) ? "" : $companys->content ?></textarea>
              <label for="content">工作內容:</label>
            </div>
          </div>

          <!-- requirement -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="requirement" class="materialize-textarea" placeholder="可配合到晚班( 約到21點)、不會遲到早退" name="requirement"><?php echo (empty($companys)) ? "" : $companys->requirement ?></textarea>
              <label for="requirement">工作條件:</label>
            </div>
          </div>

          <!-- address -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="address" class="materialize-textarea" placeholder="OOOOOOOOOO" name="address"><?php echo (empty($companys)) ? "" : $companys->address ?></textarea>
              <label for="address">工作地址:</label>
            </div>
          </div>

          <!-- is_open -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="is_open">
                <?php if(isset($companys->is_open)){
                  if($companys->is_open == "1"){?>
                  <option value="1" selected>是</option>
                  <option value="0" >否</option>
                <?php }else{?>
                  <option value="1" >是</option>
                  <option value="0" selected>否</option>
                <?php }
                }else{?>
                  <option disabled selected value>請選擇</option>
                  <option value="1">是</option>
                  <option value="0">否</option>
                <?php }?>
              </select>
              <label>是否願意開放資料給全國夥伴</label>
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