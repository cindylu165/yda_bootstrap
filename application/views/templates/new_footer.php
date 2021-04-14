</div>

        
</div>
<?php 
$fixedFooter = ''; 
?>
<footer class="text-center text-lg-start page-footer <?php echo $fixedFooter;?>">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">青年重大政策</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a class="text-dark" href="https://www.yda.gov.tw/Content/Messagess/List.aspx?SiteID=563426067575657313&MmmID=654710734771260004" target="_blank">年度施政目標</a>
          </li>
          <li>
            <a class="text-dark" href="https://www.yda.gov.tw/Content/Messagess/List.aspx?SiteID=563426067575657313&MmmID=653624307317076050" target="_blank">施政方針及計畫</a>
          </li>
          <li>
            <a class="text-dark" href="https://www.yda.gov.tw/Content/Messagess/List.aspx?SiteID=563426067575657313&MmmID=563426074637754140" target="_blank">業務報告</a>
          </li>
          <li>
            <a class="text-dark" href="https://www.yda.gov.tw/Content/Messagess/List.aspx?SiteID=563426067575657313&MmmID=563426074723206157" target="_blank">重大政策</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">雙青學生特質與輔導成效問卷</h5>

        <ul class="list-unstyled">
          <li>
            <a class="text-dark" href="https://docs.google.com/forms/d/e/1FAIpQLSeMi5Gvd6psx5YIPhvyAJMWjWx4e-R6BZP-vuylwf340lgMcA/viewform" target="_blank">(模式一)學員問卷</a>
          </li>
          <li>
            <a class="text-dark" href="https://docs.google.com/forms/d/e/1FAIpQLSdoEG0guQZHTr4Y2UgZow-VZvw2E1m7ZVME8442QQijend_2A/viewform" target="_blank">(模式二)學員問卷</a>
          </li>
          <li>
            <a class="text-dark" href="https://docs.google.com/forms/d/e/1FAIpQLSfzRIXstM2WcjWQgIHWbBdSKfReY_41-3EcZYzB0V_1QRAgtg/viewform" target="_blank">(模式三)學員問卷</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">重要資訊</h5>

        <ul class="list-unstyled">
        <li>
          <a class="text-dark" href="https://drive.google.com/file/d/197Eo-5s-PoiY_sbQ0bhmOGwDtDpbLoms/view?usp=sharing" target="_blank">操作手冊</a>
        </li>
        <li>
          <a class="text-dark" href="<?php echo site_url('/user/contact_us'); ?>">聯絡我們</a>
        </li>
        </ul>
      </div>

    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/picker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/general.js"></script>
<!-- <script type="text/javascript" src="<?php echo site_url(); ?>/assets/js/datepicker.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        // $('.datepicker').datepicker({
        //     defaultDate:new Date(),             
        // });
    });

</script>

</body>

</html>