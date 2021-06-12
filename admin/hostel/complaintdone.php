<?php
  include('../dbconnection.php');
  include('../adminsession.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include '../pages-styling.php';
?>
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
}
</style>
<body>
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
          <li>
            <a href="../hostel/phase.php">
              <i class="fa fa-bars"></i>
              <p>Registration Phase</p>
            </a>
          </li>      
          <li>
            <a href="../hostel/register.php">
              <i class="fa fa-bars "></i>
              <p>Manage Registration</p>
            </a>
          </li>
          <li>
            <a href="../hostel/complaint.php">
              <i class="fa fa-bars"></i>
              <p>Manage Complaint</p>
            </a>
          </li>
          <li  class="active">
            <a href="../hostel/complaintdone.php">
              <i class="fa fa-bars"></i>
              <p>Accepted Complaint</p>
            </a>
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
            <a class="navbar-brand">Residential Colleges Management</a>
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


<br><br><br><br>
<div class="container" style="padding-left: 25%;padding-bottom: 3%;padding-top: 5%">
          <form method="post">
                <?php
                    $cquery = mysqli_query($con,"SELECT * FROM tb_hos_college")or die(mysqli_error());       
                    echo'<select class="col-lg-8" name="col" style="width:30%;height:40px">
                    <option"> Select college..</option>';
                        while ($crow = mysqli_fetch_array($cquery)) {
                            echo "<option value='".$crow['kolej_id']."' selected='selected'>".$crow['kolej_name']."</option>";
                        }
                    echo'</select>';
                ?>
                        <button type="submit" name="save" class="btn btn-info col-sm-2">Search</button>

    </form> 
</div>
<?php
            if (isset($_POST['save'])) {
                $kolej_id = $_POST['col'];
                

                  if($kolej_id > 0){
                        $query = mysqli_query($con,"SELECT * FROM tb_hos_complaint INNER JOIN tb_hostel_reg ON tb_hos_complaint.student_id = tb_hostel_reg.student_id INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id INNER JOIN tb_hos_technician ON tb_hos_complaint.tech_id = tb_hos_technician.tech_id WHERE tb_hostel_reg.hostel_id = '$kolej_id' AND reg_status ='Accepted' AND complaint_status = 'Accepted'") or die(mysqli_error());
                        include('../hostel/complaintdone_list.php');
                    }
                  }
?>
              
  
        <div class="modal fade" id="logout" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Confirmation on Logout</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to log out?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
        <a href="../logout.php"><button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button></a>
        </div>
        </div>                                                
        </div>
        </div>

  <br> <br>
       <div class="footer">
         <?php include '../adminfooter.php' ?>
       </div>
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
