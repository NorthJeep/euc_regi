<?php
@ob_start();
$Title='EUC Events | Event Reports ';
include_once('head.php');
session_start();
if(!isset($_SESSION['LoggedIn']))
{
  $header = 'Location:/euc_regi/index.php';
  session_destroy();
  session_unset($_SESSION['LoggedIn']);
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
            <li>
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
             

            <!-- NOTIFICATION -->
            <li id="notif-drop-btn" class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a  href="#" class="dropdown-toggle notif-drop-con" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning count"></span>
              </a>
              <ul class="dropdown-menu notif-drop">
                
              </ul>
            </li>
            <!--END NOTIFICATION -->
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <!-- <span class="label label-danger">1</span> -->
              </a>
              <ul class="dropdown-menu">
                <li class="header">Event Days</li>
                <?php
                  include('config.php');

                  $EventDaysSQL = 'SELECT Event_Title,
                                          Event_Date,
                                          Event_Phases,
                                          DATEDIFF(Event_Date, CURRENT_DATE) AS Remain_Day,
                                          DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS End_Date
                                    FROM tbl_t_event
                                    WHERE DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) > CURRENT_DATE';
                  $EventDaysQuery = mysqli_query($euceventMysqli,$EventDaysSQL) or die (mysqli_error($euceventMysqli));
                  if(mysqli_num_rows($EventDaysQuery) > 0)
                  {
                    while($row1 = mysqli_fetch_assoc($EventDaysQuery))
                    {
                      $EDTitle = $row1['Event_Title'];
                      $EDDate = $row1['Event_Date'];
                      $EDPhases = $row1['Event_Phases'];
                      $EDRemain = $row1['Remain_Day'];
                      $EDEnd = $row1['End_Date'];

                      echo '
                        <li>
                          <ul class="menu">
                            <li>
                              <a href="#">
                                <div>
                                  <h5 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    '.$EDTitle.'
                                    <small class="pull-right">'.$EDRemain.' Days Left</small>
                                  </h5>
                                </div>
                                <div class="progress xs">
                                  <div class="progress-bar progress-bar-aqua" style="width: 100%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">'.$EDDate.'</span>
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </li>
                      ';

                    }
                  }

                ?>
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
           <!-- <a href="euc_delegates_print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>  -->
        <button href="euc_delegates_print.php" target="_blank" class="btn btn-default printFunction"><i class="fa fa-print"></i> Print</button>
          <button id="Export" class="btn btn-primary ExportButton"><i class="fa fa-file-archive-o"></i> Export</button>
          <button id="Import" class="btn btn-primary ImportButton"><i class="fa fa-file-archive-o"></i> Import</button>
        </br>
        </br>
        <form id="importForm" method="post" action="import.php" enctype="multipart/form-data" style="margin-bottom: 0px; padding: 0px;">
          <input type="file" id="importSubmit" accept=".xlsx, .xls, .csv" name="ImportFile" style="visibility:hidden"/>
        </form>
        <form action="export.php" method="post">
          <input type="submit" id="triggerSubmit" name="Type" value="Delegates" style="visibility:hidden"/>
        <div class="col-xs-12" style="margin-bottom: 2%;">
          <div class="col-xs-6">
           <label>Select Event</label>
                  <select id="event-select" name="Event" class="form-control">
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
                            echo '<option value="'.$ID.'">'.$Title.'</option>';
                          }
                      }
                      else
                      {
                        echo '<option value="0" selected>No registered events.</option>';
                      }
                    ?>
                    
                  </select>
          </div>
          <div class="col-xs-6">
            <label>Select Company</label>
                  <select id="company-select" name="Company" class="form-control">
                    <?php
                      include('config.php');
                      $CompanySelectSQL = 'SELECT DISTINCT Company FROM tbl_t_registrant ORDER BY Company';
                      $CompanySelect = mysqli_query($euceventMysqli,$CompanySelectSQL) or die (mysqli_error($euceventMysqli));
                      if(mysqli_num_rows($CompanySelect) > 0)
                      {
                        echo '<option value="All" selected>All</option>';
                        while($row2 = mysqli_fetch_assoc($CompanySelect))
                        {
                          $Company_Name = $row2['Company'];
                          echo '<option value="'.$Company_Name.'">'.$Company_Name.'</option>';
                        }
                      }
                      else
                      {
                        echo '<option value="All" selected>All</option>';
                      }

                    ?>
                  </select>
          </div>
       <!--  <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
        </div>
      </form>
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
                  <input id="search-box" type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div id="DataTable" class="box-body table-responsive no-padding">
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
                <h5>Event Name:<h4 id="EName">title</h4></h5>
                <h5>Event Price:<h4 id="EPrice">price</h4></h5>

                <input id="ERID" type="text" class="form-control hide" name="RID" placeholder="">

                <small>Name:</small>
                <div class="form-group" style="margin-top: 10px">
                  <h2 style="margin-top: 10px"><small id="ELName" style="font-size: 30px">LName</small>, <small id="EFName"  style="font-size: 30px">FName</small> <small id="EMName"  style="font-size: 30px">MName </small> <small id="EXName"  style="font-size: 30px">, XName</small></h2>
                  <h5 id ="ECompany">
                    Company
                  </h5>
                </div>
                </br>
                <div class="form-group col-xs-12">
                  <div class="col-xs-6">
                    <label>Contact: <small id="EContact" style="font-size: 15px">Contact</small></label>

                  </div>
                  <div class="col-xs-6">
                    <label>Email: <small id="EEmail" style="font-size: 15px">Email</small></label>


                  </br>
                  </div>
                </div>
                <div class="form-group col-xs-12">
                  <div class="col-xs-4" style="vertical-align: center;">
                    <label>Payment Status: <h4 id="EPaymentStatus" style="color: red">STATUS</h4></label>
                  </div>
                  <div class="col-xs-4">
                    <label>Payment Balance: <h4 id="EPaymentBalance" style="color: red">BALANCE</h4></label>
                    <!-- <label class="col-xs-12">Balance

                    <select id="EPayment" class="form-control">
                      <option value="Unpaid">Unpaid</option>
                      <option value="Partial">Partial</option>
                      <option value ="Full">Full Payment</option>
                    </select>
                    </label> -->
                  </div>
                  <div id="PayDiv" class="col-xs-4">
                    <label>Pay Balance: 
                      <!-- <input id="EPay" type="text" class="form-control" placeholder="" name="Payment"> -->
                    </label>
                    </br>
                    <button id="SubmitPay" class="btn btn-warning"><i class="fa fa-check-square-o"></i> Pay</button>
                    <!-- <input>Pay: <h4 id="EPaymentStatus" style="color: red">STATUS</h4></input> -->
                  </div>
                </div>
              </br>
                <label>Date Registered: <small id="EDateRegistered">Date</small></label>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
                <!-- <button type="button" class="btn btn-primary">Update</button> -->
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

