<?php
$Title='EUC Events | Attendance ';
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
            <li class=""><a href="index_Admin.php">Events <span class="sr-only"></span></a></li>
           <!--  <li><a href="index_Admin.php">Link</a></li> -->
             
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="list_of_events.php" class="active">List of Events</a></li>
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
                    <a href="index.php" class="btn btn-default btn-flat">Sign out</a>
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
           <!-- <a href="euc_delegates_print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>  -->
           <button href="euc_delegates_print.php" target="_blank" class="btn btn-default printFunction"><i class="fa fa-print"></i> Print</button> 
         </br>
         </br>
           <label>Select Event</label>
                  <select id="event-select" class="form-control">
                    <?php
                      include('config.php');
                      $EventSelectSQL = 'SELECT Event_ID,Event_Title,Event_Phases,Event_Date,DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS EndDate FROM tbl_t_event WHERE CURRENT_DATE BETWEEN Event_Date AND DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) ORDER BY Event_Title';
                      $EventSelect = mysqli_query($euceventMysqli,$EventSelectSQL) or die (mysqli_error($euceventMysqli));
                      if(mysqli_num_rows($EventSelect) > 0)
                      {
                        echo '<option value="0" selected>No selected event.</option>';
                        while($row = mysqli_fetch_assoc($EventSelect))
                        {
                          $Title = $row['Event_Title'];
                          $ID =  $row['Event_ID'];
                          echo '<option value="'.$ID.'">'.$Title.'</option>';
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
              <h3 class="box-title">EUC Event Participants</h3>

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
              <table class="table table-hover participant-table">
                <thead>
                <tr>
                  <th class="hide">ID</th> 
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Name Extension</th>
                  <th>Company</th>
                  <th>Date Registered</th>
                  <th class="">Price</th>
                  <th>Amount Paid</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                  <td class="hide">N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td class="">N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                </tr>
               </tbody>
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
        <div class="modal fade" id="modal-default_check">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Check Balance</h4>
              </div>
              <div class="modal-body">


                <input id="ERID" type="text" class="form-control hide" name="RID" placeholder="">
                <div class="form-group" align="center">
                  <h2><small id="ELName" style="font-size: 40px">LName</small>, <small id="EFName"  style="font-size: 15px">FName</small> <small id="EMName"  style="font-size: 15px">MName </small> <small id="EXName"  style="font-size: 15px">, XName</small></h2>
                </div>
                </br>
                <div class="form-group col-xs-12">
                  <div class="col-xs-6">
                    <label>Contact: <small id="EContact" style="font-size: 20px">Contact</small></label>

                  </div>
                  <div class="col-xs-6">
                    <label>Email: <small id="EEmail" style="font-size: 20px">Email</small></label>


                  </br>
                  </div>
                </div>
                <div class="form-group col-xs-12">
                  <div class="col-xs-6" style="vertical-align: center;">
                    <label>Payment Method: <small id="EPaymentMethod" style="color: red">KAHIT ANO</small></label>
                  </div>
                  <div class="col-xs-6">

                    <label class="col-xs-12">Status
                    <select id="EPayment" class="form-control">
                      <option value="Unpaid">Unpaid</option>
                      <option value="Partial">Partial</option>
                      <option value ="Full">Full Payment</option>
                    </select>
                    </label>
                  </div>
                </div>
              </br>
                <label>Date Registered: <small id="EDateRegistered">Date</small></label>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Update</button>
              </div>
            </div>

          </div>

        </div>

<?php
  include('footer.php');
?>  
</div>
<!-- ./wrapper -->
</body>
</html>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.min.js"></script> -->
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
<!-- <script src="dist/js/pages/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->

<script type="text/javascript">
  $(document).ready(function()
  {

    $('.printFunction').on('click',function(){
      var EID = $('#event-select').val();
      window.open("euc_delegates_print.php?Event="+EID+"");
    });

    $('#event-select').on('change', function(){
      $('.participant-table tbody tr').remove();
      var Event = $(this).val();
      $.ajax({
        url:"AttendanceList.php",
        type:"POST",
        data: {ID:Event},
        success:function(data)
        {
          $('.participant-table tbody').append(data);

        } 
      });
    });
  });

  // $('.BalanceCheck').on('click',function(){

  //       alert("asdasd");
        // $("#ERID").value($(this).closest("tbody tr").find("td:eq(0)").html());
        // $("#EFName").text($(this).closest("tbody tr").find("td:eq(1)").html());
        // $("#EMName").text($(this).closest("tbody tr").find("td:eq(2)").html());
        // $("#ELName").text($(this).closest("tbody tr").find("td:eq(3)").html());
        // $("#EXName").text($(this).closest("tbody tr").find("td:eq(4)").html());
        // $("#EContact").text($(this).closest("tbody tr").find("td:eq(5)").html());
        // $("#EEmail").text($(this).closest("tbody tr").find("td:eq(6)").html());
        // $("#EDateRegistered").text($(this).closest("tbody tr").find("td:eq(7)").html());
        // $("#EPaymentMethod").text($(this).closest("tbody tr").find("td:eq(8)").html());
        // $("#EPayment").value($(this).closest("tbody tr").find("td:eq(9)").html());
    // });
</script>