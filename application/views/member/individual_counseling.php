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
       
          <h6 class="text-center">案號: <?php echo $memberSystemNo; ?></h6>
          <h6 class="text-center">學員: <?php echo $memberName; ?></h6>

          <!-- startTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
<input type="text" id="formStartTime" name="startTime" required class="datetimepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> value="<?php echo (empty($individualCounselings)) ? "" : $individualCounselings->start_time ?>">
              <label for="formStartTime">開始時間*</label>
            </div>
          </div>

          <!-- endTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formEndTime" name="endTime" required class="datetimepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> value="<?php echo (empty($individualCounselings)) ? "" : $individualCounselings->end_time ?>">
              <label for="formEndTime">結束時間*</label>
            </div>
          </div>

          <!-- durationHour -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input readonly placeholder="1" type="number" min="0" id="formDurationHour" name="durationHour" required <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> step = "0.25" placeholder="2.75" value="<?php echo (empty($individualCounselings)) ? "" : $individualCounselings->duration_hour ?>">
              <label for="formDurationHour">諮詢歷時(小時)*</label>
            </div>
          </div>

          <!-- serviceType -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="serviceType" <?php echo ($hasDelegation == '0') ? 'disabled' : ''?>>
                <?php if(empty($individualCounselings->service_type)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($serviceTypes as $i) { 
                  if(!empty($individualCounselings->service_type)){
                    if($i['no'] == $individualCounselings->service_type){ ?>
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
              <label>服務類型(單選)</label>
            </div>
          </div>

          <!-- serviceWay -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="serviceWay" <?php echo ($hasDelegation == '0') ? 'disabled' : ''?>>
                <?php if(empty($individualCounselings->service_way)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($serviceWays as $i) { 
                  if(!empty($individualCounselings->service_way)){
                    if($i['no'] == $individualCounselings->service_way){ ?>
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
              <label>服務方式(單選)</label>
            </div>
          </div>

          <!-- referralResource -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="referralResource" <?php echo ($hasDelegation == '0') ? 'disabled' : ''?>>
              <?php if(empty($individualCounselings->referral_resource)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($referralResources as $i) { 
                  if(!empty($individualCounselings->referral_resource)){
                    if($i['no'] == $individualCounselings->referral_resource){ ?>
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
              <label>資源連結情形(單選)</label>
            </div>
          </div>

          <!-- referralDescription -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formReferralDescription" class="materialize-textarea" placeholder="協助報名分署汽修職訓課程" name="referralDescription" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?>><?php echo (empty($individualCounselings)) ? "" : $individualCounselings->referral_description ?></textarea>
              <label for="formReferralDescription">資源連結單位說明</label>
            </div>
          </div>

          <!-- serviceTarget -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formServiceTarget" class="materialize-textarea" placeholder="報名分署汽修職訓課程" name="serviceTarget" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?>><?php echo (empty($individualCounselings)) ? "" : $individualCounselings->service_target ?></textarea>
              <label for="formServiceTarget">服務目標</label>
            </div>
          </div>

          <!-- serviceContent -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formServiceContent" class="materialize-textarea" placeholder="1.教導個案寫履歷
2.陪伴個案至就服處報名
3.教導並陪伴個案搭乘家裡到上課地方的公車" name="serviceContent" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?>><?php echo (empty($individualCounselings)) ? "" : $individualCounselings->service_content ?></textarea>
              <label for="formServiceContent">服務內容</label>
            </div>
          </div>

          <!-- futurePlan -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formFuturePlan" class="materialize-textarea" placeholder="將持續關心個案上課形況" name="futurePlan" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?>><?php echo (empty($individualCounselings)) ? "" : $individualCounselings->future_plan ?></textarea>
              <label for="formFuturePlan">處遇計畫</label>
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
  elementRelation.selectInput('serviceType', 'serviceWay', '個案服務');
  elementRelation.selectInput('serviceType', 'referralResource', '系統服務');
  elementRelation.selectInput('serviceType', 'referralDescription', '系統服務');

  document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('select');
    M.FormSelect.init(selects, {});
    const endTimeSelects = document.querySelectorAll('select[target="formEndTime"]');
    for ( i=0, n=endTimeSelects.length; i < n; i++) {
      endTimeSelects[i].addEventListener("change", myFunction);
    }
  });

  document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('select');
    M.FormSelect.init(selects, {});
    const startTimeSelects = document.querySelectorAll('select[target="formStartTime"]');
    for ( i=0, n=startTimeSelects.length; i < n; i++) {
      startTimeSelects[i].addEventListener("change", myFunction);
    }
  });
  function myFunction() {
    //value start
    const startTimeSelects = document.querySelectorAll('select[target="formStartTime"]');
    
    var startYear = startTimeSelects[0].value;
    var startMonth = startTimeSelects[1].value;
    var startDay = startTimeSelects[2].value;
    var startHour = startTimeSelects[3].value;
    var startMin = startTimeSelects[4].value;
    var startTime = startYear + '-' + startMonth + '-' + startDay + ' ' + startHour + ':' + startMin + ':00'; 

    const endTimeSelects = document.querySelectorAll('select[target="formEndTime"]');
    
    var endYear = endTimeSelects[0].value;
    var endMonth = endTimeSelects[1].value;
    var endDay = endTimeSelects[2].value;
    var endHour = endTimeSelects[3].value;
    var endMin = endTimeSelects[4].value;
    var endTime = endYear + '-' + endMonth + '-' + endDay + ' ' + endHour + ':' + endMin + ':00'; 

    // var start = Date.parse($('input[name="startTime"]').val()); //get timestamp

    // //value end
    // var end = Date.parse($('input[name="endTime"]').val()); //get timestamp

    var start = Date.parse(startTime); //get timestamp

    //value end
    var end = Date.parse(endTime); //get timestamp

    totalHours = NaN;
  
    if (start < end) {
      totalHours = (end - start) / 1000 / 60 /60 ; //milliseconds: /1000 / 60 / 60
    }
    $("#formDurationHour").val(totalHours);
  }

</script>

<?php $this->load->view('templates/footer');?>