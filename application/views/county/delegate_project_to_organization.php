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
              <select name="project">
                <?php foreach($projects as $i) { ?>
                  <option value="<?php echo $i['no'];?>"><?php echo $i['name'];?></option>
                <?php } ?>
              </select>
              <label>計畫</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('project/create_project');?>" class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 offset-m2 m8">
              <select name="organization">
                <?php foreach($organizations as $i) { ?>
                  <option value="<?php echo $i['no'];?>"><?php echo $i['name'];?></option>
                <?php } ?>
              </select>
              <label>機構</label>
            </div>
            <div class="col s2">
              <a href="<?php echo site_url('organization/create_organization');?>" class="waves-effect waves-light btn-small btn-floating blue darken-4 add-btn">+</a>
            </div>
          </div>
          <div class="row">
            <button class="btn waves-effect col s6 offset-m4 m4 blue darken-4" type="submit">委託</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>