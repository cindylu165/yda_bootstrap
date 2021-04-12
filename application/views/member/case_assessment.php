<?php $this->load->view('templates/header');?>
<div class="container" style="width:90%;">
  <div class="row">
    <div class="card col s12 ">
      <div class="row"> 
        <a class="btn col s2 offset-s0 waves-effect teal darken-2" style="margin:10px;" href="<?php echo site_url('/member/get_member_table_by_counselor'); ?>">←學員列表</a>
      </div>
      <div class="row">
        <h4 class="card-title text-center"><?php echo $title ?></h4>
      </div>
      
      <h6 class="text-center">編號: <?php echo $members->system_no; ?></h6>
      <h6 class="text-center">學員: <?php echo $members->name; ?></h6>

      <div class="card-content">
        <form action="<?php echo site_url($url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>"
            value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-3 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-darken-3 text-center">' . $success . '</p>' : ''; ?>
         
          <!-- <?php if (empty($reviews)): ?>
            <div class="row">
              <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url('/member/change_counselor_apply/' . $caseAssessments->member); ?>">提出更換輔導員申請</a>
            </div>
          <?php else: ?>
            <h6 class="card-title text-center">正在審核更換輔導員</h6>
            <div class="card-content">
              <table class="highlight">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">日期</th>
                    <th scope="col">狀態</th>
                    <th scope="col">審核者</th>
                    <th scope="col">審核日期</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($reviews as $value) {?>

                    <tr>
                      <td><?php echo $value['create_time']; ?></td>
                      <td><?php foreach ($statuses as $i) {
    if ($i['no'] == $value['status']) {
        echo $i['content'];
    }
}?></td>
                      <td><?php if ($value['reviewer_role'] == 4): echo '縣市主管';else:echo '縣市承辦人';endif;?></td>
                      <td><?php echo $value['end_time']; ?></td>
                    </tr>
              <?php }?>

                </tbody>
              </table>
            </div>
          <?php endif;?> -->
          <!-- isContinue -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="isContinue" id="isContinue" onchange="location = this.value;"
                <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>

                <option value="<?php echo site_url($url . '/'); ?>">否</option>
                <option value="<?php echo site_url($url . '/1'); ?>">是</option>
              </select>
              <label>是否匯入去年度開案評估表資料</label>
            </div>
          </div>

          <h6 class="card-title text-center">青少年背景資料</h6>

          <!-- interviewDate -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formInterviewDate" required name="interviewDate" class="datepicker"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->interview_date ?>">
              <label for="formInterviewDate">初談日期</label>
            </div>
          </div>

          <!-- interviewWay -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="interviewWay" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($caseAssessments->interview_way)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($interviewWays as $i) {
    if (!empty($caseAssessments->interview_way)) {
        if ($i['no'] == $caseAssessments->interview_way) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>進行方式</label>
            </div>
          </div>

          <!-- interviewPlace -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formInterviewPlace" name="interviewPlace" placeholder="OO國中輔導室"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->interview_place ?>">
              <label for="formInterviewPlace">諮詢地點</label>
            </div>
          </div>

          <!-- interviewWay -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="education" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($caseAssessments->education)) {?>
                <option disabled selected value><?php empty($age) ? "" : "請選擇"?></option>
                <?php }
foreach ($educations as $i) {
    if (!empty($caseAssessments->education)) {
        if ($i['no'] == $caseAssessments->education) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>學歷狀況
              <!-- <?php if (empty($age)) {?>
            <h6 style="color:red;" class="text-center">請先填寫該學員的生日</h5><br/>
          <?php }?> -->
              </label>
            </div>
          </div>

          <!-- source -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="source" required <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($caseAssessments->source)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($sources as $i) {
    if (!empty($caseAssessments->source)) {
        if ($i['no'] == $caseAssessments->source) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>學員來源</label>
            </div>
          </div>

          <!-- sourceOther -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formSourceOther" name="sourceOther"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->source_other ?>">
              <label for="formSourceOther">青少年來源-其他</label>
            </div>
          </div>

          <!-- surveyYear -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formSurveyYear" name="surveyYear"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->survey_year ?>">
              <label for="formSurveyYear">動向調查名單-學年度</label>
            </div>
          </div>

          <!-- background -->
          <h6 ></h6><b>青少年身分別(可複選)</b></h6>
          <div class="row">
            <?php $background = (empty($caseAssessments)) ? null : $caseAssessments->background;
$background = explode(",", $background);
foreach ($backgrounds as $i) {?>
            <div class="col m6">
              <p><label>
                  <input class="filled-in" type="checkbox" name="background[]"
                    <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?> <?php if (in_array($i['no'], $background) == 1) {
    echo "checked";
} else {"";}?> value="<?php echo $i['no']; ?>">
                  <span><?php echo $i['content']; ?></span>
                </label></p>
            </div>
            <?php }?>
          </div>

          <!-- backgroundOther -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formBackgroundOther" name="backgroundOther"
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->background_other ?>">
              <label for="formBackgroundOther">青少年身分別-其他</label>
            </div>
          </div>

          <h6 class="card-title text-center">青少年狀況</h6>

          <!-- appearanceHabits -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formAppearanceHabits" class="materialize-textarea" placeholder="因畢業後都在家，沉迷於網路，作息日夜顛倒"
                name="appearanceHabits"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->appearance_habits ?></textarea>
              <label for="formAppearanceHabits">儀容、生活習慣描述(是否有特殊習慣如菸癮、檳榔、日常作息):</label>
            </div>
          </div>

          <!-- majorSetback -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formMajorSetback" class="materialize-textarea" placeholder="1.國小二年級父母離婚，案父取得監護權並與案父同住
2.國中二年級下學期因被同學偷竊班費而被霸凌，由班導師轉介輔導室" name="majorSetback"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->major_setback ?></textarea>
              <label for="formMajorSetback">生命重大事件或家庭重大事件:</label>
            </div>
          </div>

          <!-- interestPlan -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formInterestPlan" class="materialize-textarea" placeholder="對汽修有興趣，想往高職體系就讀但自信心不足，會考分數也不夠"
                name="interestPlan"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->interest_plan ?></textarea>
              <label for="formInterestPlan">興趣與未來生涯規劃:</label>
            </div>
          </div>

          <!-- interactiveExperience -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formInteractiveExperience" class="materialize-textarea" placeholder="1.個案口齒清晰，個性活潑
2.思考及表達能力中下，口語互動上需有較多緩衝時間" name="interactiveExperience"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->interactive_experience ?></textarea>
              <label for="formInteractiveExperience">互動經驗描述(表達能力、個性等):</label>
            </div>
          </div>

          <!-- transportation -->
          <h6><b>交通能力評估(可複選)</b></h6>
          <div class="row">
            <?php $transportation = (empty($caseAssessments)) ? null : $caseAssessments->transportation;
$transportation = explode(",", $transportation);
foreach ($transportations as $i) {?>
            <div class="col m6">
              <p><label>
                  <input class="filled-in" type="checkbox" name="transportation[]"
                    <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?> <?php if (in_array($i['no'], $transportation) == 1) {
    echo "checked";
} else {"";}?> value="<?php echo $i['no']; ?>">
                  <span><?php echo $i['content']; ?></span>
                </label></p>
            </div>
            <?php }?>
          </div>

          <!-- transportationOther -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formTransportationOther" name="transportationOther"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->transportation_other ?>">
              <label for="formTransportationOther">交通能力評估-其他</label>
            </div>
          </div>

          <!-- medicalSupport -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="medicalSupport" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (isset($caseAssessments->medical_support)) {
    if ($caseAssessments->medical_support == "1") {?>
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
              <label>醫療需求</label>
            </div>
          </div>

          <!-- medicalReason -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formMedicalReason" name="medicalReason"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->medical_reason ?>">
              <label for="formMedicalReason">醫療需求-原因</label>
            </div>
          </div>

          <h5 class="card-title text-center">家庭概況</h5>

          <!-- familyMember -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formFamilyMember" class="materialize-textarea" placeholder="1.案父母於個案國小2年級時因個性不合離婚
2.與案父同住，案父以開計程車為業，與案祖父、祖母同住舊透天屋
3.尚有小三歲的妹妹與案母同住" name="familyMember"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->family_member ?></textarea>
              <label for="formFamilyMember">家庭成員(生活、環境、職業):</label>
            </div>
          </div>

          <!-- familyInteractivePattern -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formFamilyInteractivePattern" class="materialize-textarea"
                placeholder="祖父母、父母以民主方式管教，但大人的觀念常與個案不合" name="familyInteractivePattern"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->family_interactive_pattern ?></textarea>
              <label for="formFamilyInteractivePattern">家庭互動模式:</label>
            </div>
          </div>

          <!-- communityInteractivePattern -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formCommunityInteractivePattern" class="materialize-textarea"
                placeholder="無特殊互動、也沒有與人結怨，個案會跟鄰居在倒垃圾時聊天" name="communityInteractivePattern"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->community_interactive_pattern ?></textarea>
              <label for="formCommunityInteractivePattern">親屬與社區系統互動情形:</label>
            </div>
          </div>

          <!-- familyMajorSetback -->
          <!-- <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formFamilyMajorSetback" class="materialize-textarea" placeholder="1.國小二年級父母離婚，案父取得監護權並與案父同住
2.國中二年級下學期因被同學偷竊班費而被霸凌，由班導師轉介輔導室" name="familyMajorSetback"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->family_major_setback ?></textarea>
              <label for="formFamilyMajorSetback">家庭重大事件:</label>
            </div>
          </div> -->

          <!-- familyOtherSetback -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formFamilyOtherSetback" class="materialize-textarea" placeholder="無"
                name="familyOtherSetback"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->family_other_setback ?></textarea>
              <label for="formFamilyOtherSetback">其他事件(如家暴、性侵事件):</label>
            </div>
          </div>

          <h6 class="card-title text-center">學校概況</h6>

          <!-- schoolHistory -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formSchoolHistory" class="materialize-textarea" placeholder="OO國中準時畢業，欲就讀OO高職但未被錄取"
                name="schoolHistory"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->school_history ?></textarea>
              <label for="formSchoolHistory">就學史:簡述學員國中、高中(職)就學歷史:</label>
            </div>
          </div>

          <!-- teacherInteractivePattern -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="teacherInteractivePattern" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($inTakes->teacher_interactive_pattern)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($teacherInteractivePatterns as $i) {
    if (!empty($caseAssessments->teacher_interactive_pattern)) {
        if ($i['no'] == $caseAssessments->teacher_interactive_pattern) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>師生關係與互動</label>
            </div>
          </div>

          <!-- teacherBadReason -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formTeacherBadReason" class="materialize-textarea" placeholder="個案於課堂上偶爾會主動與老師互動，特別是體育課"
                name="teacherBadReason"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->teacher_bad_reason ?></textarea>
              <label for="formTeacherBadReason">師生關係與互動(補充說明):</label>
            </div>
          </div>

          <!-- peerInteractivePattern -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="peerInteractivePattern" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($inTakes->peer_interactive_pattern)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($peerInteractivePatterns as $i) {
    if (!empty($caseAssessments->peer_interactive_pattern)) {
        if ($i['no'] == $caseAssessments->peer_interactive_pattern) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>同儕關係</label>
            </div>
          </div>

          <!-- peerBadReason -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formPeerBadReason" class="materialize-textarea" placeholder="因被懷疑偷竊班費，曾有被霸凌經驗"
                name="peerBadReason"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->peer_bad_reason ?></textarea>
              <label for="formPeerBadReason">同儕關係(補充說明):</label>
            </div>
          </div>

          <!-- academicPerformance -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="academicPerformance" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (empty($inTakes->academic_performance)) {?>
                <option disabled selected value>請選擇</option>
                <?php }
foreach ($academicPerformances as $i) {
    if (!empty($caseAssessments->academic_performance)) {
        if ($i['no'] == $caseAssessments->academic_performance) {?>
                <option selected value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }
    } else {?>
                <option value="<?php echo $i['no']; ?>"><?php echo $i['content']; ?></option>
                <?php }?>
                <?php }?>
              </select>
              <label>學業表現</label>
            </div>
          </div>

          <!-- interestSubject -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formInterestSubject" class="materialize-textarea" placeholder="自述學業成績不如人"
                name="interestSubject"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->interest_subject ?></textarea>
              <label for="formInterestSubject">學業表現(補充說明):</label>
            </div>
          </div>

          <!-- violation -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="violation" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (isset($caseAssessments->violation)) {
    if ($caseAssessments->violation == "1") {?>
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
              <label>其他事件(如特殊事件、違規行為)</label>
            </div>
          </div>

          <!-- violationDescription -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formViolationDescription" class="materialize-textarea" name="violationDescription"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->violation_description ?></textarea>
              <label for="formViolationDescription">其他事件(補充說明):</label>
            </div>
          </div>

          <h5 class="card-title text-center">資源介入概況(政府單位或其他民間單位補助)</h5>

          <!-- welfareSupport -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="welfareSupport" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (isset($caseAssessments->welfare_support)) {
    if ($caseAssessments->welfare_support == "1") {?>
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
              <label>福利身分</label>
            </div>
          </div>

          <!-- welfareAmount -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="number" id="formWelfareAmount" name="welfareAmount" min="0"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->welfare_amount ?>">
              <label for="formWelfareAmount">補助金額</label>
            </div>
          </div>

          <!-- welfareSource -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formWelfareSource" name="welfareSource"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->welfare_source ?>">
              <label for="formWelfareSource">福利來源/單位</label>
            </div>
          </div>

          <!-- eventSource -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formEventSource" name="eventSource"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->event_source ?>">
              <label for="formEventSource">通報單位</label>
            </div>
          </div>

          <!-- eventDescription -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formEventDescription" class="materialize-textarea" name="eventDescription"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->event_description ?></textarea>
              <label for="formEventDescription">通報事件(補充說明):</label>
            </div>
          </div>
          
          <!-- servingSource -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="servingSource" <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?>>
                <?php if (isset($caseAssessments->serving_source)) {
    if ($caseAssessments->serving_source == "1") {?>
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
              <label>其他民間單位</label>
            </div>
          </div>

          <!-- servingInstitution -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formServingInstitution" name="servingInstitution" placeholder="無"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->serving_institution ?>">
              <label for="formServingInstitution">單位</label>
            </div>
          </div>

          <!-- servingProfessional -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formServingProfessional" name="servingProfessional" placeholder="無"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->serving_professional ?>">
              <label for="formServingProfessional">專業人員姓名</label>
            </div>
          </div>

          <!-- servingPhone -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formServingPhone" name="servingPhone" placeholder="無"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->serving_phone ?>">
              <label for="formServingPhone">連絡電話</label>
            </div>
          </div>

          <!-- issue -->
          <h6><b>青少年議題(可複選)</b></h6>
          <div class="row">
            <?php $issue = (empty($caseAssessments)) ? null : $caseAssessments->issue;
$issue = explode(",", $issue);
foreach ($issues as $i) {?>
            <div class="col m6">
              <p><label>
                  <input class="filled-in" type="checkbox" name="issue[]"
                    <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?> <?php if (in_array($i['no'], $issue) == 1) {
    echo "checked";
} else {"";}?> value="<?php echo $i['no']; ?>">
                  <span><?php echo $i['content']; ?></span>
                </label></p>
            </div>
            <?php }?>
          </div>

          <!-- issueOther -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formIssueOther" name="issueOther"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->issue_other ?>">
              <label for="formIssueOther">青少年議題-其他</label>
            </div>
          </div>

          <!-- counselWay -->
          <h6><b>預計輔導方式(可複選):</b></h6>
          <div class="row">
            <?php $counselWay = (empty($caseAssessments)) ? null : $caseAssessments->counsel_way;
$counselWay = explode(",", $counselWay);
foreach ($counselWays as $i) {?>
            <div class="col m6">
              <p><label>
                  <input class="filled-in" type="checkbox" name="counselWay[]"
                    <?php echo ($hasDelegation == '0') ? 'disabled' : '' ?> <?php if (in_array($i['no'], $counselWay) == 1) {
    echo "checked";
} else {"";}?> value="<?php echo $i['no']; ?>">
                  <span><?php echo $i['content']; ?></span>
                </label></p>
            </div>
            <?php }?>
          </div>

          <!-- counselWayOther -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formCounselWayOther" name="counselWayOther"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>
                value="<?php echo (empty($caseAssessments)) ? "" : $caseAssessments->counsel_way_other ?>">
              <label for="formCounselWayOther">預計輔導方式-其他</label>
            </div>
          </div>

          <!-- counselTarget -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formCounselTarget" class="materialize-textarea" placeholder="1.帶領個案探索汽修專業，並進行工作體驗
                2.已就學為目標" name="counselTarget"
                <?php echo ($hasDelegation == '0') ? 'readonly' : '' ?>><?php echo (empty($caseAssessments)) ? "" : $caseAssessments->counsel_target ?></textarea>
              <label for="formCounselTarget">預計輔導目標及綜合評估(請條列):</label>
            </div>
          </div>

          <div class="row">
            <div class="file-field input-field col s10 offset-m2 m8">
              <?php if ($hasDelegation != '0'): ?>
              <button class="btn waves-effect blue darken-4">
                <span>上傳檔案</span>
                <input type="file" name="familyDiagram">
              </button>
              <?php endif;?>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="家系圖(jpg/png/pdf)">
              </div>
            </div>
            <?php if (!empty($caseAssessments->family_diagram_name)): ?>
            <?php if (strpos($caseAssessments->family_diagram_name, 'pdf') !== false): ?>
            <a class="col s10 offset-m2 m8"
              href="<?php echo site_url() . '/files/' . $caseAssessments->family_diagram_name; ?>" download="家系圖">家系圖(jpg/png/pdf)</a>
            <?php else: ?>
            <div class="col s10 offset-m2 m8">
              <img class="materialboxed responsive-img"
                src="<?php echo site_url() . '/files/' . $caseAssessments->family_diagram_name; ?>" />
            </div>
            <?php endif;?>
            <?php endif;?>
          </div>

          <div class="row">
            <div class="file-field input-field col s10 offset-m2 m8">
              <?php if ($hasDelegation != '0'): ?>
              <button class="btn waves-effect blue darken-4">
                <span>上傳檔案</span>
                <input type="file" name="representativeAgreement">
              </button>
              <?php endif;?>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="法定代理人同意書(jpg/png/pdf)">
              </div>
            </div>
            <?php if (!empty($caseAssessments->representative_agreement_name)): ?>
            <?php if (strpos($caseAssessments->representative_agreement_name, 'pdf') !== false): ?>
            <a class="col s10 offset-m2 m8"
              href="<?php echo site_url() . '/files/' . $caseAssessments->representative_agreement_name; ?>"
              download="法定代理人同意書">法定代理人同意書(jpg/png/pdf)</a>
            <?php else: ?>
            <div class="col s10 offset-m2 m8">
              <img class="materialboxed responsive-img"
                src="<?php echo site_url() . '/files/' . $caseAssessments->representative_agreement_name; ?>" />
            </div>
            <?php endif;?>
            <?php endif;?>
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
  elementRelation.selectInput('interviewWay', 'interviewPlace', '面訪');
  elementRelation.selectInput('source', 'sourceOther', '其他');
  elementRelation.selectInput('source', 'surveyYear', '動向調查名單');
  elementRelation.checkboxInput('background[]', 'backgroundOther');
  elementRelation.checkboxInput('transportation[]', 'transportationOther', '其他');
  elementRelation.selectInput('medicalSupport', 'medicalReason', '是');
  elementRelation.selectInput('violation', 'violationDescription', '是');
  elementRelation.checkboxInput('counselWay[]', 'counselWayOther');
  elementRelation.checkboxInput('issue[]', 'issueOther');
  elementRelation.selectInput('welfareSupport', 'welfareAmount', '是');
  elementRelation.selectInput('welfareSupport', 'welfareSource', '是');
  elementRelation.selectInput('welfareSupport', 'eventSource', '是');
  elementRelation.selectInput('welfareSupport', 'eventDescription', '是');
  elementRelation.selectInput('servingSource', 'servingInstitution', '是');
  elementRelation.selectInput('servingSource', 'servingProfessional', '是');
  elementRelation.selectInput('servingSource', 'servingPhone', '是');

</script>

<?php $this->load->view('templates/footer');?>