<?php
$Title='EUC Events | Admin';
include_once('head.php');
session_start();
if(!isset($_SESSION['LoggedIn']))
{
  $header = 'Location:/euc_regi/index.php';
  session_destroy();
  header($header);
}
date_default_timezone_set('Asia/Manila');
?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

   <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index_Admin.php" class="navbar-brand"><b>EUC </b>Events</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <?php echo'<a href="index_Admin.php?user='.$_SESSION['LoggedIn'].'">Events <span class="sr-only">(current)</span></a>';?>
              
            </li>
           <!--  <li><a href="index_Admin.php">Link</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <?php echo'<a href="list_of_events.php?user='.$_SESSION['LoggedIn'].'">List of Events</a>';?>
                  <!-- <a href="list_of_events.php">List of Events</a> -->
                </li>
              <!--   <li class="divider"></li> -->
                <li>
                  <?php echo'<a href="list_of_delegates.php?user='.$_SESSION['LoggedIn'].'">List of Delegates</a>';?>
                  <!-- <a href="list_of_delegates.php">List of Delegates</a> -->
                </li>
        <!--    <li class="divider"></li>
                <li><a href="#">List of Everthing</a></li> -->
              </ul>
            </li>
            <li class="">
              <?php echo'<a href="Attendance.php?user='.$_SESSION['LoggedIn'].'">Attendance <span class="sr-only"></span></a>';?>
              <!-- <a href="Attendance.php">Attendance <span class="sr-only"></span></a> -->
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
          <!--   <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div> -->
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
             

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">2</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new participants joined today!
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">1</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Event Days</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Barangay IT Seminar 
                          <small class="pull-right">7 Days Left</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 99%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">50% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="dist/img/euc_logo.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">EUC Admin</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/euc_logo.jpg" class="img-circle" alt="User Image">

                  <p>
                    Carmela S. Perez
                    <small>EUC President</small>
                  </p>
                </li>
                <!-- Menu Body -->
           <!--      <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                </li> -->
                  <!-- /.row -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="Admin_SignOutSession.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
 <!--        <h1> EUC Events </h1> -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default_add">
                Add New Event
            </button>
       <!--  <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>
    </br>

      <!-- Main content -->
      
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">EUC Events</h3>

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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="hide">ID</th> 
                  <th>Title</th>
                  <th>Location</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Phases</th>
                  <th>Time</th>
                  <th class="hide">Organizer</th>
                  <th>State</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th width="10%">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include('config.php');
                  $CurrDate = time();
                  $EventListSQL = 'SELECT Event_ID,User_ID,Event_Title,Event_Phases,Event_Date,DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS EndDate, Event_Time,Event_Location, Event_OrganizerDetail, Event_Desc, Event_Price FROM tbl_t_event ORDER BY Event_Title';
                  $EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
                  if(mysqli_num_rows($EventList) > 0)
                  {
                    while($row = mysqli_fetch_assoc($EventList))
                    {
                      $ID = $row['Event_ID'];
                      $UID = $row['User_ID'];
                      $Title = $row['Event_Title'];
                      $Date = $row['Event_Date'];
                      $EndDate = $row['EndDate'];
                      $Phases = $row['Event_Phases'];
                      $Time = $row['Event_Time'];
                      $Location = $row['Event_Location'];
                      $Organizer = $row['Event_OrganizerDetail'];
                      $Desc = $row['Event_Desc'];
                      $Price = $row['Event_Price'];

                      if($Date!= '' || $Date!= null)
                      {
                        if ($Date > DATE("Y-m-d")) 
                        {
                            $Status = '<span class="label label-success">Registration</span>';
                            
                        } 
                        elseif ($Date <= DATE("Y-m-d") && $EndDate >= DATE("Y-m-d"))
                        {
                          $Status = '<span class="label label-warning">Ongoing</span>';
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
                              <td>'.$EndDate.'</td>
                              <td>'.$Phases.'</td>
                              <td>'.$Time.'</td>
                              <td class="hide">'.$Organizer.'</td>
                              <td>'.$Status.'</td>
                              <td>'.$Desc.'</td>
                              <td>'.$Price.'</td>
                              <td>
                                <button type="button" class="btn btn-info ViewEvent" data-toggle="modal" data-target="#modal-default_view"><i class="fa fa-eye"></i></button>
                                <button type="button" class="btn btn-primary EditEvent" data-toggle="modal" data-target="#modal-default_update"><i class="fa fa-cog"></i></button>
                              </td>
                            </tr>';

                    }
                  }

                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th class="hide">ID</th> 
                  <th>Title</th>
                  <th>Location</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Phases</th>
                  <th>Time</th>
                  <th class="hide">Organizer</th>
                  <th>State</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>


       <!--  -->
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <!-- MODAL EDIT START HERE!!! -->

  <!--HERE-->
        <div class="modal fade" id="modal-default_update">
          <form id="EventEdit" action="EventEditAdmin.php" method="POST">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Event</h4>
              </div>
              <div class="modal-body">

                <label class="hide">Event ID</label>
                <input id="EID" type="text" class="form-control hide" placeholder="" name="EID">
                </br>
                <label>Event Title</label>
                <input id="ETitle" type="text" class="form-control" placeholder="" name="ETitle">
                </br>
                <label>Event Location</label>
                <input id="ELocation" type="text" class="form-control" placeholder="" name="ELocation">
                </br>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Start Date</label>
                    <input id="EDate" type="Date" class="form-control" placeholder="" name="EDate">
                  </div>
                  <div class="col-md-2">
                    <label>Phases</label>
                    <input id="EPhase" type="Number" min="1" class="form-control" placeholder="" name="EPhase">
                  </div>
                  <div class="col-md-4">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-group">
                          <input id="ETime" type="text" class="form-control timepicker" name="ETime">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </br>
                <label>Event Organizer</label>
                <input id="EOrganizer" type="text" class="form-control" placeholder="" name="EOrganizer" value="EUC" readonly="">
                </br>
                <label>Event Description</label>
                <textarea id="EDesc" class="form-control" rows="3" placeholder="" name="EDesc"></textarea>
                <div style="margin:auto;" align="right">
                  <label><small style="font-size: 15px">Fee: ₱<input id="EPrice" type="text" class="form-control" placeholder="" name="EPrice"></input></small></label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </form>
        </div>

  <!--HERE-->
        

  <!-- MODAL EDIT ENDS HERE!!! -->

<!-- MODAL VIEW START HERE!!! -->
        <div class="modal fade" id="modal-default_view">
          <form id="EventEdit" action="#" method="POST">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Event</h4>
              </div>
              <div class="modal-body">

                <label class="hide">Event ID</label>
                <input id="VID" type="text" class="form-control hide" placeholder="" name="ID" readonly="">
                </br>
                <label>Event Title</label>
                <input id="VTitle" type="text" class="form-control" placeholder="" name="Title" readonly="">
                </br>
                <label>Event Location</label>
                <input id="VLocation" type="text" class="form-control" placeholder="" name="Location" readonly="">
                </br>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Start Date</label>
                    <input id="VDate" type="Date" class="form-control" placeholder="" name="Date" readonly="">
                  </div>
                  <div class="col-md-2">
                    <label>Phases</label>
                    <input id="VPhase" type="text" class="form-control" placeholder="" name="Phase" readonly="">
                  </div>
                  <div class="col-md-4">
                    <div>
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-group">
                          <input id="VTime" type="text" class="form-control timepicker" name="Time" readonly="">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </br>
                <label>Event Organizer</label>
                <input id="VOrganizer" type="text" class="form-control" placeholder="" name="Organizer" readonly="">
                </br>
                <label>Event Description</label>
                <textarea id="VDesc" class="form-control" rows="3" placeholder="" name="Desc" readonly=""></textarea>
                <div style="margin:auto;" align="right">
                  <label><small style="font-size: 15px">Fee: ₱<big id="VPrice" style="font-size: 30px;">00.00</big></small></label>
                  
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
              </div>
            </div>
          </div>
        </form>
        </div>

  <!-- MODAL VIEW ENDS HERE!!! -->

  <!-- MODAL ADD STARTS HERE!!! -->
<div class="modal fade" id="modal-default_add">
    <form id="EventAdd" action="EventAddAdmin.php" method="POST">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Event</h4>
              </div>
              <div class="modal-body">
                </br>
                <label>Event Title</label>
                <input id="Title" type="text" class="form-control" placeholder="" name="Title">
                </br>
                <label>Event Location</label>
                <input id="Location" type="text" class="form-control" placeholder="" name="Location">
                </br>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Start Date</label>
                    <input id="Date" type="Date" class="form-control" placeholder="" name="Date">
                  </div>
                  <div class="col-md-2">
                    <label>Phases</label>
                    <input id="Phase" type="Number" min="1" class="form-control" placeholder="" name="Phase">
                  </div>
                  <div class="col-md-4">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-group">
                          <input id="Time" type="text" class="form-control timepicker" name="Time">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </br>
                <label>Event Organizer</label>
                <input id="EOrganizer" type="text" class="form-control" placeholder="" name="Organizer" value="EUC" readonly="">
                </br>
                <label>Event Description</label>
                <textarea id="EDesc" class="form-control" rows="3" placeholder="" name="Desc"></textarea>
                <div style="margin:auto;" align="right">
                  <label><small style="font-size: 15px">Fee: ₱<input id="Price" type="text" class="form-control" placeholder="" name="Price"></input></small></label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </form>
        </div>
  <!-- MODAL ADD ENDS HERE!!! -->
<?php
  include('footer.php');
?>  
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>

<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/input-mask/jquery.mask.js"></script>


</body>
</html>

<script type="text/javascript">
        $(document).ready(function()
        {
          $('#EPhase').on('change',function(){
            if($('#EPhase').val() < 1)
            {
              $('#EPhase').val(1);
            }
          });

          $('.timepicker').timepicker({
            showInputs: false
          });

          $('#EPrice').mask('#####0.00', {reverse: true});
          $('#Price').mask('#####0.00', {reverse: true});

            $(".EditEvent").click(function()
            {
                $("#EID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#ETitle").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#ELocation").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#EDate").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#EPhase").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#ETime").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#EOrganizer").val($(this).closest("tbody tr").find("td:eq(7)").html());
                $("#EDesc").val($(this).closest("tbody tr").find("td:eq(9)").html());
                $("#EPrice").val($(this).closest("tbody tr").find("td:eq(10)").html());
            });
            $(".ViewEvent").click(function()
            {
                $("#VID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#VTitle").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#VLocation").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#VDate").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#VPhase").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#VTime").val($(this).closest("tbody tr").find("td:eq(6)").html());
                $("#VOrganizer").val($(this).closest("tbody tr").find("td:eq(7)").html());
                $("#VDesc").val($(this).closest("tbody tr").find("td:eq(9)").html());
                $("#VPrice").text($(this).closest("tbody tr").find("td:eq(10)").html());
            });
        });
        $(function () {
          $('#example1').DataTable()
          // $('#example2').DataTable({
          //   'paging'      : true,
          //   'lengthChange': false,
          //   'searching'   : false,
          //   'ordering'    : true,
          //   'info'        : true,
          //   'autoWidth'   : false
          // })
        })

    </script> 