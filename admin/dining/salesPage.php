<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  $sql = "SELECT * FROM tb_order
          LEFT JOIN tb_user ON tb_user.u_id = tb_order.user_id
          LEFT JOIN tb_student ON tb_student.u_id = tb_order.user_id
          WHERE order_status = 'Completed'";
  $result = mysqli_query($con,$sql);
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
        <a href="../admin/dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a>
              <p>Dining</p>
            </a>
          </li>
          <li>
            <a href="restaurant.php">
              <i class="fa fa-bars"></i>
              <p>Manage Restaurant</p>
            </a>
          </li>
          <li class="active">
            <a href="salesPage.php">
              <i class="fa fa-bars"></i>
              <p>View Sales</p>
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


  <br> <br> <br> <br> <br>



        <div class="container">
          <div class="row">
          <div class="col-md-3">
            <div class="card-counter success">
              <i class="fa fa-check"></i>
              <span class="count-numbers">
                <?php 
                  $sql ="SELECT order_id FROM tb_order WHERE order_status = 'Completed' ";
                  $query = $con -> prepare($sql);
                  $query->execute();
                  $results=$query->get_result();
                  $totalComplete=$results->num_rows;
                  echo htmlentities($totalComplete);
                ?>
              </span>
              <span class="count-name">Completed Order</span>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card-counter info">
              <i class="fa fa-clock-o"></i>
              <span class="count-numbers">
                <?php 
                  $sql ="SELECT order_id FROM tb_order WHERE order_status = 'Preparing' ";
                  $query = $con -> prepare($sql);
                  $query->execute();
                  $results=$query->get_result();
                  $totalPrepare=$results->num_rows;
                  echo htmlentities($totalPrepare);
                ?>
              </span>
              <span class="count-name">Preparing Order</span>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card-counter primary">
              <i class="fa fa-cutlery"></i>
              <span class="count-numbers">
                <?php 
                  $sql ="SELECT order_id FROM tb_order WHERE order_status = 'Pick Up' ";
                  $query = $con -> prepare($sql);
                  $query->execute();
                  $results=$query->get_result();
                  $totalPickUp=$results->num_rows;
                  echo htmlentities($totalPickUp);
                ?>
              </span>
              <span class="count-name">Ready Order</span>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card-counter danger">
              <i class="fa fa-ban"></i>
              <span class="count-numbers">
              <?php 
                  $sql ="SELECT order_id FROM tb_order WHERE order_status = 'Cancelled' ";
                  $query = $con -> prepare($sql);
                  $query->execute();
                  $results=$query->get_result();
                  $totalPickUp=$results->num_rows;
                  echo htmlentities($totalPickUp);
                ?>
              </span>
              <span class="count-name">Cancelled Order</span>
            </div>
          </div>    
        </div>
    <br><br>


      </div>
      
    <div class="container">
    <div class="row ml-1">
      <div>
        <h3>Sales List</h3>
      </div>
    </div>
      <table id="program" class="display">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Date</th>
            <th>Student Name</th>
            <th>Student Matric</th>
            <th>Status</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row=mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo"<td>".$row['order_id'] ."</td>";
              echo"<td>".$row['order_date'] ."</td>";
              echo"<td>".$row['student_name'] ."</td>";
              echo"<td>".$row['student_matric'] ."</td>";
              echo"<td>".$row['order_status'] ."</td>";
              echo"<td>"."RM " .$row['order_price'] ."</td>";
              echo"</tr>";
            }
          ?>
        </tbody>
      </table>
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
