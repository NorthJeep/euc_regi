<?php
$Title='EUC Events | Event Print';
include_once('head.php');
session_start();
if(!isset($_SESSION['LoggedIn']))
{
  $header = 'Location:/euc_regi/index.php';
  session_destroy();
  header($header);
}
date_default_timezone_set('Asia/Manila');
$StatusNo = $_GET['status'];
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
          <small class="pull-right">Date: <?php echo DATE("m-d-Y");?></small>
        </h2>
      </div>
      <div class="col-xs-12">
        <?php
            if($StatusNo == 0)
                  {
                    echo '<h2 class="page-header">All Events</h2>';
                  }
                  elseif($StatusNo == 1)
                  {
                    echo '<h2 class="page-header">Available Events</h2>';
                  }
                  elseif($StatusNo == 2)
                  {
                    echo '<h2 class="page-header">Ongoing Events</h2>';
                  }
                  else
                  {
                    echo '<h2 class="page-header">Finished Events</h2>';
                  }
        ?>
          
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
     <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <?php
                  include('config.php');
                  $CurrDate = time();
                  if($StatusNo == 0)
                  {
                    $EventListSQL = 'SELECT * FROM tbl_t_event ORDER BY Event_ID DESC';
                  }
                  elseif($StatusNo == 1)
                  {
                    $EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date > CURRENT_DATE ORDER BY Event_ID DESC';
                  }
                  elseif($StatusNo == 2)
                  {
                    $EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date = CURRENT_DATE ORDER BY Event_ID DESC';
                  }
                  else
                  {
                    $EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date < CURRENT_DATE ORDER BY Event_ID DESC';
                  }
                  
                  $EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
                  if(mysqli_num_rows($EventList) > 0)
                  {
                    while($row = mysqli_fetch_assoc($EventList))
                    {
                      $ID = $row['Event_ID'];
                      $UID = $row['User_ID'];
                      $Title = $row['Event_Title'];
                      $Date = $row['Event_Date'];
                      $Time = $row['Event_Time'];
                      $Location = $row['Event_Location'];
                      $Organizer = $row['Event_OrganizerDetail'];
                      $Desc = $row['Event_Desc'];

                      if($Date!= '' || $Date!= null)
                      {
                        if (strtotime($Date) > $CurrDate) 
                        {
                          $Status = '<span class="label label-success">Registration</span>';
                            #$date occurs in the future
                        } 
                        else if ($Date == DATE("Y-m-d"))
                        {
                          $Status = '<span class="label label-warning">Ongoing</span>';
                            #$date occurs now or in the past
                        }
                        else
                        {
                          $Status = '<span class="label label-danger">Finished</span>';
                        }
                      }
                      else
                      {
                        $Status = '<span class="label label-default">Coming Soon</span>';
                      }
                      

                      echo '
                            <tr>
                              <td class="hide">'.$ID.'</td>
                              <td>'.$Title.'</td>
                              <td>'.$Location.'</td>
                              <td>'.$Date.'</td>
                              <td>'.$Time.'</td>
                              <td class="hide">'.$Organizer.'</td>
                              <td>'.$Status.'</td>
                              <td>'.$Desc.'</td>
                            </tr>';

                    }
                  }

                ?>
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
