<?php
  include('../dbconnection.php');
  include('../adminsession.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php 
  include '../pages-styling.php';
?>

<?php
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
  
    $sql = "SELECT * FROM tb_procourse_section
            WHERE courseSec_id = '$id'";

    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);

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
                <div class="card-header bg-secondary text-white"><h2>Update Pro Course Section</h2></div>
                <div class="card-body">
                <div class="col-md-12 p-4 border rounded">
                <?php echo '<form class="" method="post" action="sectionupdateprocess.php?id='.$id.'">'; ?>
                      <div class="form-group">
                        <label for="secprocourse">Pro Course</label><br>
                        <?php
                          $sql2 = "SELECT c.*,cs.* FROM tb_pro_course c LEFT JOIN tb_procourse_section cs ON c.procourse_code=cs.courseSec_courseID WHERE cs.courseSec_id=$id";
                          $result2 = mysqli_query($con,$sql2);
                          $result2a = mysqli_query($con,$sql2);
                          $row2a=mysqli_fetch_array($result2a);
                          // echo '<select class="custom-select" disabled id="secprocourse" name="secprocourse">';
                          //   echo '<option selected="selected" value="'.$row2a['procourse_code'].'" >'; echo $row2a['procourse_name']; echo '</option>';
                            while($row2=mysqli_fetch_array($result2))
                            {
                              echo $row2['procourse_code']." - ".$row2['procourse_name'];
                            }
                          // echo '</select>';
                        ?>
                      </div>
                      <div class="form-group">
                        <label for="secno">Section Number</label><br>
                        <?php echo $row['section_no'];?>
                      </div>
                      <div class="form-group"> 
                        <label for="secdate">Date</label> 
                        <input type="date" class="form-control" required="required" id="secdate" name="secdate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['courseSec_date'];?>"> 
                      </div>
                      <div class="form-group"> 
                        <label for="seclocation">Location</label> 
                        <input type="text" class="form-control" required="required" id="seclocation" name="seclocation" value="<?php echo $row['courseSec_loc'];?>"> 
                      </div>
                      <div class="form-group">
                        <label for="secfacilitator">Facilitator</label>
                        <?php
                          $sql3 = "SELECT * FROM tb_procourse_fac";
                          $result3 = mysqli_query($con,$sql3);
                          $result3a = mysqli_query($con,$sql3);
                          $row3a=mysqli_fetch_array($result3a);
                          echo '<select class="custom-select" required="required" id="secfacilitator" name="secfacilitator">';
                          echo '<option selected="selected" value="'.$row3a['fac_id'].'" >'; echo $row3a['fac_name']; echo '</option>';
                            while($row3=mysqli_fetch_array($result3))
                            {
                              echo "<option value= '".$row3['fac_id']."'>".$row3['fac_name']. "</option> ";
                            }
                          echo '</select>';
                        ?>
                      </div>
                      <div class="form-group">
                        <label for="secseat">Seat</label>
                        <input type="number" class="form-control" id="secseat" required="required" name="secseat" value="<?php echo $row['courseSec_seat'];?>"disabled>
                      </div>
                      <div class="form-group">
                        <label>Maximum Seat</label>
                        <input type="number" class="form-control" id="secmaxseat" required="required" name="secmaxseat" min="<?php echo $row['courseSec_seat'];?>" value="<?php echo $row['courseSec_maxseat'];?>">
                      </div>
                      <button type="submit" class="btn btn-primary" onclick="ConfirmUpdate()">UPDATE</button>
                      <button onclick='goBack()' class="btn btn-danger">GO BACK</button>
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

  <script type="text/javascript">
    function ConfirmUpdate() {
        var x = confirm("Are you sure you want to update procourse section details?");
        if (x)
            return true;
        else
            return false;
    }
  </script>

  <script>
    function goBack() {
        window.history.back();
    }
  </script>

  <!--   Pingendo  -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