<script src="plugins/input-mask/jquery.mask.js"></script>

<script type="text/javascript">
  $(document).ready(function()
  {
    $('#Import').click(function(){
      $("#importSubmit").click();
    });

    $('#importSubmit').on('change',function(){
      $('#importForm').submit();
    });

    $('#Export').click(function(){
      $("#triggerSubmit").click();
    });

    $('#EPay').mask('########0.00', {reverse: true});

    $('#SubmitPay').click(function(){
      if($('#EPay').val() === '')
      {
        alert('Please insert an amount to continue.');
      }
      else
      {
        var Rno = $('#ERID').val();
        var Amount = $('#EPaymentBalance').text();
        // var newWindow = window.open('');

        $.ajax({
          url:"updatepay.php",
          type:"POST",
          data: {Rno:Rno,Amount:Amount},
          success:function(data)
          {
            // var Link = data;
            // newWindow.location.href = Link;
            alert(data);
            location.reload();
            // $('.participant-table tbody').append(data);
            
          } 
        });
      }
    });
    $('#search-box').keyup(function(){

      $('.participant-table tbody tr').remove();
      if($(this).val() != '')
      {
        var SearchText = $(this).val();
        var EventID = $('#event-select').val();
        var Company = $('#company-select').val();
        $.ajax({
          url:"searchparticipantlist.php",
          type:"POST",
          data: {ID:EventID,Search:SearchText,Company:Company},
          success:function(data)
          {
            $('.participant-table tbody').append(data);
            
          } 
        });

      }
      else
      {
        $('.participant-table tbody tr').remove();
        var Event = $('#event-select').val();
        var Company = $('#company-select').val();
        $.ajax({
          url:"participantlist.php",
          type:"POST",
          data: {ID:Event,Company:Company},
          success:function(data)
          {
            $('.participant-table tbody').append(data);
            
          } 
        });
      }

    });

    $('.printFunction').on('click',function(){
      var EID = $('#event-select').val();
      window.open("euc_delegates_print.php?Event="+EID+"");
    });

    
    $('#event-select').on('change', function(){
      $('.participant-table tbody tr').remove();
      var Event = $('#event-select').val();
      var Company = $('#company-select').val();
      $.ajax({
        url:"companyparticipantlist.php",
        type:"POST",
        data: {Event:Event,Company:Company},
        success:function(data)
        {
          $('.participant-table tbody').append(data);
        } 
      });
    });

    $('#company-select').on('change',function(){
      $('.participant-table tbody tr').remove();
      var Event = $('#event-select').val();
      var Company = $('#company-select').val();
      $.ajax({
        url:"companyparticipantlist.php",
        type:"POST",
        data: {Event:Event,Company:Company},
        success:function(data)
        {
          $('.participant-table tbody').append(data);
          
        } 
      });
    });

    // $('.BalanceChecksss').on('click',function(){

    //     alert("asdasd");
        
    // });

    

  });

  function EditRecord(Rno){

        $.ajax({
        url:"delegatechange.php",
        method:"POST",
        data: {Rno:Rno},
        dataType:"json",
        success:function(data)
        {
          // alert(data.EName);
          $('#EName').text(data.EName);
          $('#EPrice').text(data.EPrice);
          $('#ELName').text(data.LName);
          $('#EMName').text(data.MName);
          $('#EFName').text(data.FName);
          $('#EXName').text(data.XName);
          $('#ECompany').text(data.Company);
          $('#EContact').text(data.Contact);
          $('#EEmail').text(data.Email);
          $('#EDateRegistered').text(data.Date);
          $('#EPaymentStatus').text(data.Status);

          var Balance = (data.EPrice - data.Amount);

          $('#EPaymentBalance').text(Balance);

          if(data.Status != "Fully Paid")
          {
            $('#PayDiv').show();
          }
          else
          {
            $('#PayDiv').hide();
          }
          $('#ERID').val(data.Rno);
          // $('.participant-table tbody').append(data);
          // alert('ASDASD');
        } 
        });

  }

  // $('#BalanceChecksss').click(function() {
  //       alert('haha');
  // });

  
</script>
<script>
    $(document).ready(function(){
      
        var NotifActive = 0;
        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"NotifLoad.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                    $('.notif-drop').empty();
                    $('.notif-drop').html(data.Notification);

                    if(data.NotificationCount > 0)
                    {
                        $('.count').html(data.NotificationCount);
                    }
                }
            });
        }
        load_unseen_notification();
        $(document).on('click','.notif-drop-con', function(){
          NotifActive = 1;
          $('.count').html('');
          // load_unseen_notification('read');
        });
        // $(document).on('click','body', function(){
        //   if(NotifActive == 1)
        //   {
        //     load_unseen_notification('read');
        //     NotifActive = 0;
        //   }
        // });
        $('#notif-drop-btn').on('hidden.bs.dropdown',function(){
          if(NotifActive == 1)
          {
            load_unseen_notification('read');
            NotifActive = 0;
          }
        });
        setInterval(function(){

            load_unseen_notification();  
          
        }, 5000);
        
    });

</script>