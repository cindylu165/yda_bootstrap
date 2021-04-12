<?php $this->load->view('templates/header');?>
<script>


  </script>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url); ?>"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-3 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-darken-3 text-center">' . $success . '</p>' : ''; ?>

          <!-- workExperience -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="workExperience" required onchange="location = this.value;" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($workAttendances->work_experience)) {?>
                  <option disabled selected value>請選擇</option>
                  <?php }
foreach ($workExperiences as $i) {
    if (!empty($workAttendances->work_experience)) {
        if ($i['no'] == $workAttendances->work_experience) {?>
                      <option selected value="<?php echo site_url('work/work_attendance/' . '' . $i['no'] . '/' . $no); ?>"><?php echo $i['name']; ?></option>
                    <?php } else {?>
                      <option value="<?php echo site_url('work/work_attendance/' . '' . $i['no'] . '/' . $no); ?>"><?php echo $i['name']; ?></option>
                    <?php }
    } else { 
      if($i['no'] == $workType){?>
                    <option selected value="<?php echo site_url('work/work_attendance/' . '' . $i['no'] . '/' . $no); ?>"><?php echo $i['name']; ?></option>
                  <?php }else{ ?>

                    <option value="<?php echo site_url('work/work_attendance/' . '' . $i['no'] . '/' . $no); ?>"><?php echo $i['name']; ?></option>
                  <?php } }?>
                <?php }?>
              </select>
              <label>店家名稱*</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('work/work_experience/'); ?>" class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>

          <!-- member -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select id="member" required name="member" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($workAttendances->member)) {?>
                  <option disabled selected value>請選擇</option>
                  <?php }
foreach ($members as $i) {
    if (!empty($workAttendances->member)) {
        if ($i['no'] == $workAttendances->member) {?>
                      <option selected value="<?php echo $i['no']; ?>"><?php echo $i['system_no'] . $i['name']; ?></option>
                    <?php } else {?>
                      <option value="<?php echo $i['no']; ?>"><?php echo $i['system_no'] . $i['name']; ?></option>
                    <?php }
    } else {?>
                    <option value="<?php echo $i['no']; ?>"><?php echo $i['system_no'] . $i['name']; ?></option>
                  <?php }?>
                <?php }?>
              </select>
              <label>學員名稱*</label>
            </div>
            <div class="col s2">
            <a href="<?php echo site_url('member/get_member_table_by_counselor/'); ?>" class="waves-light btn-small btn-floating blue darken-4 add-btn">投保</a>
            </div>
          </div>



          <!-- startTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formStartTime" name="startTime" class="datetimepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($workAttendances)) ? $workInfo ? $workInfo->start_time : '' : $workAttendances->start_time ?>">
              <label for="formStartTime">開始時間*</label>
            </div>
          </div>

          <!-- endTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="text" id="formEndTime" name="endTime" class="datetimepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($workAttendances)) ? $workInfo ? $workInfo->end_time : '' : $workAttendances->end_time ?>">
              <label for="formEndTime">結束時間*</label>
            </div>
          </div>

          <!-- duration -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input readonly type="number" id="formDuration" min="0" name="duration" step="0.25" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($workAttendances)) ? $workInfo ? (strtotime($workInfo->end_time) - strtotime($workInfo->start_time))/3600 : '' : $workAttendances->duration ?>">
              <label for="formDuration">上班時數*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="note" class="materialize-textarea" required
                name="note" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($workAttendances)) ? "" : $workAttendances->note ?></textarea>
              <label for="work_trainning_note">備註*</label>
            </div>
          </div>

          <?php if ($hasDelegation != '0'): ?>
          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">送出</button>
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
  $('#member').change(function() {
    var conceptName = $('#member').find(":selected").val();

    console.log('val' + conceptName);
  });

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
<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ModeSwitch.js"></script>
<?php $this->load->view('templates/footer');?>