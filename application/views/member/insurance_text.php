<?php $this->load->view('templates/new_header');?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 class="text-dark text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url);?>" 
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="text-danger text-center">'.$error.'</p>' : '';?>
          <?php echo isset($success) ? '<p class="text-success text-center">'.$success.'</p>' : '';?>

          <!-- insurance -->
          <div class="row">
            <div class="col-10 m-2 mx-auto">
              <label for="formInsurance" class="form-label">訓字號</label>
              <textarea class="form-control" id="formInsurance" name="insurance" placeholder=""><?php echo (empty($insurances)) ? "" : $insurances->insurance ?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="d-grid gap-2 col-2 mx-auto">
              <button class="btn btn-primary my-5" type="submit">建立</button>
            </div>
          </div>
  
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();

</script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/ModeSwitch.js"></script>

<?php $this->load->view('templates/new_footer');?>