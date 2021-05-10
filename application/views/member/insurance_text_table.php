<?php $this->load->view('templates/new_header');?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <!-- <div class="col-10 m-2"> 
        <a class="btn btn-success" href="<?php echo site_url('/member/get_member_table_by_counselor'); ?>">←學員列表</a>
      </div> -->

      <div class="row">
        <h4 class="text-dark text-center"><?php echo $title ?></h4>
      </div>

      <div class="d-grid gap-2 col-2 mx-auto">
        <a class="btn btn-info m-3" href="<?php echo site_url($url);?>">新增</a>
      </div>

      <div class="card-content">
        <table class="table table-hover text-center">
          <thead class="thead-dark">
            <tr>
              <th scope="col">訓字號</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($insurances as $i) { ?>
              <tr>
                <td><?php echo $i['insurance']; ?></td>
                <td>
                  <a class="btn btn-info" href="<?php echo site_url('member/insurance_text/' . $i['no']); ?>">查看/修改</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/new_footer');?>