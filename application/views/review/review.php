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

          <?php if($reviews->form_name == 'case_assessment') :?>
            <!-- counselor -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="counselor">
                <?php if (empty($caseAssessments->counselor)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($counselors as $i) {
    if (!empty($caseAssessments->counselor)) {
        if ($i['no'] == $caseAssessments->counselor) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>現任輔導員</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="counselor">
                <?php if (empty($reviews->update_value)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($counselors as $i) {
    if (!empty($reviews->update_value)) {
        if ($i['no'] == $reviews->update_value) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['userName']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>欲接任之輔導員</label>
            </div>
          </div>

          <?php elseif($reviews->form_name == 'counselor_users') :?>
          
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="countyName" name="countyName" disabled
                value="<?php echo (empty($countyName)) ? "" : $countyName?>">
              <label for="countyName">縣市</label>
            </div>
          </div>

          <?php if($organizationName) :?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="organizationName" name="organizationName" disabled
                value="<?php echo (empty($organizationName)) ? "" : $organizationName?>">
              <label for="organizationName">縣市</label>
            </div>
          </div>

          <?php endif;?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="name" name="name" disabled
                value="<?php echo (empty($users)) ? "" : $users->name?>">
              <label for="name">姓名</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="id" name="id" disabled
                value="<?php echo (empty($users)) ? "" : $users->id?>">
              <label for="id">帳號</label>
            </div>
          </div>


          <?php endif;?>

          <?php if($reviews->form_name == 'update_usable') :?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="name" name="name" disabled
                value="<?php echo (empty($userUsable)) ? "" : $userUsable->name?>">
              <label for="name">姓名</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="usable" name="usable" disabled
                value="<?php echo (empty($usable)) ? "停用" : "啟用"?>">
              <label for="usable">帳號狀態</label>
            </div>
          </div>

          <?php endif;?>

          <?php if($reviews->form_name == 'end_youth' || $reviews->form_name == 'reopen_youth') :?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="name" name="name" readonly
                value="<?php echo (empty($youths)) ? "" : $youths->name?>">
              <label for="name">青少年姓名</label>
            </div>
          </div>

          <?php if($seasonalReviews){?>
            <div class="card-content">
              <table class="highlight centered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">日期</th>
                    <th scope="col">動向</th>
                    <th scope="col">動向說明</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($seasonalReviews as $i) { ?>
                    <tr>
                      <td><?php echo date('Y-m-d', strtotime($i['date']));?></td>
                      <td><?php foreach ($trends as $value) {
                if ($i['trend'] == $value['no']) {
                    echo $value['content'];
                }
            }?></td>
                      <td>
                        <?php echo $i['trend_description'];?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          
          <?php }?>

          <?php endif;?>

          <?php if($reviews->form_name == 'transfer_youth') :?>

            <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="name" name="name" readonly
                value="<?php echo (empty($youths)) ? "" : $youths->name?>">
              <label for="name">青少年姓名</label>
            </div>
          </div>

          <?php if($seasonalReviews){?>
            <div class="card-content">
              <table class="highlight centered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">日期</th>
                    <th scope="col">動向</th>
                    <th scope="col">動向說明</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($seasonalReviews as $i) { ?>
                    <tr>
                      <td><?php echo date('Y-m-d', strtotime($i['date']));?></td>
                      <td><?php foreach ($trends as $value) {
                if ($i['trend'] == $value['no']) {
                    echo $value['content'];
                }
            }?></td>
                      <td>
                        <?php echo $i['trend_description'];?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          
          <?php }?>

           <!-- county -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="county" id="county">
              <?php foreach ($counties as $i) {?>
                <option <?php echo ($preCounty == $i['no']) ? 'selected' : '' ?> value="<?php echo $i['no']; ?>"><?php echo $i['name'] ?></option>
              <?php }?>
              </select>
              <label>目前所在縣市</label>
            </div>
          </div>

            <!-- county -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="updateValue" id="updateValue">
              <option disabled selected value>請選擇</option>
              <?php foreach ($counties as $i) {?>
                <option <?php echo ($reviews->update_value == $i['no']) ? 'selected' : '' ?> value="<?php echo $i['no']; ?>"><?php echo $i['name'] ?></option>
              <?php }?>
              </select>
              <label>欲轉介至縣市</label>
            </div>
          </div>

          <?php endif;?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="reason" name="reason" readonly
                value="<?php echo (empty($reviews)) ? "" : $reviews->reason ?>">
              <label for="reason">原因</label>
            </div>
          </div>
          <!-- status -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="status">
                <?php if (empty($reviews->status)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($statuses as $i) {
    if (!empty($reviews->status)) {
        if ($i['no'] == $reviews->status) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>狀態</label>
            </div>
          </div>
     

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="note" name="note" required
                value="<?php echo (empty($reviews)) ? "" : $reviews->note ?>">
              <label for="note">備註*</label></label>
            </div>
          </div>

          <?php if($reviews->status == $statusWaiting) : ?>
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

</script>

<?php $this->load->view('templates/footer');?>