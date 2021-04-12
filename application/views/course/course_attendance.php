<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form id="form" action="<?php echo site_url($url); ?>"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">' . $success . '</p>' : ''; ?>
         
          <!-- course -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="course" required onchange="location = this.value;" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($courseAttendances->course)) {?>
                  <option disabled selected value>請選擇</option>
                  <?php }
foreach ($courses as $i) {
    if (!empty($courseAttendances->course)) {
        if ($i['no'] == $courseAttendances->course) {?>
                      <option selected value="<?php echo site_url($url . '' . $i['no'] . '/' . $startTime); ?>"><?php echo $i['course_name'] . '-' . $i['expert_name']; ?></option>
                    <?php } else {?>
                      <option value="<?php echo site_url($url . '' . $i['no']. '/' . $startTime); ?>"><?php echo $i['course_name']. '-' . $i['expert_name']; ?></option>
                    <?php }
    } else {
        if ($i['no'] == $courseType) {?>
                    <option selected value="<?php echo site_url($url . '' . $i['no']. '/' . $startTime); ?>"><?php echo $i['course_name']. '-' . $i['expert_name']; ?></option>
                  <?php } else {?>
                    <option value="<?php echo site_url($url . '' . $i['no']. '/' . $startTime); ?>"><?php echo $i['course_name']. '-' . $i['expert_name']; ?></option>
                  <?php }}?>
                <?php }?>
              </select>
              <label>課程名稱*</label>
            </div>
          </div>

          <!-- member -->
          <h6><b>參與學員(複選)*</b></h6>
          <div class="row">
            <?php
foreach ($members as $i) {?>
              <div class="col m6">
                <p><label>
                  <input class="filled-in" type="checkbox" name="member[]" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>
                  <?php if (in_array($i['no'], $participantArray) == 1) {
    echo "checked";
} else {"";}?>
                  value="<?php echo $i['no']; ?>">

                  <span><?php echo $i['system_no'] . $i['name']; ?></span>
                </label>
                  <a href="<?php echo site_url('member/get_insurance_table_by_member/' . $i['no']); ?>" style="margin-top:0px; margin-left:25px;" class="waves-light btn-small btn-floating blue darken-4 add-btn">投保</a>
                </p>


              </div>
             <?php }?>
          </div>

          <!-- startTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formStartTime" name="startTime" class="datetimepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($courseAttendances)) ? $courseInfo ? $courseInfo->start_time : '' : $courseAttendances->start_time ?>">
              <label for="formStartTime">開始時間*</label>
            </div>
          </div>

          <!-- endTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formEndTime" name="endTime" required class="datetimepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($courseAttendances)) ? $courseInfo? $courseInfo->end_time : '' : $courseAttendances->end_time ?>">
              <label for="formEndTime">結束時間*</label>
            </div>
          </div>

          <!-- duration -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input readonly placeholder="1" type="text" id="formDuration" name="duration" min="0" step="0.25" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($courseAttendances)) ? $courseInfo ? (strtotime($courseInfo->end_time) - strtotime($courseInfo->start_time))/3600 : 0 : $courseAttendances->duration ?>">
              <label for="formDuration">歷時*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="note" class="materialize-textarea" required
                name="note" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($courseAttendances)) ? "" : $courseAttendances->note ?></textarea>
              <label for="work_trainning_note">備註*</label>
            </div>
          </div>

          <?php if ($hasDelegation != '0'): ?>
          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">建立</button>
          </div>
          <?php endif;?>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();

  $('#print').click(function () {
        window.print();
  });

  // document.querySelector('input[name="endTime"]').addEventListener("change", myFunction);
  // document.querySelectorAll('select[target="formEndTime"]')
  
  
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
    $("#formDuration").val(totalHours);
  }


</script>

<?php $this->load->view('templates/footer');?>