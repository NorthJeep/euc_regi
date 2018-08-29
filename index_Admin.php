<?php
$Title='EUC Events | Admin';
include_once('head.php');
session_start();
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
            <li class="active"><a href="index_Admin.php">Events <span class="sr-only">(current)</span></a></li>
           <!--  <li><a href="index_Admin.php">Link</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="list_of_events.php">List of Events</a></li>
              <!--   <li class="divider"></li> -->
                <li><a href="list_of_delegates.php">List of Delegates</a></li>
        <!--         <li class="divider"></li>
                <li><a href="#">List of Everthing</a></li> -->
              </ul>
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
                          <div class="progress-bar progress-bar-aqua" style="width: 50%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
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

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th class="hide">ID</th> 
                  <th>Title</th>
                  <th>Location</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Organizer</th>
                  <th>State</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
                <?php
                  include('config.php');

                  $EventListSQL = 'SELECT * FROM tbl_t_event';
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

                      echo '
                            <tr>
                              <td class="hide">'.$ID.'</td>
                              <td>'.$Title.'</td>
                              <td>'.$Location.'</td>
                              <td>'.$Date.'</td>
                              <td>'.$Time.'</td>
                              <td>'.$Organizer.'</td>
                              <td><span class="label label-success">Registration</span></td>
                              <td>'.$Desc.'</td>
                              <td>
                                <button type="button" class="btn btn-info ViewEvent" data-toggle="modal" data-target="#modal-default_view">View Details</button>
                                <button type="button" class="btn btn-primary EditEvent" data-toggle="modal" data-target="#modal-default_update">Edit</button>
                              </td>
                            </tr>';

                    }
                  }

                ?>
                <!-- <tr>
                  <td class="hide">183</td>
                  <td>Barangay IT Seminar </td>
                  <td> Vigan City </td>
                  <td>11-7-2014</td>
                  <td> Peter John Teneza</td>
                  <td><span class="label label-success">Registration</span></td>
                  <td>A seminar about the barangay IT system that will greatly revolutionize the way our barangays manage their businesses</td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default_update">
                Edit
              </button></td>
                </tr> -->
      <!--  -->
                <!-- <tr>
                  <td class="hide">183</td>
                  <td>SAD Lecture </td>
                  <td> Quezon City </td>
                  <td>11-7-2014</td>
                  <td> Lowell Dave Agnir</td>
                  <td><span class="label label-warning">Coming Soon</span></td>
                  <td>huhuhuhuhu</td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default_update">
                Edit
              </button></td>
                </tr> -->

      <!--  -->
                <!-- <tr>
                  <td class="hide">183</td>
                  <td>Extension Project </td>
                  <td> Makati City </td>
                  <td>11-7-2014</td>
                  <td>Ma. Michaela Alejandria</td>
                  <td><span class="label label-danger">Ended</span></td>
                  <td>Yiieeee! Only Binay, only Binay! hart hart xD </td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default_update">
                Edit
              </button></td>
                </tr> -->
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
                <!-- INPUTS SA MODAL HERE!! -->
                <label class="hide">Event ID</label>
                <input id="EID" type="text" class="form-control hide" placeholder="" name="ID">
                </br>
                <label>Event Title</label>
                <input id="ETitle" type="text" class="form-control" placeholder="" name="ETitle">
                </br>
                <label>Event Location</label>
                <input id="ELocation" type="text" class="form-control" placeholder="" name="ELocation">
                </br>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Date</label>
                    <input id="EDate" type="Date" class="form-control" placeholder="" name="EDate">
                  </div>
                  <div class="col-md-6">
                    <!-- <label>Time</label>
                    <input type="Date" class="form-control" placeholder="" name="Date"> -->
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-group">
                          <input id="ETime" type="text" class="form-control timepicker" name="ETime">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
                <!-- COMBO BOX HERE -->
                <!-- <label>Event State</label>
                  <select class="form-control">
                    <option>Registration</option>
                    <option>Ended</option>
                    <option>Coming Soon</option>
                  </select>
                </br> -->
                <label>Event Organizer</label>
                <input id="EOrganizer" type="text" class="form-control" placeholder="" name="EOrganizer">
                </br>
                <label>Event Description</label>
                <textarea id="EDesc" class="form-control" rows="3" placeholder="" name="EDesc"></textarea>
                <!-- END OF INPUTS SA MODAL -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </form>
        </div>

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
                <!-- INPUTS SA MODAL HERE!! -->
                <label class="hide">Event ID</label>
                <input id="VID" type="text" class="form-control hide" placeholder="" name="ID">
                </br>
                <label>Event Title</label>
                <input id="VTitle" type="text" class="form-control" placeholder="" name="Title">
                </br>
                <label>Event Location</label>
                <input id="VLocation" type="text" class="form-control" placeholder="" name="Location">
                </br>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Date</label>
                    <input id="VDate" type="Date" class="form-control" placeholder="" name="Date">
                  </div>
                  <div class="col-md-6">
                    <!-- <label>Time</label>
                    <input type="Date" class="form-control" placeholder="" name="Date"> -->
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-group">
                          <input id="VTime" type="text" class="form-control timepicker" name="Time">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
                </br>
                <!-- COMBO BOX HERE -->
                <!-- <label>Event State</label>
                  <select class="form-control">
                    <option>Registration</option>
                    <option>Ended</option>
                    <option>Coming Soon</option>
                  </select>
                </br> -->
                <label>Event Organizer</label>
                <input id="VOrganizer" type="text" class="form-control" placeholder="" name="Organizer">
                </br>
                <label>Event Description</label>
                <textarea id="VDesc" class="form-control" rows="3" placeholder="" name="Desc"></textarea>
                <!-- END OF INPUTS SA MODAL -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
                <!-- INPUTS SA MODAL HERE!! -->
                <label>Event Title</label>
                <input type="text" class="form-control" placeholder="Event Title" name="Title" required="">
                </br>
                <label>Event Location</label>
                <input type="text" class="form-control" placeholder="Location" name="Location">
                </br>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Date</label>
                    <input type="Date" class="form-control" placeholder="" name="Date">
                  </div>
                  <div class="col-md-6">
                    <!-- <label>Time</label>
                    <input type="Date" class="form-control" placeholder="" name="Date"> -->
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Time">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
                </br>
                <!-- COMBO BOX HERE -->
                <!-- <label>Event State</label>
                  <select class="form-control">
                    <option>Registration</option>
                    <option>Ended</option>
                    <option>Coming Soon</option>
                  </select>
                </br> -->
                <label>Event Organizer Details</label>
                <textarea class="form-control" rows="3" placeholder="Event Organizer Details" name="Organizer" required=""></textarea>
                </br>
                <label>Event Description</label>
                <textarea class="form-control" rows="5" placeholder="Event Description" name="Desc" required=""></textarea>
                <!-- END OF INPUTS SA MODAL -->
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

