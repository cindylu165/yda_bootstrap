<?php $this->load->view('templates/new_header'); ?>

<div class="breadcrumb-div">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/user/index'); ?>" <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="#"><?php echo '報表管理'; ?></a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/report/counseling_member_count_report_table/' . $yearType . '/' . $monthType); ?>"><?php echo '每月執行進度表清單'; ?></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
    </ol>
  </nav>
</div>

<div class="container" style="width:100%" ;>
  <div class="row">
    <div class="card-body col-sm-12">
      <!-- <div class="row">
        <div class="col-sm-6">
          <a class="btn btn-success" style="margin:10px;" href="<?php echo site_url('/report/counseling_member_count_report_table/' . $yearType . '/' . $monthType); ?>">←每月執行進度表清單</a>
        </div>
      </div> -->
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <h6 class="card-title text-center"><?php echo '民國'  . $yearType . '年' . $monthType . '月'; ?></h6>

      <div class="card-content">

        <form action="<?php echo site_url($url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <!-- <a class="btn col s2 offset-s5 waves-effect blue darken-4" href="<?php echo site_url('/report/month_member_temp_counseling/' . $yearType . '/' . $monthType); ?>">輔導成效概況表</a> -->

          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">' . $success . '</p>' : '';
          $total = 0; ?>

          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />

          <h5 class="text-center">學員統計資料</h5>

          <table class="table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">學員編號</th>
                <th scope="col">姓名</th>.
                <th scope="col">性別</th>
                <th scope="col">學歷狀況</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($members as $value){?>
                <tr>
                  <td><?php echo $value['system_no'];?></td>
                  <td><?php echo $value['name'];?></td>
                  <td><?php foreach($genders as $i) {
                              if($value['gender'] == $i['no'])
                                echo $i['content'];
                            }?></td>
                  <td><?php foreach($educations as $i) {
                              if($value['education'] == $i['no'])
                                echo $i['content'];
                            } ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <br/><br/>

          <table class="table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
            <thead >
              <tr>

                <th scope="col" rowspan="2" colspan="3">中輟滿16歲未升學未就業<br />A</th>
                <th scope="col" colspan="5">國中畢(結)業未就學未就業B</th>
                <th scope="col" rowspan="2" colspan="3">高中中離<br />C</th>
                <th scope="col" rowspan="3">合計</th>

              </tr>
              <tr>
                <th scope="col" colspan="2">應屆</th>
                <th scope="col" colspan="2">非應屆</th>
                <th scope="col" rowspan="2">小計</th>
              </tr>
              <tr>

                <th scope="col">男</th>
                <th scope="col">女</th>
                <th scope="col">小計</th>
                <th scope="col">男</th>
                <th scope="col">女</th>
                <th scope="col">男</th>
                <th scope="col">女</th>
                <th scope="col">男</th>
                <th scope="col">女</th>
                <th scope="col">小計</th>
              </tr>
            </thead>
            <tbody>
              <tr>


                <td><?php echo $count_sixteen_years_old_not_employed_not_studying_boy; ?></td>
                <td><?php echo $count_sixteen_years_old_not_employed_not_studying_girl; ?></td>
                <td><?php echo $count_sixteen_years_old_not_employed_not_studying_boy + $count_sixteen_years_old_not_employed_not_studying_girl; ?></td>

                <td><?php echo $count_junior_graduated_this_year_unemployed_not_studying_boy; ?></td>
                <td><?php echo $count_junior_graduated_this_year_unemployed_not_studying_girl; ?></td>
                <td><?php echo $count_junior_graduated_not_this_year_unemployed_not_studying_boy; ?></td>
                <td><?php echo $count_junior_graduated_not_this_year_unemployed_not_studying_girl; ?></td>
                <td><?php echo $count_junior_graduated_this_year_unemployed_not_studying_boy + $count_junior_graduated_this_year_unemployed_not_studying_girl + $count_junior_graduated_not_this_year_unemployed_not_studying_boy + $count_junior_graduated_not_this_year_unemployed_not_studying_girl; ?></td>

                <td><?php echo $drop_out_from_senior_boy; ?></td>
                <td><?php echo $drop_out_from_senior_girl; ?></td>
                <td><?php echo $drop_out_from_senior_boy + $drop_out_from_senior_girl; ?></td>

                <td><?php echo $count_junior_under_graduate_boy + $count_junior_under_graduate_girl +
                    $count_sixteen_years_old_not_employed_not_studying_boy + $count_sixteen_years_old_not_employed_not_studying_girl +
                    $count_junior_graduated_this_year_unemployed_not_studying_boy + $count_junior_graduated_this_year_unemployed_not_studying_girl + $count_junior_graduated_not_this_year_unemployed_not_studying_boy + $count_junior_graduated_not_this_year_unemployed_not_studying_girl +
                    $drop_out_from_senior_boy + $drop_out_from_senior_girl; ?></td>

                <?php $total = ($count_junior_under_graduate_boy + $count_junior_under_graduate_girl +
                  $count_sixteen_years_old_not_employed_not_studying_boy + $count_sixteen_years_old_not_employed_not_studying_girl +
                  $count_junior_graduated_this_year_unemployed_not_studying_boy + $count_junior_graduated_this_year_unemployed_not_studying_girl + $count_junior_graduated_not_this_year_unemployed_not_studying_boy + $count_junior_graduated_not_this_year_unemployed_not_studying_girl +
                  $drop_out_from_senior_boy + $drop_out_from_senior_girl);
                $total = ($total == 0) ? 1 : $total; ?>

                <!-- <td><?php echo round(($count_junior_under_graduate_boy + $count_junior_under_graduate_girl) / ($total), 2) * 100; ?>%</td> -->
              </tr>
            </tbody>
          </table>

          <br />

          <?php if ($reportLogs) : ?>
            <h5 class="text-center"><?php echo '審核流程' ?></h5>
            <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center" >
              <thead class="header">
                <tr>
                  <th scope="col">使用者姓名</th>
                  <th scope="col">時間</th>
                  <th scope="col">狀態</th>
                  <th scope="col">評論</th>
                </tr>
              </thead>

              <?php foreach ($reportLogs as $value) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $value['userName'] ?></php>
                    </td>
                    <td><?php echo $value['time'] ?></php>
                    </td>
                    <td><?php foreach ($processReviewStatuses as $i) {
                        if ($i['no'] == $value['review_status']) {
                          echo $i['content'];
                        }
                      } ?></php>
                    </td>
                    <td><?php echo $value['comment'] ?></php>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
            </div>
          <?php endif; ?>

          <br />
          <br />

          <?php if ($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) : ?>

            <div class="row justify-content-center">
              <div class="d-grid gap-2 col-sm-6 col-md-4 mb-3">
                <?php
                if (isset($counselor_time) && $counselor_time != 0) {
                  if (isset($county_review_status) && $county_review_status == 0 && $conse_review_status == 2 && $county_time <= $counselor_time) {
                    // 這一關又需要再送出資料 && 下一關已有審核過(有時間戳)
                    echo "<input type='hidden' name='check_create_table' value='create'>";
                    echo "<button class='btn btn-primary'>" . "暫存" . "</button>";
                  }
                } elseif (isset($count_junior_under_graduate_boy)) {
                  // echo "新增";
                  echo "<input type='hidden' name='check_create_table' value='create'>";
                  echo "<button class='btn btn-primary'>" . "暫存" . "</button>";
                } ?>
              </div>
            </div>

            <?php $totalValue = ( count($tableValue['one']) + count($tableValue['two']) +
                              count($tableValue['three']) + count($tableValue['four']) +
                              count($tableValue['five']) + count($tableValue['six']) +
                              count($tableValue['seven']) + count($tableValue['eight']) );?>
            <?php if(count($members) == $totalValue) :?>

            <div class="row justify-content-center">
              <div class="d-grid gap-2 col-sm-6 col-md-4 mb-3">
                <button class="btn btn-primary" name="save" value="Save" type="submit">送出</button>
              </div>
            </div>

            <?php else :?>
              <h6 style="color:red;" class="text-center">請先填寫學員列表『青少年初評表』中的『性別』與『開案學員資料表』中的『學歷狀況』</h6>
              <h6 style="color:red;" class="text-center">填寫狀況 : <?php echo $totalValue . '/' . count($members);?></h6>
            <?php endif;?>


          <?php else : ?>

            <a class="btn btn-info my-3" href="<?php echo site_url('report/counseling_identity_count_report_table/' . $yearType . '/' . $monthType); ?>">預覽縣市承辦人端</a>
            <br/><br/>

          <?php endif; ?>

        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/new_footer'); ?>