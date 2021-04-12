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
            
            <!-- participants -->
            <h6><b>參與學員(複選)</b></h6>
            <div class="row">
              <?php 
                foreach($members as $i) { ?>
                <div class="col m6">
                  <p><label>
                    <input class="filled-in" type="checkbox" name="participants[]" 
                    <?php if(in_array($i['no'], $participantArray) == 1){
                      echo "checked";
                    } else { "";} ?>
                    value="<?php echo $i['no'];?>">
                    <span><?php echo $i['system_no'] . $i['name'];?></span>
                  </label></p>
                </div>
              <?php } ?>
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