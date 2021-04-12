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
        
          <!-- title -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formTitle" name="title" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> value="<?php echo (empty($groupCounselings)) ? "" : $groupCounselings->title ?>">
              <label for="formTitle">單元名稱*</label>
            </div>
          </div>

          <!-- startTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formStartTime" name="startTime" required class="datetimepicker"  value="<?php echo (empty($groupCounselings)) ? "" : $groupCounselings->start_time ?>">
              <label for="formStartTime">開始時間*</label>
            </div>
          </div>

          <!-- endTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formEndTime" name="endTime" required class="datetimepicker" value="<?php echo (empty($groupCounselings)) ? "" : $groupCounselings->end_time ?>">
              <label for="formEndTime">結束時間*</label>
            </div>
          </div>

          <!-- durationHour -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input readonly placeholder="1" type="number" min="0" step="0.25" id="formDurationHour" required name="durationHour" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> value="<?php echo (empty($groupCounselings)) ? "" : $groupCounselings->duration_hour ?>">
              <label for="formDurationHour">諮詢歷時(小時)*</label>
            </div>
          </div>

          <!-- serviceTarget -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="serviceTarget" <?php echo ($hasDelegation == '0') ? 'disabled' : ''?>>
                <?php if(empty($groupCounselings->service_target)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($serviceTargets as $i) { 
                  if(!empty($groupCounselings->service_target)){
                    if($i['no'] == $groupCounselings->service_target){ ?>
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
              <label>團體目標與內容</label>
            </div>
          </div>

          <!-- serviceTargetOther -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formServiceTargetOther" name="serviceTargetOther" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> value="<?php echo (empty($groupCounselings)) ? "" : $groupCounselings->service_target_other ?>">
              <label for="formServiceTargetOther">團體目標-其他</label>
            </div>
          </div>

          <div class="row col offset-m10">
            <a class="btn waves-effect blue lighten-1" href="<?php echo site_url("/member/group_counseling_participants/" . $groupCounselings->no); ?>">新增</a>
          </div>


          <?php 
            foreach($participants as $i) { ?>
              <h5 class="text-center"><?php echo $i['system_no'] . '  ' . $i['name'];?></h5>
              <?php if(count($participants) > 1):?>
              <a class='btn col offset-m10 waves-effect red lighten-1' href='<?php echo site_url("/member/group_counseling_participants_delete/" . $i['no'] . "/" . $groupCounselings->no); ?> '>刪除</a>
              <?php endif;?>
             <!-- isPunctual -->
              <div class="row">
                <div class="input-field col s10 offset-m2 m8">
                  <select name="isPunctual[]" <?php echo ($hasDelegation == '0') ? 'disabled' : ''?>>
                    <?php if(isset($i['is_punctual'])){
                      if($i['is_punctual'] == "1"){?>
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
                  <label>準時出席</label>
                </div>
              </div>

              <!-- participationLevel -->
              <div class="row">
                <div class="input-field col s10 offset-m2 m8">
                  <input type="number" min="0" id="formParticipationLevel" min="0" name="participationLevel[]" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> value="<?php echo (empty($i['participation_level'])) ? "0" : $i['participation_level'] ?>">
                  <label for="formParticipationLevel">參與程度(1-5)</label>
                </div>
              </div>

              <!-- descriptionOther -->
              <div class="row">
                <div class="input-field col s10 offset-m2 m8">
                  <textarea id="formDescriptionOther" class="materialize-textarea" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> name="descriptionOther[]" placeholder="對於汽修專業很感興趣，但其他人分享時就會分心"><?php echo (empty($i['description_other'])) ? "" : $i['description_other'] ?></textarea>
                  <label for="formDescriptionOther">其他敘述</label>
                </div>
              </div>

            <?php
            }
          ?>

          <!-- importantEvent -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formImportantEvent" class="materialize-textarea" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> name="importantEvent" placeholder="與團體成員互動熱絡,但因語言表達較弱，偶爾會因他人的回饋有受挫的經驗"><?php echo (empty($groupCounselings)) ? "" : $groupCounselings->important_event ?></textarea>
              <label for="formImportantEvent">重要事件</label>
            </div>
          </div>

          <!-- evaluation -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formEvaluation" class="materialize-textarea" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> name="evaluation" placeholder="對汽修的熱情堅定，將於第一梯生涯探索課程結束後協助個案進行工作體驗"><?php echo (empty($groupCounselings)) ? "" : $groupCounselings->evaluation ?></textarea>
              <label for="formEvaluation">整體評估</label>
            </div>
          </div>

          <!-- review -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formReview" class="materialize-textarea" <?php echo ($hasDelegation == '0') ? 'readonly' : ''?> name="review" placeholder="對約定的時間將更嚴格實行，並訂定獎懲機制"><?php echo (empty($groupCounselings)) ? "" : $groupCounselings->review ?></textarea>
              <label for="formReview">檢討/建議</label>
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
  elementRelation.selectInput('serviceTarget', 'serviceTargetOther', '其他');

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