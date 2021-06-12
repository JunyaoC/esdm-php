<?php
  include('../dbconnection.php');
  include('../adminsession.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
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
        <a href="dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a  >
              <i class="fa fa-bars"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a>
              <p>Dining</p>
            </a>
          </li>
          <li>
            <a href="../dining/restaurant.php">
              <i class="fa fa-bars"></i>
              <p>Manage Restaurant</p>
            </a>
          </li>
          <li>
            <a>
              <p>Hostel</p>
            </a>
          </li>
          <li>
            <a href="../hostel/phase.php">
              <i class="fa fa-bars"></i>
              <p>Manage Hostel</p>
            </a>
          </li>
          <li>
            <a>
              <p>Attendance</p>
            </a>
          </li>        
          <li>
            <a href="../attendance/attendance.php">
              <i class="fa fa-bars "></i>
              <p>Manage attendance</p>
            </a>
          </li>
          <li>
            <a>
              <p>Vehicle</p>
            </a>
          </li> 
          <li>
            <a href="../vehicle/vehicle.php">
              <i class="fa fa-bars"></i>
              <p>Manage Vehicle</p>
            </a>
          </li>
          <li>
            <a>
              <p>Health</p>
            </a>
          </li> 
          <li>
            <a href="../health/health.php">
              <i class="fa fa-bars"></i>
              <p>Manage Health</p>
            </a>
          </li>
          <li>
            <a>
              <p>Library</p>
            </a>
          </li> 
          <li>
            <a href="../library/dashboard.php">
              <i class="fa fa-bars"></i>
              <p>Manage Library</p>
            </a>
          </li>
          <li>
            <a>
              <p>Pro Course</p>
            </a>
          </li> 
          <li>
            <a href="../procourse/procourse.php">
              <i class="fa fa-bars"></i>
              <p>Manage Pro Course</p>
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
      <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="https://media.glassdoor.com/l/a0/6e/5a/b7/main-gate-utm.jpg" style="width:100%">
   
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="https://image.isu.pub/190417021944-deb7b0221e48357ca17ee6a2a9f44d6b/jpg/page_1.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="https://mma.prnasia.com/media2/1310639/utm_graduates.jpg" style="width:100%">
       
      </div>

      </div>
      <br>

      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
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
    <?php include '../adminfooter.php' ?>
  </div>
  <!--   Core JS Files   -->

  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>

    <script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
  </script>

</body>

</html>
