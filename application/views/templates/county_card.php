<div class="card">
  <div class="card-content">
    <div class="dashboard_card">
      <h3 class="dashboard_card_title">縣市聯絡表</h3>
      <table class="highlight">
        <thead class="thead-dark">
          <tr>
            <th scope="col">縣市</th>
            <th scope="col">電話</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($countyData as $i) {?>
          <tr>
            <td><?php echo $i['name']; ?></td>
            <td><?php echo $i['phone']; ?></td>
            <td><?php echo $i['orgnizer']; ?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>