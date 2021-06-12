<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  

  $sqln = "SELECT * FROM tb_ticket";
  $resultn=mysqli_query($con,$sqln);
// $resultn=mysqli_query($con,$sqln);

  $sqlp = "SELECT * FROM tb_vehicle";
  $resultp = mysqli_query($con,$sqlp);

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
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../img/logo.png">
          </div>
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">Sticker Applicant</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a>
              <p>Vehicle</p>
            </a>
          </li>
          <li>
            <a href="../vehicle/vehicle.php">
              <i class="fa fa-bars"></i>
              <p>Manage Application</p>
            </a>
            <a href="../vehicle/vehicleSticker.php">
              <i class="fa fa-bars"></i>
              <p>Manage Sticker</p>
            </a>
            <a href="../vehicle/vehicleTicket.php">
              <i class="fa fa-bars"></i>
              <p>Summon Ticket</p>
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
         <h4>Add Ticket</h4>
      <form method="POST" action="vehicleTicketAddProcess.php">

        <div class="form-group">
          <div>
            
              <label for="matric">Student Matric</label>
              <input type="text" id="id" name="id" placeholder="Matric No"><br>

              <label for="plate">Vehicle Plate</label>
              <?php 
                $sqlp = "SELECT * FROM tb_vehicle";
                $resultp = mysqli_query($con,$sqlp);
                echo '<select id="plate" name="plate">';
                while($rowp=mysqli_fetch_array($resultp)){
                  echo "<option value='". $rowp['vehicleID'] ."'>" .$rowp['vehicleID'] ."</option>";  // displaying data in option menu
                }
                echo '</select>';
              ?>
<br>

              <label for="amount">Ticket Amount</label>
              <input type="number" id="ticket" name="ticket" placeholder="0.00"><br>
              
              <label for="desc">Ticket Description</label>
              <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
              
              <label for="status">Payment Status</label>
              <select name="status">
                  <option value="Not Paid">Not Paid</option>
              </select>

              <input type="submit" value="Submit">
            
              

              <!-- <button type="submit" class="btn btn-warning">Submit</button>  -->   
                      
                    
        </div>
        
       
    
    </form>

    </div>

      




    <div class="row">
      <div class="column"> 
         <div id="chartContainer" style="height: 370px; width: 90%; margin-left: 40px;"></div>
      </div>
      <div class="column">
         <div id="chartContainer1" style="height: 370px; width: 90%;margin-right: 10px;">
           
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

  <br> <br>
       <?php include 'adminfooter.php' ?>
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
