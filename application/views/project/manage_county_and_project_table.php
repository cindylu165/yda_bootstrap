<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">

      <table class="countyDelegateOrganization highlight centered" style="border:2px grey solid;">
          <thead class="thead-dark">
						<tr>
						  <th scope="col">縣市</th>
              <th scope="col">已撥付經費</th>
							<th scope="col">經費管理</th>
              <th scope="col">計畫案狀態</th>
							<th scope="col">計畫案管理</th>
            </tr>
          </thead>
          <tbody>
          <?php $count = 0?>
          <?php foreach ($counties as $value) {?>

						<tr>
							<td><?php echo empty($value) ? '' : $value['name']; ?></td>
              <td><?php echo empty($fundingApproveArray[$count]) ? 0 : number_format($fundingApproveArray[$count]->sum); ?></td>
              <td> <a class="btn waves-effect blue lighten-1" href="<?php echo site_url('project/funding_table/' . $value['no']); ?>">管理</a></td>
              <td><?php echo empty($value['update_project']) ? '關閉' : '開啟'; ?></td>

              <td> <a class="btn waves-effect blue lighten-1" href="<?php echo site_url('project/manage_project_table/' . $value['no'] . '/110'); ?>">管理</a></td>
						</tr>
            <?php $count += 1;?>
            <?php }?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>