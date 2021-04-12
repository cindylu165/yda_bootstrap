<?php $this->load->view('templates/header');?>
<div class="container" style="width:90%;">
  <div class="row">
    <div class="card col s12">
      <div class="row"> 
        <a class="btn col s2 offset-s0 waves-effect teal darken-2" style="margin:10px;" href="<?php echo site_url('/report/counseling_member_count_report_table/' . $yearType . '/' . $monthType); ?>">←每月執行進度表清單</a>
      </div>
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <h6 class="card-title text-center"><?php echo '民國'  . $yearType . '年' . $monthType . '月'; ?></h6>

      <div class="card-content">
        <form action="<?php echo site_url($url); ?>"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>"
            value="<?php echo $security->get_csrf_hash() ?>" />

          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">' . $success . '</p>' : ''; ?>

        

          <?php $this->load->view('report/templates/month_report_track_table');?>

          <br/>

          
<!-- 
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea required id="note" class="materialize-textarea"
                name="note"
                <?php echo ($twoYearsTrendSurveyCountReports) ? '' : '' ?>><?php echo (empty($twoYearsTrendSurveyCountReports)) ? $noteDetail[0] : $twoYearsTrendSurveyCountReports->note ?></textarea>
              <label for="note">備註*</label>
            </div>
          </div>  -->

          
          <br/>

          <?php if($reportLogs) :?>
              <h5 class="text-center"><?php echo '審核流程' ?></h5>

              <table class="highlight centered" style="border:2px grey solid;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">使用者姓名</th>
                    <th scope="col">時間</th>
                    <th scope="col">狀態</th>
                    <th scope="col">評論</th>
                  </tr>
                </thead>
                
                  <?php foreach($reportLogs as $value){?>
                    <tbody>
                      <tr>
                        <td><?php echo $value['userName'] ?></php></td>
                        <td><?php echo $value['time'] ?></php></td>
                        <td><?php foreach($processReviewStatuses as $i){
                          if($i['no'] == $value['review_status']){
                            echo $i['content'];
                          }
                        } ?></php></td>
                           <td><?php echo $value['comment'] ?></php></td>

                      </tr>

                    </tbody>
                  <?php }?>
                
              </table>
            <?php endif;?>

          <br/>
          <br/>

            <?php if($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) :?>
        
          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" name="temp" value="Temp" type="submit">暫存</button>
          </div>

          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" name="save" value="Save" type="submit">送出</button>
          </div>

          <?php endif;?>

        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>