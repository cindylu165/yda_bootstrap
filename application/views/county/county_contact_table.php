<?php $this->load->view('templates/header');?>
<div class="container" style="width:90%;">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo $title ?></h4>
      <a class="btn waves-effect blue darken-4" href="<?php echo site_url($url);?>">新增</a>
      <div class="card-content">
        <table class="highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">縣市</th>
              <th scope="col">承辦單位</th>
              <th scope="col">聯絡人</th>
              <th scope="col">職稱</th>
              <th scope="col">電話</th>
              <th scope="col">信箱</th>
              <th scope="col">要項</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($countyContacts as $i) { ?>
              <tr>
                <td><?php foreach($counties as $value){
                    if($value['no'] == $i['county']){
                        echo $value['name'];
                    }
                }?></td>
                <td><?php echo $i['orgnizer'];?></td>
                <td><?php echo $i['name'];?></td>
                <td><?php echo $i['title'];?></td>
                <td><?php echo $i['phone'];?></td>
                <td><?php echo $i['email'];?></td>
                <td>
                  <a class="btn waves-effect blue darken-4" href="<?php echo site_url($url . '/' . $i['no']);?>">查看/修改</a>
									<a class="btn waves-effect orange darken-2" href="<?php echo site_url('county/delete?no=' . $i['no']); ?>">刪除</a>
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
