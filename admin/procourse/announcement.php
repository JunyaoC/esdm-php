<?php 
  include('../dbconnection.php');
  include('../adminsession.php');

  $sql = "SELECT * FROM tb_pro_announcement";
  $result = mysqli_query($con,$sql);
 
?>

<!DOCTYPE html>
<html lang="en">

<?php 
  include '../pages-styling.php';
?>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div><br>
                <h3>Announcement</h3>    
            </div>
        </div>  
        <div>
            <br>
            <a class="btn btn-secondary" href="addannounce.php">Add Announcement</a>
          </div><br>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tittle</th>
                        <th>Details</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while ($row=mysqli_fetch_array($result))
                         {
                             echo "<tr>";
                             echo "<td>&nbsp&nbsp ".$row['an_title'] ."</td>";
                             echo "<td>&nbsp&nbsp ".$row['an_detail'] ."</td>";
                             echo "<td>&nbsp&nbsp  ";
                             echo "<a href = 'editannounce.php?id=".$row['an_id']."' class ='btn btn-primary '>Edit</a>";
                             echo "</td>";
                             echo "<td>&nbsp&nbsp  ";
                             echo "<a href = 'deleteannounce.php?id=".$row['an_id']."' class ='btn btn-danger' onclick='ConfirmDelete()'>Delete</a>";
                             echo "</td>";
                             echo "</tr>";
                         }
                    ?>
                </tbody>
            </table>
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
</html>



