<?php
$Title='EUC Events | Registration Print';
include_once('head.php');
date_default_timezone_set('Asia/Manila');
include('config.php');
if(!isset($_GET['R']))
{
  $header = 'Location:/euc_regi/index_Cust.php';
  header($header);
}
else
{
  $Registration = $_GET['R'];

  $CheckRegisterSQL = 'SELECT * FROM tbl_t_registration WHERE Registration_No = '.$Registration.' ';
  $CheckRegister = mysqli_query($euceventMysqli,$CheckRegisterSQL) or die (mysqli_error($euceventMysqli));
  if(mysqli_num_rows($CheckRegister) > 0)
  {
    while($row0 = mysqli_fetch_assoc($CheckRegister))
    {
      $EventID = $row0['Event_ID'];
      $Registrant_ID = $row0['Registrant_ID'];
      $Date_Registered = $row0['Date_Registered'];
    }
    $EventSQL = 'SELECT * FROM tbl_t_event WHERE Event_ID = '.$EventID.' ';
    $Event = mysqli_query($euceventMysqli,$EventSQL) or die (mysqli_error($euceventMysqli));
    if(mysqli_num_rows($Event) > 0)
    {
      while($row = mysqli_fetch_assoc($Event))
      {
        $ID = $row['Event_ID'];
        $Title = $row['Event_Title'];
        $Date = $row['Event_Date'];
        $Phases = $row['Event_Phases'];
        $Price = $row['Event_Price'];
        $Time = $row['Event_Time'];
        $Location = $row['Event_Location'];
        $OrganizerDetail = $row['Event_OrganizerDetail'];
        $Desc = $row['Event_Desc'];
      }
    }

    $RegistrantSQL = 'SELECT IFNULL(tbl_t_registrant.Registrant_ID,"") AS Registrant_ID,
                              IFNULL(tbl_t_registrant.First_Name,"") AS First_Name,
                              IFNULL(tbl_t_registrant.Middle_Name,"") AS Middle_Name,
                              IFNULL(tbl_t_registrant.Last_Name,"") AS Last_Name,
                              IFNULL(tbl_t_registrant.Ext_Name,"") AS Ext_Name,
                              IFNULL(tbl_t_registrant.Company,"") AS Company,
                              IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
                              IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent")," ") AS Email 
                      FROM tbl_t_registrant WHERE Registrant_ID = '.$Registrant_ID.' ';
    $Registrant = mysqli_query($euceventMysqli,$RegistrantSQL) or die (mysqli_error($euceventMysqli));
    if(mysqli_num_rows($Registrant) > 0)
    {
      while($row2 = mysqli_fetch_assoc($Registrant))
      {
        $RID = $row2['Registrant_ID'];
        $FName = $row2['First_Name'];
        $MName = $row2['Middle_Name'];
        $LName = $row2['Last_Name'];
        $XName = $row2['Ext_Name'];
        $Company = $row2['Company'];
        $Contact = $row2['Contact'];
        $Email = $row2['Email'];
      }
    }
  }
  else
  {
    $header = 'Location:/euc_regi/index_Cust.php';
    header($header);
  }
}
echo '<h6 id="QR" class="hide">'.$RID.$LName.$ID.'</h6>';
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
          <small>Registration Code: <?php echo $Registration?></small>
        </h2>
      </div>
      <div class="col-xs-12">
          <?php

            echo '

            <h1>'.$Title.'</h1>
            <h3>Price: '.$Price.'</h3>
            <h4>'.$Phases.' Day/s</h4>
            <h4>Location: '.$Location.'</h4>
            <h4>'.$Date.' at '.$Time.'</h4>
            <h5>'.$Desc.'
            </h5>
            ';

          ?><!-- 
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
          </h5> -->


        </br>
        <table style="width:100%">
          <tr>
            <th></th>
            <th></th> 
          </tr>
          <tr>
            <td width="25%">
              <!-- QR HERE!!! HUHU Sa loob ng script yung php kaya ba yun? -->
              <div id="qrcodeCanvas">
              <script>
                

                jQuery('#qrcodeCanvas').qrcode({                      
                text  : <?php echo "'".$Registration.$LName.$RID."'";?>,
                width : 150,
                height: 150,
                }); 
              </script>

              <!-- <script>
                

                jQuery('#qrcodeCanvas').qrcode({                      
                text  : "code sa QR here",
                width : 150,
                height: 150,
                }); 
              </script> -->
            </td>
            <td width="75%">
              <?php
              
              echo '<h2>'.$FName.' '.$MName.' '.$LName.' '.$XName.'</h2>';
              echo '<h3>'.$Company.'</h4>';
              echo '<h4>'.$Contact.'</h4>';
              echo '<h4>'.$Email.'</h4>';
              ?>
              <!-- <h2>Peter John Teneza </h2>
              <h4>0926 419 2129 </h4>
              <h4> peterjohnteneza@gmail.com </h4> -->
            </td>
          </tr>
        </table>
        </br>
        <h5>
          <strong>This serves as your gate pass to the event. You may or may not print this but bring this with you at all times.</strong></br>
          You can pay through bank through this bank number <strong>XXXXXXXXXXXXXX</strong> and send your deposit slip to this email: <strong>sample.sample@sample.com</strong>
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
