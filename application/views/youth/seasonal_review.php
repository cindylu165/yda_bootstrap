<?php $this->load->view('templates/new_header');?>
<div class="breadcrumb-div">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/user/index'); ?>" <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="#">評估開案</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/youth/get_all_youth_table'); ?>">需關懷追蹤青少年清單</a>
      </li>
      <li class="breadcrumb-item active" style="color:blue;" aria-current="page">
        <a href="<?php echo site_url('/youth/get_seasonal_review_table_by_youth/'.$youths->no); ?>">季追蹤清單</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
    </ol>
  </nav>
</div>

<div class="container">
  <div class="row" style="text-align:center;">
    <div class="row">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <form action="<?php echo site_url($url);?>" 
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">'.$error.'</p>' : '';?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">'.$success.'</p>' : '';?>
       
          <h6 class="text-center">青少年: <?php echo $youthName; ?></h6>
          <div class="row justify-content-md-center input-group">
          <!-- <label for="formDate">追蹤日期*</label> -->
            <label for="formDate">追蹤日期*:</label>
            <div class="col col-lg-2" style="text-align:center">
              <input class="form-control datepickerTW" value="<?php echo (empty($seasonalReviews)) ? "" : $seasonalReviews->date ?>">
            </div>
          </div>
    <!-- </div>       -->
                    <!-- date -->
          <!-- <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formDate" required name="date" class="datepicker" value="<?php echo (empty($seasonalReviews)) ? "" : $seasonalReviews->date ?>">
              <label for="formDate"></label>
            </div>
          </div> -->

          <!-- isCounseling -->
          <div class="row justify-content-md-center input-group">
            <div class="col col-lg-2">
            <label for="counties" style="text-align:center;"class="col-form-label">是否進入本計畫輔導</label>
              <select name="isCounseling" class="form-select">
              <?php if(isset($seasonalReviews->is_counseling)){
                if($seasonalReviews->is_counseling == "1"){?>
                <option value="1" selected>是</option>
                <option value="0" >否</option>
              <?php }else{?>
                <option value="1" >是</option>
                <option value="0" selected>否</option>
              <?php }
              }else{
                if($isCounselingMember){?>
                <option value="1">是</option>
                
                <?php }else{ ?>
                  <option value="0">否</option>
              <?php }}?>
              </select>
            </div>
          </div>
            
          <!-- trend -->
          
          <div class="row justify-content-md-center input-group">
            <label for="counties">動向調查</label>
            <div class="col">
              <select name="trend" class="form-select" > 
                <?php if(empty($seasonalReviews->trend)){?>
                  <option disabled selected value>請選擇</option>
                  <?php }foreach($trends as $i) { 
                  if(!empty($seasonalReviews->trend)){
                    if($i['no'] == $seasonalReviews->trend){ ?>
                      <option selected value="<?php echo $i['no'];?>"><?php echo $i['content'];?></option>
                    <?php }
                    else{ ?>
                      <option value="<?php echo $i['no'];?>"><?php echo $i['content'];?></option>
                    <?php }
                  }else{ ?>
                    <option value="<?php echo $i['no'];?>"><?php echo $i['content'];?></option>
                  <?php } ?>
                <?php } ?>
              </select>
              <!-- <label>動向調查</label> -->
            </div>
          <!-- </div> -->
          </div>

          <!-- trendDescription -->
          <!-- <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea class="form-control" id="formTrendDescription" name="trendDescription" class="materialize-textarea" ><?php echo (empty($seasonalReviews)) ? "" : $seasonalReviews->trend_description ?></textarea>
              <label for="formTrendDescription">動向調查-說明(如選填「其他」、「其他單位協助」、「未取得聯繫」請說明原因)</label>
            </div>
          </div> -->
          <br>
          <div class="md-3 row">
            <div class="input-group">
              <span class="input-group-text">動向調查-說明<br>(如選填「其他」、「其他單位協助」、「未取得聯繫」請說明原因)</span>
              <textarea class="form-control" id="formTrendDescription" name="trendDescription" aria-label="With textarea"><?php echo (empty($seasonalReviews)) ? "" : $seasonalReviews->trend_description ?></textarea>
            </div>
          </div><br>

          <!-- <div class="row">
            <button class="btn" type="submit">建立</button>
          </div> -->
          <div class="mg-2 row">
            <div class="mg-2">
              <button class="btn btn-primary" type="submit" style="width:150px">建立</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  $('.datepickerTW').datepickerTW();
  const elementRelation = new ElementBinder();
  elementRelation.selectInput('isCounseling', 'trend', '否');
  elementRelation.selectInput('isCounseling', 'trendDescription', '否');

</script>
<?php $this->load->view('templates/new_footer');?>