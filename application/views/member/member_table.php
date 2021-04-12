<?php $this->load->view('templates/header');?>
<div class="container" style="width:90%;">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <div class="card-content">

      <?php if($role == 9) :?>
        	<!-- counties -->
				<div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <select name="counties" id="counties" onchange="location = this.value;">
						<?php foreach ($counties as $i) {?>
							<option <?php echo ($county == $i['no']) ? 'selected' : '' ?> value="<?php echo site_url($url . '/' . $i['no'] . '/' . $yearType); ?>"><?php echo $i['name'] ?></option>
            <?php }?>
            </select>
            <label>縣市</label>
          </div>
        </div>
      <?php endif;?>
        <!-- years -->
				<div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <select name="years" id="years" onchange="location = this.value;">
		
						<?php foreach($years as $i) {?>
            
							<option <?php echo ($yearType == $i['year']) ? 'selected' : ''?> value="<?php echo site_url($url . '/' . $county . '/' . $i['year']);?>"><?php echo $i['year']?></option>
            <?php } ?>

            </select>
            <label>年度</label>
          </div>
        </div>

        <?php if($current_role == '6') :?>

        <div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <i class="material-icons col s1" >search</i>
            <input id="myInput" class="col s11" type="search" onkeyup="myFunction()" placeholder="搜尋編號、姓名或身分證">
          </div>
        </div>

        <?php elseif($current_role != '6') :?>

        <div class="row">
          <div class="input-field col s10 offset-m2 m8">
            <i class="material-icons col s1" >search</i>
            <input id="myInput" class="col s11" type="search" onkeyup="myFunction()" placeholder="搜尋編號、姓名或是否結案">
          </div>
        </div>

        <?php endif; ?>

        <table id="memberTable" class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">編號</th>
           
              <th scope="col">姓名</th>
              <?php if($current_role == '6'){ ?>
                <th scope="col">身分證</th>
                <th scope="col">要項</th>
              <?php } else {?>
                <th scope="col">是否結案</th>
              <?php }?>
              <?php if($current_role == '5'){ ?>
                <th scope="col">要項</th>
              <?php }?>
            </tr>
          </thead> 
          <tbody>
            <?php foreach($members as $i) { ?>
              <tr>
                <td><?php echo $i['system_no'];?></td>
               
                <td><?php echo $i['name'];?></td>
                <?php if($current_role == '6'){ ?>
                  <td><?php echo $i['identifications'];?></td>
                  <td>
                    <a class="btn waves-effect purple lighten-1" href="<?php echo site_url('youth/intake/member/'.$i['youthNo']);?>">青少年初評表</a>
                    <a class="btn waves-effect orange lighten-1" href="<?php echo site_url('member/case_assessment/'.$i['no']);?>">開案學員資料表</a>             
                    <a class="btn waves-effect green lighten-1" href="<?php echo site_url('member/get_individual_counseling_table_by_member/'.$i['no']);?>">個別諮詢紀錄清單</a>  
                    <a class="btn waves-effect red lighten-1" href="<?php echo site_url('member/get_insurance_table_by_member/'.$i['no']);?>">投保紀錄清單</a> 
                    <a class="btn waves-effect blue lighten-1" href="<?php echo site_url('member/end_case/'.$i['no']);?>">結案評估表</a> 
                
                    <?php foreach($endCases as $value) {
                      if($value['member'] == $i['no']) {
                        ?>
                        <a class="btn waves-effect red lighten-1" href="<?php echo site_url('member/get_month_review_table_by_member/'.$i['no']);?>">結案後追蹤清單</a>      
                        <?php
                      }
                    }?>        
                  </td>
                  <?php } else {?>
                    <td><?php if(empty($i['end_date'])) { echo '否'; } else { echo '是'; }?></td>
                  <?php } ?>
                  <?php if($current_role == '5'){ ?>
                    <td> <a class="btn waves-effect blue lighten-1" href="<?php echo site_url('member/change_counselor/'.$i['no']);?>">更換輔導員</a></td>
                  <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function myFunction() {
  // Declare variables
      var input, filter, table, tr, td, i, txtValue, td_id, td_year, td_trend, tValue, yearValue, trendValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("memberTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
     
        for (i = 0; i < tr.length; i++) {
          td_id = tr[i].getElementsByTagName("td")[1];
          td = tr[i].getElementsByTagName("td")[0];
          td_year = tr[i].getElementsByTagName("td")[2];

          if (td || td_id || td_year) {
            txtValue = td.textContent || td.innerText;
            tValue = td_id.textContent || td_id.innerText;
            yearValue = td_year.textContent || td_year.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1 || tValue.toUpperCase().indexOf(filter) > -1 || yearValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
          
        } 
      
    }

</script>
<?php $this->load->view('templates/footer');?>