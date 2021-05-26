<?php
  include('../restaurantSession.php');
  include('../dbconnection.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include '../pages-styling.php';
?>
  <style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 480px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../img/logo.png">
          </div>
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">PSM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a>
              <p>Dining</p>
            </a>
          </li>
          <li class="active">
            <a href="restaurant.php">
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
            <a class="navbar-brand">PSM System Admin Page</a>
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
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <br> <br>
<div class="container">

  <br> <br> <br>
<center>
<h2>Restaurant Details</h2>
</center>

<div class="row">
  <center>
  <div class="column" style="background-color:#eddbbb;width:500px;margin-left:300px;">
  
  <form method="POST" action="addRestaurantProgress.php">
    
    <div class="form-group">
      <label for="text">Restaurant Name</label>
      <input type="text" class="form-control" id="restaurantName" name="restaurantName" required>  
    </div>

    <div class="form-group">
      <label for="text">Restaurant Address</label>
      <input type="text" class="form-control" id="restaurantAddr" name="restaurantAddr" required>
    </div>

    <div class="form-group">
      <label for="text">Restaurant Phone</label>
      <input type="text" class="form-control" id="restaurantPhone" name="restaurantPhone" required>
    </div>

        <div class="form-group">
      <label for="text">Restaurant Review</label>
      <input type="text" class="form-control" id="restaurantReview" name="restaurantReview" required>
    </div>


    <div class="form-group">
      <label for="email">Restaurant Status</label>
 </div>
      <select class="form-control" name="restaurantStatus" id="restaurantStatus">
        <option value="1">Active</option>
        <option value="2">Not Active</option>
      </select>
      <br>
     <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color:white;">Add</button></center> 

    </div>



</div>

        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"><center>Confirmation on addition</center></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to add this restaurant?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
        <button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
  
        </div>
        </div>                                                
        </div>
        </div>

  </form>

  </div>
  </center>
</div>


<br><br>
<center>


 

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
      <?php include '../adminfooter.php' ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../js/core/jquery.min.js"></script>
  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
