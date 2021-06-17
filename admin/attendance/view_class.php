<?php
include('../dbconnection.php');
include('../adminsession.php');

  $id = $_GET['id'];
  $section = $_GET['section'];

?>

<!DOCTYPE html>

<html lang="en">
<?php
include '../pages-styling.php';
?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <a href="../admin/dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../img/logo.png">
          </div>
        </a>
        <a href="../admin/dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a>
              <p>Attendance</p>
            </a>
          </li>
          <li>
            <a href="../attendance/attendance.php">
              <i class="fa fa-bars"></i>
              <p>Manage Attendance Wizard Session</p>
            </a>
            <!-- <a href="../attendance/attendance.php">
              <i class="fa fa-bars"></i>
              <p>Upcoming</p>
            </a> -->
          </li>



        </ul>
      </div>
    </div>
    <div class="main-panel">
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
            <a class="navbar-brand">ESDM Admin Page</a>
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

      <div class="py-3">
        <div class="container">
          <div class="row">
          </div>
        </div>
      </div>
      <div class="py-3">
        <div class="container">
          <div class="row">
          </div>
        </div>
      </div>
      <div class="py-3">
        <div class="container">
          <div class="row">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">

            <thead class="thead-dark">
              <tr>
                <th class="">Class ID</th>
                <th>Class Time</th>
                <th>Attendance Status</th>
                <th>Generation</th>
                <th>Operation</th>
                <th>Attendance</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM tb_class 
                      LEFT JOIN tb_subject ON tb_class.section_id = tb_subject.subject_id
                      LEFT JOIN tb_section ON tb_class.section_id = tb_section.section_id
                      WHERE  tb_class.section_id='$section'";
              
              $result = mysqli_query($con, $sql) or  die('Error:'.mysqli_error($con));
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['class_id'] . "</td>";
                echo "<td>" . $row['class_time'] . "</td>";
                echo "<td>"; 
                if ($row['class_attendance_open']=='1') {
                  echo"open";          
                }
                else{
                  echo"close";
                }
                 "</td>";
                echo "<td>
                    <a class='btn btn-info' href='create_qr.php?id=".$row['class_id']."'>Generate</a>
                    </td>";
                    echo "<td>
                    <a class='btn btn-primary' href='attendance_open.php?id=".$row['class_id']."&section=".$row['section_number']."'>Open</a>
                    <a class='btn btn-warning' href='attendance_close.php?id=".$row['class_id']."&section=".$row['section_number']."'>Close</a>
                     </td>";
                     echo "<td>
                     <a class='btn btn-success' href='view_student_attendance.php?id=".$row['class_id']."'>View</a>
                     </td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>





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