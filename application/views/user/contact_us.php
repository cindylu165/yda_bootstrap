<?php $this->load->view('templates/header');?>
<div class="container">
  <div class="row">
    <div class="card col s12">
      <h4 class="card-title text-center"><?php echo '聯絡我們' ?></h4>

      <div class="card-content">
        <!-- years -->
        <table class="responsive-table highlight centered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">姓名</th>
              <th scope="col">職稱</th>
              <th scope="col">電話</th>
              <th scope="col">信箱</th>
              <th scope="col">LINE ID</th>
            </tr>
          </thead>
          <tbody></tbody>


              <tr>
                <td>張承緯</td>
                <td>客服工程師</td>
                <td>049-2910960#3730、#3731、0975-325208</td>
                <td>cwchang9529@mail.ncnu.edu.tw</td>
                <td>@868esion</td>
              </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('templates/footer');?>