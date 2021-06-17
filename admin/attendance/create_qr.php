<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  $id = $_GET['id'];


  $sql = "SELECT * FROM tb_class WHERE class_id='$id'
   
 ";
$result = mysqli_query($con,$sql);

$row=mysqli_fetch_array($result);


?>

<!DOCTYPE html>

<html lang="en">
<head>
  <script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
  </head>
<?php 
  include '../pages-styling.php';
?>
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
              <p>Attendance</p>
            </a>
          </li>
          <li>
            <a href="../attendance/attendance.php">
              <i class="fa fa-bars"></i>
              <p>Manage Attendance Wizard Session</p>
            </a>
             <a href="../attendance/attendance.php">
              <i class="fa fa-bars"></i>
              <p>Upcoming</p>
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
        <link rel="stylesheet" href="css/style.css">
<script src="script/ajax_generate_code.js"></script>
<input type="hidden" class="form-control" id='content' value="<?php echo $row['class_id'];?>" readonly>
	<!-- <div class="container">		
		<div class="row">
			<div class="col-md-3">
		        <form class="form-horizontal" method="post" id="codeForm" onsubmit="return false">
		            <div class="form-group">
                  <input type="hidden" class="form-control" id='content' value="<?php echo $row['class_id'];?>" readonly>
		            </div>
                <div class="form-group">
		            	<label class="control-label">Code Level (ECC) : </label>
		            	<select class="form-control col-xs-10" id="ecc">
		            		<option value="H">H - best</option>
		            		<option value="M">M</option>
		            		<option value="Q">Q</option>
		            		<option value="L">L - smallest</option>       		            
		            	</select>
		            </div>
		            <div class="form-group">
		            	<label class="control-label">Size : </label>
		            	<input type="number" min="1" max="10" step="1" class="form-control col-xs-10" id="size" value="5">
		            </div>
		            <div class="form-group">
		            	<label class="control-label"></label>
		            	<input type="submit" name="submit" id="submit" class="btn btn-success" value="Generate QR Code">
		            </div>
		        </form>
	    	</div>
	    	<div class="col-md-6">
	    		<div class="showQRCode"></div>
	    	</div>
    	</div>
    </div> -->

    <div id="qrcode"></div>
<script type="text/javascript">


var qrcode = new QRCode("qrcode", {
    text: document.getElementById("content").value,
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#F4F3EF",
    correctLevel : QRCode.CorrectLevel.H
});



</script>


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
    </div>
  </div>

  <script>
    function myFunction() {
      alert("Class successfully added");
    }
  </script>
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
