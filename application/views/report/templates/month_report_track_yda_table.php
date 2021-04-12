<table class="surveyTypeHighSchoolTrack highlight centered" style="border:2px grey solid;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" rowspan="2">縣市</th>
      <th scope="col" colspan="4">具輔導成效</th>
      <th scope="col" colspan="7">尚無輔導成效</th>
      <th scope="col" colspan="6">不可抗力</th>
      <th scope="col" rowspan="2">總計</th>
      <th scope="col" rowspan="2">青少年人數</th>
      <th scope="col" rowspan="2" style="width:30%;">備註</th>
      <?php if($countyType == 'all') :?>
        <th scope="col" rowspan="2" style="width: 10%;">審核</th>
        <th scope="col" rowspan="2">繳交</th>
      <?php endif;?>
    </tr>
    <tr>
      <th scope="col">1.已就業</th>
      <th scope="col">2.已就學</th>
      <th scope="col">3.職業訓練或勞政單位協助中</th>
      <th scope="col">4.其他</th>
      <th scope="col">5.準備升學</th>
      <th scope="col">6.準備或正在找工作</th>
      <th scope="col">7.家務勞動</th>
      <th scope="col">8.健康因素</th>
      <th scope="col">9.尚未規劃</th>
      <th scope="col">10.失聯</th>
      <th scope="col">11.其他</th>
      <th scope="col">12.特教生</th>
      <th scope="col">13.移民</th>
      <th scope="col">14.警政或司法單位協助中</th>
      <th scope="col">15.服兵役</th>
      <th scope="col">16.死亡</th>
      <th scope="col">17.成年</th>
    </tr>
  </thead>
  <tbody>
  <?php for ($j = 0; $j < count($counties); $j++) { ?>
    <tr>
      <?php if($reportProcessesCountyStatusArray[$j] != $reviewStatus['review_process_pass']) :?>
        <td colspan = "23"><?php echo $counties[$j]['name'] . '尚未送出報表'?></td>
      <?php else:?>
        <td><?php echo $counties[$j]['name']; ?></td>
        <td><?php echo $reportArray[$j]->one ?></td>
        <td><?php echo $reportArray[$j]->two ?></td>
        <td><?php echo $reportArray[$j]->three ?></td>
        <td><?php echo $reportArray[$j]->four ?></td>
        <td><?php echo $reportArray[$j]->five ?></td>
        <td><?php echo $reportArray[$j]->six ?></td>
        <td><?php echo $reportArray[$j]->seven ?></td>
        <td><?php echo $reportArray[$j]->eight ?></td>
        <td><?php echo $reportArray[$j]->nine ?></td>
        <td><?php echo $reportArray[$j]->ten ?></td>
        <td><?php echo $reportArray[$j]->eleven ?></td>
        <td><?php echo $reportArray[$j]->twelve ?></td>
        <td><?php echo $reportArray[$j]->thirteen ?></td>
        <td><?php echo $reportArray[$j]->fourteen ?></td>
        <td><?php echo $reportArray[$j]->fifteen ?></td>
        <td><?php echo $reportArray[$j]->sixteen ?></td>
        <td><?php echo $reportArray[$j]->seventeen ?></td>
        <td><?php echo $reportArray[$j]->eighteen ?></td>
        <td><?php echo $reportArray[$j]->nineteen ?></td>
        <td style="text-align:left"><?php echo str_replace("\n", "<br/>", $reportArray[$j]->note); ?></td>
        <?php if ($countyType == 'all') :?>
          <td ><a class="btn waves-effect blue lighten-1" href="<?php echo site_url('report/' . $reviewPage . '/' . $yearType . '/' . $monthType . '/' . $counties[$j]['no']);?>">審核</a></td>
          <td> <?php echo ($isOverTimeArray[$j] == 1 ) ? '遲交' : '準時';?></td>
        <?php endif; ?>
      <?php endif;?>
    
    </tr>

  <?php }?>
     
    <?php if($countyType == 'all') :?>
      <tr>
        <td>總計</td>
        <td><?php echo $valueSum ? $valueSum['one'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['two'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['three'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['four'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['five'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['six'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['seven'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['eight'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['nine'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['ten'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['eleven'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['twelve'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['thirteen'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['fourteen'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['fifteen'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['sixteen'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['seventeen'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['eighteen'] : 0 ?></td>
        <td><?php echo $valueSum ? $valueSum['nineteen'] : 0 ?></td>   
        <td></td>
        <td></td>
        <td></td>
     
			</tr>
    <?php endif;?>
  </tbody>
</table>