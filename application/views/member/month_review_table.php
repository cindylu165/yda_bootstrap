<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <?php if($hasDelegation != '0'): ?>
      <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url($url);?>">新增</a>
      <?php endif;?>
      <div class="card-content">
        <table class="highlight">
          <thead class="thead-dark">
            <tr>
              <th scope="col">日期</th>
              <th scope="col">完整度</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($monthReviews as $i) { ?>
              <tr>
                <td><?php echo $i['date'];?></td>
                <td><?php foreach($monthReviewCompletions as $value) {
                  if($i['no'] == $value['form_no']) {
                    echo $value['rate'] . '%';
                  }
                }?></td>
                <td>
                  <a class="btn waves-effect blue darken-4" href="<?php echo site_url('member/month_review/'.$i['member'].'/'.$i['no']);?>">查看/修改</a>                         
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