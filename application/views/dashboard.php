<?php $this->load->view('templates/new_header');?>

<div class="container" style="width:90%;">
  <div class="row">
    <div class="card">
      <div class="card-content">

        <div class="dashboard_card">
          <h3 class="dashboard_card_title">最新消息</h3>
          <table class="highlight centered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">日期</th>
                <th scope="col">分類</th>
                <th scope="col">內容</th>
                <th scope="col">發布者</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($messagers as $i) {?>
              <tr>
                <td><?php echo $i['create_date']; ?></td>
                <td><?php foreach ($types as $value) {
    if ($value['no'] == $i['type']) {
        echo $value['content'];
    }
}?></td>
                <td><?php echo $i['content']; ?></td>

                <td><?php echo '青年發展署' ?>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>


        <div class="card-content">
          <div>
            <h3 class="dashboard_card_title">執行狀況</h3>

            <div class="row">
              <div class="col m12 l6 xl4 white-text">
                <div id="status-element-1">
                  <div class="container">
                    <div class="row right">
                      <div class="col s12">
                        <h1 class="element_county"><?php echo $statisticsData->countyCount ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m12 l6 xl4 white-text">
                <div id="status-element-2">
                  <div class="container">
                    <div class="row right">
                      <div class="col s12">
                        <h1 class="element_text"><?php echo $statisticsData->counselorCount ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m12 l6 xl4 white-text">
                <div id="status-element-3">
                  <div class="container">
                    <div class="row right">
                      <div class="col s12">
                        <h1 class="element_text"><?php echo $statisticsData->memberCount ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m12 l6 xl4 white-text">
                <div id="status-element-4">
                  <div class="container">
                    <div class="row right">
                      <div class="col s12">
                        <h1 style="font-size: 2.5rem;" class="element_text_small"><?php echo ($statisticsData->individualCounselingHour + $statisticsData->groupCounselingHour) ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m12 l6 xl4 white-text">
                <div id="status-element-5">
                  <div class="container">
                    <div class="row right">
                      <div class="col s12">
                        <h1 style="font-size: 3rem" class="element_text_small"><?php echo $statisticsData->courseAttendanceHour ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m12 l6 xl4 white-text">
                <div id="status-element-6">
                  <div class="container">
                    <div class="row right">
                      <div class="col s12">
                        <h1 style="font-size: 3rem" class="element_text_small"><?php echo $statisticsData->workAttendanceHour ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <div class="county_card">
          <h3 class="dashboard_card_title">各縣市聯繫窗口</h3>
          <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">縣市</th>
              <th scope="col">承辦單位</th>
              <th scope="col">聯絡人</th>
              <th scope="col">職稱</th>
              <th scope="col">電話</th>
              <th scope="col">信箱</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($countyContacts as $i) { ?>
              <tr>
                <td><?php foreach($counties as $value){
                    if($value['no'] == $i['county']){
                        echo $value['name'];
                    }
                }?></td>
                <td><?php echo $i['orgnizer'];?></td>
                <td><?php echo $i['name'];?></td>
                <td><?php echo $i['title'];?></td>
                <td><?php echo $i['phone'];?></td>
                <td><?php echo $i['email'];?></td>
               
              </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>

      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/new_footer');?>