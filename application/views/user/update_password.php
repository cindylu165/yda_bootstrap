<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>"
            value="<?php echo $security->get_csrf_hash() ?>" />

          <?php echo isset($error) ? '<p class="red-text text-darken-1 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-accent-4 text-center">' . $success . '</p>' : ''; ?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="id" name="id" required <?php echo (empty($users)) ? "" : "disabled" ?> value="<?php echo (empty($users)) ? "" : $users['id'] ?>">
              <label for="id">帳號*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="password" id="password" name="password" required value="<?php echo ($password == '000000') ?'000000' : '';?>">
              <label for="password">請輸入舊密碼*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="password" id="passwordNew" name="passwordNew" required>
              <label for="passwordNew">請輸入新密碼(密碼需包含英文字母大寫、英文字母小寫與數字並長度大於8)*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="password" id="passwordVerify" name="passwordVerify" required>
              <label for="passwordVerify">請再次輸入新密碼(密碼需包含英文字母大寫、英文字母小寫與數字並長度大於8)*</label>
            </div>
          </div>

          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">送出</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();
  elementRelation.selectInput('passwordNew', 'passwordVerify', '面訪');


</script>

<?php $this->load->view('templates/footer');?>
