<?php
  include('../dbconnection.php');
  include('../adminsession.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php 
  include '../pages-styling.php';
?>

<body>
  <div class="wrapper ">
  <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="../img/logo.png">
        </div>
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a>
              <p>Pro Course</p>
            </a>
          </li>
          <li>
            <a href="../procourse/procourse.php">
              <i class="fa fa-bars"></i>
              <p>Manage Pro Course</p>
             </a>
          </li>
          <li class="active">
            <a href="../procourse/sectionlist.php">
              <i class="fa fa-bars"></i>
              <p>Manage Section</p>
            </a>
          </li>
          <li>
            <a href="../procourse/studentlist.php">
              <i class="fa fa-bars"></i>
              <p>Manage Appointment</p>
            </a>
          </li>
          <li>
            <a href="../procourse/issue.php">
              <i class="fa fa-bars"></i>
              <p>Manage Issue</p>
            </a>
          </li>
          <li>
            <a href="../procourse/announcement.php">
                <i class="fa fa-bars"></i>
                <p>Manage Announcement</p>
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
   <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-secondary text-white"><h3>Add Section</h3></div>
            <div class="card-body">
            <div class="col-md-12 p-4 border rounded">
                <form class="" method="post" action="sectionaddprocess.php">
                  <div class="form-group">
                    <label for="secprocourse">Pro Course</label>
                    <?php
                      $sql = "SELECT * FROM tb_pro_course";
                      $result = mysqli_query($con,$sql);
                      echo '<select class="custom-select" id="secprocourse" name="secprocourse" required>';
                        echo '<option disabled selected hidden>Select Pro Course</option>';
                        while($row=mysqli_fetch_array($result))
                        {
                          echo "<option value= '".$row['procourse_code']."'>".$row['procourse_name']. "</option> ";
                        }
                      echo '</select>';
                    ?>
                  </div>
                  <div class="form-group"> 
                    <label for="secdate">Date</label> 
                    <input type="date" class="form-control" required="required" min="<?php echo date('Y-m-d'); ?>" id="secdate" name="secdate"> 
                  </div>
                  <div class="form-group">
                    <label for="secfacilitator">Facilitator</label>
                    <?php
                      $sql = "SELECT * FROM tb_procourse_fac";
                      $result = mysqli_query($con,$sql);
                      echo '<select class="custom-select"  id="secfacilitator" name="secfacilitator" required>';
                        echo '<option disabled="" selected="" hidden>Select Facilitator</option>';
                        while($row=mysqli_fetch_array($result))
                        {
                          echo "<option value= '".$row['fac_id']."'>".$row['fac_name']. "</option> ";
                        }
                      echo '</select>';
                    ?>
                  </div>
                  <div class="form-group"> 
                    <label for="seclocation">Location</label> 
                    <input type="text" class="form-control" required="required" id="seclocation" name="seclocation"> 
                  </div>
                  <div class="form-group">
                    <label for="secmaxseat">Maximum Seat</label>
                    <input type="number" class="form-control" id="secmaxseat" min="1" name="secmaxseat" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Add</button>
                  <button onclick='goBack()' class="btn btn-danger">Go Back</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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

  <br><br>

  <?php include '../adminfooter.php' ?>

  <script>
    function myFunction() {
      alert("Pro Course Section successfully added");
    }
  </script>

  <script>
    function goBack() {
        window.history.back();
    }
  </script>

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
