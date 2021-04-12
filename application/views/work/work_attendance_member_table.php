<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">

      <div class="row"> 
        <a class="btn col s2 offset-s0 waves-effect teal darken-2" style="margin:10px;" href="<?php echo site_url('/work/get_work_attendance_table_by_organization'); ?>">←工作時數列表</a>
      </div>
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <?php if($hasDelegation != '0' && $canInsert != '0'): ?>
      <a class="btn col s2 offset-s5 waves-effect blue lighten-1" href="<?php echo site_url($url);?>">新增</a>
      <?php endif;?>
      <div class="card-content">

        <!-- years -->
				<div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <select name="years" id="years" onchange="location = this.value;">
		
						<?php foreach($years as $i) {?>
            
							<option <?php echo ($yearType == $i['year']) ? 'selected' : ''?> value="<?php echo site_url('/work/get_work_attendance_table_by_organization/' .  $i['year']);?>"><?php echo $i['year']?></option>
            <?php } ?>

            </select>
            <label>年度</label>
          </div>
        </div>

        <a id="print" class="btn waves-effect">列印</a>   

        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">店家名稱</th>
              <th scope="col">時間</th>
              <th scope="col">參與學員</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($workAttendances as $i) { ?>
              <tr>
                <td><?php echo $i['name'];?></td>
                <td><?php echo $i['start_time'];?></td>
                <td><?php echo $i['youthName'];?></td>
                <td>
                  <a class="btn waves-effect blue lighten-1" href="<?php echo site_url($url .$i['work_experience'] . '/' .$i['no']);?>">查看/修改</a>   
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $('#print').click(function () {

        document.getElementById('footer').style.display = 'none';
 
        window.print();
  });

</script>
<?php $this->load->view('templates/footer');?>
<?php $this->load->view('templates/footer');?>

