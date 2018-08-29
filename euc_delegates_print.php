<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EUC Events | Print</title>
  <link rel="shortcut icon" href="favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           <img src="dist/img/euc_logo.jpg" class="user-image" alt="User Image" style="width:100px;height:100px;"> Electronic Financials Users Circle (EUC), Inc.
          <small class="pull-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>


    </br>
           <label>Selected Event</label>
                  <select class="form-control">
                    <option>Barangay IT Seminar</option>
                    <option>SAD Lecture</option>
                    <option>Extension Project</option>
                  </select>

</br>

    <!-- info row -->
    
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Event Participants</h3>

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
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Name Extension</th>
                  <th>Contact</th>
                  <th>E-Mail</th>
                </tr>

                <tr>
                  <td class="hide">183</td>
                  <td>Lowell Dave </td>
                  <td>Elba </td>
                  <td>Agnir</td>
                  <td>III</td>
                  <td>09123456</td>
                  <td>emailnilowell@gmail.com</td>
                  
                </tr>
      <!--  -->
                
                <tr>
                  <td class="hide">183</td>
                  <td>Ma. Michaela </td>
                  <td>Cruz</td>
                  <td>Alejandria</td>
                  <td>Sr.</td>
                  <td>09123456789</td>
                  <td>mikaemail@gmail.com</td>
                  
                </tr>

      <!--  -->
                  
                <tr>
                  <td class="hide">183</td>
                  <td>Peter John </td>
                  <td>  </td>
                  <td>Teneza</td>
                  <td> </td>
                  <td>09264192129</td>
                  <td>peterjohnteneza@gmail.com</td>
                  
                </tr>
               
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
