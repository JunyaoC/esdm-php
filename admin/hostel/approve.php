<?php
  include('../dbconnection.php');
  include('../adminsession.php');
  $reg_id = $_GET['id'];
  $query = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_student.* FROM tb_hostel_reg INNER JOIN tb_student ON tb_hostel_reg.student_id = tb_student.student_matric WHERE reg_id = '$reg_id' ") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
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

<div class="container" style="padding-left: 20%;padding-bottom: 3%;padding-top: 5%">
  <a  href="register.php" class="btn btn-secondary">Return</a>
 <div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Assign Block & Room for <?php echo $row['student_name'] ?></h4>
      </div>
      <div class="card-text" style="padding-left: 100px;">
        <form method="post">
          <div class="form-group">
            <h5 ><label class="col-form-label">Select Block:</label>
            <?php
                  $bquery = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.*,tb_hos_block.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id INNER JOIN tb_hos_block ON tb_hos_college.kolej_id = tb_hos_block.hostel_id WHERE tb_hostel_reg.reg_id = '$reg_id' ")or die(mysqli_error()); 

                    echo'<select name="getblock" style="padding-left: 100px;height:40px">
                    <option> Select block..</option>';
                        while ($brow = mysqli_fetch_array($bquery)) {
                            echo "<option value='".$brow['block_id']."'>".$brow['block_name']."</option>";

                        }
                    echo'</select></h5>'; 
                ?>
          </div>
          <div class="form-group">
            <h5><label class="col-form-label">Select Room:</label>
                        <?php
                  $rquery = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.*,tb_hos_block.*,tb_hos_room.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id INNER JOIN tb_hos_block ON tb_hos_college.kolej_id = tb_hos_block.hostel_id INNER JOIN tb_hos_room ON tb_hos_block.block_id = tb_hos_room.block_id WHERE tb_hostel_reg.reg_id = '$reg_id' ")or die(mysqli_error());       
                    echo'<select name="getroom" style="padding-left: 100px;height:40px">
                    <option> Select room..</option>';
                        while ($rrow = mysqli_fetch_array($rquery)) {
                            echo "<option value='".$rrow['room_id']."'>".$rrow['room_no']."</option>";
                        }
                    echo'</select></h5>';
                ?>
          </div>
          <div style="padding-left: 140px">
        <input type="hidden" name="regid" value="<?php echo $reg_id; ?>">
        <button name="save1" type="submit" class="btn btn-primary btn-lg" >Save</button> 
          </div>
         </form>
     </div>  
     
      </div>
  </div>
</div>
      
</div>
<?php 
          if(isset($_POST['save1'])) {
        $reg_id = $_POST['regid'];
        $block = $_POST['getblock'];
        $room = $_POST['getroom'];

          $sql= "UPDATE tb_hostel_reg SET block_id = '$block', room_id = '$room',reg_status='Accepted' WHERE reg_id = '$reg_id'";
  
        if(mysqli_query($con, $sql)){
            echo '<script> alert("Assigned successfully !");window.location.href="../hostel/register.php"; </script>';
        }
        else{
            echo '<script> alert("Failed to update data !"); </script>';
        }
                  
      } ?> 


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
