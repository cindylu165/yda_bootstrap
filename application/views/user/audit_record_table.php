<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <a class="btn waves-effect blue darken-4" href="<?php echo site_url($url); ?>">新增</a>
      <div class="card-content">
        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">編號</th>
              <th scope="col">帳號</th>
              <th scope="col">稽查者</th>
              <th scope="col">日期</th>
              <th scope="col">開始日期</th>
              <th scope="col">結束日期</th>
              <th scope="col">狀態</th>
              <th scope="col">備註</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($audits as $i) {?>
              <tr>
                <td><?php echo $i['no']; ?></td>
                <td><?php echo $i['id']; ?></td>
                <td><?php echo $i['audit_id']; ?></td>
                <td><?php echo $i['date']; ?></td>
                <td><?php echo $i['start_date']; ?></td>
                <td><?php echo $i['end_date']; ?></td>
                <td><?php foreach ($statuses as $value) {
    if ($value['no'] == $i['status']) {
        echo $value['content'];
    }
}?></td>
                <td><?php echo $i['note']; ?></td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>