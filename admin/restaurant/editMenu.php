<?php
  include('../restaurantSession.php');
  include('../dbconnection.php');
  
  if(isset($_GET['id']))
  {
    $food_id=$_GET['id'];
  }
  //JOIN
  $sql = "SELECT * FROM tb_food WHERE food_id='$food_id'";
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
  height: 600px; /* Should be removed. Only for demonstration */
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
          <li>
            <a href="restaurant.php">
              <i class="fa fa-bars"></i>
              <p>Manage Restaurant</p>
            </a>
          </li>
          <li class="active">
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
<h2>Food Details</h2>
</center>

<div class="row">
  <center>
  <div class="column" style="background-color:#eddbbb;width:500px;margin-left:300px;">
  
  <form method="POST" action="editMenuProgress.php" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="text">Food Name</label>
      <input type="text" class="form-control" id="foodName" name="foodName" value= "<?php echo $row['food_name']?>">  
    </div>

    <div class="form-group">
      <label for="email">Restaurant </label>
    </div>

 
      <?php

        $sqlstatus="SELECT * FROM tb_restaurant";
        $resultstatus=mysqli_query($con,$sqlstatus);

        echo '<select class="form-control" id="foodRes" name="foodRes" style="min-height:40px;">';
        while($row2=mysqli_fetch_array($resultstatus))
          {
            if($row2['restaurant_id']==$row['restaurant_id'])
            {
              echo"<option selected='selected' value='".$row2['restaurant_id']."'>".$row2['restaurant_name']."</option>";
            }
            else{
              echo"<option value='".$row2['restaurant_id']."'>".$row2['restaurant_name']."</option>";
            }
            
          }
        echo'</select>';

      ?>

      <div class="form-group">
      <label for="text">Food Description</label>
      <input type="text" class="form-control" id="foodDesc" name="foodDesc" value= "<?php echo $row['food_description']?>">  
    </div>

    <div class="form-group">
      <label for="text">Availability</label>
      <select class="form-control"style="min-height:40px;" name="foodAva" id="foodAva">
        <option value="1">Yes</option>
        <option value="2">No</option>
      </select>  
    </div>

    <div class="form-group">
      <label for="text">Price</label>
      <input type="text" class="form-control" id="foodPrice" name="foodPrice" value= "<?php echo $row['food_price']?>">  
    </div>

    <div class="form-group">
      <label for="text">Type</label>
      <input type="text" class="form-control" id="foodType" name="foodType" value= "<?php echo $row['food_type']?>">  
    </div>
    <br>
    <div class="form-group">
     
            <input type="file" name="fileToUpload" id="fileToUpload" accept=".png" value= "<?php echo $row['food_image']?>">
            <input type="submit" value="Upload" name="submit">
             <label class="custom-file-label" for="propFile">Select image to upload: (in *.png)</label>
    </div>

       <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color:white;">Edit</button></center>

  </div>

     <input type="hidden" id="id" name="id" value= "<?php echo $food_id; ?>"> 

  


</div>

        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
                                                        
            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"><center>Confirmation on edit</center></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to edit this menu?</p>
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
