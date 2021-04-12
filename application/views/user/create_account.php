<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url . '/' . $countyType); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>"
            value="<?php echo $security->get_csrf_hash() ?>" />

          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">' . $success . '</p>' : ''; ?>


          <?php if ($role === 1 && strpos($kind, 'county') !== false): ?>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="county" id="county" onchange="location = this.value;">
                <option disabled selected value>請選擇</option>
                <?php foreach ($counties as $i) {
    if ($countyType == $i['no']): ?>
                <option selected value="<?php echo site_url($url . '/' . $i['no']); ?>"><?php echo $i['name']; ?></option>
                  <?php else: ?>
                <option  value="<?php echo site_url($url . '/' . $i['no']); ?>"><?php echo $i['name']; ?></option>
                  <?php endif;}?>
              </select>
              <label>縣市</label>
            </div>
          </div>


          <?php endif;?>

          <?php if ($kind != 'counselor' && $kind != 'yda'): ?>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <label for="id">前一組帳號 : <?php echo $latestId ?></label>
            </div>
          </div>

          <?php endif;?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="id" name="id" required <?php echo (empty($users)) ? "" : "disabled" ?> value="<?php echo (empty($users)) ? $accountPrefix : $users['id'] ?>">
              <label for="id">帳號*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="password" id="password" name="password" readonly <?php echo (empty($users)) ? "" : "disabled" ?>
                value="<?php echo (empty($users)) ? "000000" : "********" ?>">
              <label for="password">密碼(密碼需包含英文字母小寫與數字並長度大於8)*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="password" id="passwordVerify" name="passwordVerify" readonly <?php echo (empty($users)) ? "" : "disabled" ?>
                value="<?php echo (empty($users)) ? "000000" : "********" ?>">
              <label for="passwordVerify">再次輸入密碼(密碼需包含英文字母小寫與數字並長度大於8)*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="name" name="name" required
                value="<?php echo (empty($users)) ? "" : $users['name'] ?>">
              <label for="name">使用者姓名*</label>
            </div>
          </div>

          <?php if ($role === 1 && ($kind == 'yda' || $kind == 'support')): ?>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="phone" name="phone" required
                value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->phone ?>">
              <label for="phone">專員電話*</label>
            </div>
          </div>

          <?php endif;?>

          <?php if (($role === 3 || $role === 2) && strpos($kind, 'organization') !== false): ?>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="organization">
                <?php foreach ($organizations as $i) {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['name']; ?></option>
                <?php }?>
              </select>
              <label>機構*</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('/organization/create_organization'); ?>"
                class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>

          <?php endif;?>

          <?php if ($kind === 'county_manager' || $kind === 'county_contractor' || $kind === 'organization_manager' || $kind === 'organization_contractor'): ?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="office_phone" name="office_phone" required
                value="<?php echo (empty($users)) ? "" : $users['office_phone'] ?>">
              <label for="office_phone">辦公室聯絡電話*</label>
            </div>
          </div>

          <?php endif;?>

          <?php if ($kind === 'counselor'): ?>

          <?php if ($role === 2 && $kind === 'counselor') {?>
            <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="organization">
                <?php foreach ($organizations as $i) {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['name']; ?></option>
                <?php }?>
              </select>
              <label>機構*</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('/organization/create_organization'); ?>"
                class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>
                <?php }?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="gender" required>
                <?php if (empty($roleInfo->gender)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($genders as $i) {
    if (!empty($roleInfo->gender)) {
        if ($i['no'] == $roleInfo->gender) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>性別* </label>
            </div>
          </div>


          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="department" name="department" required
                value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->department ?>">
              <label for="department">聯絡電話-單位*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="fax" name="fax"
                value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->fax ?>">
              <label for="fax">聯絡電話-傳真</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="phone" name="phone"
                value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->phone ?>">
              <label for="phone">聯絡電話-手機</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="email" name="email" required
                value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->email ?>">
              <label for="email">電子郵件*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="highest_education" required>
                <?php if (empty($roleInfo->highest_education)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($highestEducations as $i) {
    if (!empty($roleInfo->highest_education)) {
        if ($i['no'] == $roleInfo->highest_education) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>最高學歷* </label>
            </div>
          </div>

          <h6 class="card-title text-center">就學經歷</h6>

          <?php if (empty($roleInfo)): ?>
          <div class="row group">

            <div class="row">
              <div class="input-field col s10 offset-m2 m8-">
                <input type="text" id="education_start_date" name="education_start_date[]" class="datepicker" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->education_start_date ?>">
                <label for="education_start_date">就學經歷-起*</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="education_complete_date" name="education_complete_date[]" class="datepicker" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->education_complete_date ?>">
                <label for="education_complete_date">就學經歷-迄*</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="education_school" name="education_school[]" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->education_school ?>">
                <label for="education_school">學校名稱*</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="education_department" name="education_department[]" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->education_department ?>">
                <label for="education_department">科系*</label>
              </div>
            </div>

          </div>

          <?php else:
    foreach ($schoolHistory as $value) {?>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8-">
						                <input type="text" id="education_start_date" name="education_start_date[]" class="datepicker" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['educationStartDate'] ?>">
						                <label for="education_start_date">就學經歷-起*</label>
						              </div>
						            </div>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="education_complete_date" name="education_complete_date[]" class="datepicker" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['educationCompleteDate'] ?>">
						                <label for="education_complete_date">就學經歷-迄*</label>
						              </div>
						            </div>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="education_school" name="education_school[]" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['educationSchool'] ?>">
						                <label for="education_school">學校名稱*</label>
						              </div>
						            </div>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="education_department" name="education_department[]" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['educationDepartment'] ?>">
						                <label for="education_department">科系*</label>
						              </div>
						            </div>

						          <?php }
endif;?>

          <h6 class="card-title text-center">服務經歷</h6>

          <?php if (empty($roleInfo)): ?>

          <div class="row group">

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="work_start_date" name="work_start_date[]" class="datepicker" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->work_start_date ?>">
                <label for="work_start_date">服務經歷-起*</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="work_complete_date" name="work_complete_date[]" class="datepicker" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->work_complete_date ?>">
                <label for="work_complete_date">服務經歷-迄*</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="work_department" name="work_department[]" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->work_department ?>">
                <label for="work_department">服務單位*</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="work_position" name="work_position[]" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->work_position ?>">
                <label for="work_position">擔任職務*</label>
              </div>
            </div>

          </div>

          <?php else:
    foreach ($workHistory as $value) {?>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="work_start_date" name="work_start_date[]" class="datepicker" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['workStartDate'] ?>">
						                <label for="work_start_date">服務經歷-起*</label>
						              </div>
						            </div>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="work_complete_date" name="work_complete_date[]" class="datepicker" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['workCompleteDate'] ?>">
						                <label for="work_complete_date">服務經歷-迄*</label>
						              </div>
						            </div>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="work_department" name="work_department[]" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['workDepartment'] ?>">
						                <label for="work_department">服務單位*</label>
						              </div>
						            </div>

						            <div class="row">
						              <div class="input-field col s10 offset-m2 m8">
						                <input type="text" id="work_position" name="work_position[]" required
						                  value="<?php echo (empty($roleInfo)) ? "" : $value['workPosition'] ?>">
						                <label for="work_position">擔任職務*</label>
						              </div>
						            </div>
						          <?php }
endif;?>

          <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="duty_date" name="duty_date" class="datepicker" required
                  value="<?php echo (empty($roleInfo)) ? "" : $roleInfo->duty_date ?>">
                <label for="duty_date">到職日*</label>
              </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="affiliated_department" required>
                <?php if (empty($roleInfo->affiliated_department)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($affiliatedDepartments as $i) {
    if (!empty($roleInfo->affiliated_department)) {
        if ($i['no'] == $roleInfo->affiliated_department) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>人員隸屬* </label>
            </div>
          </div>


          <div class="row">
            <?php $qualification = (empty($roleInfo)) ? null : $roleInfo->qualification;
$qualification = explode(",", $qualification);
foreach ($qualifications as $i) {?>
            <div class="col m6">
              <p><label>
                  <input class="filled-in" type="checkbox" name="qualification[]" <?php if (in_array($i['no'], $qualification) == 1) {
    echo "checked";
} else {"";}?> value="<?php echo $i['no']; ?>">
                  <span><?php echo $i['content']; ?></span>
                </label></p>
            </div>
            <?php }?>
          </div>


          <?php endif;?>

          <?php if ($kind != 'counselor'): ?>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="email" name="email" required value="<?php echo (empty($users)) ? "" : $users['email'] ?>">
              <label for="email">聯繫email*</label>
            </div>
          </div>
          <?php endif;?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="line" name="line" value="<?php echo (empty($users)) ? "" : $users['line'] ?>">
              <label for="line">line帳號</label>
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
<?php $this->load->view('templates/footer');?>