<?php 
  include('../dbconnection.php');
  include('../adminsession.php');

  $user_id = $_SESSION['user_id'];

  $sql = "SELECT * FROM tb_user
          WHERE u_id='$user_id'";

  $result = mysqli_query($con,$sql);

  $row=mysqli_fetch_array($result);

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
  }

  $sqls = "SELECT * FROM tb_pro_announcement
           WHERE an_id='$id'";

  $results = mysqli_query($con,$sqls);

  $rows = mysqli_fetch_array($results);

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
          <li class="active">
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
          <li>
            <a href="../procourse/sectionlist.php">
              <i class="fa fa-bars"></i>
              <p>Manage Section</p>
            </a>
          </li>
          <li>
            <a href="../procourse/studentlist.php">
              <i class="fa fa-bars"></i>
              <p>Manage Student</p>
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
                <div class="card-header bg-secondary text-white"><h2>Update Announcement</h2></div>
                <div class="card-body">
                  <div class="col-md-12 p-4 border rounded">
                  <?php echo '<form class="" method="post" action="announcementaddprocess.php?id='.$user_id.'">'; ?>
                      <div class="form-group">
                        <label for="userid">Admin</label>
                        <input class="form-control" type="text" id="userid" name="userid" value="<?php echo $row['u_name']; ?>" readonly></input>                  
                      </div>
                      <div class="form-group">
                        <label for="aid">Announcement ID</label>
                        <input class="form-control" type="text" id="aid" name="aid" value="<?php echo $rows['an_id']; ?>" readonly></input>                  
                      </div>
                      <div class="form-group"> 
                        <label for="atitle">Title</label> 
                        <input type="text" class="form-control" id="atitle" name="atitle" required="required" value="<?php echo $rows['an_title']; ?>"> 
                      </div>
                      <div class="form-group">
                        <label for="adetail">Detail</label>
                        <textarea class="form-control" id="adetail" name="adetail" rows="10" required="required"><?php echo $rows['an_detail']; ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" onclick="myFunction()">UPDATE</button>
                      <button onclick='goBack()' class="btn btn-danger">CANCEL</button>
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
      alert("Announcement successfully updated");
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