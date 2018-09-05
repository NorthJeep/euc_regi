<?php
$Title='EUC Events | Registration';
include_once('head.php');
date_default_timezone_set('Asia/Manila');
?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

   <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index_Cust.php" class="navbar-brand"><b>EUC </b>Events</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index_Cust.php">Registration <span class="sr-only">(current)</span></a></li>
           <!--  <li><a href="index_Admin.php">Link</a></li> -->
            
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
    
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="index.php">
                <!-- The user image in the navbar-->
                <img src="dist/img/euc_logo.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Log In</span>
              </a>
             
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
        <h1> Welcome to EUC! </h1> <small> </small>
        <!--     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default_add">
                Add New Event
            </button> -->
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
                  <th class="hide">Organizer</th>
                  <th>State</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
                <?php
                  include('config.php');
                  $CurrDate = time();
                  $EventListSQL = 'SELECT Event_ID,
                                          User_ID,
                                          Event_Title,
                                          IFNULL(Event_Date,"") AS Event_Date,
                                          IFNULL(Event_Time,"") AS Event_Time,
                                          Event_Location,
                                          Event_OrganizerDetail,
                                          Event_Desc
                                   FROM tbl_t_event WHERE Event_Date >= CURRENT_DATE OR Event_Date IS NULL
                                   ORDER BY Event_ID DESC';
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
                      $RegisterFlag = 1;
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
                        }
                      }
                      else
                      {
                        $Status = '<span class="label label-default">Coming Soon</span>';
                        $RegisterFlag = 0;
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
                              <td>'.$Desc.'</td>';
                            if($RegisterFlag == 1)
                            {
                              echo '
                              <td>
                                <button type="button" class="btn btn-info ViewEvent" data-toggle="modal" data-target="#modal-default_view">View Details</button>
                                <button type="button" class="btn btn-success RegisterEvent" data-toggle="modal" data-target="#modal-defaul_Register"> Register
                                </button>
                              </td>
                              </tr>';
                            }
                            else
                            {
                              echo '
                                <td>
                                  <button type="button" class="btn btn-info ViewEvent" data-toggle="modal" data-target="#modal-default_view">View Details</button>
                                </td>
                                </tr>';
                            }

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
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-defaul_Register">
                Register
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
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-defaul_Register">
                Register
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
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-defaul_Register">
                Register
              </button></td>
                </tr> -->
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<!-- MODAL VIEW START HERE!!! -->
        <!-- <div class="modal fade" id="modal-default_view">
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
                    <label>Date</label>
                    <input id="VDate" type="Date" class="form-control" placeholder="" name="Date" readonly="">
                  </div>
                  <div class="col-md-6">
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

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
              </div>
            </div>
          </div>
        </form>
        </div> -->
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
                    <label>Date</label>
                    <input id="VDate" type="Date" class="form-control" placeholder="" name="Date" readonly="">
                  </div>
                  <div class="col-md-6">
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

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
              </div>
            </div>
          </div>
        </form>
        </div>

  <!-- MODAL VIEW ENDS HERE!!! -->

<!-- MODAL EDIT START HERE!!! -->
        <div class="modal fade" id="modal-defaul_Register">
          <form id="Regster" action="Register.php" method="POST">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Event Registration</h4>
              </div>
              <div class="modal-body">
                <!-- INPUTS SA MODAL HERE!! -->
                <label style="float: right">(* = Optional)</label>
                <label class="hide">Event ID</label>
                <input id="ID" type="text" class="form-control hide" placeholder="" name="ID">
                <div div class="col-xs-12">
                  <div class="col-xs-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="" name="FName" required="">
                  </div>
                  <div class="col-xs-3">
                    <label>Middle Name*</label>
                    <input type="text" class="form-control" placeholder="" name="MName">
                  </div>
                  <div class="col-xs-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="" name="LName" required="">
                  </div>
                  <div class="col-xs-3">
                    <label>Extension Name*</label>
                    <input type="text" class="form-control" placeholder="" name="XName">
                  </div>
                </div>
                <div div class="col-xs-12" style="margin-top: 20px;">
                  <div class="col-xs-12">
                    <label>Contact Number</label>
                    <input id="Contact" type="text" maxlength="11" class="form-control" placeholder="" name="Contact" required="">
                    </br>
                  </div>
                  <div class="col-xs-12">
                    <label>E-mail Address</label>
                    <input type="E-mail" class="form-control" placeholder="" name="Email" required="">
                    </br>
                  </div>
                  <div class="col-xs-12" style="margin:20px" align="center">
                    <div class="col-xs-2">
                    </div>
                    <div class="checkbox icheck col-xs-8" align="center">
                      <input type="checkbox" class="icheckbox_square-blue" required="">
                      <label>
                         By clicking the checkbox, you agree to our <a href="TermsAndConditions.php">Terms of Use, Privacy Policy and Disclaimer.</a>
                      </label>
                    </div>
                    <div class="col-xs-2">
                    </div>
                  </div>
                </div>
                <!-- END OF INPUTS SA MODAL -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </form>
        </div>

  <!-- MODAL EDIT ENDS HERE!!! -->

       <!--  -->
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

<?php
  include('footer.php');
?>  
</div>
<!-- ./wrapper -->


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="plugins/input-mask/jquery.inputmask.js"></script> -->

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

<script src="plugins/input-mask/jquery.mask.js"></script>

</body>
</html>
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".RegisterEvent").click(function()
            {
                $("#ID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                
            });
            $('#Contact').mask('00000000000');
        });
        $(document).ready(function()
        {

            $(".ViewEvent").click(function()
            {
                $("#VID").val($(this).closest("tbody tr").find("td:eq(0)").html());
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