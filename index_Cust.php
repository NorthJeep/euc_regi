<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EUC Events | Registration </title>

  <link rel="shortcut icon" href="favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
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
                  <th>Organizer</th>
                  <th>State</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
                <tr>
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
                </tr>
      <!--  -->
                <tr>
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
                </tr>

      <!--  -->
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
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<!-- MODAL EDIT START HERE!!! -->
        <div class="modal fade" id="modal-defaul_Register">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Event Registration</h4>
              </div>
              <div class="modal-body">
                <!-- INPUTS SA MODAL HERE!! -->
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="">
                </br>
                <label>Middle Name</label>
                <input type="text" class="form-control" placeholder="">
                </br>
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="">
                </br>
                <label>Extension Name</label>
                <input type="text" class="form-control" placeholder="">
                </br>
                <label>Contact Number</label>
                <input type="Number" class="form-control" placeholder="">
                </br>
                <label>E-mail</label>
                <input type="E-mail" class="form-control" placeholder="">
                <!-- END OF INPUTS SA MODAL -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Register</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <!-- MODAL EDIT ENDS HERE!!! -->

       <!--  -->
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
       <!--  <b>Version</b> 2.4.0 -->
      </div>
     <!--  <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved. -->
      <strong> <a href="http://euc-inc.ph"> Electronic Financials Users’ Circle (EUC), Inc.</a> &copy 2018</strong>
    </div>
    <!-- /.container -->
  </footer>
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

</body>
</html>
