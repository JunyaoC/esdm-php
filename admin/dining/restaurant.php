<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  $sql = "SELECT * FROM tb_restaurant";
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
        <a href="dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a>
              <p>Dining</p>
            </a>
          </li>
          <li class="active">
            <a href="restaurantPage.php">
              <i class="fa fa-bars"></i>
              <p>Manage Restaurant</p>
            </a>
          </li>
          <li>
            <a href="menuPage.php">
              <i class="fa fa-bars"></i>
              <p>Manage Menu</p>
            </a>
          </li>
          <li>
            <a href="orderPage.php">
              <i class="fa fa-bars"></i>
              <p>Manage Order</p>
            </a>
          </li>
          <li>
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
    <div class="row ml-1">
      <div>
        <h3>Restaurant List</h3>
      </div>
      <div class="ml-auto mr-3"> 
        <a href='addRestaurant.php' class='btn btn-primary' style="color:white;"> Add Restaurant &nbsp<i class="fa fa-plus "></i></a>
      </div>
    </div>
      <table id="program" class="display">
        <thead>
          <tr>
            <th>Restaurant Name</th>
            <th>Restaurant Address</th>
            <th>Restaurant Phone</th>
            <th>Restaurant Status</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row=mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo"<td>".$row['restaurant_name'] ."</td>";
              echo"<td>".$row['restaurant_address'] ."</td>";
              echo"<td>".$row['restaurant_phone'] ."</td>";
              echo"<td>".$row['restaurant_status'] ."</td>";
              echo"<td>";
                echo "<a href='editRestaurant.php?id=".$row['restaurant_id']."' class='btn btn-warning'>Edit</a> &nbsp";
                echo "<a href='deleteRestaurant.php?id=".$row['restaurant_id']."' class='btn btn-danger' onclick='ConfirmDelete()'>Delete</a> &nbsp";
              echo"</td>";
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
