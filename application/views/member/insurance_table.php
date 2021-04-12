<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      
      <div class="row"> 
        <a class="btn col s2 offset-s0 waves-effect teal darken-2" style="margin:10px;" href="<?php echo site_url('/member/get_member_table_by_counselor'); ?>">←學員列表</a>
      </div>

      <div class="row">
        <h4 class="card-title text-center"><?php echo $title ?></h4>
      </div>
      
      <h6 class="text-center">編號: <?php echo $members->system_no; ?></h6>
      <h6 class="text-center">學員: <?php echo $members->name; ?></h6>
      <h6 class="card-title">「針對參加生涯探索課程或活動（措施B）、工作體驗（措施C）之輔導對象應全程投保，每人保額至少為新台幣300萬元意外險和5萬元醫療險，另參加工作體驗（措施C）之學員，應全程投保訓字保。」</h6>
      <?php if ($hasDelegation != '0'): ?>
      <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url($url); ?>">新增</a>
      <?php endif;?>
      <div class="card-content">
        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">開始日期</th>
              <th scope="col">結束日期</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($insurances as $i) {?>
              <tr>
                <td><?php echo $i['start_date']; ?></td>
                <td><?php echo $i['end_date']; ?></td>
                <td>
                  <a class="btn waves-effect blue darken-4" href="<?php echo site_url('member/insurance/' . $i['member'] . '/' . $i['no']); ?>">查看/修改</a>
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