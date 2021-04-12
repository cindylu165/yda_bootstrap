<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row all_center">
    <div class="card col s12 offset-m3 m6 ">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url('user/login'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-3 text-center">' . $error . '</p>' : ''; ?>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="formId" name="id" required>
              <label for="formId">帳號</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="password" id="formPassword" name="password" required>
              <label for="formPassword">密碼</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <img class="materialboxed responsive-img" src="<?php echo base_url(); ?>/files/captcha/<?php echo $captcha['filename']; ?>">
            </div>
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="captcha" name="captcha">
              <label for="captcha">*驗證碼</label>
            </div>
          </div>

          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">送出</button>
          </div>
          <!-- <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 green darken-4" onclick="user_forget_password()">忘記密碼</button>
          </div> -->
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function user_forget_password() {
      var contentUser = '忘記密碼\n'
        + '一、系統將會寄一封重設密碼信件至您帳號的信箱。\n\n'
        + '二、點擊信件中的連結已重設密碼。\n\n'
        + '三、登入後請再重新設定屬於自己的密碼。\n\n';
      var bool = confirm(contentUser);

      if (bool) {
          window.location.href = "<?php echo site_url('user/forget_password'); ?>";
      } else {
          
      }
    }

</script>
<?php $this->load->view('templates/footer');?>