<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  if (isset($_GET['id']) & ($_GET['section'])) {
    $id = $_GET['id'];
    $section = $_GET['section'];
  }

  $sql = "SELECT * FROM tb_section
  LEFT JOIN tb_class ON tb_section.section_id = tb_class.section_id
  LEFT JOIN tb_subject ON tb_section.subject_id = tb_subject.subject_id
  LEFT JOIN tb_user ON tb_section.lecturer_id =  tb_user.u_id
  WHERE subject_code = '$id' 
 ";
$result = mysqli_query($con,$sql);

$row=mysqli_fetch_array($result);


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
             <a href="../attendance/attendance.php">
              <i class="fa fa-bars"></i>
              <p>Upcoming</p>
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
 
      <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-secondary text-white">Create Class</div>
              <div class="card-body">
                <div class="col-md-12 p-4 border rounded">
                <?php echo '<form class="" method="post" action="createclassprocess.php?id='.$id.'">'; ?>                    <div class="form-group"> 
                      <label for="">Subject Code</label> 
                      <input type="text" class="form-control"  value="<?php echo $row['subject_code'];?>" readonly> 
                    </div>
                    <div class="form-group"> 
                      <label for="">Subject Name</label> 
                      <input type="text" class="form-control"  value="<?php echo $row['subject_name'];?>" readonly> 
                    </div>
                    <div class="form-group"> 
                      <label for="">Section</label> 
                      <input type="text" class="form-control"  value="<?php echo $section;?>" readonly> 
                    </div>
                    <div class="form-group"> 
                      <label for="">Section Number</label> 
                      <input type="text" class="form-control" id="sid" name="section number" value="<?php echo $row['section_number'];?>" > 
                    </div>
                    <div class="form-group" id="confirmationForm">
                      <label for="fpdate">Pickup date</label>
                      <input type="datetime-local" class="form-control" id="ctime"  name="ctime" min="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="myFunction()">CREATE</button>
                    <a class='btn btn-secondary' href='create_qr.php'>Generate QR Code</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
       <?php include 'adminfooter.php' ?>
    </div>
  </div>

  <script>
    function myFunction() {
      alert("Class successfully added");
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
