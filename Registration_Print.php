<?php
$Title='EUC Events | Registration Print';
include_once('head.php');

date_default_timezone_set('Asia/Manila');

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
       
          <h1>
            Event Title
          </h1>
          <h3>
            Event Location
          </h3>
          <h4>
            Event Time
          </h4>
          <h5>
            Event Description 
          </h5>


        </br>
<table style="width:100%">
  <tr>
    <th></th>
    <th></th> 
  </tr>

<tr>
  
  <td width="35%">
          <!-- QR HERE!!! HUHU Sa loob ng script yung php kaya ba yun? -->
            <div id="qrcodeCanvas" >
             <script>
                jQuery('#qrcodeCanvas').qrcode({                      
                        text  : "code sa QR here",
                        width : 200,
                        height: 200,

                      }); 
              </script>
  </td>
  <td width="65%">

              <h2>Peter John Teneza </h2>
              <h4>0926 419 2129 </h4>
              <h4> peterjohnteneza@gmail.com </h4>
  </td>
</tr>
</table>
                </br>
              <h5>This serves as your gate pass to the event. You may or may not print this but have this with you at all times.</h5>
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
