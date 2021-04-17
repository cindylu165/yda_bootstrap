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
              <th scope="col">日期</th>
              <th scope="col">分類</th>
              <th scope="col">內容</th>
              <th scope="col">是否顯示</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($messagers as $i) {?>
              <tr>
                <td><?php echo $i['create_date']; ?></td>
                <td><?php foreach ($types as $value) {
    if ($value['no'] == $i['type']) {
        echo $value['content'];
    }
}?></td>
                <td><?php echo $i['content']; ?></td>
                <td><?php if ($i['is_view']) {
    echo '是';
} else {
    echo '否';
}
    ;?></td>
                <td>
                  <a class="btn waves-effect blue darken-4" href="<?php echo site_url($url . '/' . $i['no']); ?>">查看/修改</a>
	          <a class="btn waves-effect orange darken-2" href="<?php echo site_url('messager/delete?no=' . $i['no']); ?>">刪除</a>
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
