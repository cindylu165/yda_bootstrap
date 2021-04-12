<?php $this->load->view('templates/header');?>
<div class="container" style="width:90%;">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">
        <!-- years -->
				

        <table id="memberTable" class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">姓名</th>
              <th scope="col">身分證</th>
              <th scope="col">查看</th>
          
            </tr>
          </thead> 
          <tbody>
            <?php foreach($youths as $i) { ?>
              <tr>
                <td><?php echo $i['name'];?></td>
               
                <td><?php echo $i['identifications'];?></td>
                <td><a class="btn waves-effect purple lighten-1" href="<?php echo site_url('youth/repeat_youth_in/'.$i['county'] . '/' . $i['no']);?>">GO</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/footer');?>