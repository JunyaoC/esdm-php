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
<div class="wrapper">
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
                <li >
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
                <li>
                    <a href="../procourse/sectionlist.php">
                    <i class="fa fa-bars"></i>
                    <p>Manage Section</p>
                    </a>
                </li>
                <li>
                    <a href="../procourse/studentlist.php">
                    <i class="fa fa-bars"></i>
                    <p>Manage Appointment</p>
                    </a>
                </li>
                <li>
              <a href="../procourse/history.php">
                <i class="fa fa-bars"></i>
                  <p>History</p>
              </a>
          </li> 
                <li>
                    <a href="../procourse/issue.php">
                    <i class="fa fa-bars"></i>
                    <p>Manage Issue</p>
                    </a>
                </li>
                <li class="active">
                    <a href="../procourse/announcement.php">
                    <i class="fa fa-bars"></i>
                    <p>Manage Announcement</p>
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
                <div class="row ml-1">
                    <div>
                        <h3>Announcement</h3>
                    </div>
                    <div class="ml-auto mr-3"> 
                        <a href='announcementadd.php' class='btn btn-primary' style="color:white;"> ADD ANNOUNCEMENT &nbsp<i class="fa fa-plus "></i></a>
                    </div>
                </div>
                <div class="py-3 col bg-light border">
                    <table id="program" class="display">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Editor</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $sql = "SELECT * FROM tb_pro_announcement
                                LEFT JOIN tb_user ON tb_pro_announcement.an_user = tb_user.u_id";
                                $result = mysqli_query($con,$sql);
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                        echo "<td>".$row['an_title']."</td>";
                                        echo "<td>".$row['an_detail']."</td>";
                                        echo "<td>".$row['u_name']."</td>";
                                        echo "<td>
                                                <a class='btn btn-secondary' href='announcementupdate.php?id=".$row['an_id']."' >UPDATE</a> <a class='btn btn-danger' href='announcementdelete.php?id=".$row['an_id']."' onclick='return confirm(\"Are you sure you want to delete?\")'>DELETE</a>
                                             </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <!-- Logout Modal-->                           
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

        <?php include '../adminfooter.php' ?>

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

<script type="text/javascript">
    function ConfirmUpdate()
    {
    var x = confirm("Are you sure you want to update announcement?");
    if (x)
        return true;
    else
        return false;
    }
</script>

<script type="text/javascript">
    function ConfirmDelete()
    {
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>

<script>
    $(document).ready( function () {
        $('#program').DataTable();
    } );
  </script>

</body>
</html>




