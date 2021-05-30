<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  

  $sqln = "SELECT * FROM tb_ticket";
  $resultn=mysqli_query($con,$sqln);
// $resultn=mysqli_query($con,$sqln);

?>

<!DOCTYPE html>

<html lang="en">
<?php 
  include '../pages-styling.php';
?>

<script>
    $(document).ready( function () {
    $('#program').DataTable();
} );
  </script>


<body class="">
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
            <a class="navbar-brand">Summon Ticket</a>
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
      <table class="table table-hover" id="program">
 
        <thead>
            <tr>
              <th>Ticket ID</th>
              <th>Student Matric</th>              
              <th>Vehicle No Plate</th>
              <th>Ticket Amount</th>
              <th>Ticket Description</th>
              <th>Operation</th>
              <!-- <th>Operation</th> -->
            </tr>
        </thead>

        <tbody>

    
        <?php
            while ($rown=mysqli_fetch_array($resultn))
            {
              $a = $rown['ticketID'];
              echo "<tr>";
              echo "<td>".$a."</td>";
              echo "<td>".$rown['ticket_uID']."</td>";
              echo "<td>".$rown['vehiclePlateNo']."</td>";
              echo "<td>".$rown['ticketAmount']."</td>";
              echo "<td>".$rown['ticketDesc']."</td>";
              echo "<td>";
              // echo "<a href='vehicleTicketDeleteProcess.php?id=".$rown['ticketID']."' class='btn btn-danger'>Delete</a>&nbsp";
              echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" style="color:white;"> Delete &nbsp</button>';
              echo "</td>";
                          
              echo "</tr>";
            }
        ?>
        </tbody>

   
      </table>
      <div class="float-right">
        <a href = 'vehicleTicketAdd.php' class = 'btn btn-primary btn-sm pull-left'>Add Ticket</a>
      </div>
     <!--  <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Add Ticket</button> --> 
    </div>


    </div>
      <div class="modal fade" id="delete" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Confirmation Delete</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this ticket from the system?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>

            <a href="vehicleTicketDeleteProcess.php?id=<?php echo $a; ?> "><button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button></a>
            <input type="hidden" name="id" value="<?php echo $a; ?>">

          </div>
        </div>                                                
      </div>
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
