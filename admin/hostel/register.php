<?php
  include('../dbconnection.php');
  include('../adminsession.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include '../pages-styling.php';
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <p>Manage Phase</p>
            </a>
          </li>
          <li class="active">
            <a href="../hostel/register.php">
              <i class="fa fa-bars"></i>
              <p>Manage Registration</p>
            </a>
          </li>       
          <li>
            <a href="../hostel/complaint.php">
              <i class="fa fa-bars "></i>
              <p>Manage Complaint</p>
            </a>
          </li> 
          <li>
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
<div class="container" style="padding-left: 15%;padding-bottom: 3%;padding-top: 5%">
          <form method="post">
                <?php
                    $cquery = mysqli_query($con,"SELECT * FROM tb_hos_college")or die(mysqli_error());       
                    echo'<select class="col-lg-5" name="col" style="width:30%;height:40px">
                    <option selected="selected"> Select college..</option>';
                        while ($crow = mysqli_fetch_array($cquery)) {
                            echo "<option value='".$crow['kolej_id']."'>".$crow['kolej_name']."</option>";
                        }
                    echo'</select>';
                ?>
                <?php
                    $pquery = mysqli_query($con,"SELECT * FROM tb_hos_phase")or die(mysqli_error());       
                    echo'<select class="col-lg-5" name="phase" style="width:30%;height:40px">
                    <option selected="selected"> Select phase..</option>';
                        while ($prow = mysqli_fetch_array($pquery)) {
                            echo "<option value='".$prow['phase_id']."'>".$prow['phase_name']."</option>";
                        }
                    echo'</select>';
                ?>
                        <button type="submit" name="save" class="btn btn-info col-sm-2">Search</button>

    </form> 
</div>
<?php
            if (isset($_POST['save'])) {
                $kolej_id = $_POST['col'];
                $phase_id = $_POST['phase'];
                  if($kolej_id > 0 && $phase_id > 0){
                    $query = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id WHERE tb_hostel_reg.hostel_id = '$kolej_id' AND tb_hostel_reg.reg_phase = '$phase_id'") or die(mysqli_error());
                        include('../hostel/registration_list.php');
                  }
                  elseif($kolej_id > 0){
                        $query = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id WHERE tb_hostel_reg.hostel_id = '$kolej_id'") or die(mysqli_error());
                        include('../hostel/registration_list.php');
                    }elseif($phase_id > 0){
                        $query = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id WHERE tb_hostel_reg.reg_phase = '$phase_id'") or die(mysqli_error());
                        include('../hostel/registration_list.php');
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
       <div class="footer">
         <?php include '../adminfooter.php' ?>
       </div>
    </div>
  </div>
  <!--   Core JS Files   -->
<script type="text/javascript">
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>

</html>
