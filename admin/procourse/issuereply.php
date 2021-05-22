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
<div class="container">
		<h2>Reply</h2>
	    <form method="POST" action="sendreplyprocess.php">

            <div class="form-group">
	          <label for="text">Details:</label>
	          <input type="text" class="form-control" id="freply" placeholder="Feedback" name="freply">
	        </div>

			<input type="hidden" id="freply" name="freply" value= "<?php echo $freply; ?>">
	        <button type="submit" class="btn btn-primary">Send</button>
			<a href="issue.php" class="btn btn-danger">Cancel</a>
	    </form>
	</div>

</br>

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