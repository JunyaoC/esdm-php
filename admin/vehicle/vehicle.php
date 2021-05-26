<?php
  include('../dbconnection.php');
  include('../adminsession.php');

$sqln = "SELECT * FROM tb_sticker
         LEFT JOIN tb_vehicle ON tb_vehicle.vehicleID = tb_sticker.vehiclePlateNo
         LEFT JOIN tb_payment ON tb_payment.stickerID = tb_sticker.stickerID
         ";
$resultn=mysqli_query($con,$sqln);


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
              <p>Vehicle</p>
            </a>
          </li>
          <li>
            <a href="../vehicle/vehicle.php">
              <i class="fa fa-bars"></i>
              <p>Manage Application</p>
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
      <div class="table-responsive">         
      <table class="table table-hover" id="program">
 
        <thead>
            <tr>
              <th>Student Matric</th>              
              <th>Vehicle Plate</th>
              <th>Payment Date</th>
              <th>Expiration Date</th>
              <th>Payment Proof</th>
              <th>Payment Type</th>
              <th>Status</th>
              <th>Operation</th>
            </tr>
        </thead>

        <tbody>
        <?php
            while ($rown=mysqli_fetch_array($resultn))
            {

              $a = $rown['stickerID'];
              $date = $rown['paymentDate'] ;
              $timestamp = strtotime($date);
              $ddate =  date('d/m/Y', $timestamp);

              $date1 = $rown['stickerDate'] ;
              $timestamp1 = strtotime($date1);
              $ddate1 =  date('d/m/Y', $timestamp1);


              
              echo "<tr>";
              echo "<td>".$rown['stuACID']."</td>";
              echo "<td>".$rown['vehiclePlateNo']."</td>";
              echo "<td>" .$ddate. "</td>";
              echo "<td>" .$ddate1. "</td>";
              echo "<td><a href='".$rown['paymentProve']."' target='_blank'> Download </a></td>";
              echo "<td>".$rown['paymentType']."</td>";
              echo "<td>".$rown['paymentStatus']."</td>";
              echo "<td>";
                                          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="'.$rown['paymentID'].'">
                                  Update
                                </button>';
              

                          echo "</td>";             
              echo "</tr>";
            }
        ?>          
        </tbody>
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

<!--   MODAL for Register -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
          <h4 style="align-self: "> Update Application </h4>
          <button type="button btn-primary" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" action="stickerprocess.php">


        <div class="form-group">
        <label for="Role">Role</label> <br>
        
        <select class="form-control" id="status" name="status">
               
               <option value= 'Approve'>Approve</option>
               <option value= 'Rejected'>Rejected</option>
               <option value= 'Received'>Received</option>
        
                </div>
        <input type="hidden"  id="sid" name="sid" value="<?php echo $rown['stickerID']; ?>">
        <input type="hidden"  id="pid" name="pid" value="<?php echo $rown['paymentID']; ?>">
        <br><br>
        
        </div>
           <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="button btn-info">Update</button>
        </form>
        </select>

        <button type="button" class="button btn-danger" data-dismiss="modal">Close</button>
        </div>         
            </div>
            </div>
        </div>
       </select></div> 

  <br> <br>
       <?php include 'adminfooter.php' ?>
    </div>
  </div>
  <!--   Core JS Files   -->

  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>

<script>
    $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('WARNING ' + recipient)
    modal.find('.modal-body input').val(recipient)
    // modal.find('.modal-footer').attr('action="test.php?"'+ recipient)
    $('#userForm').attr("action", 'stickerprocess.php?id=' + recipient);
  })
  </script> 


  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>

</html>
