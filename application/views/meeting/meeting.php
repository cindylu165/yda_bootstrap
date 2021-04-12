<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url); ?>"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">' . $success . '</p>' : ''; ?>

          <!-- title -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formTitle" name="title" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> required value="<?php echo (empty($meetings)) ? "" : $meetings->title ?>">
              <label for="formTitle">會議/講座名稱*</label>
            </div>
          </div>

          <!-- meeting_type -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="meetingType" required <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($meetings->meeting_type)) {?>
                  <option disabled selected value>請選擇</option>
                  <?php }
foreach ($meetingTypes as $i) {
    if (!empty($meetings->meeting_type)) {
        if ($i['no'] == $meetings->meeting_type) {?>
                      <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php } else {?>
                      <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php }
    } else {?>
                    <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                  <?php }?>
                <?php }?>
              </select>
              <label>類型*</label>
            </div>
          </div>

          <!-- startTime -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formStartTime" name="startTime" class="datepicker" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($meetings)) ? "" : $meetings->start_time ?>">
              <label for="formStartTime">會議時間*</label>
            </div>
          </div>

            <!-- participants -->
            <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="number" min="0" id="formParticipants" name="participants" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($meetings)) ? "" : $meetings->participants ?>">
              <label for="formParticipants">參與人次*</label>
            </div>
          </div>


          <!-- chairman -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formChairman" name="chairman" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($meetings)) ? "" : $meetings->chairman ?>">
              <label for="formChairman">主席*</label>
            </div>
          </div>

          <!-- chairman_background -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formChairmanBackground" name="chairmanBackground" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?> value="<?php echo (empty($meetings)) ? "" : $meetings->chairman_background ?>">
              <label for="formChairmanBackground">主席背景*</label>
            </div>
          </div>

          <!-- note -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formNote" class="materialize-textarea" placeholder="" name="note" <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($meetings)) ? "" : $meetings->note ?></textarea>
              <label for="formNote">備註*</label>
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
  elementRelation.selectInput('meetingType', 'chairman', '跨局處會議');
  elementRelation.selectInput('meetingType', 'chairmanBackground', '跨局處會議');
  elementRelation.selectInput('meetingType', 'participants', '預防性講座');

</script>

<?php $this->load->view('templates/footer');?>