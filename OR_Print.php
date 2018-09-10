<?php
$Title='EUC Events | Official Receipt';
include_once('head.php');

$Amount = $_GET['Amount'];
  $Rno = $_GET['R'];

?>
<!--  -->
<body onload="window.print();">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/qr/qrcode.js"></script>
<script type="text/javascript" src="bower_components/qr/jquery.qrcode.min.js"></script>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           <img src="dist/img/euc_logo.jpg" class="user-image" alt="User Image" style="width:100px;height:100px;"> Electronic Financials Users Circle (EUC), Inc. 
          <small class="pull-right">Date: <?php echo DATE("m-d-Y");?></small>
        </h2>
      </div>
      <div class="col-xs-12">
    <table style="width:100%">
          <tr>
            <th>OR Number</th>
            <th>Payee</th> 
            <th>Amount</th>
            <th>Date Paid</th>
            <th>Event Name</th>
          </tr>

          <tr>
           
           <td> 12345 </td>
           <td> Lowell Dave Agnir </td>
           <td> Php 1000.00 </td>
           <td> 11-11-98 </td>
           <td> Brgy IT Seminar Workshop </td>


          </tr>

         

     </table>
        </br>
        
        </br>
        <h5>
          <strong>This serves as your official receipt.</strong></br>
        </h5>
        </br>
      </div>


      </div>
      <!-- /.col -->
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
       <!--  <b>Version</b> 2.4.0 -->
      </div>

      <strong>  Powered by <a href="http://euc-inc.ph"> EUC Events </a></strong>
    </div>
   
    <!-- /.container -->
</footer>    </div>
    <!-- info row -->
    
     

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
