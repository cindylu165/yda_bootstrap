<?php $this->load->view('templates/new_header');?>
<div class="container">
  <div class="col-md-12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <form class="row g-3" action="<?php echo site_url($url); ?>"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />
          <?php echo isset($error) ? '<p class="text-danger text-center">' . $error . '</p>' : ''; ?>
          <?php echo isset($success) ? '<p class="text-success text-center">' . $success . '</p>' : ''; ?>

          <div class="col-12">
              <label for="name">姓名*</label>
              <input class="form-control" type="text" id="name" name="name" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->name ?>">
          </div>

          <div class="col-12">
            <label for="title">職稱*</label>
            <input class="form-control" type="text" id="title" name="title" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->title ?>">
          </div>

          <div class="col-12">
            <label for="orgnizer">承辦單位*</label>
            <input  class="form-control"type="text" id="orgnizer" name="orgnizer" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->orgnizer ?>">
          </div>

          <div class="col-12">
            <label for="phone">聯絡電話*</label>
            <input class="form-control" type="text" id="phone" name="phone" required
              value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->phone ?>">
          </div>

          <div class="col-12">
            <label for="email">電子郵件*</label>
            <input class="form-control" type="text" id="email" name="email" required
                value="<?php echo (empty($countyContacts)) ? "" : $countyContacts->email ?>">
          </div>

          <div class="col-12 text-center">
          <button class="btn btn-primary m-3" type="submit">送出</button>
            <!-- <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">送出</button> -->
          </div>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ElementBinder.js"></script>
<script type="text/javascript">
  const elementRelation = new ElementBinder();

</script>

<?php $this->load->view('templates/new_footer');?>