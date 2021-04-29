<li>
  <a href="#pageSubmenuYouth" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">評估開案</a>
  <ul class="collapse list-unstyled" id="pageSubmenuYouth">
    <li>
      <a href="<?php echo site_url('/youth/get_all_source_youth_table'); ?>"
        <?php echo $url == '/youth/get_all_source_youth_table' ? 'active' : ''; ?>>原始來源清單</a>
    </li>
    <li>
      <a href="<?php echo site_url('/youth/get_all_youth_table/track/trend'); ?>"
        <?php echo $url == '/youth/get_all_youth_table/track/trend' ? 'active' : ''; ?>>需關懷追蹤青少年清單</a>
    </li>
    <li>
      <a href="<?php echo site_url('/youth/intake/new'); ?>"
        <?php echo $url == '/youth/intake/new' ? 'active' : ''; ?>>青少年初評表</a>
    </li>
  </ul>
</li>

<li>
  <a href="#pageSubmenuCouselorA" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">輔導會談(措施A)</a>
  <ul class="collapse list-unstyled" id="pageSubmenuCouselorA">
    <li>
      <a href="<?php echo site_url('/member/get_member_table_by_counselor'); ?>"
        <?php echo $url == '/member/get_member_table_by_counselor' ? 'active' : ''; ?>>開案學員清單</a>
    </li>
    <li>
      <a href="<?php echo site_url('/member/get_group_counseling_table_by_organization'); ?>"
        <?php echo $url == '/member/group_counseling_participants' ? 'active' : ''; ?>>團體輔導紀錄清單</a>
    </li>
  </ul>
</li>

<li>
  <a href="#pageSubmenuCouselorB" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">生涯探索課程或活動(措施B)</a>
  <ul class="collapse list-unstyled" id="pageSubmenuCouselorB">
    <li>
      <a href="<?php echo site_url('/course/get_course_reference_table_by_organization'); ?>"
        <?php echo $url == '/course/get_course_reference_table_by_organization' ? 'active' : ''; ?>>課程參考清單(歷年資料)</a>
    </li>
    <li>
      <a href="<?php echo site_url('/course/get_course_table_by_organization'); ?>"
        <?php echo $url == '/course/get_course_table_by_organization' ? 'active' : ''; ?>>課程開設清單(今年度資料)</a>
    </li>
    <li>
      <a href="<?php echo site_url('/course/get_course_attendance_table_by_organization'); ?>"
        <?php echo $url == '/course/get_course_attendance_table_by_organization' ? 'active' : ''; ?>>課程時數表(執行當日更新、每月自動統計報表數據)</a>
    </li>
  </ul>
</li>

<li>
  <a href="#pageSubmenuCouselorC" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">工作體驗(措施C)</a>
  <ul class="collapse list-unstyled" id="pageSubmenuCouselorC">
    <li>
      <a href="<?php echo site_url('/work/get_company_table_by_organization'); ?>"
        <?php echo $url == '/work/get_company_table_by_organization' ? 'active' : ''; ?>>店家參考清單(歷年資料)</a>
    </li>
    <li>
      <a href="<?php echo site_url('/work/get_work_experience_table_by_organization'); ?>"
        <?php echo $url == '/work/get_work_experience_table_by_organization' ? 'active' : ''; ?>>工作體驗清單(今年度資料)</a>
    </li>
    <li>
      <a href="<?php echo site_url('/work/get_work_attendance_table_by_organization'); ?>"
        <?php echo $url == '/work/get_work_attendance_table_by_organization' ? 'active' : ''; ?>>工作體驗時數表(執行當日更新、每月自動統計報表數據)</a>
    </li>
  </ul>
</li>

<li>
  <a href="<?php echo site_url('/meeting/meeting_table'); ?>"
    <?php echo $url == '/meeting/meeting_table' ? 'active' : ''; ?>>跨局處會議及預防性講座</a>
</li>

<li>
  <a href="#pageSubmenuReport" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">報表管理</a>
  <ul class="collapse list-unstyled" id="pageSubmenuReport">
    <li>
      <a href="<?php echo site_url('/report/counseling_member_count_report_table'); ?>"
        <?php echo $url == '/report/counseling_member_count_report_table' ? 'active' : ''; ?>>每月執行進度表清單</a>
    </li>
    <li>
      <a href="<?php echo site_url('/report/counselor_report_table'); ?>"
        <?php echo $url == '/report/counselor_report_table' ? 'active' : ''; ?>>即時數據統計</a>
    </li>
  </ul>
</li>

<li>
  <a href="<?php echo site_url('/questionnaire/counselor_questionnaire'); ?>"
    <?php echo $url == '/questionnaire/counselor_questionnaire' ? 'active' : ''; ?>>輔導成效問卷</a>
</li>
