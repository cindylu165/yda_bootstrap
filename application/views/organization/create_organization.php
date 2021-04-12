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
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formName" name="name" required>
              <label for="formName">機構名稱*</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formPhone" name="phone" required>
              <label for="formPhone">機構電話*</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 offset-m1 m10">
              <input type="text" id="formAddress" name="address" required>
              <label for="formAddress">機構地址*</label>
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
<?php $this->load->view('templates/footer');?>