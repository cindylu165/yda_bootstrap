<li>
  <a href="#pageSubmenuSystemAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">系統帳號管理</a>
  <ul class="collapse list-unstyled" id="pageSubmenuSystemAccount">
    <li>
      <a href="<?php echo site_url('/user/create_yda_account'); ?>" 
        <?php echo $url == '/user/create_yda_account' ? 'active' : ''; ?>>建立青年署專員帳號</a>
    </li>
    <li>
      <a href="<?php echo site_url('/user/create_yda_support_account'); ?>" 
        <?php echo $url == '/user/create_yda_support_account' ? 'active' : ''; ?>>建立支援計畫人員帳號</a>
    </li>
    <li>
      <a href="<?php echo site_url('/user/create_county_manager_account'); ?>"
        <?php echo $url == '/user/create_county_manager_account' ? 'active' : ''; ?>>建立縣市主管帳號</a>
    </li>
    <li>
      <a href="<?php echo site_url('/user/create_county_contractor_account'); ?>"
        <?php echo $url == '/user/create_county_contractor_account' ? 'active' : ''; ?>>建立本縣市承辦人帳號</a>
    </li>
    <li>
      <a href="<?php echo site_url('/user/account_manage_table'); ?>"
        <?php echo $url == '/user/account_manage_table' ? 'active' : ''; ?>>系統帳號清單</a>
    </li>
  </ul>
</li>

<li>
  <a href="<?php echo site_url('/user/account_manage_table'); ?>"
    <?php echo $url == '/user/account_manage_table' ? 'active' : ''; ?>>消息管理</a>
</li>

<li>
  <a href="<?php echo site_url('/user/account_manage_table'); ?>"
    <?php echo $url == '/user/account_manage_table' ? 'active' : ''; ?>>縣市與計畫案管理</a>
</li>

<li>
  <a href="#pageSubmenuReport" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">報表管理</a>
  <ul class="collapse list-unstyled" id="pageSubmenuReport">
    <li>
      <a href="<?php echo site_url('/report/counseling_member_count_report_table'); ?>"
        <?php echo $url == '/report/counseling_member_count_report_table' ? 'active' : ''; ?>>每月執行進度表清單</a>
    </li>
    <li>
      <a href="<?php echo site_url('/report/county_report_table'); ?>"
        <?php echo $url == '/report/county_report_table' ? 'active' : ''; ?>>即時數據統計</a>
    </li>
  </ul>
</li>