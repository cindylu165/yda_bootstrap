<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url);?>" 
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">'.$error.'</p>' : '';?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">'.$success.'</p>' : '';?>
       
          <h6 class="text-center">縣市: <?php echo $counties->name; ?></h6>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <label for="formDate">撥付日期*</label>
            </div>
          </div>

                    <!-- date -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formDate" required name="date" class="datepicker" value="<?php echo (empty($fundingApproves)) ? "" : $fundingApproves->date ?>">
              <label for="formDate"></label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input required type="number" min ="0" id="funding" name="funding" value="<?php echo (empty($fundingApproves)) ? "" : $fundingApproves->funding ?>" <?php echo (empty($counselingMemberCountReport->funding_execute)) ? "" : "" ?>>
              <label for="funding">撥付金額</label>
            </div>
          </div>

      
          <!-- trendDescription -->
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <textarea id="formNote" name="note" class="materialize-textarea" ><?php echo (empty($fundingApproves)) ? "" : $fundingApproves->note ?></textarea>
              <label for="formNote">備註</label>
            </div>
          </div>

          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">建立</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();
  elementRelation.selectInput('isCounseling', 'trend', '否');
  elementRelation.selectInput('isCounseling', 'trendDescription', '否');

</script>
<?php $this->load->view('templates/footer');?>