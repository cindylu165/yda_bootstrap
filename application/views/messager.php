<?php $this->load->view('templates/header');?>
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

          <!-- interviewWay -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="type" required>
                <?php if (empty($messagers->type)) {?>
                  <option disabled selected value>請選擇</option>
                <?php }
foreach ($types as $i) {
    if (!empty($messagers->type)) {
        if ($i['no'] == $messagers->type) {?>
                      <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php } else {?>
                      <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php }
    } else {?>
                    <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                  <?php }?>
                <?php }?>
              </select>
              <label>訊息分類</label>
            </div>
          </div>

          <!-- content -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formContent" class="materialize-textarea" required placeholder="" name="content"><?php echo (empty($messagers)) ? "" : $messagers->content ?></textarea>
              <label for="formContent">訊息內容</label>
            </div>
          </div>

          <h6><b>接收群組(可複選)</b></h6>
          <div class="row">
            <?php $receiveGroup = (empty($messagers)) ? null : $messagers->receive_group;
$receiveGroup = explode(",", $receiveGroup);
foreach ($receiveGroups as $i) {?>
            <div class="col m6">
              <p><label>
                  <input class="filled-in" type="checkbox" name="receiveGroup[]"
                   <?php if (in_array($i['no'], $receiveGroup) == 1) {
    echo "checked";
} else {"";}?> value="<?php echo $i['no']; ?>">
                  <span><?php echo $i['content']; ?></span>
                </label></p>
            </div>
            <?php }?>
          </div>


          <!-- isView -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="isView" required>
                <?php if (isset($messagers->is_view)) {
    if ($messagers->is_view == "1") {?>
                  <option value="1" selected>是</option>
                  <option value="0" >否</option>
                <?php } else {?>
                  <option value="1" >是</option>
                  <option value="0" selected>否</option>
                <?php }
} else {?>
                  <option disabled selected value>請選擇</option>
                  <option value="1">是</option>
                  <option value="0">否</option>
                <?php }?>
              </select>
              <label>是否顯示</label>
            </div>
          </div>

           <!-- isEmail -->
           <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="isEmail" required>
                <?php if (isset($messagers->is_email)) {
    if ($messagers->is_email == "1") {?>
                  <option value="1" selected>是</option>
                  <option value="0" >否</option>
                <?php } else {?>
                  <option value="1" >是</option>
                  <option value="0" selected>否</option>
                <?php }
} else {?>
                  <option disabled selected value>請選擇</option>
                  <option value="1">是</option>
                  <option value="0">否</option>
                <?php }?>
              </select>
              <label>是否寄信通知</label>
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

<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();

</script>

<?php $this->load->view('templates/footer');?>