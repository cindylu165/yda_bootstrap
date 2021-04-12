<?php $this->load->view('templates/header');?>
<div id="course_table" class="container">
  <div class="row">
    <div class="card col s12">
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
            
							<option <?php echo ($yearType == $i['year']) ? 'selected' : ''?> value="<?php echo site_url('/course/get_course_attendance_table_by_organization/' .  $i['year']);?>"><?php echo $i['year']?></option>
            <?php } ?>

            </select>
            <label>年度</label>
          </div>
        </div>
        
        <a id="print" class="btn waves-effect">列印</a>   

        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">課程名稱</th>
              <th scope="col">時間</th>
              <th scope="col">參與學員</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($courseAttendances as $i) { ?>
              <tr>
                <td><?php echo $i['name'];?></td>
                <td><?php echo $i['start_time'];?></td>
                <td><?php $count = 0;
                foreach($courseAttendanceMembers as $value){
                  if($value['start_time'] == $i['start_time']){
                    echo ($count == 0) ? $value['youthName'] : "、".$value['youthName'];
                    $count++;
                  }
                }?></td>
                <td>
                  <a class="btn waves-effect blue lighten-1" href="<?php echo site_url($url . $i['course'] . '/' . $i['start_time']);?>">查看/修改</a>                         
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