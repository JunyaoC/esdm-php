<?php 
  include('../dbconnection.php');
  include('../adminsession.php');

  $sql = "SELECT * FROM tb_procourse_issue";
  $result = mysqli_query($con,$sql);

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


  <section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
  <div class="row">
    <div class="col"><br>
      <h4>Issue</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Matric No</th>
            <th>Issue</th>
            <th>Date</th>
            <th>Details</th>
            <th>Status</th>
            <th>Reply</th>
          </tr>
        </thead>
        <tbody>
        <?php
        while ($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>&nbsp&nbsp  ".$row['stu_matric'] ."</td>";
            echo "<td>&nbsp&nbsp  ".$row['issue_title'] ."</td>";
            echo "<td>&nbsp&nbsp  ".$row['issue_date'] ."</td>";
            echo "<td>&nbsp&nbsp  ".$row['issue_details'] ."</td>";
            echo "<td>&nbsp&nbsp  ".$row['issue_status'] ."</td>";
            echo "<td>&nbsp&nbsp  ";
                echo "<a href = 'issuereply.php?id=".$row['stu_matric']."' class ='btn btn-primary '>Reply</a>";
            echo "</td>";
            echo "</tr>";
        }
      ?>
        </tbody>
      </table>
   </div>

</div>
</div>
</section>


<?php include '../adminfooter.php' ?>

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







