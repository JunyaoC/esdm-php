<?php
  include('../adminsession.php');
  include('../dbconnection.php');
  


  $order_id=$_GET['id'];

  //JOIN
  $sql = "SELECT * FROM tb_order LEFT JOIN tb_student ON tb_student.u_id = tb_order.user_id WHERE order_id='$order_id'";
  $result = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));
  $row = mysqli_fetch_array($result); 

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
  height: 520px; /* Should be removed. Only for demonstration */
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
          <li >
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
          <li class="active">
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
<h2>Order Details</h2>
</center>

<div class="row">
  <center>
  <div class="column" style="background-color:#eddbbb;width:500px;margin-left:300px;">
  
  <form method="POST" action="updateOrderProgress.php">
    <div class="form-group">
      <label for="text">Order ID: </label>
      <input type="text" class="form-control" id="orderId" name="orderId" value= "<?php echo $row['order_id']?>" readonly>
    </div>

    <div class="form-group">
      <label for="text">Order Date: </label>
      <input type="text" class="form-control" id="orderDate" name="orderDate" value= "<?php echo $row['order_date']?>" readonly>  
    </div>

    <div class="form-group">
      <label for="text">Order Price: </label>
      <input type="text" class="form-control" id="orderPrice" name="orderPrice" value= "<?php echo $row['order_price']?>"readonly>
    </div>

    <div class="form-group">
      <label for="text">Student Name: </label>
      <input type="text" class="form-control" id="studentName" name="studentName" value= "<?php echo $row['student_name']?>" readonly>  
    </div>


    <div class="form-group">
      <label for="text">Student Matric: </label>
      <input type="text" class="form-control" id="studentMatric" name="studentMatric" value= "<?php echo $row['student_matric']?>"readonly>
    </div>

    <div class="form-group">
      <label for="email">Order Status</label>

      <?php

        $sqlstatus="SELECT DISTINCT order_status FROM tb_order";
        $resultstatus=mysqli_query($con,$sqlstatus);

        echo '<select class="form-control" id="orderStatus" name="orderStatus" style="min-height:40px;">';
        while($rowstatus=mysqli_fetch_array($resultstatus))
          {
            if($rowstatus['order_status']==$row['order_status'])
            {
              
              echo"<option selected='selected' value='".$row['order_status']."'>".$row['order_status']."</option>";
              
            }

            else
            {
              echo"<option value='".$rowstatus['order_status']."'>".$rowstatus['order_status']."</option>";
              
            }
         
          }

        echo'</select>';

      ?>
    </div>


   <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color:white;">Update</button></center>
</div>

        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"><center>Confirmation on update</center></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to update the status of order?</p>
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
