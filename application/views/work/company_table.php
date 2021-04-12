<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url($url);?>">新增</a>
      <div class="card-content">
        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">店家名稱</th>
              <th scope="col">老闆名稱</th>
              <th scope="col">工作類別</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($companys as $i) { ?>
              <tr>
                <td><?php echo $i['name'];?></td>
                <td><?php echo $i['boss_name'];?></td>
                <td><?php foreach($categorys as $j) {
                  if($j['no'] == $i['category']) {
                    echo $j['content'];
                  }
                };?></td>
                <td>
                  <a class="btn waves-effect blue lighten-1" href="<?php echo site_url($url . $i['no']);?>">查看/修改</a>   
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>