</body>
</html>

<script>
  $(function (){
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".EditEvent").click(function()
            {
                $("#ETitle").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#ETitle").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#ELocation").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#EDate").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#ETime").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#EOrganizer").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#EDesc").val($(this).closest("tbody tr").find("td:eq(7)").html());
                // if ($(this).closest("tbody tr").find("td:eq(13)").text() === "Active") {
                //         $("#editCheckA").prop("checked", true).trigger('click');
                //     } else {
                //         $("#editCheckI").prop("checked", true).trigger('click');
                //     }
                // if ($(this).closest("tbody tr").find("td:eq(16)").text() === "M") {
                //         $("#EditGendM").prop("checked", true).trigger('click');
                //     } else {
                //         $("#EditGendF").prop("checked", true).trigger('click');
                //     }
                // ActOption = "option[value="+val($(this).closest("tbody tr").find("td:eq(4)").html())+"]";
                // $("#PositionOption").find(ActOption).prop("selected",true);
            });
            $(".ViewEvent").click(function()
            {
                $("#VTitle").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#VTitle").val($(this).closest("tbody tr").find("td:eq(1)").html());
                $("#VLocation").val($(this).closest("tbody tr").find("td:eq(2)").html());
                $("#VDate").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#VTime").val($(this).closest("tbody tr").find("td:eq(4)").html());
                $("#VOrganizer").val($(this).closest("tbody tr").find("td:eq(5)").html());
                $("#VDesc").val($(this).closest("tbody tr").find("td:eq(7)").html());
                // if ($(this).closest("tbody tr").find("td:eq(13)").text() === "Active") {
                //         $("#editCheckA").prop("checked", true).trigger('click');
                //     } else {
                //         $("#editCheckI").prop("checked", true).trigger('click');
                //     }
                // if ($(this).closest("tbody tr").find("td:eq(16)").text() === "M") {
                //         $("#EditGendM").prop("checked", true).trigger('click');
                //     } else {
                //         $("#EditGendF").prop("checked", true).trigger('click');
                //     }
                // ActOption = "option[value="+val($(this).closest("tbody tr").find("td:eq(4)").html())+"]";
                // $("#PositionOption").find(ActOption).prop("selected",true);
            });
        });

    </script> 