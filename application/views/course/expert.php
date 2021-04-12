<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
       <div class="row"> 
        <a class="btn col s2 offset-s0 waves-effect teal darken-2" style="margin:10px;" href="<?php echo site_url('/course/get_expert_table_by_organization'); ?>">←講師清單</a>
      </div>
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
              <input type="text" id="formExpertName" name="expertName" required placeholder="範例-OOO" value="<?php echo (empty($expertLists)) ? "" : $expertLists->name ?>">
              <label for="formExpertName">講師姓名*</label>
            </div> 
          </div>

          <!-- gender -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="gender">
                <?php if(empty($expertLists->gender)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($genders as $i) { 
                  if(!empty($expertLists->gender)){
                    if($i['no'] == $expertLists->gender){ ?>
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
              <label>性別</label>
            </div>
          </div>

          <!-- phone -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formPhone" name="phone" placeholder="OOO-OOO-OOO" value="<?php echo (empty($expertLists)) ? "" : $expertLists->phone ?>">
              <label for="formPhone">講師電話</label>
            </div>
          </div>

          <!-- email -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formEmail" name="email" placeholder="OOO@OOO.com" value="<?php echo (empty($expertLists)) ? "" : $expertLists->email ?>">
              <label for="formEmail">講師信箱</label>
            </div>
          </div>

           <!-- education -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formEducation" class="materialize-textarea" placeholder="OOO大學OOO所" name="education"><?php echo (empty($expertLists)) ? "" : $expertLists->education ?></textarea>
              <label for="formEducation">講師學經歷:</label>
            </div>
          </div>
        
          <!-- profession -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formProfession" class="materialize-textarea" placeholder="冒險體驗、遊戲治療" name="profession"><?php echo (empty($expertLists)) ? "" : $expertLists->profession ?></textarea>
              <label for="formProfession">講師專長:</label>
            </div>
          </div>

          <!-- resideCounty -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formResideCounty" name="resideCounty" placeholder="OO縣" value="<?php echo (empty($expertLists)) ? "" : $expertLists->reside_county ?>">
              <label for="formResideCounty">講師所在縣市</label>
            </div>
          </div>

          <!-- isOpen -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="isOpen">
                <?php if(!empty($expertLists->is_open)){
                  if($expertLists->is_open == "1"){?>
                  <option value="1" selected>是</option>
                  <option value="0" disabled>否</option>
                <?php }else{?>
                  <option value="1" disabled>是</option>
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