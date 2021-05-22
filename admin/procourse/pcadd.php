<?php
  include('../dbconnection.php');
  include('../adminsession.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php 
  include '../pages-styling.php';
?>


<body>
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
              <p>Dining</p>
            </a>
          </li>
          <li>
            <a href="../dining/restaurant.php">
              <i class="fa fa-bars"></i>
              <p>Manage Restaurant</p>
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
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-secondary text-white"> Add Pro Course</div>
              <div class="card-body">
                <div class="col-md-12 p-4 border rounded">
                  <form class="" method="post" action="pcaddprocess.php">
                    <div class="form-group"> 
                      <label for="pccode">Pro Course Code</label> 
                      <input type="text" class="form-control" id="pccode" name="pccode" required="required"> 
                    </div>
                    <div class="form-group"> 
                      <label for="pcname">Pro Course Name</label> 
                      <input type="text" class="form-control" id="pcname" name="pcname" required="required"> 
                    </div>
                    <div class="form-group">
                      <label>Pro Course Type</label>
                      <select class="custom-select" id="pctype" name="pctype" required="required">
                        <option disabled="" selected="">Select Pro Course Type</option>
                        <option value="Compulsory">Compulsory</option>
                        <option value="Elective">Elective</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pcobjective">Pro Course Objective</label>
                      <textarea class="form-control" id="pcobjective" name="pcobjective" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="pclearningoutcome">Pro Course Learning Outcome</label>
                      <textarea class="form-control" id="pclearningoutcome" name="pclearningoutcome" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="myFunction()">Add</button>
                  </form>
                </div>
              </div>
            </div>
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

  <br><br>

  <?php include 'adminfooter.php' ?>

  <script>
    function myFunction() {
      alert("Pro Course successfully added");
    }
  </script>

  <!--   Pingendo  -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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