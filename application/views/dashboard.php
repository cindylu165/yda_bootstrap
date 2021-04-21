<?php $this->load->view('templates/new_header');?>
<div class="breadcrumb-div">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">首頁</li>
      <!-- <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/user/index'); ?>"
          <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
      </li> -->
    </ol>
  </nav>
</div>

<h1 class="dashboard_card_title">最新消息</h1>

<div class="container">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered border-dark" font>
          <thead>
            <tr>
              <th style="width:10%; background-color:black;" scope="col" class="header text-white">日期</th>
              <th style="width:10%; background-color:black;" scope="col" class="header text-white">分類</th>
              <th style="background-color:black;" scope="col" class="header text-white">內容</th>
              <th style="width:10%; background-color:black;" scope="col" class="header text-white">發布者</th>
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
                          } ?></td>
                <td><?php echo $i['content']; ?></td>
                <td><?php echo '青年發展署'; ?></td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<h1 class="dashboard_card_title">執行狀況</h1>
<div class="container">
  <div class="row justify-content-center mx-3">  
    <div class="main_block col-12 m-3">
      <div class="row justify-content-around m-4">

        <div class="col-12 col-lg-4 py-3 text-light">
          <div id="status-element-1">
            <div class="container d-flex justify-content-end py-2 px-2">
              <h1 class="my-3" style="text-align: right; padding-left:10px;"><?php echo $statisticsData->countyCount; ?></h1>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 py-3 text-light">
          <div id="status-element-2">
            <div class="container d-flex justify-content-end px-4">
              <h1 class="my-3" style="font-size: 4vw"><?php echo $statisticsData->counselorCount; ?></h1>
            </div>
          </div>
        </div>
              
        <div class="col-lg-4 col-md-12 py-3 text-light">
          <div id="status-element-3">
            <div class="container d-flex justify-content-end px-4">
              <h1 class="my-3" style="font-size: 4vw"><?php echo $statisticsData->memberCount; ?></h1>
            </div>
          </div>
        </div>
              
        <div class="col-lg-4 col-md-12 py-3 text-light">
          <div id="status-element-4">
            <div class="container d-flex justify-content-end py-3 px-2">
              <h1><?php echo ($statisticsData->individualCounselingHour + $statisticsData->groupCounselingHour); ?></h1>
            </div>
          </div>
        </div>
              
        <div class="col-lg-4 col-md-12 py-3 text-light">
          <div id="status-element-5">
            <div class="container d-flex justify-content-end py-3 px-2">
              <h1><?php echo $statisticsData->courseAttendanceHour; ?></h1>
            </div>
          </div>
        </div>
              
        <div class="col-lg-4 col-md-12 py-3 text-light">
          <div id="status-element-6">
            <div class="container d-flex justify-content-end py-3 px-2">
              <h1><?php echo $statisticsData->workAttendanceHour; ?></h1>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<h1 class="dashboard_card_title">各縣市聯繫窗口</h1>
<div class="county_card">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered border-dark">
          <thead style="position: sticky;top:0;">
            <tr>
              <th style="background-color:black;" scope="col" class="header text-white">縣市</th>
              <th style="background-color:black;" scope="col" class="header text-white">承辦單位</th>
              <th style="background-color:black;" scope="col" class="header text-white">聯絡人</th>
              <th style="background-color:black;" scope="col" class="header text-white">職稱</th>
              <th style="background-color:black;" scope="col" class="header text-white">電話</th>
              <th style="background-color:black;" scope="col" class="header text-white">信箱</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($countyContacts as $i) { ?>
              <tr>
                <td scope="row"><?php foreach($counties as $value){
                                        if($value['no'] == $i['county']){
                                          echo $value['name'];
                                        }
                                      } ?></td>
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


                   
       
<div>&nbsp</div>

<?php $this->load->view('templates/new_footer');?>
