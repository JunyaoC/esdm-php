<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  $msg = "";
  $error = "";

  if (isset($_POST['Delete'])) {
    $cid = intval($_GET['category_id']);
    $count = $dbh->prepare("DELETE FROM tb_category WHERE category_id=:cid");
    $count->bindParam(":cid", $cid, PDO::PARAM_INT);
    $count->execute();
    $msg = " Deleted!";
}
if (isset($_POST['update'])) {
    $category_name = $_POST['category_name'];
    $cid = intval($_GET['category_id']);
    $sql = "update  tb_category set category_name=:category_name where category_id=:cid ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    $query->bindParam(':cid', $cid, PDO::PARAM_STR);
    $query->execute();
    $msg = "Data has been updated successfully";
}

?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include '../pages-styling.php';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">


</script>

</head>

<!-- FOR SLIDERS/TOGGLE BUTTON--->
<style>
    .error {
      color: #fff;
      background-color: #de403b;
      border-color: black; 
    }
    .success {
        color: #fff;
        background-color: #5cb85c;
        border-color: black; 
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
</style>


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
          
          <li>
            <a>
              <p>Library</p>
            </a>
          </li> 
          <li>
            <a href="../library/create-category.php">
              <i class="fa fa-bars"></i>
              <p>Add Category</p>
            </a>
          </li>

          <li class="active">
            <a href="../library/manage-category.php">
              <i class="fa fa-bars"></i>
              <p>Manage Category</p>
            </a>
          </li>


          <li>
            <a href="../library/create-resource.php">
              <i class="fa fa-bars"></i>
              <p>Add Resource</p>
            </a>
          </li>

          <li>
            <a href="../library/manage-resource.php">
              <i class="fa fa-bars"></i>
              <p>Manage Resource</p>
            </a>
          </li>


          
        </ul>
      </div>
    </div>
    <div class="main-panel" style="padding: 1rem; height: 100%;">
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
            <a class="navbar-brand">ESDM Admin Library Page</a>
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


        <div class="" style="display: flex; justify-content: flex-start;align-items: center; width: 100%;margin-top: 5rem; margin-bottom: 1rem; flex-direction: column;">


          <h5 style="width: 100%;">Update Category</h5>

          <div>
            <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>Well done! </strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
          </div>
          
                                      

                                            <form method="post" style="width: 100%;">
                                                <?php
                                                $cid = intval($_GET['category_id']);
                                                $sql = "SELECT * from tb_category where category_id=:cid";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {   ?>

                                                        <div class="form-group has-success">
                                                            <label for="success" class="control-label">Category Name</label>
                                                            <div class="">
                                                                <input type="text" name="category_name" value="<?php echo htmlentities($result->category_name); ?>" required="required" class="form-control" id="success">

                                                            </div>
                                                        </div>


                                                <?php }
                                                } ?>
                                                <div class="form-group has-success">

                                                <div class="">
                                                        <a href="manage-category.php"><button type="button" class="btn btn-primary btn-labeled ">Back<span class="btn-label btn-label-right"><i class="fa fa-backward"></i></span></button></a>
                                                            <button id="submit-button" type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                            
                                   
                                                        </div>
                                                    <!-- Modal content-->
                                                   

                                                </div>
                                            </form>



          
        </div>







  <br> <br>
      
    </div>
  </div>
  <!--   Core JS Files   -->

  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>

</html>

