<?php $this->load->view('templates/new_header')?>
<div class="container" style="width:90%;">
  <div class="row">
      <div class="row">
        <?php if ($comePage == "allSource"): ?>
          <div class="col-md-12" style="text-align:left;">
          <a class="btn btn-warning" style="margin:10px;" href="<?php echo site_url('/youth/get_all_source_youth_table'); ?>">←原始來源清單</a>
        <?php elseif ($comePage == "allYouth"): ?>
          <div class="col-md-12" style="text-align:left;">
          <a class="btn btn-warning" style="margin:10px;" href="<?php echo site_url('/youth/get_all_youth_table'); ?>">←需關懷追蹤青少年清單</a>
        <?php endif;?>
      </div>
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="col-md-12">
        <form action="<?php echo site_url($url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>"
            value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-3 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-darken-3 text-center">' . $success . '</p>' : ''; ?>

          <!-- identification -->
        <div class="row">
          <div class="col">
            <label for="formIdentification">身分證</label>
            <input class="form-control" type="text" id="formIdentification" name="identification" placeholder="A000000000"
              value="<?php echo (empty($youths)) ? "" : $youths->identifications ?>"
              <?php echo (empty($youths)) ? "" : "" ?>>
          </div>
        
        <!-- name -->
          <div class="col">
            <label for="formName">姓名*</label>
            <input class="form-control" type="text" id="formName" name="name" placeholder="范立人" required
              value="<?php echo (empty($youths)) ? "" : $youths->name ?>"
              <?php echo (empty($youths)) ? "" : "" ?>>
          </div>
        </div><br>

    <!-- birth -->
    <div class="row">
      <div class="col">
        <label for="formBirth">出生年月日</label>
        <input class="form-control" type="text" id="formBirth" name="birth" class="datepicker"
          value="<?php echo (empty($youths)) ? "" : $youths->birth ?>"
          <?php echo (empty($youths)) ? "" : "" ?>>
      </div>

    <!-- gender -->
      <div class="col">
        <label>性別</label>
        <select class="form-select" name="gender" <?php echo (empty($youths->gender)) ? "" : "" ?>>
          <?php if (empty($youths->gender)) {?>
          <option disabled selected value>請選擇</option>
          <?php }
            foreach ($genders as $i) {
                if (!empty($youths->gender)) {
                  if ($i['no'] == $youths->gender) {?>
                    <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>  <?php } else {?>
                    <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                    <?php }
                    } else {?>
                          <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>  <?php }?>
              <?php }?>
        </select>
      </div>

    <!-- phone -->
      <div class="col">
        <label for="formPhone">電話</label>
        <input class="form-control" type="text" id="formPhone" name="phone" placeholder="0900-000-000"
          value="<?php echo (empty($youths)) ? "" : $youths->phone ?>"
          <?php echo (empty($youths)) ? "" : "" ?>>
      </div>
    </div><br>

    <!-- householdAddress -->
    <div class="row">
      <div class="col">
        <label for="formHouseholdAddress">戶籍地址</label>
        <input class="form-control" type="text" id="formHouseholdAddress" name="householdAddress" placeholder="個案地址"
          value="<?php echo (empty($youths)) ? "" : $youths->household_address_aes ?>"
          <?php echo (empty($youths)) ? "" : "" ?>>
      </div>
    </div><br>

    <!-- resideAddress -->
    <div class="row">
      <div class="col">
        <label for="formResideAddress">居住地址</label>
        <input class="form-control" type="text" id="formResideAddress" name="resideAddress" placeholder="個案地址"
          value="<?php echo (empty($youths)) ? "" : $youths->reside_address_aes ?>"
          <?php echo (empty($youths)) ? "" : "" ?>>
      </div>
    </div><br>
    <div class="row">
      <div class="col">
      <label for="formJuniorSchool">國中學校/年級/科系</label>
        <input class="form-control" type="text" id="formJuniorSchool" name="juniorSchool"
          value="<?php echo (empty($youths)) ? "" : $youths->junior_school ?>">
      </div>
      <div class="col">
        <label for="formJuniorGraduateYear">國中畢業年度(填寫「年度」非「學年度，並請填列民國年」)</label>
          <input class="form-control" type="number" min="0" id="formJuniorGraduateYear" name="juniorGraduateYear"
          value="<?php echo (empty($youths)) ? "" : $youths->junior_graduate_year ?>"
          <?php echo (empty($youths)) ? "" : "" ?>>
        </div>
    </div><br>
    <div class="row">
      <div class="col">
        <label>國中是否曾有中輟通報紀錄</label>
        <select class="form-select" name="juniorDropoutRecord" <?php echo (empty($youths)) ? "" : "" ?>>
          <?php if (isset($youths->junior_dropout_record)) {
if ($youths->junior_dropout_record == "1") {?>
          <option value="1" selected>是</option>
          <option value="0">否</option>
          <?php } else {?>
          <option value="1">是</option>
          <option value="0" selected>否</option>
          <?php }
} else {?>
          <option disabled selected value>請選擇</option>
          <option value="1">是</option>
          <option value="0">否</option>
          <?php }?>
        </select>
      </div>
      <div class="col">
        <label>輔導時身分</label>
              <select class="form-select" name="counselIdentity" <?php echo (empty($youths)) ? "" : "" ?>>
                <?php if (empty($youths->counsel_identity)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($counselIdentitys as $i) {
    if (!empty($youths->counsel_identity)) {
        if ($i['no'] == $youths->counsel_identity) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
      </div>
    </div><br>

    <div class="row">
      <div class="col">
        <!-- guardianName -->
        <label for="formGuardianName">監護人姓名</label>
        <input class="form-control" type="text" id="formGuardianName" name="guardianName" placeholder="OOO"
                value="<?php echo (empty($youths)) ? "" : $youths->guardian_name ?>"
                <?php echo (empty($youths)) ? "" : "" ?>>
      </div>

    <!-- guardianShip -->
      <div class="col">
        <label for="formGuardianship">監護人關係</label>
        <input class="form-control" type="text" id="formGuardianship" name="guardianShip" placeholder="父子"
                value="<?php echo (empty($youths)) ? "" : $youths->guardianship ?>"
                <?php echo (empty($youths)) ? "" : "" ?>>
      </div>

    <!-- guardianPhone -->
      <div class="col">
        <label for="formGuardianPhone">監護人電話</label>
        <input class="form-control" type="text" id="formGuardianPhone" name="guardianPhone" placeholder="0000-000-000"
                value="<?php echo (empty($youths)) ? "" : $youths->guardian_phone ?>"
                <?php echo (empty($youths)) ? "" : "" ?>>
      </div>
    </div>

    <!-- guardianHouseholdAddress -->
    <div class="row">
      <div class="col">
        <p><label>
            <input type="checkbox" class="form-check-input" name="guardianHouseholdAddressSame" value="1"
              <?php echo (empty($youths)) ? "" : "" ?> <?php if (!empty($youths)) {if ($youths->household_address_aes == $youths->guardian_household_address_aes) {
                echo "checked";} else {  "";  }} else {
                      "";  }?>>
                  <span>同個案</span>
                </label></p>
              <label for="formGuardianHouseholdAddress">監護人戶籍地址</label>
              <input class="form-control" type="text" id="formGuardianHouseholdAddress" name="guardianHouseholdAddress" placeholder="個案地址"
                value="<?php echo (empty($youths)) ? "" : $youths->guardian_household_address_aes ?>"
                <?php echo (empty($youths)) ? "" : "" ?>>
            </div>
          </div>

          <!-- guardianResideAddress -->
          <div class="row">
            <div class="col">
              <p><label>
                  <input type="checkbox" class="form-check-input" name="guardianResideAddressSame" value="1"
                    <?php echo (empty($youths)) ? "" : "" ?> <?php if (!empty($youths)) {if ($youths->reside_address_aes == $youths->guardian_reside_address_aes) {
    echo "checked";
} else {
    "";
}}?>>
                  <span>同個案</span>
                </label></p>
              <label for="formGuardianResideAddress">監護人居住地址</label>
              <input class="form-control" type="text" id="formGuardianResideAddress" name="guardianResideAddress" placeholder="個案地址"
                value="<?php echo (empty($youths)) ? "" : $youths->guardian_reside_address_aes ?>"
                <?php echo (empty($youths)) ? "" : "" ?>>
            </div>
          </div>

          <!-- source -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <label>青少年來源</label>
              <select class="form-select"name="source">
                <?php if (empty($youths->source)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($sources as $i) {
    if (!empty($youths->source)) {
        if ($i['no'] == $youths->source) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
            </div>
          </div>

          <!-- sourceSchoolYear -->
          <div class="row">
            <div class="col">
              <label for="formSourceSchoolYear">動向調查學年度</label>
              <input class="form-control"type="number" min="0" id="formSourceSchoolYear" name="sourceSchoolYear"
                value="<?php echo (empty($youths)) ? "" : $youths->source_school_year ?>">
            </div>
          </div>

          <!-- surveyType -->
          <div class="row">
            <div class="col">
              <label>動向調查類別</label>
              <select class="form-select"name="surveyType">
                <?php if (empty($youths->survey_type)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($surveyTypes as $i) {
    if (!empty($youths->survey_type)) {
        if ($i['no'] == $youths->survey_type) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
            </div>
          </div><br>

          <div class="row text-center">
            <div class="mg-2">
              <button class="btn btn-primary" type="submit" style="width:150px">送出</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();
  elementRelation.selectInput('source', 'sourceSchoolYear', '動向調查');
  elementRelation.selectInput('source', 'surveyType', '動向調查');
</script>

<?php $this->load->view('templates/new_footer');?>