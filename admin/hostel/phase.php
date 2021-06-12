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
.row{
  text-align: center;
}
.card{
  height:200px;
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
            <li class="active">
            <a href="../hostel/phase.php">
              <i class="fa fa-bars"></i>
              <p>Manage Phase</p>
            </a>
          </li>
          <li>
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
      <div class="row">
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
      </div>
  <br> <br><br><br>
<div class="container" style="padding-top: 10%">
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Kuota Pengetua Phase</h4>
        <p class="card-text">Duration: 2-3 weeks</p>
        <a href="#date1" data-whatever="Kuota Pengetua" class="btn btn-primary" data-toggle="modal">Manage Date</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Open Registration Phase</h4>
        <p class="card-text">Duration: 3-4 weeks</p>
        <a href="#date2" data-whatever="Open Registration" class="btn btn-primary" data-toggle="modal">Manage Date</a>
      </div>
    </div>
  </div>
    <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Hostel Amendment Phase</h4>
        <p class="card-text">Duration: 1 weeks</p>
        <a href="#date3" data-whatever="Hostel Amendment" class="btn btn-primary" data-toggle="modal">Manage Date</a>
      </div>
    </div>
  </div>
</div>
  
</div>
  <?php 
  $query = mysqli_query($con,"SELECT * FROM tb_hos_phase") or die(mysqli_error());
    while($row = mysqli_fetch_array($query)){

  ?>
<div class="modal fade" id="date<?php echo $row['phase_id']?>" tabindex="-1" aria-labelledby="date" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['phase_name']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="start_date" class="col-form-label">Start Date:</label>
            <input type="date" class="form-control" name="start_date">
          </div>
          <div class="form-group">
            <label for="start_date" class="col-form-label">End Date:</label>
            <input type="date" class="form-control" name="end_date">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="phase_id" value="<?php echo $row['phase_id'] ?>">
        <button name="save" type="submit" class="btn btn-primary">Save</button> 
         </form>
      </div>         


      </div>
  </div>
</div>
      <?php 
          if(isset($_POST['save'])) {
        $phase_id = $_POST['phase_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

            $sql= "UPDATE tb_hos_phase SET start_date = '$start_date', end_date = '$end_date' WHERE phase_id = '$phase_id'";
  
        if(mysqli_query($con, $sql)){
            echo '<script> alert("Assigned successfully !");window.location.href="../hostel/phase.php"; </script>';
        }
        else{
            echo '<script> alert("Failed to update data !"); </script>';
        }

                            
      }} ?>
         
<!-- manage date model -->
 
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

  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>

</body>

</html>
