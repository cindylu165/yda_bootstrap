<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <?php if ($hasDelegation != '0'): ?>
      <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url($url); ?>">新增</a>
      <?php endif;?>
      <div class="card-content">
        <!-- years -->
				<div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <select name="years" id="years" onchange="location = this.value;">

						<?php foreach ($years as $i) {?>

							<option <?php echo ($yearType == $i['year']) ? 'selected' : '' ?> value="<?php echo site_url('/meeting/meeting_table/' . $i['year']); ?>"><?php echo $i['year'] ?></option>
            <?php }?>

            </select>
            <label>年度</label>
          </div>
        </div>

        <table class="responsive-table highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">會議名稱</th>
              <th scope="col">時間</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($meetings as $i) {?>
              <tr>
                <td><?php echo $i['title']; ?></td>
                <td><?php echo $i['start_time']; ?></td>
                <td>
                  <a class="btn waves-effect blue lighten-1" href="<?php echo site_url($url . $i['no'] . '/' . $i['year']); ?>">查看/修改</a>
                  <a class="btn waves-effect orange darken-2" href="<?php echo site_url('meeting/delete?no=' . $i['no']); ?>">刪除</a>
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
