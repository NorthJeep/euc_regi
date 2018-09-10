<?php
$Title='EUC Events | Print';
include_once('head.php');
include('config.php');
$EID = $_GET['Event'];
session_start();
if(!isset($_SESSION['LoggedIn']))
{
  $header = 'Location:/euc_regi/index.php';
  session_destroy();
  header($header);
}
$EventParticipantCountSQL = 'SELECT COUNT(tbl_t_registrant.Registrant_ID) AS Registrant_Count
                               FROM tbl_t_registration
                               INNER JOIN tbl_t_registrant
                                ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
                               WHERE tbl_t_registration.Event_ID = '.$EID.'';
$EventParticipantCount = mysqli_query($euceventMysqli,$EventParticipantCountSQL) or die (mysqli_error($euceventMysqli));
  while($row3 = mysqli_fetch_assoc($EventParticipantCount))
  {
    $Reg_Count = $row3['Registrant_Count'];
  }

?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           <img src="dist/img/euc_logo.jpg" class="user-image" alt="User Image" style="width:100px;height:100px;"> Electronic Financials Users Circle (EUC), Inc.
          <small class="pull-right">Date: <?php echo date("m/d/Y"); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    </br>
          
           <label>Selected Event</label>
                  <select class="form-control" disabled="
                  ">
                    <?php
                      include('config.php');

                      $EventSelectSQL = 'SELECT * FROM tbl_t_event ORDER BY Event_Title';
                      $EventSelect = mysqli_query($euceventMysqli,$EventSelectSQL) or die (mysqli_error($euceventMysqli));
                      if(mysqli_num_rows($EventSelect) > 0)
                      {
                        echo '<option value="0" selected>No selected event.</option>';
                        while($row = mysqli_fetch_assoc($EventSelect))
                        {
                          $Title = $row['Event_Title'];
                          $ID =  $row['Event_ID'];
                          if($ID == $EID)
                          {
                            echo '<option value="'.$ID.'" selected>'.$Title.'</option>';
                          }
                          else
                          {
                            echo '<option value="'.$ID.'">'.$Title.'</option>';
                          }
                        }
                      }
                      else
                      {
                        echo '<option value="0" selected>No registered events.</option>';
                      }

            ?>
                    <!-- <option>Barangay IT Seminar</option>
                    <option>SAD Lecture</option>
                    <option>Extension Project</option> -->
                  </select>
    </br>

    <!-- info row -->
    
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Event Participants</h3>
              <h3>Total Count: <?php echo $Reg_Count; ?></h3>
              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                <tr>
                  <th class="hide">ID</th> 
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Name Extension</th>
                  <th>Company</th>
                  <th>Contact</th>
                  <th>E-Mail</th>
                </tr>
                </thead>
                <tbody>
                <?php

                    $EventParticipantSQL = 'SELECT IFNULL(tbl_t_registrant.Registrant_ID," ") AS Registrant_ID,
                                  IFNULL(tbl_t_registrant.First_Name," ") AS First_Name,
                                  IFNULL(tbl_t_registrant.Middle_Name," ") AS Middle_Name,
                                  IFNULL(tbl_t_registrant.Last_Name," ") AS Last_Name,
                                  IFNULL(tbl_t_registrant.Ext_Name," ") AS Ext_Name,
                                  IFNULL(tbl_t_registrant.Company," ") AS Company,
                                  IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
                                  IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent")," ") AS Email
                               FROM tbl_t_registration
                               INNER JOIN tbl_t_registrant
                                ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
                               WHERE tbl_t_registration.Event_ID ='.$EID.'';
                    $EventParticipant = mysqli_query($euceventMysqli,$EventParticipantSQL) or die(mysqli_error($euceventMysqli));
                    if(mysqli_num_rows($EventParticipant) > 0)
                    {
                      while($row = mysqli_fetch_assoc($EventParticipant))
                      {
                        $RID = $row['Registrant_ID'];
                        $FName = $row['First_Name'];
                        $MName = $row['Middle_Name'];
                        $LName = $row['Last_Name'];
                        $Company = $row['Company'];
                        $XName = $row['Ext_Name'];
                        $Contact = $row['Contact'];
                        $Email = $row['Email'];

                        echo '
                          <tr>
                                    <td class="hide">'.$RID.'</td>
                                    <td>'.$FName.'</td>
                                    <td>'.$MName.'</td>
                                    <td>'.$LName.'</td>
                                    <td>'.$XName.'</td>
                                    <td>'.$Company.'</td>
                                    <td>'.$Contact.'</td>
                                    <td>'.$Email.'</td>
                                    
                                  </tr>';
                      }
                    }
                ?>
                <!-- <tr>
                  <td class="hide">183</td>
                  <td>Lowell Dave </td>
                  <td>Elba </td>
                  <td>Agnir</td>
                  <td>III</td>
                  <td>09123456</td>
                  <td>emailnilowell@gmail.com</td>
                  
                </tr>
                
                <tr>
                  <td class="hide">183</td>
                  <td>Ma. Michaela </td>
                  <td>Cruz</td>
                  <td>Alejandria</td>
                  <td>Sr.</td>
                  <td>09123456789</td>
                  <td>mikaemail@gmail.com</td>
                  
                </tr>
                <tr>
                  <td class="hide">183</td>
                  <td>Peter John </td>
                  <td>  </td>
                  <td>Teneza</td>
                  <td> </td>
                  <td>09264192129</td>
                  <td>peterjohnteneza@gmail.com</td>
                  
                </tr> -->
               </tbody>
              </table>
            </div>

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
