<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <div class="row">
        <a class="btn col s2 offset-s0 waves-effect teal darken-2" href="<?php echo site_url('/project/manage_county_and_project_table'); ?>">← 縣市計畫案管理</a>
      </div>
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">

      <h6 class="text-center">縣市 : <?php echo $counties->name; ?></h6>

      <br/>

      <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url($url); ?>">新增</a>

      <br/><br/>

      <table class="countyDelegateOrganization highlight centered" style="border:2px grey solid;">
          <thead class="thead-dark">
						<tr>
						  <th scope="col">撥付日期</th>
							<th scope="col">撥付金額</th>
              <th scope="col">備註</th>
              <th scope="col">要項</th>
							<!-- <th scope="col">計畫案管理</th> -->

            </tr>
          </thead>
          <tbody>
          <?php foreach ($fundingApproves as $value) {?>

						<tr>
							<td><?php echo empty($value) ? '' : $value['date']; ?></td>
              <td><?php echo empty($value) ? '' : number_format($value['funding']); ?></td>
              <td><?php echo empty($value) ? '' : $value['note']; ?></td>
              <td>
                <a class="btn waves-effect blue lighten-1" href="<?php echo site_url('project/funding/' . $counties->no . '/' . $value['no']); ?>">管理</a>
                <a class="btn waves-effect orange darken-2" href="<?php echo site_url('project/delete_funding_table?no=' . $value['no']); ?>">刪除</a>
              </td>
						</tr>
            <?php }?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>
