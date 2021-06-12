<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  if(isset($_POST['datepicker'])){
    $date = $_POST['datepicker'];
  }
  else{
    $date = date("Y-m-d");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <?php 
  include '../pages-styling.php';
  ?>
<!-- for calendar/date picker-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- for data table -->
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#mytable').DataTable();
    });

    $( function() {
      var dateToday = new Date();
      $( "#datepicker" ).datepicker({
      dateFormat: 'yy/mm/dd',
      minDate: dateToday}).datepicker("setDate");;
    } );
  </script>

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../img/logo.png">
          </div>
        </a>
        <a href="../admin/dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
          <li>
            <a>
            <p>Health</p>
            </a>
          </li> 
          <li>  
            <a href="../health/health.php">
            <i class="fa fa-bars"></i>
            <p>Manage Health</p>
            </a>
          </li>
            
        </ul>
      </div>
    </div>
<div class="main-panel" style="padding: 1rem;">
<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand">ESDM Admin Health Page</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#logout" style="color:white;"> Log out &nbsp <i class="fa fa-sign-out "></i></button>

          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div style="display: flex; justify-content: flex-start;align-items: center; width: 100%;margin-top: 5rem; margin-bottom: 1rem;">
    <button class="btn btn-secondary" onclick="window.location.href='health.php' ">Manage Slots</button>
    <button class="btn btn-secondary" onclick="window.location.href='healthappointment.php' ">View Appointments</button>
  </div>


  <form method='POST' action=''>
  <div style="display: flex; justify-content: flex-start;align-items: center; width: 100%;padding-bottom:1.5rem;">
    <div class="form group">
    <label for="date" style="color:black; font-size:1.2rem; ">Select Date:</label>
    <input type="form-control" id="datepicker" name="datepicker" required></input>
    </div> 
    <button type="submit" class="btn btn-primary" style="margin-left: 1rem;">Confirm</button>
  </div>


  <table class="table table-hover"  id="mytable" style="color:black">
    <thead>
      <tr>
        <th>Slot Date & Time</th>
        <th>Student Name</th>
        <th>Matrics</th>
        <th>Phone</th>
      </tr>
    </thead>

    <?php

      $sql = "SELECT * FROM tb_appointment_slot LEFT JOIN tb_student ON tb_appointment_slot.slot_stu_id = tb_student.u_id
      WHERE Date(slot_datetime) = '$date' AND slot_stu_id IS NOT NULL ";

      $results = mysqli_query($con,$sql);

      while($row = mysqli_fetch_array($results))
      {

      echo "<tr>";
      echo "<td>".$row['slot_datetime']."</td>";
      echo "<td>".$row['student_name']."</td>";
      echo "<td>".$row['student_matric']."</td>";
      echo "<td>".$row['student_phone']."</td>";

      }

    ?>
  </table>
</div>

  <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
                    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation on Logout</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to log out from the system?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
        <a href="../logout.php"><button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button></a>
      </div>
    </div>                                                
    </div>
  </div>

<br> <br>

</div>
</div>
<!--   Core JS Files   -->

<script src="../js/core/popper.min.js"></script>
<script src="../js/core/bootstrap.min.js"></script>
<script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>

</html>
