
<?php
 
include('../dbconnection.php');


	$fctitle = $_POST['fctitle'];
	$fcdetail = $_POST['fcdetail'];

	//SQL insert (create)
	$sql = "INSERT INTO tb_pro_announcement(an_title, an_detail)
			VALUES ('$fctitle', '$fcdetail')";

	//Execute SQL
	mysqli_query($con, $sql);

	//Close connection
	//var_dump($sql);
	header('Location: announcement.php');
	
?>