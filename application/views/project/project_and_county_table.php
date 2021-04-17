<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">

      <!-- year -->
      <div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <select name="year" id="year" onchange="location = this.value;">
            <option <?php echo ($year == null) ? 'selected' : ''?> value="<?php echo site_url('project/project_and_county/');?>">全部</option>
            <?php foreach($distinctYears as $y) { ?>
                <option <?php echo ($year == $y['year']) ? 'selected' : ''?> value="<?php echo site_url('project/project_and_county/'. $y['year']);?>"><?php echo $y['year']?></option>
            <?php
            }
            ?>
            </select>
            <label>年度</label>
          </div>
        </div>


        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">年度</th>
              <th scope="col">縣市</th>
              <th scope="col">計畫</th>
              <th scope="col">機構</th>
              <?php if($current_role != 4) : ?>
                <th scope="col">要項</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach($countyDelegateOrganizations as $i) { ?>
              <tr>
                <td><?php echo $i['year'];?></td>
                <td><?php echo $i['countyName'];?></td>
                <td><?php echo $i['projectName'];?></td>
                <td><?php echo $i['organizationName'];?></td>
                <?php if($current_role == 3) : ?>
                  <td><a class="btn waves-effect blue darken-4" href="<?php echo site_url('project/create_project/'.$i['no']);?>">查看/修改</a>
								  <a class="btn waves-effect orange darken-2" href="<?php echo site_url('project/delete?no=' . $i['no']); ?>">刪除</a></td>
                <?php elseif ($current_role == 2) :?>
                  <td><a class="btn waves-effect blue darken-4" href="<?php echo site_url('project/project_table/'.$i['no']);?>">查看</a></td>
                <?php endif; ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>
