<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form action="<?php echo site_url($url); ?>"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="red-text text-darken-3 text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="green-text text-darken-3 text-center">' . $success . '</p>' : ''; ?>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="name" name="name" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->name ?>">
              <label for="name">姓名*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="title" name="title" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->title ?>">
              <label for="title">職稱*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="orgnizer" name="orgnizer" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->orgnizer ?>">
              <label for="orgnizer">承辦單位*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="phone" name="phone" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->phone ?>">
              <label for="phone">聯絡電話*</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <input type="text" id="email" name="email" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->email ?>">
              <label for="email">電子郵件*</label>
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

</script>

<?php $this->load->view('templates/footer');?>